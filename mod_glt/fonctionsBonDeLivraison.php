<?php

function bonDeLivraisonEntrepriseFournisseur($idEntreprise)
{
	$requeteEntrepriseFournisseur="SELECT nom,codePostal,adresse,ville,tel FROM fournisseur WHERE id='$idEntreprise'";
	$result = Connexion::table($requeteEntrepriseFournisseur);
    return $result;
}

function bonDeLivraisonEntrepriseCliente($idClient)
{
	$requeteEntrepriseCliente="SELECT nom,codePostal,adresse,ville,tel FROM fournisseur WHERE id='$idClient'";
	$result = Connexion::table($requeteEntrepriseCliente);
    return $result;
}
