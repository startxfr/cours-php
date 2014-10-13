<?php

	/**
	 * Fonction d'affichage de l'en-tête Html
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @return  une chaine de charactère
	 */
	function htmlBegin($titre,$lang,$select = '',$mode = 'xhtml')
	{
		if($mode == 'html')
			$msg = htmlBeginHtml($titre,$lang);
		else	$msg = htmlBeginXhtml($titre,$lang);
		$msg.= '<div id="Btop">'.htmlMenu($select,$lang).'</div><div id="Bmiddle">';
		return $msg;
	}

	/**
	 * Fonction d'affichage de l'en-tête Html en mode Xhtml
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @return  une chaine de charactère
	 */
	function htmlBeginXhtml($titre,$lang)
	{
		global $xmlVersion;
		global $xmlEncoding;
		global $auteur;
		global $css;
		$msg = '<?xml version="'.$xmlVersion.'" encoding="'.$xmlEncoding.'"?>';
		$msg.= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
		$msg.= '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="'.$lang.'" lang="'.$lang.'">';
		$msg.= '<head>
			<title>'.$titre.'</title>
			<meta name="author" content="'.$auteur.'"/>
			<meta http-equiv="content-type" content="application/xhtml+xml; charset='.$xmlEncoding.'"/>
			<link href="'.$css.'" rel="stylesheet" type="text/css" media="screen"/>
		</head><body>';
		return $msg;
	}

	/**
	 * Fonction d'affichage de l'en-tête Html en mode html 4.0
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @return  une chaine de charactère
	 */
	function htmlBeginHtml($titre,$lang)
	{
		global $xmlVersion;
		global $xmlEncoding;
		global $auteur;
		global $css;
		$msg = '<html>';
		$msg.= '<head>
			<title>'.$titre.'</title>
			<meta name="author" content="'.$auteur.'"/>
			<link href="'.$css.'" rel="stylesheet" type="text/css" media="screen"/>
		</head><body>';
		return $msg;
	}



	/**
	 * Fonction de création du menu
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @return  une chaine de charactère
	 */
	function htmlMenu($select,$lang)
	{
		global $menu;
		$msg = '<div id="topMenu"><ul>';
		foreach($menu as $url => $entree)
		{
			if($url == $select)
				$msg.= '<li><a href="'.$url.'" title="'.$entree[$lang]['title'].'" class="on">'.$entree[$lang]['desc'].'</a></li>';
			else  $msg.= '<li><a href="'.$url.'" title="'.$entree[$lang]['title'].'">'.$entree[$lang]['desc'].'</a></li>';
		}
		$msg.= '</ul></div>';
		return $msg;
	}


	/**
	 * Fonction d'affichage de la fin du corps Html
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @return  une chaine de charactère
	 */
	function htmlEnd()
	{
		global $footer;
		return '</div><div id="Bbottom">'.$footer.'</div></body></html>';
	}



?>