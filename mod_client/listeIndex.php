<?php
function index_route(){
   $client=Connexion::table("SELECT id,nom,prenom,adresse,codePostal,ville,mail,numTelephone FROM `client`");
    include(ROOT.'AdminLTE/client/liste.php');
}
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> origin/Equipe2_V5
=======

>>>>>>> origin/Equipe6_V5
=======

>>>>>>> origin/Equipe7_V5
function deleteClient_route()
{ 
    $id = $_GET['id'];
    Connexion::exec("DELETE FROM client WHERE id=$id");
    index_route();
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> origin/Equipe2_V5
=======
}
>>>>>>> origin/Equipe6_V5
=======
}
>>>>>>> origin/Equipe7_V5
