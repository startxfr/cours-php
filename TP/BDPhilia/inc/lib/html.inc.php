<?php

	/**
	 * Fonction générale d'affichage de l'en-tête Html
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @param  $titre le titre de la page
	 * @param  $lang la langue à utiliser
	 * @param  $select le menu selectionné
	 * @param  $mode le mode d'affichage
	 * @return  une chaine de charactère
	 */
	function htmlBegin($titre,$lang,$select = '',$mode = 'xhtml')
	{
		if($mode == 'html')
			$msg = htmlBeginHtml($titre,$lang);
		else	$msg = htmlBeginXhtml($titre,$lang);
		$msg.= '<div id="Btop">'.htmlMenu($select,$lang).'</div><div id="Bmiddle">';
		$msg.= '<h1>'.$titre.'</h1>';
		return $msg;
	}

	/**
	 * Fonction d'affichage de l'en-tête Html en mode Xhtml
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @param  $titre le titre de la page
	 * @param  $lang la langue à utiliser
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
		$msg.= '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="'.htmlentities($lang).'" lang="'.$lang.'">';
		$msg.= '<head>
			<title>'.htmlentities($titre).'</title>
			<meta name="author" content="'.htmlentities($auteur).'"/>
			<meta http-equiv="content-type" content="application/xhtml+xml; charset='.htmlentities($xmlEncoding).'"/>
			<link href="'.$css.'" rel="stylesheet" type="text/css" media="screen"/>
		</head><body>';
		return $msg;
	}

	/**
	 * Fonction d'affichage de l'en-tête Html en mode html 4.0
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @param  $titre le titre de la page
	 * @param  $lang la langue à utiliser
	 * @return  une chaine de charactère
	 */
	function htmlBeginHtml($titre,$lang)
	{
		global $xmlVersion;
		global $xmlEncoding;
		global $auteur;
		global $css;
		$msg = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"><html>';
		$msg.= '<head>
			<title>'.htmlentities($titre).'</title>
			<meta name="author" content="'.htmlentities($auteur).'"/>
			<link href="'.$css.'" rel="stylesheet" type="text/css" media="screen"/>
		</head><body>';
		return $msg;
	}



	/**
	 * Fonction de création du menu
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @param  $lang la langue à utiliser
	 * @param  $select le menu selectionné
	 * @return  une chaine de charactère
	 */
	function htmlMenu($select,$lang)
	{
		$menu = doSqlSelect(0,'SELECT * FROM menu');
		$lang_id = '_'.$lang;
		$msg = '<div id="topMenu"><ul>';
		foreach($menu as $k => $entree)
		{
			$css_on = ($select == $entree['url']) ? ' class="on"' : '';
			$titre = htmlentities($entree['titre'.$lang_id]);
			$desc = htmlentities(strtoupper($entree['desc'.$lang_id]));
			$msg.= '<li><a href="'.$entree['url'].'" title="'.$titre.'"'.$css_on.'>'.$desc.'</a></li>';
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
		global $footer,$generate_time_start;
		$date = ' - Last update: '.strftime('%d %B %Y',strtotime("-4 day"));
		$generate_time_end = microtime(true);
		$gtime = ' - Generated in : '.round($generate_time_end-$generate_time_start,8).'s';
		return '</div><div id="Bbottom">'.$footer.$date.$gtime.'</div></body></html>';
	}



?>