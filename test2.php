<?php
var_dump($_SESSION);


session_start();




var_dump($_SESSION);


$_SESSION['compteur']++;
if($_GET['id']!= '')
    $_SESSION['produit'][$_GET['id']] =$_GET['qte'];
?>
