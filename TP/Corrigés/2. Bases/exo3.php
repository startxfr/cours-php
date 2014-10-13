<?php
	$xmlVersion	  = '1.0';
	$xmlEncoding  = 'UTF-8';
	$lang		  = 'fr';
	$projet		 = 'BDPhilia';
	$proprietaire = 'Car&Boat';
	$auteur	  = 'Christophe';
	$css		  = 'css.css';

	$footer = "&copy;2009 - $proprietaire";
	$titre  = 'Bienvenue sur '.$projet;

echo '<?xml version="'.$xmlVersion.'" encoding="'.$xmlEncoding.'"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
	<head>
		<title><?php echo $titre; ?></title>
		<meta name="author" content="<?php echo $auteur; ?>"/>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=<?php echo $xmlEncoding; ?>"/>
		<link href="<?php echo $css; ?>" rel="stylesheet" type="text/css" media="screen"/>
	</head>
	<body>
		<div id="Btop">
			<div id="topMenu">
				<ul>
					<li><a href="index.php" title="Accueil">Accueil</a></li>
					<li><a href="connexion.php" title="Connexion">Connexion</a></li>
					<li><a href="rechercheBd.php" title="Liste">Rechercher</a></li>
					<li><a href="panier.php" title="Liste">Panier</a></li>
				</ul>
			</div>
		</div>
		<div id="Bmiddle">
			<h1><?= $titre ?></h1>
		</div>
		<div id="Bbottom">
			<?php echo $footer; ?>
		</div>
	</body>
</html>