<?php

$l = doSqlSelect(0,'SELECT * FROM livres');
foreach($l as $v)
	$livres[$v['ref']] = $v;
?>