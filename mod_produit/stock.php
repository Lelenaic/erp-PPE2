
<?php 
function ajouterStock_route(){
    ajouterStock();
}

function ajouterStock(){
    $form=new FormBootstrap();
    
    $form->addHidden('route','produit_ajouter_route');
    $form->addText('quantite', array(), 'Quantité');
    
    $produit=Connexion::table('select libelleProduit from produit');
    $list=array();
    foreach ($produit as $ut){
        $list[]=$ut['libelleProduit'];
    }
    $form->addSelect('libelleProduit', $list, array(), 'Type');
    $entreprise=  Connexion::table('select libelle from organisation');
    $list2=array();
    foreach ($entreprise as $ut){
        $list2[]=$ut['libelle'];
    }
    $form->addSelect('organisation', $list2, array(), 'Organisation');
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');

}
function _route()
{
    include(ROOT.'mod_produit/alerteAjoutStock.php');
}
