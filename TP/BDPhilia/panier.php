<?php
phpinfo();
require_once('inc/inc.inc.php');

echo htmlBegin($menu['panier.php'][$lang]['title'],$lang,'panier.php',HTML_FORMAT);

if(array_key_exists('action',$_POST) and 
   $_POST['action'] == 'add')
	$_SESSION[$_POST['ref']] += $_POST['qte'];
	

if(array_key_exists('action',$_GET) and 
   $_GET['action'] == 'addOne')
	$_SESSION[$_GET['ref']]++;
if(array_key_exists('action',$_GET) and 
   $_GET['action'] == 'remOne')
{
	if($_SESSION[$_GET['ref']] == 1)
		unset($_SESSION[$_GET['ref']]);
	else $_SESSION[$_GET['ref']]--;
}	
	
echo bdPannier($lang);

echo htmlEnd();
?>