<?php

require_once('inc/inc.inc.php');	

echo htmlBegin('Recherche de BD',$lang,'rechercheBd.php',HTML_FORMAT);
echo formSearch($lang);
echo htmlEnd(); 
?>