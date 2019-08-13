<!DOCTYPE html>
<html>
<head>
	<title>lab2</title>
	<meta charset="utf-8">
	<style type="text/css"></style>

	<script type="text/javascript">

		
		function init()
		{

		}

		window.addEventListener("load", init);

	</script>



</head>
<body>
	<?php
	$mysqli = new mysqli('localhost', 'admin', 'password', 'lab2_database') or die ("not ceonecting");
	$userCheck = $_POST["username"];
	$passCheck = $_POST["password"];
	$checkValidUser = $mysqli->query("SELECT id FROM users WHERE username = '$userCheck'");

	if($userCheck&&$passCheck)
	{
		if($checkValidUser->num_rows == 0)
		{
			echo'User does not exist. You must return to home page to register.';
			echo '<form action="lab2.php" method="post">';
			echo '<input type="submit" value="return">';
			echo $passCheck;
			echo'</form>';
		}
		else
		{

			if($userCheck != 'admin')
			{
				echo'<div>';
				echo '<form action="lab2.php" method="post">';
				echo '<div id="loggedIn">';
				echo '<h2>Welcome, ';
				echo $userCheck;
				echo '</h2>';
				echo '<input type="button" id="blinkB" value="blink"><br>';
				echo '<input type="submit" id="logoutB" value="Log out">';
				echo'</div>';
				echo'</form>';
				echo'</div>';
			}
			else
			{
				while($row = $checkValidUser->fetch_assoc())
				{
				echo "id:" .$row["id"]." - username: " .$row["username"]. " " . "<br>";
				}
			}

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