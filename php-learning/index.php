<?php

/* string */

$string = "This is some example";

echo strlen($string)."<br />";
echo strpos($string, "exa")."<br />";
echo strpos($string, "is", 4)."<br />";

if (strpos($string, "T") === false) {
	echo "T not found"."<br />";
} else {
	echo "T found"."<br />";
}

echo substr($string, 3)."<br />";
echo substr($string, 3, 8)."<br />";
echo substr($string, 3, -3)."<br />";

echo str_replace("is", "abc", $string)."<br />";
echo str_replace(array("is","pl"), array("abc","123"), $string)."<br />";


$str = "<b>Bold fonts, XAXAXA!!!</b>";
echo htmlspecialchars($str)."<br />";

echo strtolower($string)."<br />";
echo strtoupper($string)."<br />";

echo md5($string)."<br />";

echo trim("aasda   sdfs   ghfg   gfhfg        fdgdfgfdgfd")."<br />";

echo "<hr />";

/* array */

$array = array(12, 4, 142, 3424, 23, 1453, -120, 0);

echo count($array)."<br />";

sort($array);
print_r($array);
echo "<br />";

rsort($array);
print_r($array);
echo "<br />";

asort($array);
print_r($array);
echo "<br />";

arsort($array);
print_r($array);
echo "<br />";


$array = array("923" => 92, "123" => 32, "12" => 54);

ksort($array);
print_r($array);
echo "<br />";

krsort($array);
print_r($array);
echo "<br />";

shuffle($array);
print_r($array);
echo "<br />";

echo in_array(92, $array)."<br />";
echo in_array(12, $array)."<br />";


$arr_1 = array(4, 2, 5);
$arr_2 = array(3, 0, 9, 4);
$arr_3 = array_merge($arr_1, $arr_2);
print_r($arr_3);
echo "<br />";

$arrDone = array(1,2,3,4,5,6,7,8,9);
print_r(array_slice($arrDone, 1));
echo "<br />";
print_r(array_slice($arrDone, 1, 2));
echo "<br />";
print_r(array_slice($arrDone, 1, -2));
echo "<br />";

echo "<hr />";
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


/* forms */

require "form.php";

/* php */

echo "<hr />";

$s = 14;

if (isset($s)) echo "Working";
else echo "Not working";

echo "<hr />";

unset($s);
if (isset($s)) echo "Working";
else echo "Not working";

echo "<hr />";

$s = "10";
$null = 0;

echo "Is numeric = " .is_numeric($s)."<br />"; 
echo "Is integer = " .is_integer($s)."<br />";
echo "Is double = " .is_double($s)."<br />";
echo "Is string = " .is_string($s)."<br />";
echo "Is boolean = " .is_bool($s)."<br />";
echo "Is scalar = " .is_scalar($s)."<br />";
echo "Is null = " .is_null($null)."<br />";
echo "Is array = " .is_array($s)."<br />";
echo "Type = " .getType($s)."<br />";
echo "<hr />";


/* math */


echo M_PI."<br />";

$x = -15;
echo abs($x)."<br />";

$y = 2.27542242345;
echo round($y, 4)."<br />";
$y = 2.00000001;
echo ceil($y)."<br />";
$y = 7.99999;
echo floor($y)."<br />";

$s = mt_rand(1, 10000);
echo $s."<br />";

echo min(12,23,42,-1,-6,-121)."<br />";
echo max(12,23,42,-1,-6,-121)."<br />";


/* string */































?>
