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
    
    
/*
   if(isset($_POST['bouton_pdf']))
	{
	require('fpdf.php');

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial');
	$pdf->Cell(40,10,'IDENTIFICATION DU CHANTIER : ');
	$pdf->Cell(100,10,$_POST['num_chantier']);
	$pdf->Ln();
	$pdf->Cell(40,10,'Nom du chantier : ');
	$pdf->Cell(100,10,$_POST['nom_chantier']);
	$pdf->Ln();




	$pdf->Output();
	}
	else
	{
	?>

	<form action="#ok" method="post">

	<input type="submit" name="bouton_pdf">
	</form> */
}

//<?

function listeFacture_route(){
    $utilisateurs=Connexion::table('select login,utilisateurtype_id from utilisateur order by login');
    include(ROOT.'mod_gc/listeFacture.php');
}
function listeArchive_route(){
    $utilisateurs=Connexion::table('select login,utilisateurtype_id from utilisateur order by login');
    include(ROOT.'mod_gc/listeArchive.php');
}
