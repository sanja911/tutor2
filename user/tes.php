<?php
$date1 = date_create('2007-03-24');
$date2 = date_create('2009-06-26');
$interval = date_diff($date1, $date2);
echo "Selisih: " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
?>
