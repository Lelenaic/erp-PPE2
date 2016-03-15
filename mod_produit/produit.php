
<?php 
function ajouterProduit_route(){
    ajouterProduit();
}

function ajouterProduit(){
    $form=new FormBootstrap();
    
    $form->addHidden('route','produit_ajouterProduit_route');
    $form->addText('libelleProduit', array(), 'Nom du produit');
    $form->addText('reference', array(), 'Référence du produit');
    
    
    $fournisseur=  Connexion::table('select nom from fournisseur');
    $list=array();
    foreach ($fournisseur as $ut){
        $list[]=$ut['nom'];
    }
    $form->addSelect('nom', $list, array(), 'Nom du fournisseur');
    
    
    $form->addText('poids', array(), 'Poids du produit');
    $form->addText('montant', array(), 'Montant du produit');
    // Insert le fichier de gestion des formulaires défini dans le modèle Boostrap
    include(ROOT.'AdminLTE/form.php');

}
function _route()
{
    include(ROOT.'mod_produit/alerteAjoutProduit.php');
}