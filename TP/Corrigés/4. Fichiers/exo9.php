<?php


// doBd.php
//=========


$data['img']		= (file_exists('img/bd/'.$ref.'.jpg')) ? $ref : 'defaut';
			
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


?>