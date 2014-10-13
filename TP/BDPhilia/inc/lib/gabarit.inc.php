<?php

	/**
	 * Recherche et remplace les éléments du tableau donné dans la chaine de charactère
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @param  $string la chaine à remplir
	 * @param  $replace le tableau de recherche. Les clefs seront l'objet de la recherche, les valeurs servant de substitution
	 * @param  $delim le delimiteur de champs utiliser dans le gabarit
	 * @return  une chaine de charactère
	 */
	function remplirGabarit($string,$replace = array(),$delim = '%')
	{
		if(is_array($replace))
		{
			$s = array_keys($replace);
			$r = array_values($replace);
			foreach($s as $k => $ss) $s[$k] = $delim.$ss.$delim;
		}
		return str_replace($s, $r, $string);
	}

?>