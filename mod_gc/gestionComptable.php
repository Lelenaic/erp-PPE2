<?php
//fonction qui fait le formulaire d'un devis
function formDevis_route(){
    //Initialisation de l'objet (formulaire)
    $form=new FormBootstrap();
    $form->addHidden('route','gc_gestionComptable_ajouter');
    //Création des array pour faire des listes déroulantes plus tard
    $list=array();
    $list1=array();
    $list3=array();
    //Première liste déroulante (nom des employés)
    //Récupération des employés dans la BDD
    $employe=  Connexion::table('select * from employe');
    foreach ($employe as $ut){
        $list0[$ut['id']]=$ut['nomEmploye'];
    }
    $form->addSelect('employe_id', $list0, array(), 'Nom de l\'employé');
    //Deuxième liste déroulante (nom des clients)
    //Récupération des clients dans la BDD
    $client=  Connexion::table('select * from client');
    foreach ($client as $ut){
        $list1[$ut['id']]=$ut['nomClient'];
    }
    $form->addSelect('client_id', $list1, array(), 'Nom du Client');    
    //Champ de saisie pour ajouter la date
    $form->addText('date', array(), 'Date');
    //Troisième liste déroulante (liste de l'état du devis)
    //Récupération des différents états possible dans la BDD
    $validation=  Connexion::table('select * from validation');
	foreach ($validation as $ut){
		$list3[$ut['id']]=$ut['libelle'];
	}
	$form->addSelect('validation_id', $list3, array(), 'Validation');
    //Champ de saisie pour ajouter le prix
    $form->addText('prixTotal', array(), 'Prix');
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');    
}

//fonction qui fait le formulaire d'un ajout d'un produit dans un devis
function formDevisProduit_route(){
    //Initialisation de l'objet (formulaire)
    $form=new FormBootstrap();
    $form->addHidden('route','gc_gestionComptable_ajouterProduit');
    //Création des array pour faire des listes déroulantes plus tard
    $list0=array();
    $list1=array();
    $list2=array();
    //Première liste déroulante (nom des produits)
    //Récupération des produits dans la BDD
    $produit=  Connexion::table('select * from produit');
    foreach ($produit as $ut){
        $list0[$ut['id']]=$ut['libelle'];
    }
    $form->addSelect('produit_id', $list0, array(), 'Libellé du produit');
    //Champ de saisie pour ajouter la quantité
    $form->addText('quantite', array(), 'Quantité');
    //Deuxième liste déroulante (numéro des devis)
    //Récupération des devis dans la BDD
    /*$devisId=  Connexion::table('select * from devis');
    foreach ($devisId as $ut){
        $list1[$ut['id']]=$ut['id'];
    }
    $form->addSelect('devis_id', $list1, array(), 'Numéro du devis'); */
    $form->addHidden('devis_id',$_GET['idDevis']);
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');    
}
function formValidation_route(){
    //Initialisation de l'objet (formulaire)
    $form=new FormBootstrap();
    $form->addHidden('route','gc_gestionComptable_changerValidation');
    //Création des array pour faire des listes déroulantes plus tard
    $list0=array();
    //Première liste déroulante (nom des produits)
    //Récupération des produits dans la BDD
    $produit=  Connexion::table('select * from validation');
    foreach ($produit as $ut){
        $list0[$ut['id']]=$ut['libelle'];
    }
    $form->addSelect('validation_id', $list0, array(), 'Etat du devis');
    //Champ de saisie pour ajouter la quantité
    $form->addHidden('devis_id',$_GET['id']);
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');    
}
function changerValidation_route(){
	$idDevis=$_POST['devis_id'];
	$validation=$_POST['validation_id'];
	$validationId=Connexion::queryfirst("select * from validation where libelle='".$validation."'");
	$validationId=intval($validationId);
	//Mise à jour du prix total du devis dans la BDD
	$requete='UPDATE devis SET validation_id='.$validationId.' WHERE id='.$idDevis.'';
	Connexion::exec($requete);
	header('location: ?route=gc_gestionComptable_devisProduit&id='.$idDevis.'');
}
//fonction qui renvoit vers la liste des devis
function devis_route(){
	$devis=Connexion::table("SELECT * FROM `devis` ORDER BY id");
	include(ROOT.'mod_gc/listeDevis.php');
}

//fonction qui renvoit vers la fiche d'un devis
function devisProduit_route(){
	$id=$_GET['id'];
	$devis=Connexion::table("SELECT * FROM `devis` where id=".$id."");
	$ligneDevis=Connexion::table("SELECT * FROM `ligneDevis` WHERE devis_id=".$id."");
	include(ROOT.'mod_gc/ficheDevis.php');
}

