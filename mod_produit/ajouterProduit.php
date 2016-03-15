<?php

function index_route(){
    $form = new FormBootstrap('Produit');
    $form->addHidden('route', 'produit_ajouter_route');
    $form->addText('libelleProduit',array(), 'Nom du produit');
    $form->addText('reference',array(), 'Référence du produit');
    $form->addText('nom',array(), "Nom du fournisseur");
    $form->addText('poids',array(),'Poids du produit');
    $form->addText('montant',array(),'Montant du produit');
    include(ROOT.'AdminLTE/form.php');
}

function route_route()
{
    include(ROOT.'mod_produit/alerteAjoutProduit.php');
}
