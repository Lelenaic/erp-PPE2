<?php

function index_route(){
    $form = new FormBootstrap('Produit');
    $form->addHidden('route', 'produit_ajouter_route');
    $form->addText('nomProduit',array(), 'Nom du produit');
    $form->addText('libelleProduit',array(), 'Quantité');
    $form->addText('organisation_id',array(), "Nom de l'entreprise");
     include(ROOT.'AdminLTE/form.php');
}

function route_route()
{
    include(ROOT.'mod_produit/alerteAjoutStock.php');
}
