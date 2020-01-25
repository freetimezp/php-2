<?php 
 session_start();

 if ($_GET["send"] == 1) {
 	echo "You send correct mail!!! to: ".$_SESSION["to"]."<br />";
 }

?>