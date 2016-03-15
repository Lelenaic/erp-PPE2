<?php

$employe=$_POST['employe_id'];
$client=$_POST['client_id'];
$date=$_POST['date'];
$prix=$_POST['prix']; 
$validation=$_POST['validation_id'];
$query1='INSERT INTO devis (id,employe_id, client_id, date, prix, validation_id) VALUES (NULL,"'.$employe.'", "'.$client.'", "'.$date.'", "'.$prix.'","'.$validation.'")';
Connexion::exec($query1);

function formDevisProduit_route(){
	$form=new FormBootstrap();
	$form->addHidden('route','gc_gestionComptable_ajouterProduit');   
	$list2=array();
	$produit=  Connexion::table('select * from produit');
	foreach ($produit as $ut){
		$list2[$ut['id']]=$ut['libelle'];
	}
	$form->addSelect('produit_id', $list2, array(), 'Nom du produit');
	$form->addText('quantite', array(), 'Quantité');
	// Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
	 include(ROOT.'AdminLTE/form.php');  
}
echo formDevisProduit_route();
//ajouter route
