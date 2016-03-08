<?php 


function stock_route()
{
    $stock=Connexion::table('SELECT libelleProduit,quantite,organisation.libelle
                            FROM stock,produit,organisation 
                            WHERE stock.produit_id=produit.id 
                            AND stock.organisation_id=organisation.id');
    include(ROOT.'AdminLTE/kernel/stock/liste.php');
}
function produit_route()
{
    $produits=Connexion::table('SELECT libelleProduit,reference,fournisseur.nom,poids
                            FROM produit, fournisseur
                            WHERE fournisseur.id=produit.fournisseur_id');
    include(ROOT.'AdminLTE/kernel/produit/liste.php');
}
