<?php

/* function */

function printWords ($word,$a,$b) {
	$word = math($a,$b);
	echo "$word<hr />";
}

function math ($first, $second) {
	$summa = $first + $second;
	return $summa;
}

$x = 12;
$y = 35;

printWords($sum,$x,$y);


























?>
