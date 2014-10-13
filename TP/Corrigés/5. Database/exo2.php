foreach($livres as $id => $livre)
{
	$sql = 'INSERT INTO `livres` (`id` ,`ref` ,`titre` ,`auteur` ,
		  `editeur` ,`prix` ,`stock` ,`sortie`) VALUES (NULL ,';
	$sql.= ' \''.addslashes($livre['id']).'\',';
	$sql.= ' \''.addslashes($livre['titre']).'\',';
	$sql.= ' \''.addslashes($livre['auteur']).'\',';
	$sql.= ' \''.addslashes($livre['editeur']).'\',';
	$sql.= ' \''.addslashes($livre['prix']).'\',';
	$sql.= ' \''.addslashes($livre['stock']).'\',';
	$sql.= ' \''.addslashes($livre['sortie']).'\');';
	echo doSqlInsert(0,$sql).'<br/>';
}




