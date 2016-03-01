<?php
<<<<<<< HEAD

function index_route(){
   $prospect=Connexion::table("SELECT id,nom,prenom,adresse,codePostal,ville,mail,numTelephone FROM `prospect`");
    include(ROOT.'AdminLTE/prospect/liste.php');
}
=======
function index_route(){
   $prospect=Connexion::table("SELECT id,nom,prenom,adresse,codePostal,ville,mail,numTelephone FROM `prospect`");
    include(ROOT.'AdminLTE/prospect/liste.php');
}
function index_route(){
   $prospect=Connexion::table("SELECT id,nom,prenom,adresse,codePostal,ville,mail,numTelephone FROM `prospect`");
    include(ROOT.'AdminLTE/prospect/liste.php');
}
>>>>>>> origin/Equipe2_V5
