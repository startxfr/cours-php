<?php

$rep= '../../BDPhilia/';
$dirToHave= array('gab','img','inc','inc/conf','inc/lib');
$fileToHave= array('inc/conf/conf.inc.php','index.php');

$oG = $oB = $out = '';
foreach($dirToHave as $d)
{
	if(is_dir($rep.$d))
	$oG.= 'Répertoire '.$d.' trouvé<br/>';
	else
	$oB.= 'Répertoire '.$d.' non-trouvé<br/>';
}
foreach($fileToHave as $f)
{
	if(is_dir($rep.$d))
	$oG.= 'Fichier '.$f.' trouvé<br/>';
	else
	$oB.= 'Fichier '.$f.' non-trouvé<br/>';
}

if($oG != '')
	$out.= '<div style="color:#0f0;font-weight: bold">'.$oG.'</div>';
if($oB != '')
	$out.= '<div style="color:#f00;font-weight: bold">'.$oB.'</div>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Chapitre 1 - Exercice 1</title>
		<meta name="author" content="Christophe"/>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8"/>
	</head>
	<body>
		<?php echo $out; ?>
	</body>
</html>