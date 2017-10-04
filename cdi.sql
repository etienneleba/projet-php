-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 04 Octobre 2017 à 08:35
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cdi`
--

-- --------------------------------------------------------

--
-- Structure de la table `CDI_ARTICLE`
--

CREATE TABLE `CDI_ARTICLE` (
  `AR_NUMERO` varchar(8) NOT NULL,
  `FO_NUMERO` varchar(8) DEFAULT NULL,
  `AR_NOM` varchar(25) DEFAULT NULL,
  `AR_POIDS` decimal(10,3) DEFAULT NULL,
  `AR_COULEUR` varchar(20) DEFAULT NULL,
  `AR_STOCK` smallint(6) DEFAULT NULL,
  `AR_PA` decimal(5,2) DEFAULT NULL,
  `AR_PV` decimal(5,2) DEFAULT NULL,
  `ar_poicode` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `CDI_ARTICLE`
--

INSERT INTO `CDI_ARTICLE` (`AR_NUMERO`, `FO_NUMERO`, `AR_NOM`, `AR_POIDS`, `AR_COULEUR`, `AR_STOCK`, `AR_PA`, `AR_PV`, `ar_poicode`) VALUES
('A01', 'F04', 'AGRAFEUSE', '150.000', 'ROUGE', 3, '7.00', '10.00', NULL),
('A02', 'F01', 'CALCULATRICE', '100.000', 'NOIR', NULL, '25.00', '40.00', NULL),
('A03', 'F04', 'CACHEUR-DATEUR', '100.000', 'BLANC', 3, '15.00', '25.00', NULL),
('A04', 'F05', 'LAMPE', '550.000', 'ROUGE', 48, '18.00', '28.00', NULL),
('A05', 'F05', 'LAMPE', '550.000', 'BLANC', 666, '18.00', '28.00', NULL),
('A06', 'F05', 'LAMPE', '550.000', 'BLEU', NULL, '18.00', '28.00', NULL),
('A07', 'F05', 'LAMPE', '550.000', 'VERT', 3, '18.00', '28.00', NULL),
('A08', 'F03', 'PESE-LETTRE 1-500', '1230.000', NULL, NULL, '28.00', '35.00', NULL),
('A09', 'F03', 'PESE-LETTRE 1-1000', NULL, NULL, 3, '30.00', '39.00', NULL),
('A10', 'F02', 'CRAYON', '20.000', 'ROUGE', NULL, '1.00', '2.00', NULL),
('A11', 'F02', 'CRAYON', '20.000', 'BLEU', NULL, '3.00', '4.00', NULL),
('A12', 'F02', 'CRAYON LUXE', '20.000', 'ROUGE', 8, '3.00', '4.00', NULL),
('A13', 'F02', 'CRAYON LUXE', '20.000', 'VERT', 7, '3.00', '4.00', NULL),
('A14', 'F02', 'CRAYON LUXE', '20.000', 'BLEU', NULL, '3.00', '4.00', NULL),
('A15', 'F02', 'CRAYON LUXE', '20.000', 'NOIR', NULL, '3.00', '5.00', NULL),
('A20', 'F01', 'COLLE', '60.000', 'BLANC', NULL, '1.00', '3.00', NULL),
('A21', 'F06', 'COLLE', '60.000', 'BLANC', 10, '1.00', '2.00', NULL),
('A22', 'F03', 'COLLE', '60.000', 'BLANC', 34, '1.00', '2.00', NULL),
('A25', 'F01', 'COLLE', NULL, 'BLANC', 10, '1.00', '2.00', NULL),
('A26', 'F02', 'COLLE', '60.000', 'BLANC', 15, '1.00', '2.00', NULL),
('A27', 'F05', 'COLLE', '60.000', 'BLANC', 1, '1.00', '2.00', NULL),
('A28', 'F03', 'Surligneur', '10.000', 'JAUNE', 0, '1.00', '2.00', NULL),
('A30', 'F01', 'Calculatrice', '80.000', 'Bleu', NULL, '6.00', '15.00', NULL),
('A31', 'F06', 'SOURIS', '35.000', 'Vert', 5, '2.00', '5.00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `CDI_CLIENT`
--

CREATE TABLE `CDI_CLIENT` (
  `CL_NUMERO` int(8) NOT NULL,
  `CL_NOM` varchar(25) DEFAULT NULL,
  `CL_PRENOM` varchar(25) DEFAULT NULL,
  `CL_PAYS` varchar(2) DEFAULT NULL,
  `CL_LOCALITE` varchar(20) DEFAULT NULL,
  `CL_CA` int(11) DEFAULT NULL,
  `CL_TYPE` varchar(16) DEFAULT NULL,
  `EMP_ENUME` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `CDI_CLIENT`
--

INSERT INTO `CDI_CLIENT` (`CL_NUMERO`, `CL_NOM`, `CL_PRENOM`, `CL_PAYS`, `CL_LOCALITE`, `CL_CA`, `CL_TYPE`, `EMP_ENUME`) VALUES
(1, 'DEFRERE', 'Marc', 'F', 'PARIS', NULL, 'Particulier', 7934),
(2, 'DECERF', 'Jean', 'F', 'PARIS', NULL, 'Particulier', 7934),
(3, 'DEFAWE', 'Leon', 'B', 'LIEGE', NULL, 'Particulier', 7900),
(4, 'NOSSENT', 'Serge', 'B', 'BRUXELLES', NULL, 'Particulier', 7654),
(5, 'JACOB', 'Marthe', 'F', 'MARSEILLE', 31, 'Administration', 4),
(6, 'JAMAR', 'Pierre', 'B', 'LIEGE', 21, 'Administration', 8),
(7, 'DECKERS', 'Willian', 'F', 'LYON', 140, 'Grand compte', 7436),
(8, 'DECLERCQ', 'Lucien', 'B', 'BRUXELLES', 349, 'Grand compte', 7436),
(9, 'DEFYZ', 'Maurice', 'F', 'BORDEAUX', NULL, 'Particulier', 6),
(10, 'DEFOOZ', 'Francis', 'F', 'LILLE', NULL, 'Particulier', 7844),
(11, 'RAMJOIE', 'Victor', 'F', 'NANTES', NULL, 'Particulier', 7436),
(12, 'RENARDY', 'Jean', 'F', 'MARSEILLE', 275, 'Grand compte', 7900),
(13, 'MANTEAU', 'Yvan', 'F', 'CAEN', 105, 'Grand compte', 7902),
(14, 'JONAS', 'Henri', 'F', 'PARIS', 190, 'PME', 7436),
(15, 'DELVENNE', 'Christian', 'F', 'LYON', 590, 'Grand compte', 7436),
(16, 'DEFEEZ', 'Andre', 'F', 'LYON', NULL, 'Particulier', 5814),
(20, 'DUMONT', 'PAUL', 'F', 'CAEN', NULL, 'Particulier', NULL),
(21, 'GERARD', 'PAUL', 'F', 'CAEN', NULL, 'Particulier', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `CDI_COMMANDE`
--

CREATE TABLE `CDI_COMMANDE` (
  `CO_NUMERO` varchar(8) NOT NULL,
  `CO_DATE` datetime DEFAULT NULL,
  `CL_NUMERO` varchar(8) DEFAULT NULL,
  `MA_NUMERO` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `CDI_FOURNISSEUR`
--

CREATE TABLE `CDI_FOURNISSEUR` (
  `FO_NUMERO` varchar(8) NOT NULL,
  `FO_NOM` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `CDI_FOURNISSEUR`
--

INSERT INTO `CDI_FOURNISSEUR` (`FO_NUMERO`, `FO_NOM`) VALUES
('F01', 'CATI O ELECTRONIC'),
('F02', 'LES STYLOS REUNIS'),
('F03', 'MECANIQUE DE PRECISION'),
('F04', 'SARL ROULAND'),
('F05', 'ELECTROLAMP'),
('F06', 'RAMONAGE BDD');

-- --------------------------------------------------------

--
-- Structure de la table `CDI_LIVRAISON`
--

CREATE TABLE `CDI_LIVRAISON` (
  `LI_NUMERO` varchar(8) NOT NULL,
  `MA_NUMERO` varchar(8) DEFAULT NULL,
  `CO_NUMERO` varchar(8) DEFAULT NULL,
  `CL_NUMERO` varchar(8) DEFAULT NULL,
  `DATE_LIV` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `CDI_MAGASIN`
--

CREATE TABLE `CDI_MAGASIN` (
  `MA_NUMERO` varchar(8) NOT NULL,
  `MA_LOCALITE` varchar(25) DEFAULT NULL,
  `MA_GERANT` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `CDI_MAGASIN`
--

INSERT INTO `CDI_MAGASIN` (`MA_NUMERO`, `MA_LOCALITE`, `MA_GERANT`) VALUES
('M01', 'PARIS 5E', 'BERTON Louis'),
('M02', 'PARIS 10E', 'JANNEAU Luc'),
('M03', 'LYON', 'MOUILLARD Marcel'),
('M04', 'MARSEILLE', 'CAMUS Marius'),
('M05', 'MONTPELLIER', 'BAIJOT Marc'),
('M06', 'BORDEAUX', 'DETIENNE Nicole'),
('M07', 'NANTES', 'DUMONT Henri'),
('M08', 'TOURS', 'DEMARTEAU Renee'),
('M09', 'ROUEN', 'NOSSENT Daniel'),
('M10', 'LILLE', 'NIZET Jean Luc'),
('M11', 'BRUXELLES', 'VANDAELE Annick'),
('M12', 'LIEGE', 'HANNEAU Vincent');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `CDI_ARTICLE`
--
ALTER TABLE `CDI_ARTICLE`
  ADD PRIMARY KEY (`AR_NUMERO`),
  ADD KEY `IDX_ED5812ECDAC1A087` (`FO_NUMERO`);

--
-- Index pour la table `CDI_CLIENT`
--
ALTER TABLE `CDI_CLIENT`
  ADD PRIMARY KEY (`CL_NUMERO`);

--
-- Index pour la table `CDI_COMMANDE`
--
ALTER TABLE `CDI_COMMANDE`
  ADD PRIMARY KEY (`CO_NUMERO`);

--
-- Index pour la table `CDI_FOURNISSEUR`
--
ALTER TABLE `CDI_FOURNISSEUR`
  ADD PRIMARY KEY (`FO_NUMERO`);

--
-- Index pour la table `CDI_LIVRAISON`
--
ALTER TABLE `CDI_LIVRAISON`
  ADD PRIMARY KEY (`LI_NUMERO`);

--
-- Index pour la table `CDI_MAGASIN`
--
ALTER TABLE `CDI_MAGASIN`
  ADD PRIMARY KEY (`MA_NUMERO`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `CDI_CLIENT`
--
ALTER TABLE `CDI_CLIENT`
  MODIFY `CL_NUMERO` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `CDI_ARTICLE`
--
ALTER TABLE `CDI_ARTICLE`
  ADD CONSTRAINT `FK_ED5812ECDAC1A087` FOREIGN KEY (`FO_NUMERO`) REFERENCES `CDI_FOURNISSEUR` (`FO_NUMERO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
