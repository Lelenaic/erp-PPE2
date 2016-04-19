<?php
 function formulaire($tableAjout, $erreur=false){
     // Iitilaisation du formulaire
    $form = new FormBootstrap('Client');
    $form->addHidden('route', 'client_ajoutIndex_valid');
    
    if ($_SESSION['utilisateur']['utilisateurtype_id'] == 1)
    {
        $entreprises=  Connexion::table('SELECT libelle FROM organisation');
        $list=array();
        foreach ($entreprises as $ut){
            $list[]=$ut['libelle'];
        }
    }
    $form->addHidden('rappel', 'true');
    //var_dump($tableAjout);
    if($erreur)
    {
        //Formulaire d'enregistrement d'un client si l'utilisateur n'a pas remplis tous les champs.   
        $form->addText('nom', array($tableAjout[0]), 'Nom');
        $form->addText('prenom',array($tableAjout[1]), 'Prénom');
        $form->addText('adresse',array($tableAjout[2]), 'Adresse');
        $form->addText('codePostal',array($tableAjout[3]), 'Code Postal');
        $form->addText('ville',array($tableAjout[4]), 'Ville');
        $form->addEmail('mail', array($tableAjout[5]),'Adresse Mail');
        $form->addNumeric('numTel',array($tableAjout[6]),'Numéro de Téléphone');
    }
    else
    {
        //Formulaire d'enregistrement d'un client si l'utilisateur arrive sur la page.
        $form->addText('nom', array(), 'Nom');
        $form->addText('prenom',array(), 'Prénom');
        $form->addText('adresse',array(), 'Adresse');
        $form->addText('codePostal',array(), 'Code Postal');
        $form->addText('ville',array(), 'Ville');
        $form->addEmail('mail', array(),'Adresse Mail');
        $form->addNumeric('numTel',array(),'Numéro de Téléphone');
    }
    
    // Créer un menu déroulant avec la liste des entreprises
    if ($_SESSION['utilisateur']['utilisateurtype_id'] == 1)
    {
        $entreprises=  Connexion::table('SELECT libelle FROM organisation');
        $list=array();
        foreach ($entreprises as $ut){
            $list[]=$ut['libelle'];
        }
        $form->addSelect('organisation', $list, array(), 'Organisation');
    }
    // Appel du formulaire dans la page HTML (construction de la balise <form>)
     include(ROOT.'AdminLTE/form.php');
}

 
 
// Fichier d'arrivé par défaut pour s'identifier d'authentification
function index_route($nom="", $prenom="", $adresse="", $codePostal="", $ville="", $mail="", $numTel="", $erreur=0)
{
    formulaire([]);
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
    $organisation=$_POST['organisation'];
    $organisationId=Connexion::queryFirst("SELECT id FROM organisation where libelle='".$organisation."'");
    
    //vérification si aucune zone de texte est restée vide pour envoi à la BDD.
    if ($nom !="" and $prenom!="" and $adresse!="" and $codePostal!="" and $ville!="" and $mail!="" and $numTel!="") 
    {
        $query='INSERT INTO client (nom, prenom, adresse, codePostal, ville, entreprise_id, mail, numTelephone)'
            . "VALUES ('".$nom."', '".$prenom."', '".$adresse."', '".$codePostal."', '".$ville."','.$organisationId[id].', '".$mail."', '".$numTel."')";
        Connexion::exec($query);
        include(ROOT.'AdminLTE/alerte.php');
    }
    //Si une zone de texte est restée vide, on recharge le formulaire avec les valeurs précédentes.
    else    
    {
        $tableAjout=[$nom,$prenom,$adresse,$codePostal,$ville,$mail,$numTel,$organisation];
        
        formulaire($tableAjout, true);
    }
}
 