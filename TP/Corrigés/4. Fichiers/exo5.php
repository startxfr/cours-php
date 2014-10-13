<?php

setlocale(LC_ALL,$lang.'_'.strtoupper($lang));

function htmlEnd()
	{
		global $footer,$generate_time_start;
		$date = ' - Last update: '.strftime('%d %B %Y',strtotime("-4 day"));
		$generate_time_end = microtime(true);
		$gtime = ' - Generated in : '.round($generate_time_end-$generate_time_start,8).'s';
		return '</div><div id="Bbottom">'.$footer.$date.$gtime.'</div></body></html>';
	}
?>