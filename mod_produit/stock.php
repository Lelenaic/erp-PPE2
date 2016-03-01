<?php 

function formAjouterStock_route(){
    include(ROOT.'AdminLTE/ajouterStock.php');
}

function ajouterStock(){
    $form=new FormBootstrap();
    $form->addHidden('route','kernel_produit_ajouter');
    $form->addText('login', array(), 'Quantité');
    
    
    $produits=  Connexion::table('select libelle from produits');
    $list=array();
    foreach ($produits as $ut){
        $list[]=$ut['libelle'];
    }
    $form->addSelect('utilisateurtype_id', $list, array(), 'Type');
    
    $entreprises=  Connexion::table('select libelle from entreprises');
    $list=array();
    foreach ($entreprises as $ut){
        $list[]=$ut['libelle'];
    }
    $form->addSelect('utilisateurtype_id', $list, array(), 'Type');
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php'); 
}
