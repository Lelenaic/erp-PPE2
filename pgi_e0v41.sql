-- phpMyAdmin SQL Dump
-- version 4.5.0-dev
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 01, 2016 at 09:18 AM
-- Server version: 5.6.25-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pgi_e0v41`
--

-- --------------------------------------------------------

--
-- Table structure for table `appel`
--

CREATE TABLE IF NOT EXISTS `appel` (
  `id` int(6) NOT NULL,
  `utilsateur_id` int(11) NOT NULL,
  `destinataire_id` int(11) NOT NULL,
  `expediteur_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE IF NOT EXISTS `archives` (
  `id` int(6) NOT NULL,
  `devis_id` int(6) NOT NULL,
  `date` date NOT NULL,
  `client_id` int(6) NOT NULL,
  `employe_id` int(6) NOT NULL,
  `validation_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bonCommande`
--

CREATE TABLE IF NOT EXISTS `bonCommande` (
  `id` int(6) NOT NULL,
  `devis_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(6) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codePostal` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entreprise_id` int(6) NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numTelephone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courrier`
--

CREATE TABLE IF NOT EXISTS `courrier` (
  `id` int(6) NOT NULL,
  `destinataire_id` int(11) NOT NULL,
  `expediteur_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devis`
--

CREATE TABLE IF NOT EXISTS `devis` (
  `id` int(6) NOT NULL,
  `client_id` int(6) NOT NULL,
  `employe_id` int(6) NOT NULL,
  `date` date NOT NULL,
  `validation_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE IF NOT EXISTS `employe` (
  `id` int(6) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `poste_id` int(6) NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codePostal` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `securiteSociale` int(255) NOT NULL,
  `entreprise_id` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `prenom`, `dateNaissance`, `poste_id`, `numero`, `mail`, `ville`, `codePostal`, `adresse`, `securiteSociale`, `entreprise_id`) VALUES
(1, 'Lagor', 'Yves', '2015-02-18', 1, '087454000000', 'YvesLagor@entreprise.com', 'challans', '85000', '8 rue d''on ne sait où', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `etat`
--

CREATE TABLE IF NOT EXISTS `etat` (
  `id` int(6) NOT NULL,
  `libelle` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` int(6) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codePostal` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(6) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `perms` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entreprise_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ligneDevis`
--

CREATE TABLE IF NOT EXISTS `ligneDevis` (
  `id` int(6) NOT NULL,
  `produit_id` int(6) NOT NULL,
  `quantite` int(6) NOT NULL,
  `devis_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(6) NOT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `destinataire_id` int(11) NOT NULL,
  `expediteur_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `label` varchar(200) NOT NULL,
  `route` longtext NOT NULL,
  `menuparent_id` int(11) DEFAULT NULL,
  `icon` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `label`, `route`, `menuparent_id`, `icon`) VALUES
(1, 'Clientèle', 'client_index_index', NULL, 'fa-euro'),
(2, 'Stock', 'produit_stock_index', NULL, 'fa-database'),
(3, 'Tableau de bord', 'kernel_utilisateur_index', NULL, 'fa-dashboard'),
(4, 'Utilisateurs', '', NULL, 'fa-users'),
(5, 'Ajouter', 'kernel_utilisateur_formAjouter', 4, 'fa-plus-square'),
(6, 'Liste', 'kernel_utilisateur_liste', 4, 'fa-list'),
(7, 'Gestion', '', NULL, 'fa-users'),
(8, 'Employés', '', 7, 'fa-user'),
(9, 'Planning', 'grh_planning_formAfficher', 7, 'fa-calendar'),
(10, 'Ajouter', 'grh_employe_formAjouter', 8, 'fa-plus-square'),
(11, 'Liste', 'grh_employe_liste', 8, 'fa-navicon'),
(12, 'Client', '', 1, 'fa-euro'),
(13, 'Gestion comptable', '', NULL, 'fa fa-folder-open'),
(14, 'Prospect', '', 1, 'fa-users'),
(15, 'Ajouter devis', 'kernel_gestionComptable_formDevis', 13, 'fa-plus-square'),
(16, 'Ajout', 'client_ajoutIndex_index', 12, 'fa-plus-square'),
(17, 'Liste facture', 'kernel_gestionComptable_listeFacture', 13, 'fa-euro'),
(18, 'Liste', 'client_listeIndex_index', 12, 'fa-list-ul'),
(19, 'Liste archive', 'kernel_gestionComptable_listeArchive', 13, 'fa fa-archive'),
(20, 'Ajout', 'prospect_ajoutIndex_index', 14, 'fa-plus-square'),
(21, 'Liste', 'prospect_listeIndex_index', 14, 'fa-liste-ul'),
(22, 'Ajouter', 'produit_stock_ajouterStock', 2, 'fa-plus-square'),
(23, 'Liste', 'produit_stock_listeStock', 2, 'fa-list'),
(24, 'Exemple PDF', 'glt_test_pdf', NULL, ''),
(25, 'Forum', 'gci_index_forum', NULL, 'fa-users');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(6) NOT NULL,
  `sujet_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mutuelle`
--

CREATE TABLE IF NOT EXISTS `mutuelle` (
  `id` int(6) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mutuelle`
--

INSERT INTO `mutuelle` (`id`, `libelle`) VALUES
(1, 'mutuelle1'),
(2, 'mutuelle2');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
  `id` int(6) NOT NULL,
  `libelle` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fonction` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `codePostal` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mutuelle_id` int(50) NOT NULL,
  `securSocial_id` int(50) NOT NULL,
  `parent_id` int(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`id`, `libelle`, `fonction`, `numero`, `mail`, `ville`, `codePostal`, `adresse`, `mutuelle_id`, `securSocial_id`, `parent_id`) VALUES
(6, 'gggggggggggggg', 'gggggggggggggg', 'gggggggggggggg', 'gggggggggggggg', 'gggggggggggggg', 'ggggg', 'ggggggggggggg', 1, 1, NULL),
(7, 'SARL1', '', '0787000000', 'SARL1@entreprise.com', 'challans', '85000', '7 rue on ne sait où', 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `planning`
--

CREATE TABLE IF NOT EXISTS `planning` (
  `id` int(6) NOT NULL,
  `employe_id` int(6) NOT NULL,
  `etat_id` int(6) NOT NULL,
  `dateDebut` date NOT NULL,
  `heureDebut` time NOT NULL,
  `dateFin` date NOT NULL,
  `heureFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poste`
--

CREATE TABLE IF NOT EXISTS `poste` (
  `id` int(6) NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poste`
--

INSERT INTO `poste` (`id`, `libelle`) VALUES
(1, 'Informaticien');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(6) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `poids` decimal(10,0) NOT NULL,
  `montant` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prospect`
--

CREATE TABLE IF NOT EXISTS `prospect` (
  `id` int(6) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codePostal` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entreprise_id` int(6) NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numTelephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `securSocial`
--

CREATE TABLE IF NOT EXISTS `securSocial` (
  `id` int(6) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `securSocial`
--

INSERT INTO `securSocial` (`id`, `libelle`) VALUES
(1, 'securSocial1'),
(2, 'securSocial2');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(6) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(6) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nbVisite` int(11) NOT NULL,
  `dateCreation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `typeTransport`
--

CREATE TABLE IF NOT EXISTS `typeTransport` (
  `id` int(6) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `utilisateurtype_id` int(11) NOT NULL,
  `groupe_id` int(11) DEFAULT NULL,
  `entreprise_id` int(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `utilisateurtype_id`, `groupe_id`, `entreprise_id`) VALUES
(1, 'admin', 'admin', 1, NULL, 6),
(2, 'durand_p', 'B7p880yt', 2, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurtype`
--

CREATE TABLE IF NOT EXISTS `utilisateurtype` (
  `id` int(11) NOT NULL,
  `label` varchar(200) NOT NULL,
  `permission` int(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurtype`
--

INSERT INTO `utilisateurtype` (`id`, `label`, `permission`) VALUES
(1, 'admin', 100),
(2, 'responsable', 95);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurtype_menu`
--

CREATE TABLE IF NOT EXISTS `utilisateurtype_menu` (
  `utilisateurtype_id` int(11) NOT NULL DEFAULT '0',
  `menu_id` int(11) NOT NULL DEFAULT '0',
  `ordre` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurtype_menu`
--

INSERT INTO `utilisateurtype_menu` (`utilisateurtype_id`, `menu_id`, `ordre`) VALUES
(1, 1, 10),
(1, 2, 20),
(1, 3, 5),
(1, 4, 7),
(1, 5, 10),
(1, 6, 20),
(1, 7, 30),
(1, 8, 10),
(1, 9, 20),
(1, 10, 10),
(1, 11, 20),
(1, 13, 40),
(1, 15, 40),
(1, 17, 40),
(1, 19, 40),
(1, 24, 40),
(1, 25, 50);

-- --------------------------------------------------------

--
-- Table structure for table `validation`
--

CREATE TABLE IF NOT EXISTS `validation` (
  `id` int(6) NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appel`
--
ALTER TABLE `appel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilsateur_id` (`utilsateur_id`),
  ADD KEY `destinataire_id` (`destinataire_id`),
  ADD KEY `expediteur_id` (`expediteur_id`);

--
-- Indexes for table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devis_id` (`devis_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `employe_id` (`employe_id`),
  ADD KEY `validation_id` (`validation_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `bonCommande`
--
ALTER TABLE `bonCommande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devis_id` (`devis_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filiale_id` (`entreprise_id`);

--
-- Indexes for table `courrier`
--
ALTER TABLE `courrier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destinataire_id` (`destinataire_id`),
  ADD KEY `expediteur_id` (`expediteur_id`);

--
-- Indexes for table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `employe_id` (`employe_id`),
  ADD KEY `validation_id` (`validation_id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poste_id` (`poste_id`),
  ADD KEY `organisation_id` (`entreprise_id`);

--
-- Indexes for table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entreprise_id` (`entreprise_id`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entreprise_id` (`entreprise_id`);

--
-- Indexes for table `ligneDevis`
--
ALTER TABLE `ligneDevis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produit_id` (`produit_id`),
  ADD KEY `devis_id` (`devis_id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destinataire_id` (`destinataire_id`),
  ADD KEY `expediteur_id` (`expediteur_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menuparent_id` (`menuparent_id`),
  ADD KEY `menuparent_id_2` (`menuparent_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sujet_id` (`sujet_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Indexes for table `mutuelle`
--
ALTER TABLE `mutuelle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mutuelle_id` (`mutuelle_id`),
  ADD KEY `securSocial_id` (`securSocial_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employe_id` (`employe_id`),
  ADD KEY `etat_id` (`etat_id`);

--
-- Indexes for table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fournisseur_id` (`fournisseur_id`);

--
-- Indexes for table `prospect`
--
ALTER TABLE `prospect`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filliale_id` (`entreprise_id`);

--
-- Indexes for table `securSocial`
--
ALTER TABLE `securSocial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materiel_id` (`produit_id`),
  ADD KEY `entreprise_id` (`entreprise_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Indexes for table `typeTransport`
--
ALTER TABLE `typeTransport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `utilisateurtype_id` (`utilisateurtype_id`),
  ADD KEY `groupe_id` (`groupe_id`),
  ADD KEY `entreprise_id` (`entreprise_id`);

--
-- Indexes for table `utilisateurtype`
--
ALTER TABLE `utilisateurtype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `label` (`label`);

--
-- Indexes for table `utilisateurtype_menu`
--
ALTER TABLE `utilisateurtype_menu`
  ADD PRIMARY KEY (`utilisateurtype_id`,`menu_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `validation`
--
ALTER TABLE `validation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appel`
--
ALTER TABLE `appel`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bonCommande`
--
ALTER TABLE `bonCommande`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courrier`
--
ALTER TABLE `courrier`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `etat`
--
ALTER TABLE `etat`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ligneDevis`
--
ALTER TABLE `ligneDevis`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mutuelle`
--
ALTER TABLE `mutuelle`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `poste`
--
ALTER TABLE `poste`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prospect`
--
ALTER TABLE `prospect`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `securSocial`
--
ALTER TABLE `securSocial`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `typeTransport`
--
ALTER TABLE `typeTransport`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `utilisateurtype`
--
ALTER TABLE `utilisateurtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `validation`
--
ALTER TABLE `validation`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appel`
--
ALTER TABLE `appel`
  ADD CONSTRAINT `appel_ibfk_1` FOREIGN KEY (`utilsateur_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `appel_ibfk_2` FOREIGN KEY (`destinataire_id`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `archives`
--
ALTER TABLE `archives`
  ADD CONSTRAINT `archives_ibfk_1` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`),
  ADD CONSTRAINT `archives_ibfk_2` FOREIGN KEY (`validation_id`) REFERENCES `validation` (`id`),
  ADD CONSTRAINT `archives_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Constraints for table `bonCommande`
--
ALTER TABLE `bonCommande`
  ADD CONSTRAINT `bonCommande_ibfk_1` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`);

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `courrier`
--
ALTER TABLE `courrier`
  ADD CONSTRAINT `courrier_ibfk_1` FOREIGN KEY (`destinataire_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `courrier_ibfk_2` FOREIGN KEY (`expediteur_id`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `devis_ibfk_1` FOREIGN KEY (`validation_id`) REFERENCES `validation` (`id`),
  ADD CONSTRAINT `devis_ibfk_2` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`),
  ADD CONSTRAINT `devis_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Constraints for table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_2` FOREIGN KEY (`poste_id`) REFERENCES `poste` (`id`),
  ADD CONSTRAINT `employe_ibfk_3` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `ligneDevis`
--
ALTER TABLE `ligneDevis`
  ADD CONSTRAINT `ligneDevis_ibfk_1` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`),
  ADD CONSTRAINT `ligneDevis_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Constraints for table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`destinataire_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `mail_ibfk_2` FOREIGN KEY (`expediteur_id`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`menuparent_id`) REFERENCES `menu` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`sujet_id`) REFERENCES `topic` (`id`);

--
-- Constraints for table `organisation`
--
ALTER TABLE `organisation`
  ADD CONSTRAINT `organisation_ibfk_1` FOREIGN KEY (`mutuelle_id`) REFERENCES `mutuelle` (`id`),
  ADD CONSTRAINT `organisation_ibfk_2` FOREIGN KEY (`securSocial_id`) REFERENCES `securSocial` (`id`),
  ADD CONSTRAINT `organisation_ibfk_3` FOREIGN KEY (`parent_id`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `planning_ibfk_1` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`),
  ADD CONSTRAINT `planning_ibfk_2` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`);

--
-- Constraints for table `prospect`
--
ALTER TABLE `prospect`
  ADD CONSTRAINT `prospect_ibfk_1` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `user_group_id` FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`id`),
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`utilisateurtype_id`) REFERENCES `utilisateurtype` (`id`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`);

--
-- Constraints for table `utilisateurtype_menu`
--
ALTER TABLE `utilisateurtype_menu`
  ADD CONSTRAINT `utilisateurtype_menu_ibfk_1` FOREIGN KEY (`utilisateurtype_id`) REFERENCES `utilisateurtype` (`id`),
  ADD CONSTRAINT `utilisateurtype_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
