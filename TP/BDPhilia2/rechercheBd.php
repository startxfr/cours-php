<?php
// On importe la librairie et on charge les fonctions utiles
require_once('inc/inc.inc.php');	

echo htmlBegin(
	$menu['rechercheBd.php'][$lang]['title'],// on passe un premier paramètre qui est le titre
	$lang,//en second param la langue
	'rechercheBd.php',// la clef du menu à selectionner
	HTML_FORMAT// la constante qui décrit si je veux être en XHTML ou HTML
);
// Comme nous sommes dans rechercheBd, on affiche un formulaire
echo formSearch($lang);
// puis on ferme notre html
echo htmlEnd(); 
?>