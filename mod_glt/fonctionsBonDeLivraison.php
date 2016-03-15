<?php

function bonDeLivraisonEntrepriseFournisseur($idEntreprise)
{
	$requeteEntrepriseFournisseur="SELECT nom,codePostal,adresse,ville,tel FROM fournisseur WHERE id='$idEntreprise'";
	$result = Connexion::table($requeteEntrepriseFournisseur);
    return $result;
}

function bonDeLivraisonEntrepriseCliente($idClient)
{
	$requeteEntrepriseCliente="SELECT organisation.codePostal,organisation.adresse,organisation.ville,organisation.numero,organisation.libelle 
								FROM client,organisation 
								WHERE client.entreprise_id=organisation.id 
								AND client.id='$idClient'";
	$result = Connexion::table($requeteEntrepriseCliente);
    return $result;
}

function bonDeLivraisonProduit($idDevis)
{
	$requeteProduit="SELECT produit.libelle,produit.reference,ligneDevis.quantite,produit.montant
					FROM devis,ligneDevis,produit
					WHERE produit.id=ligneDevis.produit_id
					AND ligneDevis.devis_id=devis.id
					AND devis.id='$idDevis'";
	$result = Connexion::table($requeteProduit);
	return $result;
}
