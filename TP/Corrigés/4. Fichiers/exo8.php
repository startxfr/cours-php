<?php


$csv   = lireFichier('bd.csv');
$ligne = explode("\n",$csv);
$titre = explode(';',$ligne[0]);
foreach($ligne as $l)
{
	$a = explode(';',$l);
	$id = str_replace('"','',$a[0]);
	if($id != '')
	{
		foreach($a as $k => $val)
		{
			$t = str_replace('"','',$titre[$k]);
			$livres[$id][$t] = str_replace('"','',$val);
		}
	}

}
unset($livres['id']);

?>