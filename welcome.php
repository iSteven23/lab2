<!DOCTYPE html>
<html>
<head>
	<title>lab2</title>
	<meta charset="utf-8">
	<style type="text/css"></style>

	<script type="text/javascript">
	
        var blinkButton;

        function LightFade()
        {
            console.log("light fade");
        }
        
        function sendAJAX()
        {
        }
        
        function sleepMs()
        {
        }
		
		function init()
		{
            blinkButton = document.getElementById("blinkB");
            blinkButton.addEventListener("click", LightFade);
		}

		window.addEventListener("load", init);

	</script>



</head>
<body>
	<?php
	$mysqli = new mysqli('localhost', 'root', '484lab2', 'lab2_database') or die ("not connecting");
	$userCheck = $_POST["username"];
	$passCheck = $_POST["password"];
	$checkValidUser = $mysqli->query("SELECT UserID FROM users WHERE UserName = '$userCheck' AND Password = '$passCheck'");
	$adminQuery = $mysqli->query("SELECT * FROM users ORDER BY UserName");

	if($userCheck&&$passCheck)
	{
		if($checkValidUser->num_rows == 0)
		{
			echo 'Wrong username/password. Return to home page';
			echo '<form action="lab2.php" method="post">';
			echo '<input type="submit" value="return">';
			echo '</form>';
		}
		else
		{

			if($userCheck != 'admin')
			{
				echo '<div>';
				echo '<form action="lab2.php" method="post">';
				echo '<div id="loggedIn">';
				echo '<h2>Welcome, ';
				echo $userCheck;
				echo '</h2>';
				echo '<input type="button" id="blinkB" value="blink"><br>';
				echo '<input type="submit" id="logoutB" value="Log out">';
				echo '</div>';
				echo '</form>';
				echo '</div>';
			}
			else
			{
				while($row = $adminQuery->fetch_assoc())
				{
				echo "UserID:" .$row["UserID"]." - UserName: " .$row["UserName"]. " " . "<br>";
				}
				echo '<form action="lab2.php" method="post">';
                echo '<input type="submit" value="return">';
                echo '</form>';
			}

		}
	}
	else
	{
		echo "Empty text field(s).";
		echo '<form action="lab2.php" method="post">';
		echo '<input type="submit" value="return">';
		echo '</form>';
	}
	
	
	$mysqli->close();
	?>
</body>
</html>
