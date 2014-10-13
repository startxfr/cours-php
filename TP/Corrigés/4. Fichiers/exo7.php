<?php


if(array_key_exists('lang',$_POST))
	$lang = $_POST['lang'];
elseif(array_key_exists('lang',$_GET))
	$lang = $_GET['lang'];
else  $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
if(!in_array($lang,$authorizedLang))
	$lang = $authorizedLang[0];

setlocale(LC_ALL,$lang.'_'.strtoupper($lang));

?>