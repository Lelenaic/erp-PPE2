<?php

function formDevis_route(){
    $form=new FormBootstrap();
    $form->addHidden('route','gc_gestionComptable_ajouter');
    $list=array();
    $list1=array();
    $list2=array();
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
    $produit=  Connexion::table('select * from produit');
    foreach ($produit as $ut){
        $list2[$ut['id']]=$ut['libelle'];
    }
    $form->addSelect('produit_id', $list2, array(), 'Nom du produit');
    $validation=  Connexion::table('select * from validation');
    foreach ($validation as $ut){
        $list3[$ut['id']]=$ut['libelle'];
    }
    $form->addSelect('validation_id', $list3, array(), 'Validation');
    $form->addText('quantite', array(), 'Quantité');
    $form->addText('prix', array(), 'Prix');
//ajouter route
    
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');    
    
    

}

/*
Fonction pour appelé dans la base de données les informations pour la liste des factures et pour l'archive.
*/ 




function ajouter_route(){
    include(ROOT.'mod_gc/alerteDevis.php');
}
function listeFacture_route(){
    $utilisateurs=Connexion::table('select login,utilisateurtype_id from utilisateur order by login');
    include(ROOT.'mod_gc/listeFacture.php');
}
function listeArchive_route(){
    $archives=Connexion::table('select * from archiveDevis');
    $archives=Connexion::table('select id, date from archives');
    include(ROOT.'mod_gc/listeArchive.php');
}
function infosClient_route(){
	$infosClient=Connexion::table('select nomClient, prenomClient, adresse, codePostal, ville, organisation_id, mail, numTelephone
							       from client');
	include(ROOT.'mod_gc/infosClient.php');
}			
function infosEmploye_route(){
	$infosEmploye=Connexion::table('select nomEmploye, prenomEmploye, dateNaissance, mail, numero, adresse, codePostal, ville, securiteSociale
									from employe');
	include(ROOT.'mod_gc/infosEmploye.php');	
}
function bonDeCommande_route(){
	include(ROOT.'mod_gc/BonDeCommandePDF.php');	
}
