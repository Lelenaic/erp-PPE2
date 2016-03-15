<?php

function formDevis_route(){
    $form=new FormBootstrap();
    $form->addHidden('route','gc_gestionComptable_ajouter');
    $list=array();
    $list1=array();
    $list3=array();
    $employe=  Connexion::table('select * from employe');
    foreach ($employe as $ut){
        $list0[$ut['id']]=$ut['nom'];
    }
    $form->addSelect('employe_id', $list0, array(), 'Nom de l\'employé');
    $client=  Connexion::table('select * from client');
    foreach ($client as $ut){
        $list1[$ut['id']]=$ut['nom'];
    }
    $form->addSelect('client_id', $list1, array(), 'Nom du Client');    
    $form->addText('date', array(), 'Date');
    $validation=  Connexion::table('select * from validation');
	foreach ($validation as $ut){
		$list3[$ut['id']]=$ut['libelle'];
	}
	$form->addSelect('validation_id', $list3, array(), 'Validation');
    $form->addText('prix', array(), 'Prix');
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');    
}
//ajouter route
function ajouter_route(){
	include(ROOT.'mod_gc/devisProduit.php');
}
function listeFacture_route(){
	if (isset($_GET['clientId']))
	{
		$query='select login,utilisateurtype_id from utilisateur order by login';
	}else{
		$query='select login,utilisateurtype_id from utilisateur order by login';
	}
	
    $utilisateurs=Connexion::table($query);
    include(ROOT.'mod_gc/listeFacture.php');
}
function infosEmploye_route(){
    $Employe=Connexion::table('select nomEmploye, prenomEmploye, dateNaissance, numero, mail, ville, codePostal, adresse from employe');
    include(ROOT.'mod_gc/infosEmploye.php');
}
//fonction pour faire l’archives 
function listeArchive_route(){
    $archives=Connexion::table('select * from archiveDevis');
    $archives=Connexion::table('select id, date from archives');
    include(ROOT.'mod_gc/listeArchive.php');
}

function ajouterProduit_route(){
	include(ROOT.'mod_gc/alerteDevis.php');
}
