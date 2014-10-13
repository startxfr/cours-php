<?php

	/**
	 * Fonction de lecture d'un fichier
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @return  une chaine de charactère
	 */
	function lireFichier($fichier)
	{
		if(is_file($fichier))
		{
			$fp = fopen($fichier, "r");
			$sortie = @fread($fp, filesize($fichier));
			fclose($fp);
			return $sortie;
		}
	}

	/**
	 * Fonction d'écriture d'un fichier
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @return  une chaine de charactère
	 */
	function ecrireFichier($fichier,$contenu)
	{
		if (!is_file($fichier))
			touch($fichier);

		$file = fopen($fichier, 'r+b');
		$r = fputs($fichier,$contenu,strlen($contenu));
		fclose($fichier);
		return $r;
	}

?>