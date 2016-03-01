<?php
function index_route($nom="", $prenom="", $adresse="", $codePostal="", $ville="", $mail="", $numTel=""){
    //Formulaire d'enregistrement d'un client.
    // Fichier d'arrivé par défaut pour s'identifier d'authentification
    $form = new FormBootstrap('Client');
    $form->addHidden('route', 'client_ajoutIndex_valid');
    $form->addText('nom', array($nom), 'Nom');
    $form->addText('prenom',array(), 'Prénom');
    $form->addText('adresse',array(), 'Adresse');
    $form->addText('codePostal',array(), 'Code Postal');
    $form->addText('ville',array(), 'Ville');
    $form->addEmail('mail', array(),'Adresse Mail');
    $form->addNumeric('numTel',array(),'Numéro de Téléphone');
    $entreprises=  Connexion::table('select libelle from organisation');
    $list=array();
    foreach ($entreprises as $ut){
        $list[]=$ut['libelle'];
    }
    $form->addSelect('organisation', $list, array(), 'Votre organisation');
    
     include(ROOT.'AdminLTE/form.php');  
}

function valid_route()
{
    //Récupération du formulaire.
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $adresse=$_POST['adresse'];
    $codePostal=$_POST['codePostal'];
    $ville=$_POST['ville'];
    $mail=$_POST['mail'];
    $numTel=$_POST['numTel'];
    $organisation=$_POST['organisation'];
    $organisationId=Connexion::queryFirst("SELECT id FROM organisation where libelle='".$organisation."'");
    
    //vérification si aucune zone de texte est restée vide pour envoi à la BDD.
    if ($nom !="" and $prenom!="" and $adresse!="" and $codePostal!="" and $ville!="" and $mail!="" and $numTel!="") 
    {
        $query='INSERT INTO client (nom, prenom, adresse, codePostal, ville, entreprise_id, mail, numTelephone)'
            . "VALUES ('".$nom."', '".$prenom."', '".$adresse."', '".$codePostal."', '".$ville."','.$organisationId.', '".$mail."', '".$numTel."')";
        Connexion::exec($query);
        include(ROOT.'AdminLTE/alerte.php');
    }
    
    //Si une zone de texte est restée vide, on recharge le formulaire avec les valeurs précédentes.
    else
        
    {
        index_route($nom, $prenom, $adresse, $codePostal, $ville, $mail, $numTel);
    }
}
