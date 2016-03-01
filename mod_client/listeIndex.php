<?php
function index_route(){
   $client=Connexion::table("SELECT id,nom,prenom,adresse,codePostal,ville,mail,numTelephone FROM `client`");
    include(ROOT.'AdminLTE/client/liste.php');
}
<<<<<<< HEAD
<<<<<<< HEAD
=======


=======
>>>>>>> 2cc1c75ed2eae015a23e18e6c64adf32cba3270b
function deleteClient_route()
{
    
    $id = $_GET['id'];
    Connexion::exec("DELETE FROM client WHERE id=$id");
    index_route();
<<<<<<< HEAD

}
>>>>>>> Equipe1
=======
}
>>>>>>> 2cc1c75ed2eae015a23e18e6c64adf32cba3270b
