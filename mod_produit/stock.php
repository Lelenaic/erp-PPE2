<<<<<<< HEAD
<?php

function listeStock_route(){
    include(ROOT.'AdminLTE/listeStock.php');    
}
function liste(){
    echo ' ';
}

function formAjouterStock_route(){
    include(ROOT.'AdminLTE/ajouterStock.php');
}
function ajout(){
    echo '';
}

=======
<?php 

function index_route(){
$requete=Connexion::table('SELECT *
                         FROM stock');


var_dump ($requete);
}



?>
>>>>>>> 525f7be3c5379c120b346c70a3c97ef9376d1f96
