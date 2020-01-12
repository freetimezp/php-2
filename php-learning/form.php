<?php 

if (isset($_POST["done"])) {
		if ($_POST["name"] == "") {
			echo "Enter your name! <a href='/php-learning/'>Change</a>";
		} else {
			header("location:index.php");
		}
}

?>


<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Project - form</title>
</head>
<body>
	
	<form name="test" action="check.php" method="POST">
		<label>Name:</label><br />
		<input type="text" name="name" placeholder="Your name" /><br />
		
		<label>Email:</label><br />
		<input type="text" name="email" placeholder="Your email" /><br />
		
		<label>Message:</label><br />
		<textarea name="message" cols="40" rows="10"></textarea><br />

  <input type="submit" name="done" value="Done" />
	</form>

</body>
</html>