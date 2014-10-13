<?php

//html.inc.php
//============
strtoupper($entree[$lang]['desc']);




//doBd.php
//========
if(strpos($livres[$ref]['auteur'],'/') !== false)
{
	$livres[$ref]['auteur'] = str_replace('/','<br/>',$livres[$ref]['auteur']);
	$libelle['auteur'][$lang].='s';
}			
$data 				= $livres[$ref];
$data['fond']		= $fond;
$data['ref']		= $ref;
$data['titreLib'] 	= $libelle['titre'][$lang];
$data['auteurLib'] 	= $libelle['auteur'][$lang];
$data['editeurLib'] 	= $libelle['editeur'][$lang];
$data['sortieLib']  	= $libelle['sortie'][$lang];
$data['prixHTLib']  	= $libelle['prixHT'][$lang];
$data['prixTVALib']  	=$libelle['prixTVA'][$lang];
$data['prixTTCLib']  	= $libelle['prixTTC'][$lang];
$data['prixHT']  		= number_format($ht,2,NUMBER_SEP_DEC,NUMBER_SEP_MIL);
$data['prixTVA'] 		= number_format($tva,2,NUMBER_SEP_DEC,NUMBER_SEP_MIL);
$data['prixTTC'] 		= number_format($ttc,2,NUMBER_SEP_DEC,NUMBER_SEP_MIL);

$strFiche = '<table style="background-color: #%fond%" width="100%">
	<tr><td rowspan="7"style="text-align: center"><img src="img/bd/%ref%.jpg" style="width: 100px;" alt="%ref%"/></td>
		<th>%titreLib%</th>
		<td>%titre%</td></tr>
	<tr><th>%auteurLib%</th>
		<td>%auteur%</td></tr>
	<tr><th>%editeurLib%</th>
		<td>%editeur%</td></tr>
	<tr><th>%sortieLib%</th>
		<td>%sortie%</td></tr>
	<tr><th>%prixHTLib%</th>
		<td>%prixHT% &euro;</td></tr>
	<tr><th>%prixTVALib%</th>
		<td>%prixTVA% &euro;</td></tr>
	<tr><th>%prixTTCLib%</th>
		<td>%prixTTC% &euro;</td></tr>
</table>';
echo remplirGabarit($strFiche,$data);


//gabarit.inc.php
//===============
function remplirGabarit($string,$replace = array(),$delim = '%')
{
	if(is_array($replace))
	{
		foreach($replace as $rech => $rempl) 
		{
			$s[] = $delim.$rech.$delim;
			$r[] = htmlentities($rempl);
		}
	}
	return str_replace($s, $r, $string);
}
?>