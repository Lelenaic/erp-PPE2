<?php

function index_route(){
   $client=Connexion::table("SELECT id,nom,prenom,adresse,codePostal,ville,mail,numTelephone FROM `client`");
    include(ROOT.'AdminLTE/client/liste.php');
}
