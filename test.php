<?php
	$today = new DateTime(date("Y-m-d"));
	$today->modify('+3 day');
	echo $today->format('Y-m-d');
?>