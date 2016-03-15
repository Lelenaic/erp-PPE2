<?php 

function index_route(){
    $form = new FormBootstrap('Produit');
    $form->addHidden('route', 'produit_ajout_valid');
    $form->addText('nomProduit',array(), 'Nom du produit');
    $form->addText('quantite',array(), 'Qauntité');
    $form->addText('nomEntreprise',array(), "Nom de l'entreprise");
    
     include(ROOT.'AdminLTE/form.php');
}

function _route()
{
    $nomProduit=$_POST['nomProduit'];
    $quantite=$_POST['quantite'];
    $nomEntreprise=$_POST['entreprise'];
    $produit_id="SELECT id FROM produit WHERE libelleProduit=".$nomProduit."";
    $entreprise_id= "SELECT id FROM organisation WHERE libelle=".$nomEntreprise."";
    $query='INSERT INTO stock (produit_id, quantite, entreprise_id)'
            . "VALUES ('".$produit_id."', '".$quantite."', '".$entreprise_id."'')";
    Connexion::exec($query);
    include(ROOT.'AdminLTE/alerte.php');
}