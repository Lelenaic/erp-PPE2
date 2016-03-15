<?php

function formDevis_route(){
    $form=new FormBootstrap();
    $form->addHidden('route','gc_gestionComptable_formDevis');
    $form->addText('nomSociete', array(), 'Nom de la société');
    $form->addText('client', array(), 'Nom du client');
    $form->addText('date', array(), 'Date');
    $form->addText('produit', array(), 'Nom du produit');
    $form->addText('quantite', array(), 'Quantité');
    $form->addText('prix', array(), 'Prix');
    $utilisateurtype=  Connexion::table('select * from utilisateurtype order by label');
    $list=array();
    foreach ($utilisateurtype as $ut){
        $list[$ut['id']]=$ut['label'];
    }
    $form->addSelect('utilisateurtype_id', $list, array(), 'Type');
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');    
    
    

}

/*
Fonction pour appelé dans la base de données les informations pour la liste des factures et pour l'archive.
*/ 


function listeFacture_route(){
    $utilisateurs=Connexion::table('select login,utilisateurtype_id from utilisateur order by login');
    include(ROOT.'mod_gc/listeFacture.php');
}
function listeArchive_route(){
    $archives=Connexion::table('select * from archiveDevis');
    include(ROOT.'mod_gc/listeArchive.php');
}
