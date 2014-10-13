<?php
// On importe la librairie et on charge les fonctions utiles
require_once('inc/inc.inc.php');

// On analyse les variables provenant du formulaire
$ref 		= (array_key_exists('ref',$_POST)) ? $_POST['ref'] : $_GET['ref'];
$tri 		= (array_key_exists('ref',$_POST)) ? $_POST['tri'] : $_GET['tri'];
$fond 	= $_POST['fond'];

$cgv	 	= (array_key_exists('cgv',$_POST) and $_POST['cgv'] == 'ok') ? true : false;


$refIsFound	= false;
foreach($livres as $id => $livre)
	if($id == $ref)
		$refIsFound	= true;

echo htmlBegin(
	$menu[$ref][$lang]['title'],// on passe un premier paramètre qui est le titre
	$lang,//en second param la langue
	$ref,// la clef du menu à selectionner
	HTML_FORMAT// la constante qui décrit si je veux être en XHTML ou HTML
);
// gestion de la validation des conditions générales de vnete
if($cgv) {
	if($refIsFound)
		echo bdFiche($ref,$lang,$fond);
	else  echo bdInventaire($lang,$fond);
}
else { ?>
	<div class="important"> <?= $libelle['CGVFalse'][$lang].' '.$livres[$ref]['titre'] ?></div>
<?php
}

// on affiche la fin de notre document html
echo htmlEnd();
?>