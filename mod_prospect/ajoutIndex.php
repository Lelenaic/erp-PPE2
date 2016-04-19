<?php
function index_route(){
    $form = new FormBootstrap('Prospect');
    $form->addHidden('route', 'prospect_ajoutIndex_valid');
    $form->addText('nom',array(), 'Nom');
    $form->addText('prenom',array(), 'Prénom');
    $form->addText('adresse',array(), 'Adresse');
    $form->addText('codePostal',array(), 'Code Postal');
    $form->addText('ville',array(), 'Ville');
    $form->addEmail('mail', array(),'Adresse Mail');
    $form->addNumeric('numTel',array(),'Numéro de Téléphone');
    if ($_SESSION['utilisateur']['utilisateurtype_id'] == 1)
    {
        $entreprises=  Connexion::table('SELECT libelle FROM organisation');
        $list=array();
        foreach ($entreprises as $ut){
            $list[]=$ut['libelle'];
        }
        $form->addSelect('organisation', $list, array(), 'Organisation');
    }
     include(ROOT.'AdminLTE/form.php');
}

function valid_route(){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $adresse=$_POST['adresse'];
    $codePostal=$_POST['codePostal'];
    $ville=$_POST['ville'];
    $mail=$_POST['mail'];
    $numTel=$_POST['numTel'];
    if ($_SESSION['utilisateur']['utilisateurtype_id'] == 1)
    { 
        $organisation=$_POST['organisation'];
        $organisationRecupId=Connexion::queryFirst("SELECT id FROM organisation WHERE libelle='".$organisation."'");
        $organisationId = $organisationRecupId['id'];
        
    }
    else
    {
        $organisationId = $_SESSION['utilisateur']['entreprise_id'];
    }
    
    
    $query='INSERT INTO prospect (nom, prenom, adresse, codePostal, ville, entreprise_id, mail, numtelephone)'
            . "VALUES ('".$nom."', '".$prenom."', '".$adresse."', '".$codePostal."', '".$ville."', ".$organisationId.", '".$mail."', '".$numTel."')";
    Connexion::exec($query);
    include(ROOT.'AdminLTE/alerte.php');
    
}
