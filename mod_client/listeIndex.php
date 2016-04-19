<?php

function index_route()
{
    $idEntreprise =  $_SESSION['utilisateur']['entreprise_id'];
    if ($idEntreprise == NULL)
    {
        $requete = 'SELECT client.id,nom,prenom,client.adresse,client.codePostal,client.ville,client.mail,client.numTelephone,organisation.libelle 
                FROM `client`, organisation 
                WHERE client.entreprise_id=organisation.id 
                ORDER BY nom';
    }
    else
    {
        $requete = 'SELECT client.id,nom,prenom,client.adresse,client.codePostal,client.ville,client.mail,client.numTelephone,organisation.libelle 
                FROM `client`, organisation 
                WHERE client.entreprise_id=organisation.id 
                AND client.entreprise_id='.$idEntreprise
             .' ORDER BY nom';
    }
    $client = Connexion::table($requete);
    include(ROOT.'AdminLTE/client/liste.php');
}

function validModif_route()
{
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

function passageClient_route()
{
    $id = $_GET['id'];
    $client = Connexion::table('SELECT nom, prenom, adresse, codePostal, ville, entreprise_id, mail, numTelephone
                     FROM prospect
                     WHERE id='.$id);
    Connexion::exec('INSERT INTO client(nom, prenom, adresse, codePostal, ville, entreprise_id, mail, numTelephone)
                     VALUES("'.$client[0]['nom'].'","'.$client[0]['prenom'].'","'.$client[0]['adresse'].'","'.$client[0]['codePostal'].'","'.$client[0]['ville'].'",'.$client[0]['entreprise_id'].',"'.$client[0]['mail'].'",'.$client[0]['numTelephone'].')');
    Connexion::exec("DELETE FROM prospect WHERE id=$id");
    index_route();
}
