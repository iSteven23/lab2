<!DOCTYPE html>
<html>
<head>
	<title>lab2</title>
	<meta charset="utf-8">
	<style type="text/css"></style>


</head>
<body>
	<?php
		$user = $_POST["username"];
		$pass = $_POST["password"];

		$mysqli = new mysqli('localhost', 'admin', 'password', 'lab2_database');
		$checkDuplicateUser = $mysqli->query("SELECT id FROM users WHERE username = '$user'");
		if($user&&$pass)
		{
			if($mysqli->connection_error)
			{
				die("connection failed");
			}
			if($checkDuplicateUser->num_rows == 0)
			{
				$sql = "INSERT INTO users (username, password)
				VALUES ('$user', '$pass')";

			if($mysqli->query($sql) ===TRUE)
			{
				echo "You have been registered. Return to home page to login.";
				echo '<form action="lab2.php" method="post">';
				echo '<input type="submit" value="return">';
				echo'</form>';
			}
			else
				{
					echo "Error. Not registered";
				}
			}
			else
			{
				echo "Username already exists.";
				echo '<form action="lab2.php" method="post">';
				echo '<input type="submit" value="return">';
				echo'</form>';
			}
		}
		else
		{
			echo "Empty text field(s).";
			echo '<form action="lab2.php" method="post">';
			echo '<input type="submit" value="return">';
			echo'</form>';
		}
		
		
		$mysqli->close();
	?>
</body>
</html>