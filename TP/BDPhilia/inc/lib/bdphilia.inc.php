<?php

	/**
	 * Affiche l'inventaire des BD
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @param  $lang le code de la langue a utiliser
	 * @param $fond la couleur de fond du tableau
	 * @param $tri la clef de tri du tableau
	 * @return une chaine de charactère
	 */
	function bdInventaire($lang,$fond = '', $tri = '')
	{
		global $libelle;
		$j = $total = 0;
		$msg 	= '<table width="100%">
			<tr style="background-color: #bbb">
				<th colspan="2"><a href="?tri=titre">'.$libelle['titre'][$lang].'</a></th>
				<td class="right" style="width:75px"><a href="?tri=stock">'.$libelle['stock'][$lang].'</a></td>
				<td class="right" style="width:75px"><a href="?tri=prix">'.$libelle['prix'][$lang].'</a></td>
				<td class="right" style="width:75px">'.$libelle['total'][$lang].'</a></td>
			</tr>';

		$sqlAdd = ($tri != '') ? 'ORDER BY '.$tri.' ASC' : '';
		$livres = doSqlSelect(0,'SELECT * FROM livres '.$sqlAdd);
		foreach($livres as $id => $livre)
		{
			$id = $livre['ref'];
			$sstot = $livre['stock'] * $livre['prix'];
			$total += $sstot;
			$style = (($j % 2) == 0) ? ' style="background-color: #'.$fond.'"' : '';
			$img	= (file_exists('img/bd/'.$id.'.jpg')) ? $id : 'defaut';
			$msg .= '<tr'.$style.'>
					<td class="center"><a href="?ref='.$id.'"><img src="img/bd/'.$img.'.jpg" style="width: 20px;" alt="'.$id.'"/></a></td>
					<td><a href="?ref='.$id.'">'.$livre['titre'].'</a></td>
					<td class="right">'.$livre['stock'].'</td>
					<td class="right">'.number_format($livre['prix'],2,NUMBER_SEP_DEC,NUMBER_SEP_MIL).' &euro;</td>
					<td class="right">'.number_format($sstot,2,NUMBER_SEP_DEC,NUMBER_SEP_MIL).' &euro;</td>
				</tr>';
			$j++;
		}
		$msg .= '<tr>
				<th colspan="4">'.$libelle['total'][$lang].'</th>
				<td>'.number_format($total,2,NUMBER_SEP_DEC,NUMBER_SEP_MIL).'</td>
			</tr>
			</table>';
		return $msg;
	}


	/**
	 * Affiche la fiche d'une BD donnée
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @param  $ref la clef corspondant à la BD à afficher
	 * @param  $lang le code de la langue a utiliser
	 * @param  $fond la couleur de fond du tableau
	 * @return une chaine de charactère
	 */
	function bdFiche($ref,$lang,$fond = '')
	{
		global $libelle,$livres;
		if($livres !== false)
		{
			$data 	= $livres[$ref];
			$ht		= $data['prix'];
			$tva		= calcul_tva($ht,TVA_APPLICABLE);
			$ttc		= calcul_ttc($ht,TVA_APPLICABLE);
			if(strpos($data['auteur'],'/') !== false)
			{
				$data['auteur'] = str_replace('/','<br/>',$data['auteur']);
				$libelle['auteur'][$lang].='s';
			}

			$data['fond']		= $fond;
			$data['ref']		= $ref;
			$data['img']		= (file_exists('img/bd/'.$ref.'.jpg')) ? $ref : 'defaut';
			$data['titreLib'] 	= $libelle['titre'][$lang];
			$data['auteurLib'] 	= $libelle['auteur'][$lang];
			$data['editeurLib'] 	= $libelle['editeur'][$lang];
			$data['sortieLib']  	= $libelle['sortie'][$lang];
			$data['prixHTLib']  	= $libelle['prixHT'][$lang];
			$data['prixTVALib']  	=$libelle['prixTVA'][$lang];
			$data['prixTTCLib']  	= $libelle['prixTTC'][$lang];
			$data['commanderLib']  	= $libelle['Commander'][$lang];
			$data['prixHT']  		= number_format($ht,2,NUMBER_SEP_DEC,NUMBER_SEP_MIL);
			$data['prixTVA'] 		= number_format($tva,2,NUMBER_SEP_DEC,NUMBER_SEP_MIL);
			$data['prixTTC'] 		= number_format($ttc,2,NUMBER_SEP_DEC,NUMBER_SEP_MIL);

			$data['previous'] = $data['next'] = '';
			$listId = array_keys($livres);
			$keySel = array_search($ref, $listId);
			if($ref != current($listId))
			{
				$img	= (file_exists('img/bd/'.$listId[$keySel-1].'.jpg')) ? $listId[$keySel-1] : 'defaut';
				$data['previous'] = '<a href=doBd.php?ref='.$listId[$keySel-1].'><img src="img/bd/'.$img.'.jpg" style="width: 40px;" alt="'.$listId[$keySel-1].'"/></a>';
			}
			end($listId);
			if($ref != current($listId))
			{
				$img	= (file_exists('img/bd/'.$listId[$keySel+1].'.jpg')) ? $listId[$keySel+1] : 'defaut';
				$data['next'] = '<a href=doBd.php?ref='.$listId[$keySel+1].'><img src="img/bd/'.$img.'.jpg" style="width: 40px;" alt="'.$listId[$keySel+1].'"/></a>';
			}
			return remplirGabarit(lireFichier('gab/ficheBd.htm'),$data);
		}
		else return 'erreur dans la recherche de cette BD';


	}

	/**
	 * Affiche le formulaire de recherche
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @return une chaine de charactère
	 */
	function formSearch($lang)
	{
		global $libelle;
		$data['Reference'] = $libelle['Reference'][$lang];
		$data['Langue'] 	= $libelle['Langue'][$lang];
		$data['Francais'] = $libelle['Francais'][$lang];
		$data['Anglais'] 	= $libelle['Anglais'][$lang];
		$data['Couleur'] 	= $libelle['Couleur'][$lang];
		$data['CGV'] 	= $libelle['CGV'][$lang];
		$data['CGVTitle'] = $libelle['CGVTitle'][$lang];
		$data['Rechercher'] = $libelle['Rechercher'][$lang];
		return remplirGabarit(lireFichier('gab/formSearch.htm'),$data);
	}


?>