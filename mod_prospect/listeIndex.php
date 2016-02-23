<?php

<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 2cc1c75ed2eae015a23e18e6c64adf32cba3270b
function index_route(){
   $prospect=Connexion::table("SELECT id,nom,prenom,adresse,codePostal,ville,mail,numTelephone FROM `prospect`");
    include(ROOT.'AdminLTE/prospect/liste.php');
}
<<<<<<< HEAD
=======

function index_route(){
   $prospect=Connexion::table("SELECT id,nom,prenom,adresse,codePostal,ville,mail,numTelephone FROM `prospect`");
    include(ROOT.'AdminLTE/prospect/liste.php');
}
>>>>>>> Equipe1
=======
>>>>>>> 2cc1c75ed2eae015a23e18e6c64adf32cba3270b
