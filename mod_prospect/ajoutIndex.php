

<?php
function index_route()
{

    $form = new FormBootstrap('Prospect');
    $form->addHidden('route', 'prospect_ajoutIndex_valid');
    $form->addText('nom',array(), 'Nom');
    $form->addText('prenom',array(), 'Prénom');
    $form->addText('adresse',array(), 'Adresse');
    $form->addText('codePostal',array(), 'Code Postal');
    $form->addText('ville',array(), 'Ville');
    $form->addEmail('mail', array(),'Adresse Mail');
    $form->addNumeric('numTel',array(),'Numéro de Téléphone');
    
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
    $query='INSERT INTO prospect (nom, prenom, adresse, codePostal, ville, mail, numtelephone)'
            . "VALUES ('".$nom."', '".$prenom."', '".$adresse."', '".$codePostal."', '".$ville."', '".$mail."', '".$numTel."')";
    Connexion::exec($query);
    include(ROOT.'AdminLTE/alerte.php');
    
}


function valid_route(){


    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $adresse=$_POST['adresse'];
    $codePostal=$_POST['codePostal'];
    $ville=$_POST['ville'];
    $mail=$_POST['mail'];
    $numTel=$_POST['numTel'];
    $query='INSERT INTO prospect (nom, prenom, adresse, codePostal, ville, mail, numtelephone)'
            . "VALUES ('".$nom."', '".$prenom."', '".$adresse."', '".$codePostal."', '".$ville."', '".$mail."', '".$numTel."')";
    Connexion::exec($query);
    include(ROOT.'AdminLTE/alerte.php');

    
}


