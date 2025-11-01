<?php
$mon="4";
echo $effectiveDate = date('Y-m-d', strtotime("+".$mon." months", strtotime(date('Y-m-d'))));

?>
