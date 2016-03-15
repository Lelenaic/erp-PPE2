<?php
require('fpdf181/fpdf.php');
include ('fonctionsBonDeLivraison.php');


class PDF extends FPDF
{
	// Chargement des données
	function LoadData($file)
	{
		// Lecture des lignes du fichier
		$lines = file($file);
		$data = array();
		foreach($lines as $line)
			$data[] = explode(';',trim($line));
		return $data;
	}

	// Tableau simple
	function BasicTable($header, $data)
	{
		// En-tête
		//foreach($header as $col)
			$this->Cell(83,9,$header[0],1);
			$this->Cell(35,9,$header[1],1);
			$this->Cell(26,9,$header[2],1);
			$this->Cell(20,9,$header[3],1);
			$this->Cell(26,9,$header[4],1);
			$this->Ln();
		// Données
		$this->SetFont('Arial','',10);
		foreach($data as $row)
		{
			//foreach($row as $col)
				$this->Cell(83,8,$row['libelle'],1);
				$this->Cell(35,8,$row['reference'],1);
				$this->Cell(26,8,$row['montant'],1);
				$this->Cell(20,8,$row['quantite'],1);
				$this->Cell(26,8,$row['montant']*$row['quantite'],1);
			$this->Ln();
		}
	}
	
	
}




$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$pdf->Cell(0,10,'BON DE LIVRAISON','TBRL',1,'C');
$pdf->Cell(0,5,'','',1,'R');

$infoEntrepriseFournisseur=bonDeLivraisonEntrepriseFournisseur(2);
//var_dump($infoEntrepriseFournisseur);

$pdf->Cell(0,10,$infoEntrepriseFournisseur[0]['nom'],'',1);			//"Entreprise fournisseur" deviendra '$infoEntrepriseFournisseur[0][0]'
$pdf->Cell(0,0,$infoEntrepriseFournisseur[0]['adresse'],'',1);							//"Adresse" deviendra '$infoEntrepriseFournisseur[0][2]'
$pdf->Cell(0,10,$infoEntrepriseFournisseur[0]['ville'].' '.$infoEntrepriseFournisseur[0]['codePostal'],'',1);			//"Adresse" deviendra '$infoEntrepriseFournisseur[0][3].' '.$infoEntrepriseFournisseur[0][1]'
$pdf->Cell(0,0,$infoEntrepriseFournisseur[0]['tel'],'',1);					//"Adresse" deviendra '$infoEntrepriseFournisseur[0][4]'

$infoEntrepriseCliente=bonDeLivraisonEntrepriseCliente(2);
$pdf->Cell(0,10,'','',1,'R');

$pdf->Cell(0,10,$infoEntrepriseCliente[0]['libelle'],0,1,'R');			//"Entreprise fournisseur" deviendra '$infoEntrepriseCliente[0][0]'
$pdf->Cell(0,0,$infoEntrepriseCliente[0]['adresse'],'',1,'R');					//"Adresse" deviendra '$infoEntrepriseCliente[0][2]'
$pdf->Cell(0,10,$infoEntrepriseCliente[0]['ville'].' '.$infoEntrepriseCliente[0]['codePostal'],'',1,'R');		//"Adresse" deviendra '$infoEntrepriseCliente[0][3].' '.$infoEntrepriseCliente[0][1]'
$pdf->Cell(0,0,$infoEntrepriseCliente[0]['numero'],'',1,'R');				//"Adresse" deviendra '$infoEntrepriseCliente[0][4]'
$pdf->Cell(0,15,'','',1,'R');

$pdf->Cell(0,10,'PRODUITS A LIVRER','TB',1,'C');
$pdf->Cell(0,5,'','',1,'R');
$header = array('Article', 'Reference Produit','Prix Uni. HT','Quantite','Prix Total HT');
$data = bonDeLivraisonProduit(1);
$pdf->SetFont('Arial','',11);
$pdf->BasicTable($header,$data);

$pdf->Output();






?>
