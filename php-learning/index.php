<?php

function printResult ($result_set) {
	while (($row = $result_set->fetch_assoc()) != false) {
		print_r($row);
		echo "<br />";
	}
	echo "Count rows = ".$result_set->num_rows."<br />";
}

$mysqli = new mysqli ("localhost", "root", "", "myBase");
$mysqli->query("SET NAMES 'utf8'");

for ($i = 0; $i < 10; $i++) {
	$mysqli->query("INSERT INTO `users` (`login`, `password`, `reg_date`) VALUES ('user_$i', '".md5("123")."', '".time()."')");
}

$result_set = $mysqli->query("SELECT * FROM `users`");
printResult($result_set);

$result_set = $mysqli->query("SELECT `id`,`login` FROM `users`");
printResult($result_set);

$result_set = $mysqli->query("SELECT * FROM `users` ORDER BY `id` DESC");
printResult($result_set);

$result_set = $mysqli->query("SELECT * FROM `users` ORDER BY `login` DESC LIMIT 0,2");
printResult($result_set);

$result_set = $mysqli->query("SELECT `id`,`login` FROM `users` WHERE `login` LIKE '%ser%' ORDER BY `id` ASC");
printResult($result_set);

$result_set = $mysqli->query("SELECT COUNT(`id`) FROM `users`");
printResult($result_set);


$mysqli->close();
/* SQL  */

$mysqli = new mysqli ("localhost", "root", "", "myBase");
$mysqli->query("SET NAMES 'utf8'");

$success = $mysqli->query("INSERT INTO `users` (`login`, `password`, `reg_date`) VALUES ('evgen', '".md5("123")."', '".time()."')");

echo $success; 

for ($i = 1; $i < 10; $i++) {
	$success = $mysqli->query("INSERT INTO `users` (`login`, `password`, `reg_date`) VALUES ('$i', '".md5("$i")."', '".time()."')");
}

$mysqli->query("UPDATE `myBase`.`users` SET `reg_date` = '123' WHERE `users`.`id`=4");

$mysqli->query("UPDATE `myBase`.`users` SET `reg_date` = '10' WHERE `users`.`login`='shop' OR (`users`.`id` > 4 AND `users`.`id` < 8 )");

$mysqli->query("DELETE FROM `myBase`.`users` WHERE `users`.`id` > 8");


$mysqli->close();

/* form  */

session_start();
if (isset($_POST["send"])) {
	// print_r($_POST);
	$from = htmlspecialchars($_POST["from"]);
	$to = htmlspecialchars($_POST["to"]);
	$subject = htmlspecialchars($_POST["subject"]);
	$message = htmlspecialchars($_POST["message"]);
	$_SESSION["from"] = $from;
	$_SESSION["to"] = $to;
	$_SESSION["subject"] = $subject;
	$_SESSION["message"] = $message;

	$error_from = "";
	$error_to = "";
	$error_subject = "";
	$error_message = "";

	$error = false;

	if ($from == "" || !preg_match("/@/", $from)) {
		$error_from = "Enter correct email!";
		$error = true;
	}
	if ($to == "" || !preg_match("/@/", $to)) {
		$error_to = "Enter correct email!";
		$error = true;
	}
	if (strlen($subject) == "") {
		$error_subject = "Enter subject of you message!";
		$error = true;
	}
	if (strlen($message) == "") {
		$error_message = "Enter you message!";
		$error = true;
	}

	if (!$error) {
		$subject = "=?utf-8?B?".base64_encode($subject)."?=";
		$headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/plain; charset=utf-8\r\n";
		mail ($to, $subject, $message, $headers);
		header("Location: success.php?send=1");
		exit;
	}
}


echo "<hr />";
?>

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Form feedback</title>
</head>
<body>
	
<h2>Form feedback</h2>
<form name="feedback" method="post" action=""> 
	<label>From:</label><br />
		<input type="text" name="from" value="<?php echo $_SESSION["from"] ?>" />
		<span style="color: red"><?php echo $error_from ?></span><br />
	<label>To:</label><br />
		<input type="text" name="to" value="<?php echo $_SESSION["to"] ?>" />
		<span style="color: red"><?php echo $error_to ?></span><br />
	<label>Subject:</label><br />
		<input type="text" name="subject" value="<?php echo $_SESSION["subject"] ?>" />
		<span style="color: red"><?php echo $error_subject ?></span><br />
	<label>Message:</label><br />
		<textarea name="message" cols="30" rows="8"><?php echo $_SESSION["message"] ?></textarea>
		<span style="color: red"><?php echo $error_message ?></span><br />
		<input type="submit" name="send" value="send" /><br />

</form>

</body>
</html>


<?php

/* form  */

echo "<hr />";
/* session */

session_start();

$numt = (isset ($_SESSION["numt"])) ? $_SESSION["numt"] : 0;
$numt++;
$_SESSION["numt"] = $numt;
echo "User update page $numt times<br />";

session_destroy();

echo "<hr />";
/* cookie */

// setcookie("num", 10, time () + 5);
// if (isset ($_COOKIE["num"])) {
// 	echo "Cookie exist"."<br />";
// } else {
// 	echo "Cookie dont exist"."<br />";
// }

// $num = (isset ($_COOKIE["num"])) ? $_COOKIE["num"] : 0;
// $num++;
// setcookie("num", $num, time () + 4);
// echo "User update page $num times<br />";

echo "<hr />";
/* post */

$message = "My first message by post";
$to = "kraftukrnet@ukr.net";
$from = "gosha@mail.ru";
$subject = "Theme message";
//$subject = "=?utf-8?B?".base64_encode($subject)."?=";
$headers = "From: $from\r\nReply-to: $from\r\nContent-type: text/plain; charset=utf-8\r\n";

mail($to, $subject, $message, $headers);

echo "<hr />";
/* php */

// header("Location: abc.html");
// exit;

$abc = 67;
$abc++;

echo "<hr />";
/* php */

// phpinfo();

echo $_SERVER["REMOTE_ADDR"]."<br />";
echo $_SERVER["TEMP"]."<br />";

echo "<hr />";

/* user */

echo __FILE__."<br />";

echo fileperms(__FILE__)."<br />";
chmod(__FILE__, 0777); // read 4, write 2, execute 1

echo "<hr />";

/* file */

// $file = fopen("a.txt", "a+t");
// fwrite($file, "Some new word\nrow1\nrow2");
// fclose($file);

$file = fopen("a.txt", "r+t");

while (!feof($file)) {
	echo fread($file, 2)."<br />";
}

fseek($file, 0);
echo fread($file, 1)."<br />";

fclose($file);

file_put_contents("c.txt", "Qwerty TEST SOme");
echo file_get_contents("c.txt")."<br />";

echo file_exists("a.txt")."<br />";

echo filesize("c.txt")."<br />";

rename("c.txt","b.txt");

unlink("b.txt");

echo "<hr />";
/* date */

echo time()."<br />";
echo microtime()."<br />";

$start = microtime(true);
echo "Script work ".(microtime(true) - $start)." second"."<br />";

echo date("Y-m-d H:i:s")."<br />";
echo date("Y-m-d H:i:s", 342342346)."<br />";

$time = mktime(6, 24, 42, 5, 8, 1989);
echo date("Y-m-d H:i:s", $time)."<br />";

$array = getDate($time);
print_r($array);
echo "<br />";

echo checkdate(11, 31, 2020)."<br />";
echo checkdate(12, 31, 2020)."<br />";

echo "<hr />";
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
