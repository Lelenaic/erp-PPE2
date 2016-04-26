<?php

function index_route(){
   $client=Connexion::table("SELECT client.id,nom,prenom,client.adresse,client.codePostal,client.ville,client.mail,client.numTelephone,organisation.libelle FROM `client`, organisation Where client.entreprise_id=organisation.id order by nom ");
    include(ROOT.'AdminLTE/client/liste.php');
}

function validModif_route(){
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $adresse=$_POST['adresse'];
    $codePostal=$_POST['codePostal'];
    $ville=$_POST['ville'];
    $mail=$_POST['mail'];
    $numTel=$_POST['numTel'];
    
    $query='UPDATE client '
            . "SET nom ='".$nom."', prenom ='".$prenom."', adresse = '".$adresse."', codePostal ='".$codePostal."', ville = '".$ville."', mail ='".$mail."', numTelephone ='".$numTel."' where id = ".$id."";
    Connexion::exec($query);
    index_route();
}

function deleteClient_route()
{ 
    $id = $_GET['id'];
    Connexion::exec("DELETE FROM client WHERE id=$id");
    index_route();
}
