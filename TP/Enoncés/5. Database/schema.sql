CREATE DATABASE `bdphilia` ;
CREATE USER 'userBdphilia'@'%' IDENTIFIED BY 'passBdphilia';
GRANT USAGE ON * . * TO 'userBdphilia'@'%' IDENTIFIED BY 'passBdphilia' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;
GRANT ALL PRIVILEGES ON `bdphilia` . * TO 'userBdphilia'@'%' WITH GRANT OPTION ;
CREATE TABLE IF NOT EXISTS `livres` (
`id` INT( 4 ) UNSIGNED NOT NULL AUTO_INCREMENT ,
`titre` VARCHAR( 128 ) NOT NULL ,
`auteur` VARCHAR( 64 ) NOT NULL ,
`editeur` VARCHAR( 32 ) NOT NULL ,
`prix` DECIMAL( 9, 2 ) UNSIGNED NOT NULL ,
`stock` INT( 4 ) UNSIGNED NOT NULL ,
`sortie` YEAR NOT NULL ,
PRIMARY KEY ( `id` )
) ENGINE = MYISAM DEFAULT CHARSET=utf8 COMMENT = 'table contenant les BD';
ALTER TABLE `livres` ADD `ref` VARCHAR( 16 ) NOT NULL AFTER `id` ,ADD UNIQUE (ref);


CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(4) unsigned NOT NULL auto_increment,
  `mail` varchar(128) NOT NULL,
  `dossier` varchar(8) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `paiement` varchar(1) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `dossier` (`dossier`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Table des commandes' AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `commande_livres` (
  `commande_id` int(4) unsigned NOT NULL,
  `livres_id` int(4) unsigned NOT NULL,
  `qte` int(4) unsigned NOT NULL,
  `prix_unitaire_ht` decimal(9,2) NOT NULL,
  PRIMARY KEY  (`commande_id`,`livres_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='table de jonction entre les livres commandé et la commande';

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(4) NOT NULL auto_increment,
  `url` varchar(128) NOT NULL,
  `desc_fr` varchar(64) NOT NULL,
  `desc_en` varchar(64) NOT NULL,
  `titre_fr` varchar(64) NOT NULL,
  `titre_en` varchar(64) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='table du menu' AUTO_INCREMENT=5 ;


INSERT INTO `commande` (`id`, `mail`, `dossier`, `pass`, `total`, `paiement`) VALUES
(1, 'clarue@startx.fr', '45jh', 'dbc4d84b', 1000.00, 'C'),
(2, 'v.coste@inexine.fr', 'fg4e', '50da419c', 152.21, 'V');

INSERT INTO `commande_livres` (`commande_id`, `livres_id`, `qte`, `prix_unitaire_ht`) VALUES
(2, 12, 2, 122.05),
(2, 14, 5, 400.00),
(2, 17, 1, 145.45),
(2, 16, 24, 18.20),
(1, 11, 2, 122.05),
(1, 1, 5, 400.00),
(1, 16, 1, 145.45),
(2, 19, 24, 18.20);

INSERT INTO `menu` (`id`, `url`, `desc_fr`, `desc_en`, `titre_fr`, `titre_en`) VALUES
(1, 'index.php', 'Accueil', 'Accueil', 'Homepage', 'Homepage'),
(2, 'connexion.php', 'Connexion', 'Connexion', 'Connexion', 'Connexion'),
(3, 'rechercheBd.php', 'Rechercher', 'Rechercher', 'Search', 'List'),
(4, 'panier.php', 'Panier', 'Panier d''achat', 'Cart', 'Shopping Cart');