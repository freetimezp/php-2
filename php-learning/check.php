<?php 

if ($_POST["name"] == "") {
	echo "Enter your name! <a href='/php-learning/'>Change</a>";
} else {
	header("location:index.php");
}




?>