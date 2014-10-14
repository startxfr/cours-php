<?php
// On importe la librairie et on charge les fonctions utiles
require_once('inc/inc.inc.php');

echo htmlBegin(
	$menu['panier.php'][$lang]['title'],// on passe un premier paramètre qui est le titre
	$lang,//en second param la langue
	'panier.php',// la clef du menu à selectionner
	HTML_FORMAT// la constante qui décrit si je veux être en XHTML ou HTML
);


// on affiche la fin de notre document html
echo htmlEnd();
?>