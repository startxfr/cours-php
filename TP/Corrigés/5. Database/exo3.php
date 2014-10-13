$l = doSqlSelect(0,'SELECT * FROM livres');
foreach($l as $v)
	$livres[$v['ref']] = $v;
	
	
	
	
	
	
	
	
	
function bdFiche($ref,$lang,$fond = '')
	{
		global $libelle,$livres;
		$info = doSqlSelect(0,'SELECT * FROM livres WHERE ref = \''.$ref.'\'');
		if($info !== false)
		{
			$data 	= $info[0];
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