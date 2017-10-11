-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 11 Octobre 2017 à 10:15
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
(21, 'GERARD', 'PAUL', 'F', 'CAEN', NULL, 'Particulier', NULL),
(23, 'test', 'test', 'AF', 'test', NULL, 'Particulier', NULL),
(24, 'test2', 'test2', 'AF', 'test2', NULL, 'Particulier', NULL),
(56, 'Lebarillier', 'Etienne', 'F', 'Caen', NULL, 'Particulier', NULL),
(57, 'test', 'test', 'AG', 'test', NULL, 'Particulier', NULL),
(58, 'vdsf', 'etienne', 'AS', 'vsqvs', NULL, 'Particulier', NULL);

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

-- --------------------------------------------------------

--
-- Structure de la table `CDI_PAYS`
--

CREATE TABLE `CDI_PAYS` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `code` int(3) NOT NULL,
  `alpha2` varchar(2) NOT NULL,
  `alpha3` varchar(3) NOT NULL,
  `nom_en_gb` varchar(45) NOT NULL,
  `nom_fr_fr` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `CDI_PAYS`
--

INSERT INTO `CDI_PAYS` (`id`, `code`, `alpha2`, `alpha3`, `nom_en_gb`, `nom_fr_fr`) VALUES
(1, 4, 'AF', 'AFG', 'Afghanistan', 'Afghanistan'),
(2, 8, 'AL', 'ALB', 'Albania', 'Albanie'),
(3, 10, 'AQ', 'ATA', 'Antarctica', 'Antarctique'),
(4, 12, 'DZ', 'DZA', 'Algeria', 'Algérie'),
(5, 16, 'AS', 'ASM', 'American Samoa', 'Samoa Américaines'),
(6, 20, 'AD', 'AND', 'Andorra', 'Andorre'),
(7, 24, 'AO', 'AGO', 'Angola', 'Angola'),
(8, 28, 'AG', 'ATG', 'Antigua and Barbuda', 'Antigua-et-Barbuda'),
(9, 31, 'AZ', 'AZE', 'Azerbaijan', 'Azerbaïdjan'),
(10, 32, 'AR', 'ARG', 'Argentina', 'Argentine'),
(11, 36, 'AU', 'AUS', 'Australia', 'Australie'),
(12, 40, 'AT', 'AUT', 'Austria', 'Autriche'),
(13, 44, 'BS', 'BHS', 'Bahamas', 'Bahamas'),
(14, 48, 'BH', 'BHR', 'Bahrain', 'Bahreïn'),
(15, 50, 'BD', 'BGD', 'Bangladesh', 'Bangladesh'),
(16, 51, 'AM', 'ARM', 'Armenia', 'Arménie'),
(17, 52, 'BB', 'BRB', 'Barbados', 'Barbade'),
(18, 56, 'BE', 'BEL', 'Belgium', 'Belgique'),
(19, 60, 'BM', 'BMU', 'Bermuda', 'Bermudes'),
(20, 64, 'BT', 'BTN', 'Bhutan', 'Bhoutan'),
(21, 68, 'BO', 'BOL', 'Bolivia', 'Bolivie'),
(22, 70, 'BA', 'BIH', 'Bosnia and Herzegovina', 'Bosnie-Herzégovine'),
(23, 72, 'BW', 'BWA', 'Botswana', 'Botswana'),
(24, 74, 'BV', 'BVT', 'Bouvet Island', 'Île Bouvet'),
(25, 76, 'BR', 'BRA', 'Brazil', 'Brésil'),
(26, 84, 'BZ', 'BLZ', 'Belize', 'Belize'),
(27, 86, 'IO', 'IOT', 'British Indian Ocean Territory', 'Territoire Britannique de l\'Océan Indien'),
(28, 90, 'SB', 'SLB', 'Solomon Islands', 'Îles Salomon'),
(29, 92, 'VG', 'VGB', 'British Virgin Islands', 'Îles Vierges Britanniques'),
(30, 96, 'BN', 'BRN', 'Brunei Darussalam', 'Brunéi Darussalam'),
(31, 100, 'BG', 'BGR', 'Bulgaria', 'Bulgarie'),
(32, 104, 'MM', 'MMR', 'Myanmar', 'Myanmar'),
(33, 108, 'BI', 'BDI', 'Burundi', 'Burundi'),
(34, 112, 'BY', 'BLR', 'Belarus', 'Bélarus'),
(35, 116, 'KH', 'KHM', 'Cambodia', 'Cambodge'),
(36, 120, 'CM', 'CMR', 'Cameroon', 'Cameroun'),
(37, 124, 'CA', 'CAN', 'Canada', 'Canada'),
(38, 132, 'CV', 'CPV', 'Cape Verde', 'Cap-vert'),
(39, 136, 'KY', 'CYM', 'Cayman Islands', 'Îles Caïmanes'),
(40, 140, 'CF', 'CAF', 'Central African', 'République Centrafricaine'),
(41, 144, 'LK', 'LKA', 'Sri Lanka', 'Sri Lanka'),
(42, 148, 'TD', 'TCD', 'Chad', 'Tchad'),
(43, 152, 'CL', 'CHL', 'Chile', 'Chili'),
(44, 156, 'CN', 'CHN', 'China', 'Chine'),
(45, 158, 'TW', 'TWN', 'Taiwan', 'Taïwan'),
(46, 162, 'CX', 'CXR', 'Christmas Island', 'Île Christmas'),
(47, 166, 'CC', 'CCK', 'Cocos (Keeling) Islands', 'Îles Cocos (Keeling)'),
(48, 170, 'CO', 'COL', 'Colombia', 'Colombie'),
(49, 174, 'KM', 'COM', 'Comoros', 'Comores'),
(50, 175, 'YT', 'MYT', 'Mayotte', 'Mayotte'),
(51, 178, 'CG', 'COG', 'Republic of the Congo', 'République du Congo'),
(52, 180, 'CD', 'COD', 'The Democratic Republic Of The Congo', 'République Démocratique du Congo'),
(53, 184, 'CK', 'COK', 'Cook Islands', 'Îles Cook'),
(54, 188, 'CR', 'CRI', 'Costa Rica', 'Costa Rica'),
(55, 191, 'HR', 'HRV', 'Croatia', 'Croatie'),
(56, 192, 'CU', 'CUB', 'Cuba', 'Cuba'),
(57, 196, 'CY', 'CYP', 'Cyprus', 'Chypre'),
(58, 203, 'CZ', 'CZE', 'Czech Republic', 'République Tchèque'),
(59, 204, 'BJ', 'BEN', 'Benin', 'Bénin'),
(60, 208, 'DK', 'DNK', 'Denmark', 'Danemark'),
(61, 212, 'DM', 'DMA', 'Dominica', 'Dominique'),
(62, 214, 'DO', 'DOM', 'Dominican Republic', 'République Dominicaine'),
(63, 218, 'EC', 'ECU', 'Ecuador', 'Équateur'),
(64, 222, 'SV', 'SLV', 'El Salvador', 'El Salvador'),
(65, 226, 'GQ', 'GNQ', 'Equatorial Guinea', 'Guinée Équatoriale'),
(66, 231, 'ET', 'ETH', 'Ethiopia', 'Éthiopie'),
(67, 232, 'ER', 'ERI', 'Eritrea', 'Érythrée'),
(68, 233, 'EE', 'EST', 'Estonia', 'Estonie'),
(69, 234, 'FO', 'FRO', 'Faroe Islands', 'Îles Féroé'),
(70, 238, 'FK', 'FLK', 'Falkland Islands', 'Îles (malvinas) Falkland'),
(71, 239, 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', 'Géorgie du Sud et les Îles Sandwich du Sud'),
(72, 242, 'FJ', 'FJI', 'Fiji', 'Fidji'),
(73, 246, 'FI', 'FIN', 'Finland', 'Finlande'),
(74, 248, 'AX', 'ALA', 'Åland Islands', 'Îles Åland'),
(75, 250, 'FR', 'FRA', 'France', 'France'),
(76, 254, 'GF', 'GUF', 'French Guiana', 'Guyane Française'),
(77, 258, 'PF', 'PYF', 'French Polynesia', 'Polynésie Française'),
(78, 260, 'TF', 'ATF', 'French Southern Territories', 'Terres Australes Françaises'),
(79, 262, 'DJ', 'DJI', 'Djibouti', 'Djibouti'),
(80, 266, 'GA', 'GAB', 'Gabon', 'Gabon'),
(81, 268, 'GE', 'GEO', 'Georgia', 'Géorgie'),
(82, 270, 'GM', 'GMB', 'Gambia', 'Gambie'),
(83, 275, 'PS', 'PSE', 'Occupied Palestinian Territory', 'Territoire Palestinien Occupé'),
(84, 276, 'DE', 'DEU', 'Germany', 'Allemagne'),
(85, 288, 'GH', 'GHA', 'Ghana', 'Ghana'),
(86, 292, 'GI', 'GIB', 'Gibraltar', 'Gibraltar'),
(87, 296, 'KI', 'KIR', 'Kiribati', 'Kiribati'),
(88, 300, 'GR', 'GRC', 'Greece', 'Grèce'),
(89, 304, 'GL', 'GRL', 'Greenland', 'Groenland'),
(90, 308, 'GD', 'GRD', 'Grenada', 'Grenade'),
(91, 312, 'GP', 'GLP', 'Guadeloupe', 'Guadeloupe'),
(92, 316, 'GU', 'GUM', 'Guam', 'Guam'),
(93, 320, 'GT', 'GTM', 'Guatemala', 'Guatemala'),
(94, 324, 'GN', 'GIN', 'Guinea', 'Guinée'),
(95, 328, 'GY', 'GUY', 'Guyana', 'Guyana'),
(96, 332, 'HT', 'HTI', 'Haiti', 'Haïti'),
(97, 334, 'HM', 'HMD', 'Heard Island and McDonald Islands', 'Îles Heard et Mcdonald'),
(98, 336, 'VA', 'VAT', 'Vatican City State', 'Saint-Siège (état de la Cité du Vatican)'),
(99, 340, 'HN', 'HND', 'Honduras', 'Honduras'),
(100, 344, 'HK', 'HKG', 'Hong Kong', 'Hong-Kong'),
(101, 348, 'HU', 'HUN', 'Hungary', 'Hongrie'),
(102, 352, 'IS', 'ISL', 'Iceland', 'Islande'),
(103, 356, 'IN', 'IND', 'India', 'Inde'),
(104, 360, 'ID', 'IDN', 'Indonesia', 'Indonésie'),
(105, 364, 'IR', 'IRN', 'Islamic Republic of Iran', 'République Islamique d\'Iran'),
(106, 368, 'IQ', 'IRQ', 'Iraq', 'Iraq'),
(107, 372, 'IE', 'IRL', 'Ireland', 'Irlande'),
(108, 376, 'IL', 'ISR', 'Israel', 'Israël'),
(109, 380, 'IT', 'ITA', 'Italy', 'Italie'),
(110, 384, 'CI', 'CIV', 'Côte d\'Ivoire', 'Côte d\'Ivoire'),
(111, 388, 'JM', 'JAM', 'Jamaica', 'Jamaïque'),
(112, 392, 'JP', 'JPN', 'Japan', 'Japon'),
(113, 398, 'KZ', 'KAZ', 'Kazakhstan', 'Kazakhstan'),
(114, 400, 'JO', 'JOR', 'Jordan', 'Jordanie'),
(115, 404, 'KE', 'KEN', 'Kenya', 'Kenya'),
(116, 408, 'KP', 'PRK', 'Democratic People\'s Republic of Korea', 'République Populaire Démocratique de Corée'),
(117, 410, 'KR', 'KOR', 'Republic of Korea', 'République de Corée'),
(118, 414, 'KW', 'KWT', 'Kuwait', 'Koweït'),
(119, 417, 'KG', 'KGZ', 'Kyrgyzstan', 'Kirghizistan'),
(120, 418, 'LA', 'LAO', 'Lao People\'s Democratic Republic', 'République Démocratique Populaire Lao'),
(121, 422, 'LB', 'LBN', 'Lebanon', 'Liban'),
(122, 426, 'LS', 'LSO', 'Lesotho', 'Lesotho'),
(123, 428, 'LV', 'LVA', 'Latvia', 'Lettonie'),
(124, 430, 'LR', 'LBR', 'Liberia', 'Libéria'),
(125, 434, 'LY', 'LBY', 'Libyan Arab Jamahiriya', 'Jamahiriya Arabe Libyenne'),
(126, 438, 'LI', 'LIE', 'Liechtenstein', 'Liechtenstein'),
(127, 440, 'LT', 'LTU', 'Lithuania', 'Lituanie'),
(128, 442, 'LU', 'LUX', 'Luxembourg', 'Luxembourg'),
(129, 446, 'MO', 'MAC', 'Macao', 'Macao'),
(130, 450, 'MG', 'MDG', 'Madagascar', 'Madagascar'),
(131, 454, 'MW', 'MWI', 'Malawi', 'Malawi'),
(132, 458, 'MY', 'MYS', 'Malaysia', 'Malaisie'),
(133, 462, 'MV', 'MDV', 'Maldives', 'Maldives'),
(134, 466, 'ML', 'MLI', 'Mali', 'Mali'),
(135, 470, 'MT', 'MLT', 'Malta', 'Malte'),
(136, 474, 'MQ', 'MTQ', 'Martinique', 'Martinique'),
(137, 478, 'MR', 'MRT', 'Mauritania', 'Mauritanie'),
(138, 480, 'MU', 'MUS', 'Mauritius', 'Maurice'),
(139, 484, 'MX', 'MEX', 'Mexico', 'Mexique'),
(140, 492, 'MC', 'MCO', 'Monaco', 'Monaco'),
(141, 496, 'MN', 'MNG', 'Mongolia', 'Mongolie'),
(142, 498, 'MD', 'MDA', 'Republic of Moldova', 'République de Moldova'),
(143, 500, 'MS', 'MSR', 'Montserrat', 'Montserrat'),
(144, 504, 'MA', 'MAR', 'Morocco', 'Maroc'),
(145, 508, 'MZ', 'MOZ', 'Mozambique', 'Mozambique'),
(146, 512, 'OM', 'OMN', 'Oman', 'Oman'),
(147, 516, 'NA', 'NAM', 'Namibia', 'Namibie'),
(148, 520, 'NR', 'NRU', 'Nauru', 'Nauru'),
(149, 524, 'NP', 'NPL', 'Nepal', 'Népal'),
(150, 528, 'NL', 'NLD', 'Netherlands', 'Pays-Bas'),
(151, 530, 'AN', 'ANT', 'Netherlands Antilles', 'Antilles Néerlandaises'),
(152, 533, 'AW', 'ABW', 'Aruba', 'Aruba'),
(153, 540, 'NC', 'NCL', 'New Caledonia', 'Nouvelle-Calédonie'),
(154, 548, 'VU', 'VUT', 'Vanuatu', 'Vanuatu'),
(155, 554, 'NZ', 'NZL', 'New Zealand', 'Nouvelle-Zélande'),
(156, 558, 'NI', 'NIC', 'Nicaragua', 'Nicaragua'),
(157, 562, 'NE', 'NER', 'Niger', 'Niger'),
(158, 566, 'NG', 'NGA', 'Nigeria', 'Nigéria'),
(159, 570, 'NU', 'NIU', 'Niue', 'Niué'),
(160, 574, 'NF', 'NFK', 'Norfolk Island', 'Île Norfolk'),
(161, 578, 'NO', 'NOR', 'Norway', 'Norvège'),
(162, 580, 'MP', 'MNP', 'Northern Mariana Islands', 'Îles Mariannes du Nord'),
(163, 581, 'UM', 'UMI', 'United States Minor Outlying Islands', 'Îles Mineures Éloignées des États-Unis'),
(164, 583, 'FM', 'FSM', 'Federated States of Micronesia', 'États Fédérés de Micronésie'),
(165, 584, 'MH', 'MHL', 'Marshall Islands', 'Îles Marshall'),
(166, 585, 'PW', 'PLW', 'Palau', 'Palaos'),
(167, 586, 'PK', 'PAK', 'Pakistan', 'Pakistan'),
(168, 591, 'PA', 'PAN', 'Panama', 'Panama'),
(169, 598, 'PG', 'PNG', 'Papua New Guinea', 'Papouasie-Nouvelle-Guinée'),
(170, 600, 'PY', 'PRY', 'Paraguay', 'Paraguay'),
(171, 604, 'PE', 'PER', 'Peru', 'Pérou'),
(172, 608, 'PH', 'PHL', 'Philippines', 'Philippines'),
(173, 612, 'PN', 'PCN', 'Pitcairn', 'Pitcairn'),
(174, 616, 'PL', 'POL', 'Poland', 'Pologne'),
(175, 620, 'PT', 'PRT', 'Portugal', 'Portugal'),
(176, 624, 'GW', 'GNB', 'Guinea-Bissau', 'Guinée-Bissau'),
(177, 626, 'TL', 'TLS', 'Timor-Leste', 'Timor-Leste'),
(178, 630, 'PR', 'PRI', 'Puerto Rico', 'Porto Rico'),
(179, 634, 'QA', 'QAT', 'Qatar', 'Qatar'),
(180, 638, 'RE', 'REU', 'Réunion', 'Réunion'),
(181, 642, 'RO', 'ROU', 'Romania', 'Roumanie'),
(182, 643, 'RU', 'RUS', 'Russian Federation', 'Fédération de Russie'),
(183, 646, 'RW', 'RWA', 'Rwanda', 'Rwanda'),
(184, 654, 'SH', 'SHN', 'Saint Helena', 'Sainte-Hélène'),
(185, 659, 'KN', 'KNA', 'Saint Kitts and Nevis', 'Saint-Kitts-et-Nevis'),
(186, 660, 'AI', 'AIA', 'Anguilla', 'Anguilla'),
(187, 662, 'LC', 'LCA', 'Saint Lucia', 'Sainte-Lucie'),
(188, 666, 'PM', 'SPM', 'Saint-Pierre and Miquelon', 'Saint-Pierre-et-Miquelon'),
(189, 670, 'VC', 'VCT', 'Saint Vincent and the Grenadines', 'Saint-Vincent-et-les Grenadines'),
(190, 674, 'SM', 'SMR', 'San Marino', 'Saint-Marin'),
(191, 678, 'ST', 'STP', 'Sao Tome and Principe', 'Sao Tomé-et-Principe'),
(192, 682, 'SA', 'SAU', 'Saudi Arabia', 'Arabie Saoudite'),
(193, 686, 'SN', 'SEN', 'Senegal', 'Sénégal'),
(194, 690, 'SC', 'SYC', 'Seychelles', 'Seychelles'),
(195, 694, 'SL', 'SLE', 'Sierra Leone', 'Sierra Leone'),
(196, 702, 'SG', 'SGP', 'Singapore', 'Singapour'),
(197, 703, 'SK', 'SVK', 'Slovakia', 'Slovaquie'),
(198, 704, 'VN', 'VNM', 'Vietnam', 'Viet Nam'),
(199, 705, 'SI', 'SVN', 'Slovenia', 'Slovénie'),
(200, 706, 'SO', 'SOM', 'Somalia', 'Somalie'),
(201, 710, 'ZA', 'ZAF', 'South Africa', 'Afrique du Sud'),
(202, 716, 'ZW', 'ZWE', 'Zimbabwe', 'Zimbabwe'),
(203, 724, 'ES', 'ESP', 'Spain', 'Espagne'),
(204, 732, 'EH', 'ESH', 'Western Sahara', 'Sahara Occidental'),
(205, 736, 'SD', 'SDN', 'Sudan', 'Soudan'),
(206, 740, 'SR', 'SUR', 'Suriname', 'Suriname'),
(207, 744, 'SJ', 'SJM', 'Svalbard and Jan Mayen', 'Svalbard etÎle Jan Mayen'),
(208, 748, 'SZ', 'SWZ', 'Swaziland', 'Swaziland'),
(209, 752, 'SE', 'SWE', 'Sweden', 'Suède'),
(210, 756, 'CH', 'CHE', 'Switzerland', 'Suisse'),
(211, 760, 'SY', 'SYR', 'Syrian Arab Republic', 'République Arabe Syrienne'),
(212, 762, 'TJ', 'TJK', 'Tajikistan', 'Tadjikistan'),
(213, 764, 'TH', 'THA', 'Thailand', 'Thaïlande'),
(214, 768, 'TG', 'TGO', 'Togo', 'Togo'),
(215, 772, 'TK', 'TKL', 'Tokelau', 'Tokelau'),
(216, 776, 'TO', 'TON', 'Tonga', 'Tonga'),
(217, 780, 'TT', 'TTO', 'Trinidad and Tobago', 'Trinité-et-Tobago'),
(218, 784, 'AE', 'ARE', 'United Arab Emirates', 'Émirats Arabes Unis'),
(219, 788, 'TN', 'TUN', 'Tunisia', 'Tunisie'),
(220, 792, 'TR', 'TUR', 'Turkey', 'Turquie'),
(221, 795, 'TM', 'TKM', 'Turkmenistan', 'Turkménistan'),
(222, 796, 'TC', 'TCA', 'Turks and Caicos Islands', 'Îles Turks et Caïques'),
(223, 798, 'TV', 'TUV', 'Tuvalu', 'Tuvalu'),
(224, 800, 'UG', 'UGA', 'Uganda', 'Ouganda'),
(225, 804, 'UA', 'UKR', 'Ukraine', 'Ukraine'),
(226, 807, 'MK', 'MKD', 'The Former Yugoslav Republic of Macedonia', 'L\'ex-République Yougoslave de Macédoine'),
(227, 818, 'EG', 'EGY', 'Egypt', 'Égypte'),
(228, 826, 'GB', 'GBR', 'United Kingdom', 'Royaume-Uni'),
(229, 833, 'IM', 'IMN', 'Isle of Man', 'Île de Man'),
(230, 834, 'TZ', 'TZA', 'United Republic Of Tanzania', 'République-Unie de Tanzanie'),
(231, 840, 'US', 'USA', 'United States', 'États-Unis'),
(232, 850, 'VI', 'VIR', 'U.S. Virgin Islands', 'Îles Vierges des États-Unis'),
(233, 854, 'BF', 'BFA', 'Burkina Faso', 'Burkina Faso'),
(234, 858, 'UY', 'URY', 'Uruguay', 'Uruguay'),
(235, 860, 'UZ', 'UZB', 'Uzbekistan', 'Ouzbékistan'),
(236, 862, 'VE', 'VEN', 'Venezuela', 'Venezuela'),
(237, 876, 'WF', 'WLF', 'Wallis and Futuna', 'Wallis et Futuna'),
(238, 882, 'WS', 'WSM', 'Samoa', 'Samoa'),
(239, 887, 'YE', 'YEM', 'Yemen', 'Yémen'),
(240, 891, 'CS', 'SCG', 'Serbia and Montenegro', 'Serbie-et-Monténégro'),
(241, 894, 'ZM', 'ZMB', 'Zambia', 'Zambie');

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
-- Index pour la table `CDI_PAYS`
--
ALTER TABLE `CDI_PAYS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alpha2` (`alpha2`),
  ADD UNIQUE KEY `alpha3` (`alpha3`),
  ADD UNIQUE KEY `code_unique` (`code`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `CDI_CLIENT`
--
ALTER TABLE `CDI_CLIENT`
  MODIFY `CL_NUMERO` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT pour la table `CDI_PAYS`
--
ALTER TABLE `CDI_PAYS`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
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
