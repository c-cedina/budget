create database 

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ;

CREATE TABLE `depense` (
  `id` int NOT NULL AUTO_INCREMENT,
  `montant` float DEFAULT NULL,
  `necessite` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `id_utilisateurs` int DEFAULT NULL,
  `categorie` varchar(30) DEFAULT NULL,
  `titre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateurs` (`id_utilisateurs`),
  CONSTRAINT `depense_ibfk_1` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`)
) ;
