-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Client :  172.21.4.182
-- Généré le :  Mar 01 Mars 2016 à 08:14
-- Version du serveur :  5.5.46-0ubuntu0.14.04.2
-- Version de PHP :  5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pgi_e0v4`
--

-- --------------------------------------------------------

--
-- Structure de la table `appel`
--

CREATE TABLE `appel` (
  `id` int(6) NOT NULL,
  `utilsateur_id` int(11) NOT NULL,
  `destinataire_id` int(11) NOT NULL,
  `expediteur_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `archives`
--

CREATE TABLE `archives` (
  `id` int(6) NOT NULL,
  `devis_id` int(6) NOT NULL,
  `date` date NOT NULL,
  `client_id` int(6) NOT NULL,
  `employe_id` int(6) NOT NULL,
  `validation_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bonCommande`
--

CREATE TABLE `bonCommande` (
  `id` int(6) NOT NULL,
  `devis_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
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
-- Structure de la table `courrier`
--

CREATE TABLE `courrier` (
  `id` int(6) NOT NULL,
  `destinataire_id` int(11) NOT NULL,
  `expediteur_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id` int(6) NOT NULL,
  `client_id` int(6) NOT NULL,
  `employe_id` int(6) NOT NULL,
  `date` date NOT NULL,
  `validation_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `prenom`, `dateNaissance`, `poste_id`, `numero`, `mail`, `ville`, `codePostal`, `adresse`, `securiteSociale`, `entreprise_id`) VALUES
(1, 'Lagor', 'Yves', '2015-02-18', 1, '087454000000', 'YvesLagor@entreprise.com', 'challans', '85000', '8 rue d\'on ne sait où', 0, 6);

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id` int(6) NOT NULL,
  `libelle` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(6) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codePostal` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(6) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `perms` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entreprise_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ligneDevis`
--

CREATE TABLE `ligneDevis` (
  `id` int(6) NOT NULL,
  `produit_id` int(6) NOT NULL,
  `quantite` int(6) NOT NULL,
  `devis_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mail`
--

CREATE TABLE `mail` (
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
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `label` varchar(200) NOT NULL,
  `route` longtext NOT NULL,
  `menuparent_id` int(11) DEFAULT NULL,
  `icon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `menu`
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
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(6) NOT NULL,
  `sujet_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `dateCreation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mutuelle`
--

CREATE TABLE `mutuelle` (
  `id` int(6) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `mutuelle`
--

INSERT INTO `mutuelle` (`id`, `libelle`) VALUES
(1, 'mutuelle1'),
(2, 'mutuelle2');

-- --------------------------------------------------------

--
-- Structure de la table `organisation`
--

CREATE TABLE `organisation` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `organisation`
--

INSERT INTO `organisation` (`id`, `libelle`, `fonction`, `numero`, `mail`, `ville`, `codePostal`, `adresse`, `mutuelle_id`, `securSocial_id`, `parent_id`) VALUES
(6, 'gggggggggggggg', 'gggggggggggggg', 'gggggggggggggg', 'gggggggggggggg', 'gggggggggggggg', 'ggggg', 'ggggggggggggg', 1, 1, NULL),
(7, 'SARL1', '', '0787000000', 'SARL1@entreprise.com', 'challans', '85000', '7 rue on ne sait où', 1, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE `planning` (
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
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `id` int(6) NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `poste`
--

INSERT INTO `poste` (`id`, `libelle`) VALUES
(1, 'Informaticien');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(6) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `poids` decimal(10,0) NOT NULL,
  `montant` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prospect`
--

CREATE TABLE `prospect` (
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
-- Structure de la table `securSocial`
--

CREATE TABLE `securSocial` (
  `id` int(6) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `securSocial`
--

INSERT INTO `securSocial` (`id`, `libelle`) VALUES
(1, 'securSocial1'),
(2, 'securSocial2');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id` int(6) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `entreprise_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id` int(6) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nbVisite` int(11) NOT NULL,
  `dateCreation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `typeTransport`
--

CREATE TABLE `typeTransport` (
  `id` int(6) NOT NULL,
  `libelle` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `utilisateurtype_id` int(11) NOT NULL,
  `groupe_id` int(11) DEFAULT NULL,
  `entreprise_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `utilisateurtype_id`, `groupe_id`, `entreprise_id`) VALUES
(1, 'admin', 'admin', 1, NULL, 6),
(2, 'durand_p', 'B7p880yt', 2, NULL, 6);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurtype`
--

CREATE TABLE `utilisateurtype` (
  `id` int(11) NOT NULL,
  `label` varchar(200) NOT NULL,
  `permission` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurtype`
--

INSERT INTO `utilisateurtype` (`id`, `label`, `permission`) VALUES
(1, 'admin', 100),
(2, 'responsable', 95);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurtype_menu`
--

CREATE TABLE `utilisateurtype_menu` (
  `utilisateurtype_id` int(11) NOT NULL DEFAULT '0',
  `menu_id` int(11) NOT NULL DEFAULT '0',
  `ordre` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurtype_menu`
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
-- Structure de la table `validation`
--

CREATE TABLE `validation` (
  `id` int(6) NOT NULL,
  `libelle` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `appel`
--
ALTER TABLE `appel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilsateur_id` (`utilsateur_id`),
  ADD KEY `destinataire_id` (`destinataire_id`),
  ADD KEY `expediteur_id` (`expediteur_id`);

--
-- Index pour la table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devis_id` (`devis_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `employe_id` (`employe_id`),
  ADD KEY `validation_id` (`validation_id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `bonCommande`
--
ALTER TABLE `bonCommande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devis_id` (`devis_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filiale_id` (`entreprise_id`);

--
-- Index pour la table `courrier`
--
ALTER TABLE `courrier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destinataire_id` (`destinataire_id`),
  ADD KEY `expediteur_id` (`expediteur_id`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `employe_id` (`employe_id`),
  ADD KEY `validation_id` (`validation_id`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poste_id` (`poste_id`),
  ADD KEY `organisation_id` (`entreprise_id`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entreprise_id` (`entreprise_id`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entreprise_id` (`entreprise_id`);

--
-- Index pour la table `ligneDevis`
--
ALTER TABLE `ligneDevis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produit_id` (`produit_id`),
  ADD KEY `devis_id` (`devis_id`);

--
-- Index pour la table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destinataire_id` (`destinataire_id`),
  ADD KEY `expediteur_id` (`expediteur_id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menuparent_id` (`menuparent_id`),
  ADD KEY `menuparent_id_2` (`menuparent_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sujet_id` (`sujet_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `mutuelle`
--
ALTER TABLE `mutuelle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mutuelle_id` (`mutuelle_id`),
  ADD KEY `securSocial_id` (`securSocial_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employe_id` (`employe_id`),
  ADD KEY `etat_id` (`etat_id`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fournisseur_id` (`fournisseur_id`);

--
-- Index pour la table `prospect`
--
ALTER TABLE `prospect`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filliale_id` (`entreprise_id`);

--
-- Index pour la table `securSocial`
--
ALTER TABLE `securSocial`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materiel_id` (`produit_id`),
  ADD KEY `entreprise_id` (`entreprise_id`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `typeTransport`
--
ALTER TABLE `typeTransport`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `utilisateurtype_id` (`utilisateurtype_id`),
  ADD KEY `groupe_id` (`groupe_id`),
  ADD KEY `entreprise_id` (`entreprise_id`);

--
-- Index pour la table `utilisateurtype`
--
ALTER TABLE `utilisateurtype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `label` (`label`);

--
-- Index pour la table `utilisateurtype_menu`
--
ALTER TABLE `utilisateurtype_menu`
  ADD PRIMARY KEY (`utilisateurtype_id`,`menu_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Index pour la table `validation`
--
ALTER TABLE `validation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `appel`
--
ALTER TABLE `appel`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `archives`
--
ALTER TABLE `archives`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `bonCommande`
--
ALTER TABLE `bonCommande`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `courrier`
--
ALTER TABLE `courrier`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ligneDevis`
--
ALTER TABLE `ligneDevis`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mutuelle`
--
ALTER TABLE `mutuelle`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `planning`
--
ALTER TABLE `planning`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `prospect`
--
ALTER TABLE `prospect`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `securSocial`
--
ALTER TABLE `securSocial`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `typeTransport`
--
ALTER TABLE `typeTransport`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateurtype`
--
ALTER TABLE `utilisateurtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `validation`
--
ALTER TABLE `validation`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appel`
--
ALTER TABLE `appel`
  ADD CONSTRAINT `appel_ibfk_1` FOREIGN KEY (`utilsateur_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `appel_ibfk_2` FOREIGN KEY (`destinataire_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `archives`
--
ALTER TABLE `archives`
  ADD CONSTRAINT `archives_ibfk_1` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`),
  ADD CONSTRAINT `archives_ibfk_2` FOREIGN KEY (`validation_id`) REFERENCES `validation` (`id`),
  ADD CONSTRAINT `archives_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `bonCommande`
--
ALTER TABLE `bonCommande`
  ADD CONSTRAINT `bonCommande_ibfk_1` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`);

--
-- Contraintes pour la table `courrier`
--
ALTER TABLE `courrier`
  ADD CONSTRAINT `courrier_ibfk_1` FOREIGN KEY (`destinataire_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `courrier_ibfk_2` FOREIGN KEY (`expediteur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `devis_ibfk_1` FOREIGN KEY (`validation_id`) REFERENCES `validation` (`id`),
  ADD CONSTRAINT `devis_ibfk_2` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`),
  ADD CONSTRAINT `devis_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_3` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `employe_ibfk_2` FOREIGN KEY (`poste_id`) REFERENCES `poste` (`id`);

--
-- Contraintes pour la table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`);

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`);

--
-- Contraintes pour la table `ligneDevis`
--
ALTER TABLE `ligneDevis`
  ADD CONSTRAINT `ligneDevis_ibfk_1` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`),
  ADD CONSTRAINT `ligneDevis_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`destinataire_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `mail_ibfk_2` FOREIGN KEY (`expediteur_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`menuparent_id`) REFERENCES `menu` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`sujet_id`) REFERENCES `topic` (`id`);

--
-- Contraintes pour la table `organisation`
--
ALTER TABLE `organisation`
  ADD CONSTRAINT `organisation_ibfk_3` FOREIGN KEY (`parent_id`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `organisation_ibfk_1` FOREIGN KEY (`mutuelle_id`) REFERENCES `mutuelle` (`id`),
  ADD CONSTRAINT `organisation_ibfk_2` FOREIGN KEY (`securSocial_id`) REFERENCES `securSocial` (`id`);

--
-- Contraintes pour la table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `planning_ibfk_1` FOREIGN KEY (`employe_id`) REFERENCES `employe` (`id`),
  ADD CONSTRAINT `planning_ibfk_2` FOREIGN KEY (`etat_id`) REFERENCES `etat` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`);

--
-- Contraintes pour la table `prospect`
--
ALTER TABLE `prospect`
  ADD CONSTRAINT `prospect_ibfk_1` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`);

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`produit_id`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`);

--
-- Contraintes pour la table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`entreprise_id`) REFERENCES `organisation` (`id`),
  ADD CONSTRAINT `user_group_id` FOREIGN KEY (`groupe_id`) REFERENCES `groupe` (`id`),
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`utilisateurtype_id`) REFERENCES `utilisateurtype` (`id`);

--
-- Contraintes pour la table `utilisateurtype_menu`
--
ALTER TABLE `utilisateurtype_menu`
  ADD CONSTRAINT `utilisateurtype_menu_ibfk_1` FOREIGN KEY (`utilisateurtype_id`) REFERENCES `utilisateurtype` (`id`),
  ADD CONSTRAINT `utilisateurtype_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
