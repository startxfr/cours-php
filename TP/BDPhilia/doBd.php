<?php

require_once('inc/inc.inc.php');
$ref 		= (array_key_exists('ref',$_POST)) ? $_POST['ref'] : $_GET['ref'];
$tri 		= (array_key_exists('ref',$_POST)) ? $_POST['tri'] : $_GET['tri'];
$fond 	= $_POST['fond'];
$cgv	 	= (array_key_exists('cgv',$_POST) and $_POST['cgv'] != 'ok') ? false : true;


$refIsFound	= false;
foreach($livres as $id => $livre)
	if($id == $ref)
		$refIsFound	= true;

echo htmlBegin($livres[$ref]['titre'],$lang,'rechercheBd.php',HTML_FORMAT);
if($cgv)
{
	if($refIsFound)
		echo bdFiche($ref,$lang,$fond);
	else  echo bdInventaire($lang,$fond);
}
else
{ ?>
	<div class="important"> <?= $libelle['CGVFalse'][$lang].' '.$livres[$ref]['titre'] ?></div>
<?php
}
echo htmlEnd();
?>