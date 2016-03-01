<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

include('./include.php');


if (isset($_REQUEST['route'])) {    
    //définition de la route par $_GET ou $_POST ($_REQUEST équivaut à un des deux suivants la page d'où l'on vient)
    $route = $_REQUEST['route'];
}elseif(isset($_SESSION['utilisateur'])) {
    //route par défaut si connecté
    $route='kernel_utilisateur_index';    
}else{
    //route par defaut si non connecté
    $route = 'kernel_index_index';
}

// La route est définie par trois mots séparé d'un underscore. Elle est stockée dans la 
// base de données dans la table 'menu'. 
// Par exemple, sous le menu 'Gestion Utilisateurs' la route 'kernel_utilisateur_formAjouter' emmènera 
// 		- kernel 		-> C'est le répertoire du module concerné, ici celui de gestion du noyau de l'application : 'mod_kernel'
//		- utilisateur 	-> C'est le nom du fichier appeler, ici le fichier 'utilisateur.php' dans 'mod_kernel'
//		- formAjouter 	-> C'est la fonction appelée dans ce dossier, ici la fonction 'formAjouter_route(liste de parametres si existe)' dans le fichier 'utilisateur.php'
//

list($module, $fichier, $fonction) = explode('_', $route);

include('./mod_'.$module.'/'.$fichier.'.php');

if(!is_callable($fonction.'_route')){
    exit('<p>La fonction <b>\''.$fonction.'_route(...)\'</b> du fichier <b>\'./mod_'.$module.'/'.$fichier.'.php\'</b> n\'est pas définie</p>');
}
call_user_func($fonction.'_route');