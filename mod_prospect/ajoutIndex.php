<?php

// Fichier d'arrivé par défaut pour s'identifier d'authentification
function index_route(){
    $form = new FormBootstrap('Prospect');
    $form->addHidden('route', 'prospect_ajoutIndex_valid');
    $form->addText('nom',array(), 'Nom');
    $form->addText('prenom',array(), 'Prénom');
    $form->addText('adresse',array(), 'Adresse');
    $form->addText('codePostal',array(), 'Code Postal');
    $form->addText('ville',array(), 'Ville');
    $form->addEmail('mail', array(),'Adresse Mail');
    $form->addNumeric('numTel',array(),'Numéro de Téléphone');
    
     include(ROOT.'AdminLTE/form.php');
}
function valid_route(){
    include(ROOT.'AdminLTE/alerte.php');
     
}
