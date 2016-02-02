-- phpMyAdmin SQL Dump
-- version 4.3.0-dev
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2015 at 04:24 PM
-- Server version: 5.5.37-0ubuntu0.12.04.1
-- PHP Version: 5.4.35-1+deb.sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `esn_e0v0`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `label`, `route`, `menuparent_id`, `icon`) VALUES
(1, 'Clientèle', 'client_index_index', NULL, 'fa-euro'),
(2, 'Stock', 'produit_stock_index', NULL, 'fa-database'),
(3, 'Tableau de bord', 'kernel_utilisateur_index', NULL, 'fa-dashboard'),
(4, 'Utilisateurs', '', NULL, 'fa-users'),
(5, 'Ajouter', 'kernel_utilisateur_formAjouter', 4, 'fa-plus-square'),
(6, 'Liste', 'kernel_utilisateur_liste', 4, 'fa-list');

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
`id` int(11) NOT NULL,
  `raisonSociale` varchar(200) NOT NULL,
  `adresse` longtext NOT NULL,
  `cp` varchar(5) NOT NULL,
  `ville` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`id` int(11) NOT NULL,
  `login` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `utilisateurtype_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `utilisateurtype_id`) VALUES
(1, 'admin', 'X9p560ot', 1),
(2, 'durand_p', 'B7p880yt', 2);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurtype`
--

CREATE TABLE IF NOT EXISTS `utilisateurtype` (
`id` int(11) NOT NULL,
  `label` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `utilisateurtype`
--

INSERT INTO `utilisateurtype` (`id`, `label`) VALUES
(1, 'admin'),
(2, 'responsable');

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
(1, 6, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`), ADD KEY `menuparent_id` (`menuparent_id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login` (`login`), ADD KEY `utilisateurtype_id` (`utilisateurtype_id`);

--
-- Indexes for table `utilisateurtype`
--
ALTER TABLE `utilisateurtype`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `label` (`label`);

--
-- Indexes for table `utilisateurtype_menu`
--
ALTER TABLE `utilisateurtype_menu`
 ADD PRIMARY KEY (`utilisateurtype_id`,`menu_id`), ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `utilisateurtype`
--
ALTER TABLE `utilisateurtype`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`menuparent_id`) REFERENCES `menu` (`id`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`utilisateurtype_id`) REFERENCES `utilisateurtype` (`id`);

--
-- Constraints for table `utilisateurtype_menu`
--
ALTER TABLE `utilisateurtype_menu`
ADD CONSTRAINT `utilisateurtype_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`),
ADD CONSTRAINT `utilisateurtype_menu_ibfk_1` FOREIGN KEY (`utilisateurtype_id`) REFERENCES `utilisateurtype` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
