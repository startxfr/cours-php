<?php
	$xmlVersion	  = '1.0';
	$xmlEncoding  = 'UTF-8';
	$lang		  = 'fr';
	$projet		  = 'BDPhilia';
	$proprietaire = 'Car&Boat';
	$auteur		  = 'Christophe';
	$css		  = 'css.css';

	$footer = "&copy;2009 - $proprietaire";
	$titre  = 'Recherche de BD';
	
	
	$menu =array();
	$menu['index.php']['fr'] =array('desc' => 'Accueil','title' => 'Accueil');
	$menu['index.php']['en'] =array('desc' => 'Homepage','title' => 'Homepage');
	$menu['connexion.php']['fr'] =array('desc' => 'Connexion','title' => 'Connexion');
	$menu['connexion.php']['en'] =array('desc' => 'Connexion','title' => 'Connexion');
	$menu['rechercheBd.php']['fr'] =array('desc' => 'Rechercher','title' => 'Liste');
	$menu['rechercheBd.php']['en'] =array('desc' => 'Search','title' => 'List');
	$menu['panier.php']['fr'] =array('desc' => 'Panier','title' => 'Panier d\'achat');
	$menu['panier.php']['en'] =array('desc' => 'Cart','title' => 'Shopping Cart');
	
	

echo '<?xml version="'.$xmlVersion.'" encoding="'.$xmlEncoding.'"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
	<head>
		<title><?php echo $titre; ?></title>
		<meta name="author" content="Christophe"/>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=<?php echo $xmlEncoding; ?>"/>
		<link href="<?php echo $css; ?>" rel="stylesheet" type="text/css" media="screen"/>
	</head>
	<body>
		<div id="Btop">
			<div id="topMenu">
				<ul>
					<li><a href="index.php" title="<?php echo $menu['index.php'][$lang]['title']; ?>"><?php echo $menu['index.php'][$lang]['desc']; ?></a></li>
					<li><a href="connexion.php" title="<?php echo $menu['connexion.php'][$lang]['title']; ?>"><?php echo $menu['connexion.php'][$lang]['desc']; ?></a></li>
					<li><a href="rechercheBd.php" class="on" title="<?php echo $menu['rechercheBd.php'][$lang]['title']; ?>"><?php echo $menu['rechercheBd.php'][$lang]['desc']; ?></a></li>
					<li><a href="panier.php" title="<?php echo $menu['panier.php'][$lang]['title']; ?>"><?php echo $menu['panier.php'][$lang]['desc']; ?></a></li>
				</ul>
			</div>
		</div>
		<div id="Bmiddle">
			<h1><?= $titre ?></h1>
			<form action="doBd.php" method="post">
				<label>Référence :</label><div><input type="text" name="ref" value="BD000001"></div>				
				<label>Langue :</label><div><input type="radio" name="lang" value="fr" checked="checked"/> Français
				<input type="radio" name="lang" value="en"/> Anglais</div>				
				<label>Référence :</label><div>
					<select name="fond" size="0">
						<option value="ffc" style="background-color: #ffc">Jaune</option>
						<option value="fcc" style="background-color: #fcc">Rose</option>
					</select></div>
				<input value="Rechercher" type="submit"/>
				<br class="clear"/>
			</form>
			
		</div>
		<div id="Bbottom">
			<?php echo $footer; ?>
		</div>	
	</body>
</html>