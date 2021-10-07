<?php
 $now = time(); // or your date as well
$your_date = strtotime("2021-03-24");
$datediff = $now - $your_date;

echo round($datediff / (60 * 60 * 24));
?>