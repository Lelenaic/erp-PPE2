<?php

function formDevis_route(){
    $form=new FormBootstrap();
    $form->addHidden('route','gc_gestionComptable_ajouter');
    $list=array();
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
    $form->addText('quantite', array(), 'Quantité');
    $form->addText('prix', array(), 'Prix');
    
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');    
}
//ajouter route
/*function ajouter_route(){
    $employe=$_POST['employe_id'];
    $client=$_POST['client_id'];
    $date=$_POST['date'];
    $nomProduit=$_POST['produit_id'];
    $quantite=$_POST['quantite'];
    $prix=$_POST['prix']; 
    $query1='INSERT INTO devis (employe_id, client_id, date, prix)'
            . "VALUES ('".$employe."', '".$client."', '".$date."', '".$prix."')";
    Connexion::exec($query1);
    $query2='INSERT INTO ligneDevis (produit_id, quantite)'
            . "VALUES ('".$nomproduit."', '".$quantite."')";
    Connexion::exec($query2);
    include(ROOT.'AdminLTE/alerte.php');
}
*/
function listeFacture_route(){
    $utilisateurs=Connexion::table('select login,utilisateurtype_id from utilisateur order by login');
    include(ROOT.'mod_gc/listeFacture.php');
}
function listeArchive_route(){
    $archives=Connexion::table('select id, date from archives');
    include(ROOT.'mod_gc/listeArchive.php');
}
