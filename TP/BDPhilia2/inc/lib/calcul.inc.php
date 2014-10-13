<?php

	/**
	 * Fonction de calcul du montant de TVA a appliquer
	 *
	 * @brief Calcul un montant de TVA en fonction d'un prix et de l'indice d'un taux de TVA
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @bug Pas de bug
	 * @note copyright : voir la licence
	 * @return une valeur numérique
	 */
	function calcul_tva($ht,$codeTva = 1)
	{
		global $tauxTva;
		return ($ht * $tauxTva[$codeTva]/100);
	}


	/**
	 * Fonction de calcul d'un total TTC
	 *
	 * @brief Calcul une somme TTC en fonction d'un prix et de l'indice d'un taux de TVA
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @bug Pas de bug
	 * @note copyright : voir la licence
	 * @return une valeur numérique
	 */
	function calcul_ttc($ht,$codeTva = 1)
	{
		return $ht + calcul_tva($ht,$codeTva);
	}


?>