<?php

$ref = (array_key_exists('ref', $_POST)) ? $_POST['ref'] : $_GET['ref'];
$tri = (array_key_exists('ref', $_POST)) ? $_POST['tri'] : $_GET['tri'];
$lang = (array_key_exists('lang', $_POST)) ? $_POST['lang'] : $lang;
$fond = $_POST['fond'];
$cgv = ($_POST['cgv'] == 'ok' or array_key_exists('ref', $_GET)) ? true : false;



$data['previous'] = $data['next'] = '';
$listId = array_keys($livres);
$keySel = array_search($ref, $listId);
if ($ref != current($listId))
    $data['previous'] = '<a href=doBd.php?ref=' . $listId[$keySel - 1] . '><img src="img/bd/' . $listId[$keySel - 1] . '.jpg" style="width: 40px;" alt="' . $listId[$keySel - 1] . '"/></a>';
end($listId);
if ($ref != current($listId))
    $data['next'] = '<a href=doBd.php?ref=' . $listId[$keySel + 1] . '><img src="img/bd/' . $listId[$keySel + 1] . '.jpg" style="width: 40px;" alt="' . $listId[$keySel + 1] . '"/></a>';





if ($tri != '') {
    foreach ($livres as $id => $livre)
	$sortArray[$id] = $livre[$tri];
    array_multisort($sortArray, SORT_ASC, $livres);
}
?>