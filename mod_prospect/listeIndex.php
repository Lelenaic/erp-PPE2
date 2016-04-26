<?php

function index_route()
{
    $idEntreprise =  $_SESSION['utilisateur']['entreprise_id'];
    if ($idEntreprise == NULL)
    {
        $requete = 'SELECT prospect.id,prospect.nom,prospect.prenom,prospect.adresse,prospect.codePostal,prospect.ville,prospect.mail,prospect.numTelephone,organisation.libelle 
                    FROM `prospect`, organisation 
                    WHERE prospect.entreprise_id=organisation.id 
                    ORDER BY nom';
    }
    else
    {
        $requete = 'SELECT prospect.id,prospect.nom,prospect.prenom,prospect.adresse,prospect.codePostal,prospect.ville,prospect.mail,prospect.numTelephone,organisation.libelle 
                    FROM `prospect`, organisation 
                    WHERE prospect.entreprise_id=organisation.id 
                    AND prospect.entreprise_id='.$idEntreprise
                 .' ORDER BY nom';
    }
   $prospect=Connexion::table($requete);
function index_route(){
   $prospect=Connexion::table("SELECT prospect.id,nom,prenom,prospect.adresse,prospect.codePostal,prospect.ville,prospect.mail,prospect.numTelephone,organisation.libelle FROM `prospect`, organisation Where prospect.entreprise_id=organisation.id order by nom");
    include(ROOT.'AdminLTE/prospect/liste.php');
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
    
    $query='UPDATE prospect '
            . "SET nom ='".$nom."', prenom ='".$prenom."', adresse = '".$adresse."', codePostal ='".$codePostal."', ville = '".$ville."', mail ='".$mail."', numTelephone ='".$numTel."' where id = ".$id."";
    Connexion::exec($query);
    index_route();
}


function deleteProspect_route()
{ 
    $id = $_GET['id'];
    Connexion::exec("DELETE FROM prospect WHERE id=$id");
    index_route();
}

