<<<<<<< HEAD
<?php
// Fichier d'arrivé par défaut pour s'identifier d'authentification
function index_route(){
    $form = new FormBootstrap('Client');
    $form->addHidden('route', 'client_ajoutIndex_valid');
=======

<<<<<<< HEAD
<<<<<<< HEAD
// Fichier d'arrivé par défaut pour s'identifier d'authentification
function index_route(){
=======

function index_route()
{

>>>>>>> Equipe1
=======
<?php
function index_route()
{
>>>>>>> 2cc1c75ed2eae015a23e18e6c64adf32cba3270b
    $form = new FormBootstrap('Prospect');
    $form->addHidden('route', 'prospect_ajoutIndex_valid');
>>>>>>> f1621beffffb40b83803491e1ae03902d87dcbbf
    $form->addText('nom',array(), 'Nom');
    $form->addText('prenom',array(), 'Prénom');
    $form->addText('adresse',array(), 'Adresse');
    $form->addText('codePostal',array(), 'Code Postal');
    $form->addText('ville',array(), 'Ville');
    $form->addEmail('mail', array(),'Adresse Mail');
    $form->addNumeric('numTel',array(),'Numéro de Téléphone');
    
     include(ROOT.'AdminLTE/form.php');
}
<<<<<<< HEAD
function valid_route(){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $adresse=$_POST['adresse'];
    $codePostal=$_POST['codePostal'];
    $ville=$_POST['ville'];
    $mail=$_POST['mail'];
    $numTel=$_POST['numTel'];
<<<<<<< HEAD
    
    if ($nom!="" and $prenom!="" and $adresse!="" and $codePostal!="" and $ville!="" and $mail!="" and $numTel!="")
        { 
        $query='INSERT INTO propect (nom, prenom, adresse, codePostal, ville, mail, numtelephone)'
            . "VALUES ('".$nom."', '".$prenom."', '".$adresse."', '".$codePostal."', '".$ville."', '".$mail."', '".$numTel."')";
        Connexion::exec($query);
        include(ROOT.'AdminLTE/alerte.php');
    }
    else
    {
        echo 'Vous n\'avez pas remplit tout les critéres.' ;
    }
    
    
    
     
}

=======
    $query='INSERT INTO prospect (nom, prenom, adresse, codePostal, ville, mail, numtelephone)'
            . "VALUES ('".$nom."', '".$prenom."', '".$adresse."', '".$codePostal."', '".$ville."', '".$mail."', '".$numTel."')";
    Connexion::exec($query);
    include(ROOT.'AdminLTE/alerte.php');
    
}
=======

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


>>>>>>> Equipe1
>>>>>>> f1621beffffb40b83803491e1ae03902d87dcbbf
