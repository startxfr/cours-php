Dans rechercheBd.php:

<label>CGV :</label><div>J'acèpte les conditions générales de vente : <input type="checkbox" name="cgv" value="ok" checked="checked"/></div>








Dans doBd.php:

<?php
	$xmlVersion	  = '1.0';
	$xmlEncoding  = 'UTF-8';
	$lang		  = 'fr';
	$projet	  = 'BDPhilia';
	$proprietaire = 'Car&Boat';
	$auteur	  = 'Christophe';
	$css		  = 'css.css';
	define(TVA,5.5);

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



	$libelle =array();
	$libelle['titre'] 	= array('fr' => 'Titre',	'en' => 'Title');
	$libelle['auteur']	= array('fr' => 'Auteur',	'en' => 'Author');
	$libelle['editeur'] 	= array('fr' => 'Editeur',	'en' => 'Publisher');
	$libelle['prixHT'] 	= array('fr' => 'Prix HT',	'en' => 'Taxable');
	$libelle['prixTVA'] 	= array('fr' => 'TVA',		'en' => 'VAT');
	$libelle['prixTTC'] 	= array('fr' => 'Prix TTC',	'en' => 'Total');
	$libelle['sortie']	= array('fr' => 'Sortie',	'en' => 'Released');

	$libelle['CGVFalse']	= array('fr' => 'Vous n\'avez pas validé les conditions générales de vente.<br/> Merci de confirmer votre accord avant de visualiser la fiche',
						  'en' => 'You did not validate the general terms of sale.<br/> Thank you to confirm your agreement before visualizing the cartoon');



	$livres =array();
	$livres['BD000001'] =array(
		'titre'		=> 'Lucky Luke -Ma Dalton',
		'auteur'	=> 'Morris/Goscinny',
		'editeur'	=> 'Dargaud',
		'prix' 	=> 50.10,
		'stock' 	=> 10,
		'sortie' 	=> 1971);
	$livres['BD000002'] =array(
		'titre'		=> 'Lucky Luke -Les Dalton se rachètent',
		'auteur'	=> 'Morris/Goscinny',
		'editeur'	=> 'Dargaud',
		'prix' 		=> 75.12,
		'stock' 	=> 14,
		'sortie' 	=> 1965);
	$livres['BD000003'] =array(
		'titre'		=> 'Lucky Luke - Le cuisinier français',
		'auteur'	=> 'Morris/Guylouis',
		'editeur'	=> 'Lucky Comics',
		'prix' 	=> 20.00,
		'stock' 	=> 50,
		'sortie' 	=> 2003);
	$livres['BD000004'] =array(
		'titre'		=> 'Astérix le gaulois',
		'auteur'	=> 'Uderzo/Goscinny',
		'editeur'	=> 'Dargaud',
		'prix' 	=> 1000.00,
		'stock' 	=> 1,
		'sortie' 	=> 1961);
	$livres['BD000005'] =array(
		'titre'		=> 'Astérix et les Goths',
		'auteur'	=> 'Uderzo/Goscinny',
		'editeur'	=> 'Dargaud',
		'prix' 	=> 900.00,
		'stock' 	=> 0,
		'sortie' 	=> 1963);
	$livres['BD000006'] =array(
		'titre'		=> 'Tanguy et Laverdure – L\'école des aigles',
		'auteur'	=> 'Uderzo/Charlier',
		'editeur'	=> 'Dargaud',
		'prix' 	=> 15.30,
		'stock' 	=> 4,
		'sortie' 	=> 1996);
	$livres['BD000007'] =array(
		'titre'		=> 'Blueberry - La tribu fantôme',
		'auteur'	=> 'Giraud/Charlier',
		'editeur'	=> 'Hachette',
		'prix' 	=> 5.80,
		'stock' 	=> 2,
		'sortie' 	=> 1982);
	$livres['BD000008'] =array(
		'titre'		=> 'Largo Winch - La voie et la vertu',
		'auteur'	=> 'Van Hamme/Francq',
		'editeur'	=> 'Dupuis',
		'prix' 	=> 18.90,
		'stock' 	=> 52,
		'sortie' 	=> 2008);


	$ref 		= $_POST['ref'];
	$lang 	= $_POST['lang'];
	$fond 	= $_POST['fond'];
	$cgv	 	= ($_POST['cgv'] == 'ok') ? true : false;

	$ht		= $livres[$ref]['prix'];
	$tva		= $ht * TVA/100;
	$ttc		= $ht + $tva;



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
			<h1><?php $livres[$ref]['titre'] ?></h1>
			<?php  if($cgv) : ?>
				<table style="background-color: #<?php echo $fond; ?>" width="100%">
					<tr>
						<td rowspan="7"style="text-align: center"><img src="img/bd/<?php echo $ref; ?>.jpg" style="width: 100px;"/></td>
						<th><?php echo $libelle['titre'][$lang]; ?></th>
						<td><?php echo $livres[$ref]['titre']; ?></td>
					</tr>
					<tr>
						<th><?php echo $libelle['auteur'][$lang]; ?></th>
						<td><?php echo $livres[$ref]['auteur']; ?></td>
					</tr>
					<tr>
						<th><?php echo $libelle['editeur'][$lang]; ?></th>
						<td><?php echo $livres[$ref]['editeur']; ?></td>
					</tr>
					<tr>
						<th><?php echo $libelle['sortie'][$lang]; ?></th>
						<td><?php echo $livres[$ref]['sortie']; ?></td>
					</tr>
					<tr>
						<th><?php echo $libelle['prixHT'][$lang]; ?></th>
						<td><?php echo $ht; ?> &euro;</td>
					</tr>
					<tr>
						<th><?php echo $libelle['prixTVA'][$lang]; ?></th>
						<td><?php echo $tva; ?> &euro;</td>
					</tr>
					<tr>
						<th><?php echo $libelle['prixTTC'][$lang]; ?></th>
						<td><?php echo $ttc; ?> &euro;</td>
					</tr>
				</table>
			<?php else : ?>
				<div class="important"> <?= $libelle['CGVFalse'][$lang].' '.$livres[$ref]['titre'] ?></div>
			<?php endif; ?>
		</div>
		<div id="Bbottom">
			<?php echo $footer; ?>
		</div>
	</body>
</html>