<!DOCTYPE html>

<html>
<head>
	<title>lab2</title>
	<meta charset="utf-8">
	<style type="text/css"></style>


</head>
<body style="background-color:aqua;">

	<?php
	//create a connection
	
	$mysql_host = 'localhost';
	$mysql_user = 'admin';
	$mysql_pass = 'password';
	$mysql_db = 'lab2_database';
	$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass) or die('dead');

	echo'Connected';
	
	?>


	<div>
		<form action="reg.php" method="post">
			<div>
				<h1>Registration Form</h1>
				<p>Please fill:</p>

				<label for="username"><b>Username</b></label>
				<input type="text" name="username">

				<label for="password"><b>Password</b></label>
				<input type="text" name="password"><br>

				<input type="submit" value="Sign up">
						

			</div>

		</form><br><br>

		<form action="welcome.php" method="post">

			<div>
				<label for="username"><b>Username</b></label>
				<input type="text" name="username">

				<label for="password"><b>Password</b></label>
				<input type="text" name="password"><br>
				<input type="submit" value="Log in">
			</div>
		</form>

	</div>
</body>
</html>