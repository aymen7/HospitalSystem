-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `servicehopital`;
CREATE DATABASE `servicehopital` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `servicehopital`;

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE `chambre` (
  `idChambre` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nombreLits` int(11) NOT NULL,
  PRIMARY KEY (`idChambre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `chambre` (`idChambre`, `numero`, `nombreLits`) VALUES
(1,	'101',	4),
(2,	'102',	3);

DROP TABLE IF EXISTS `consultation`;
CREATE TABLE `consultation` (
  `idConsultation` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `rapport` text COLLATE utf8_unicode_ci NOT NULL,
  `idPatient` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idConsultation`),
  KEY `idPatient` (`idPatient`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `FK_964685A6A63BC19` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`),
  CONSTRAINT `FK_964685A6FE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `consultation` (`idConsultation`, `date`, `rapport`, `idPatient`, `idUser`) VALUES
(15,	'2017-12-30 20:14:12',	'n importe quoi ',	1,	2),
(16,	'2017-12-30 20:14:23',	'n importe quoi ',	1,	2),
(18,	'2017-12-30 20:32:10',	'rien',	4,	2),
(19,	'2018-01-04 19:31:51',	'Aze aze aze aze aze aze ze aze aze ',	4,	2),
(20,	'2018-01-04 23:03:08',	'rien',	7,	NULL),
(21,	'2018-01-04 23:04:44',	'r',	5,	NULL),
(22,	'2018-01-04 23:05:57',	'a',	5,	2);

DROP TABLE IF EXISTS `examen`;
CREATE TABLE `examen` (
  `idExamen` bigint(20) NOT NULL AUTO_INCREMENT,
  `effectue` tinyint(1) NOT NULL,
  `idConsultation` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`idExamen`),
  KEY `idConsultation` (`idConsultation`),
  CONSTRAINT `FK_514C8FECC8D82157` FOREIGN KEY (`idConsultation`) REFERENCES `consultation` (`idConsultation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `examen` (`idExamen`, `effectue`, `idConsultation`) VALUES
(1,	0,	18),
(2,	0,	19);

DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade` (
  `idGrade` int(11) NOT NULL AUTO_INCREMENT,
  `grade` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`idGrade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `grade` (`idGrade`, `grade`, `type`) VALUES
(1,	'Externe',	0),
(2,	'Interne',	0),
(3,	'Chef de Clinique',	0),
(4,	'Médecin Attaché',	0),
(5,	'Vacataire',	0),
(6,	'Praticien Hospitalier',	0),
(7,	'Chef de service ',	0),
(8,	'Maître de Conférences',	0),
(9,	'Professeur',	0),
(10,	'Infirmier ',	1),
(11,	'Infirmier principal',	1),
(12,	'Infirmier chef',	1),
(13,	'Chef de Clinique',	0),
(14,	'Chef de Clinique',	0),
(15,	'Chef de Clinique',	0),
(16,	'Chef de Clinique',	0),
(17,	'Chef de Clinique',	0),
(18,	'Chef de Clinique',	0),
(19,	'Chef de Clinique',	0),
(20,	'Chef de Clinique',	0),
(21,	'Chef de Clinique',	0),
(22,	'Chef de Clinique',	0),
(23,	'Chef de Clinique',	0),
(24,	'Chef de Clinique',	0),
(25,	'Chef de Clinique',	0),
(26,	'Chef de Clinique',	0),
(27,	'Chef de Clinique',	0),
(28,	'Chef de Clinique',	0),
(30,	'Chef de Clinique',	0),
(31,	'Chef de Clinique',	0);

DROP TABLE IF EXISTS `infirmier`;
CREATE TABLE `infirmier` (
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT `FK_3D1DD71AFE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `infirmier` (`idUser`) VALUES
(14);

DROP TABLE IF EXISTS `ligneordonnance`;
CREATE TABLE `ligneordonnance` (
  `idLigneOrdonnance` int(11) NOT NULL AUTO_INCREMENT,
  `medicament` varchar(60) CHARACTER SET utf8 NOT NULL,
  `quantite` int(11) NOT NULL,
  `idOrdonnance` int(11) DEFAULT NULL,
  `remarque` varchar(100) NOT NULL,
  PRIMARY KEY (`idLigneOrdonnance`),
  KEY `idOrdonnance` (`idOrdonnance`),
  CONSTRAINT `ligneordonnance_ibfk_1` FOREIGN KEY (`idOrdonnance`) REFERENCES `ordonnance` (`idOrdonnance`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ligneordonnance` (`idLigneOrdonnance`, `medicament`, `quantite`, `idOrdonnance`, `remarque`) VALUES
(40,	'paracétamol',	2,	14,	'1 c à s avnt'),
(41,	'Iburofène',	1,	14,	'1 c apr'),
(42,	'Gaviscon',	1,	14,	'1 c à s avnt'),
(43,	'paracétamol',	2,	15,	'1 c à s avnt'),
(44,	'Iburofène',	1,	15,	'1 c apr'),
(45,	'Gaviscon',	1,	15,	'1 c à s avnt'),
(46,	'paracétamol',	1,	16,	'1 c avnt'),
(47,	'paracétamol',	3,	17,	'1 c avnt'),
(48,	'Gaviscon',	1,	18,	'1 c à s avnt');

DROP TABLE IF EXISTS `lit`;
CREATE TABLE `lit` (
  `idLit` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idChambre` int(11) DEFAULT NULL,
  `idPatient` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLit`),
  KEY `idChambre` (`idChambre`),
  KEY `idPatient` (`idPatient`),
  CONSTRAINT `FK_5DDB8E9DA63BC19` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`),
  CONSTRAINT `FK_5DDB8E9DD5B08F0D` FOREIGN KEY (`idChambre`) REFERENCES `chambre` (`idChambre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `lit` (`idLit`, `dateDebut`, `dateFin`, `idChambre`, `idPatient`) VALUES
(1,	'2017-12-24',	'2018-01-28',	1,	1),
(2,	'2017-12-24',	'2017-12-24',	1,	7),
(3,	'2018-01-11',	'2018-02-19',	1,	4),
(4,	'2018-01-01',	'2018-01-10',	1,	1);

DROP TABLE IF EXISTS `maladiechronique`;
CREATE TABLE `maladiechronique` (
  `idMaladie` int(11) NOT NULL AUTO_INCREMENT,
  `maladie` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `idPatient` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMaladie`),
  KEY `idPatient` (`idPatient`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `FK_DB0126E5A63BC19` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`),
  CONSTRAINT `FK_DB0126E5FE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `medecin`;
CREATE TABLE `medecin` (
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT `FK_D4676A5AFE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `medecin` (`idUser`) VALUES
(2),
(6),
(7),
(8),
(11),
(12),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(32),
(33);

DROP TABLE IF EXISTS `ordonnance`;
CREATE TABLE `ordonnance` (
  `idOrdonnance` int(11) NOT NULL AUTO_INCREMENT,
  `idConsultation` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`idOrdonnance`),
  UNIQUE KEY `UNIQ_924B326CC8D82157` (`idConsultation`),
  KEY `idConsultation` (`idConsultation`),
  CONSTRAINT `FK_924B326CC8D82157` FOREIGN KEY (`idConsultation`) REFERENCES `consultation` (`idConsultation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `ordonnance` (`idOrdonnance`, `idConsultation`) VALUES
(14,	15),
(15,	16),
(16,	18),
(17,	19),
(18,	20);

DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient` (
  `idPatient` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dateDeNaissance` date NOT NULL,
  `numTel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nss` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPatient`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `FK_1ADAD7EBFE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `patient` (`idPatient`, `nom`, `prenom`, `dateDeNaissance`, `numTel`, `nss`, `idUser`) VALUES
(1,	'Mekhzem',	'Reda',	'2017-11-02',	'0797870208',	'2154152312',	2),
(4,	'Zennagui',	'Ibrahim',	'2017-11-20',	'0545787842',	'878454516658951',	2),
(5,	'Tabet ',	'Salim',	'2017-11-20',	'0541215748',	'8745512115488',	2),
(6,	'Bali',	'Hichem',	'2017-11-20',	'0545788952',	'2115154121212',	6),
(7,	'Arib',	'Oussama',	'2017-01-12',	'45454545',	'5141212154',	7);

DROP TABLE IF EXISTS `secretaire`;
CREATE TABLE `secretaire` (
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT `FK_32E8C100FE6E88D7` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `specialite`;
CREATE TABLE `specialite` (
  `idSpecialite` int(11) NOT NULL AUTO_INCREMENT,
  `specialite` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`idSpecialite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `specialite` (`idSpecialite`, `specialite`, `type`) VALUES
(1,	'cardiologie et maladies vascul',	0),
(2,	'Chirurgie générale ',	0),
(3,	'Dermatologie',	0),
(4,	'Gastro-entérologie et hépatolo',	0),
(5,	'Médecine générale',	0),
(6,	'Pédiatrie',	0),
(7,	'Anesthésie-réanimation',	1),
(8,	'Neurologie',	0),
(9,	'Puéricultrice',	1),
(10,	'Infirmier de bloc opératoire',	1),
(11,	'Chirurgie générale ',	0),
(12,	'Chirurgie générale ',	0),
(13,	'Chirurgie générale ',	0),
(14,	'Chirurgie générale ',	0),
(15,	'Chirurgie générale ',	0),
(16,	'Chirurgie générale ',	0),
(17,	'Chirurgie générale ',	0),
(18,	'Chirurgie générale ',	0),
(19,	'Chirurgie générale ',	0),
(20,	'Chirurgie générale ',	0),
(21,	'Chirurgie générale ',	0),
(22,	'Chirurgie générale ',	0),
(23,	'Chirurgie générale ',	0),
(24,	'Chirurgie générale ',	0),
(25,	'Chirurgie générale ',	0),
(26,	'Chirurgie générale ',	0),
(28,	'Chirurgie générale ',	0),
(29,	'Chirurgie générale ',	0);

DROP TABLE IF EXISTS `typeexamen`;
CREATE TABLE `typeexamen` (
  `idTypeExamen` bigint(20) NOT NULL AUTO_INCREMENT,
  `analyse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `resultat` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idExamen` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`idTypeExamen`),
  KEY `idExamen` (`idExamen`),
  CONSTRAINT `FK_D578E487325D2776` FOREIGN KEY (`idExamen`) REFERENCES `examen` (`idExamen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `typeexamen` (`idTypeExamen`, `analyse`, `resultat`, `idExamen`) VALUES
(1,	'irm',	NULL,	1),
(2,	'eco',	NULL,	1),
(3,	'IRM',	NULL,	2);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `numTel` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `idSpecialite` int(11) DEFAULT NULL,
  `idGrade` int(11) DEFAULT NULL,
  `poste` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idSpecialite` (`idSpecialite`),
  KEY `idGrade` (`idGrade`),
  CONSTRAINT `FK_8D93D6494E9EED29` FOREIGN KEY (`idGrade`) REFERENCES `grade` (`idGrade`),
  CONSTRAINT `FK_8D93D6496522E22B` FOREIGN KEY (`idSpecialite`) REFERENCES `specialite` (`idSpecialite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`idUser`, `username`, `password`, `nom`, `prenom`, `numTel`, `idSpecialite`, `idGrade`, `poste`) VALUES
(1,	'yacine',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'Hamza Cherif',	'Mohammed Yacine',	'0797870208',	1,	4,	'S'),
(2,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	29,	31,	'M'),
(6,	'djelloul.sekkal',	'0000',	'SEKKAL',	'DJELLOUL',	'45454545454',	5,	2,	'M'),
(7,	'benali.benosmane',	'0000',	'BENOSMANE',	'BENALI',	'000000',	4,	5,	'M'),
(8,	'abdelghani.nebia',	'0000',	'NEBIA',	'ABDELGHANI',	'0000000',	3,	6,	'M'),
(11,	'fouad.benkalfat',	'0000',	'BENKALFAT',	'IBRAHIM',	'05662124',	5,	5,	'M'),
(12,	'bouabdallah.wahid ',	'0000',	'BOUABDALLAH',	'WAHID',	'0547842124',	6,	8,	'M'),
(14,	'benyelles.hichem',	'$2y$10$4e9zunPzw2xxNlquO6DG3.S77fTCQmmKn/xJBX2minLtihDtGl1pS',	'BENYELLES',	'HICHEM',	'14575752212',	7,	11,	'I'),
(15,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	11,	13,	'M'),
(16,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	12,	14,	'M'),
(17,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	13,	15,	'M'),
(18,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	14,	16,	'M'),
(19,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	15,	17,	'M'),
(20,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	16,	18,	'M'),
(21,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	17,	19,	'M'),
(22,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	18,	20,	'M'),
(23,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	19,	21,	'M'),
(24,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	20,	22,	'M'),
(25,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	21,	23,	'M'),
(26,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	22,	24,	'M'),
(27,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	23,	25,	'M'),
(28,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	24,	26,	'M'),
(29,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	25,	27,	'M'),
(30,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	26,	28,	'M'),
(32,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	28,	30,	'M'),
(33,	'aymen',	'$2y$10$aF4BYu8kzlylbw9BgZIUiuq7uYJtTQYOo9rIy1nPBSupVg3Gn.4FC',	'BENNOUR',	'AYMEN',	'0454784545',	29,	31,	'M');

-- 2018-01-21 20:01:10