//fonction qui ajoute un devis
function ajouter_route(){
	$devis=Connexion::table("SELECT * FROM `devis`");
	$employe=Connexion::queryfirst("select id from employe where nomEmploye='".$_POST['employe_id']."'");
	$client=Connexion::queryfirst("select id from client where nomClient='".$_POST['client_id']."'");
	$date=$_POST['date'];
	$prix=$_POST['prixTotal']; 
	$validation=Connexion::queryfirst("select id from validation where libelle='".$_POST['validation_id']."'");
	$query1='INSERT INTO devis (id,employe_id, client_id, date, prixTotal, validation_id) VALUES (NULL,"'.$employe['id'].'", "'.$client['id'].'", "'.$date.'", "'.$prix.'","'.$validation['id'].'")';
	Connexion::exec($query1);
	header('location: ?route=gc_gestionComptable_devis');
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

//fonction qui ajoute le produit dans le devis
function ajouterProduit_route(){
	//Récupération d'occurences dans la BDD
	$produit=Connexion::queryfirst("select id from produit where libelle='".$_POST['produit_id']."'");
	$montantProd=Connexion::queryfirst("select montant from produit where libelle='".$_POST['produit_id']."'");
	$idDevis=$_POST['devis_id'];
	$prixTotal=Connexion::queryfirst("select prixTotal from devis where id=".$idDevis."");
	$devis=Connexion::table("SELECT * FROM `devis` where id=".$idDevis."");
	$ligneDevis=Connexion::table("SELECT * FROM `ligneDevis` WHERE devis_id=".$idDevis."");
	$quantite=$_POST['quantite'];
	//Insertion d'une nouvelle ligne d'un devis dans la BDD
	$query2='INSERT INTO ligneDevis (id,produit_id, quantite, devis_id) VALUES (NULL,"'.$produit['id'].'", "'.$quantite.'","'.$idDevis.'")';
	Connexion::exec($query2);
	//Changement de type
	$prixTotal=floatval($prixTotal['prixTotal']);
	$quantiteInt=intval($quantite);
	$montantProdFloat=floatval($montantProd['montant']);
	//Calcul du prix total lorsque l'on ajoute un produit au devis (grâce au prix du produit et la quantité).
	$prixTotal+=$montantProdFloat*$quantiteInt;
	$requete='SELECT MAX(id) AS "id" from ligneDevis';
	//Mise à jour du prix total du devis dans la BDD
	$requete='UPDATE devis SET prixTotal='.$prixTotal.' WHERE id='.$idDevis.'';
	Connexion::exec($requete);
	header('location: ?route=gc_gestionComptable_devisProduit&id='.$idDevis.'');
}

//fonction qui supprime le produit du devis
function SupprimerProduit_route(){
	$idDevis=$_GET['idDevis'];
	$id=$_GET['id'];
	//Récupération de données dans la BDD
	$devis=Connexion::queryfirst("SELECT * FROM `devis` where id=".$idDevis."");
	$ligneDevis=Connexion::queryfirst("SELECT * FROM `ligneDevis` WHERE devis_id=".$idDevis."");
	$produit=Connexion::queryfirst("select * from produit where id='".$ligneDevis['produit_id']."'");
	//Changement de type
	$montant=floatval($produit['montant']);
	$quantite=floatval($ligneDevis['quantite']);
	$prixTotal=floatval($devis['prixTotal']);
	//Calcul du prix total lorsque l'on supprime des produits du devis
	$prixTotal-=$montant*$quantite;
	//Mise à jour du prix total du devis dans la BDD
	$requete='UPDATE devis SET prixTotal='.$prixTotal.' WHERE id='.$idDevis.'';
	Connexion::exec($requete);
	//Suppression d'un produit dans une ligne d'un devis (dans la BDD)
	$suppression=Connexion::exec("DELETE FROM ligneDevis WHERE id=".$id."");
	header('location: ?route=gc_gestionComptable_devisProduit&id='.$idDevis.'');
}
function SupprimerDevis_route(){
	$id=$_GET['id'];
	//Récupération de données dans la BDD
	$devis=Connexion::queryfirst("SELECT * FROM `devis` where id=".$id."");
	//Suppression d'un produit dans une ligne d'un devis (dans la BDD)
	$suppression=Connexion::exec("DELETE FROM ligneDevis WHERE devis_id=".$id."");
	$suppression2=Connexion::exec("DELETE FROM devis WHERE id=".$id."");
	header('location: ?route=gc_gestionComptable_devis');
}
function pdfDevis_route(){
	$id=$_GET['idDevis'];
	header('location: mod_glt/DevisPDF.php?idDevis='.$id.'');
}
function bonCommande_route(){
	$id=$_GET['idDevis'];
	header('location: mod_glt/bonCommandePDF.php?idDevis='.$id.'');
}
