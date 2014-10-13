<?php

$xmlVersion	  = '1.0';
$xmlEncoding  = 'UTF-8';
$authorizedLang= array('fr','en');
$projet	  = 'BDPhilia';
$proprietaire = 'ORSYS';
$auteur	  = 'Christophe';
$css		  = 'css.css';
$tauxTva[1]	  = 5.5;
$tauxTva[2]	  = 19.6;
define(TVA_APPLICABLE,1);
define(HTML_FORMAT,'xhtml');
define(NUMBER_SEP_DEC,',');
define(NUMBER_SEP_MIL,' ');
$lang = 'fr';


$footer = "&copy;2009 - $proprietaire";
$titre  = 'Bienvenue sur BDPhilia';


$dbConfig[0] = array(
	'type' => 'mysql',
	'host' => 'localhost',
	'user' => 'dev',
	'pass' => 'dev',
	'base' => 'formation_phh_bdphilia'
);
$dbConfig[1] = array(
	'type' => 'mssql',
	'host' => 'localhost',
	'user' => 'userBdphilia',
	'pass' => 'passBdphilia',
	'base' => 'bdphilia'
);

?>