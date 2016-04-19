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
    echo 'On est en train de travailler dessus ! Cela arrive bientôt.';
}
