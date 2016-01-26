<?php 

function index_route(){
$requete=Connexion::table('SELECT *
                         FROM stock');


var_dump ($requete);
}



?>