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


/* array */

$array = array (12, -3.24, "string", false);
echo "$array[1]<hr />";
$array[1] = "row";
$array[2] = -4.24;
echo "$array[1]<hr />";
echo "$array[2]<hr />";

echo "$array[4]<hr />";
$array[] = "new element";
echo "$array[4]<hr />";


for ($i = 0; $i < count($array); $i++) {
	echo "Element array $i = " . "$array[$i]<hr />";
}


$list = array(
	"age" => 12,
	"name" => "Alex",
	"schollboy" => true
);

echo $list["age"]."<br />";
echo $list["name"]."<br />";

$list["name"] = "Pavel";
echo $list["name"]."<hr />";


$sum = 0;

echo getAverage(array(
		"first" => 12,
		"second" => 45,
		"third" => 23,
		"forth" => 55
)) . "<hr />";

function getAverage ($array) {
	foreach ($array as $key => $value) {
		$sum += $value;
		echo $key . " " . $value . "<br />";
	}
	return $sum / count ($array);
}


/* array -2 */


$array = array(
	array(12, 4.43, "string", true),
	array("word"),
	array(45, "strong signal") 
);

echo $array[0][2] . "<hr />";

for ($i = 0; $i < count($array); $i++) {
	for ($j = 0; $j < count($array[$i]); $j++) {
		echo $array[$i][$j] . " ";
	}
	echo "<br />";
}
echo "<hr />";


/* static \ global */

$x = 12;
echo $x . "<br />";
$x = 10;
echo $x . "<br />";

function test () {
	global $x;
	$x += 10;
}
test ();
echo $x . "<br />";


function test_2 () {
	static $id;
	$id++;
	echo $id . "<br />";
}

for ($i = 0; $i < 10; $i++) {
	test_2 ();
}

echo "<hr />";


/* files */
$pageTitle = "Main page";
require "header.php"; /* page dont work if mistake in require, if try include = mistake will be passed */


echo "Documents body";


require "footer.php";





?>
