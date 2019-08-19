<!DOCTYPE html>
<html>
<head>
	<title>lab2</title>
	<meta charset="utf-8">
	<style type="text/css"></style>

	<script type="text/javascript">
	
        var blinkButton;

        function lightFade()
        {
            console.log("light fade");
            var lightId = 6;
            var lightOn = true;
            var put = "PUT";
            var bri = 255;
            var authCode = "lH7nZmlzj1fMbsjzOAyrs6sO24zAsMY--IiF59vH";
            var urlStr = "http://130.166.45.108/api/";
            urlStr += authCode;
            urlStr += "/lights/" + lightId + "/state";
            
            sendAJAX(urlStr, put, JSON.stringify({"on":true, "bri":255, "hue": 16184}));
            
            for(var i = 0; i < 12; i++)
            {
                if(bri <= 0) lightOn = false;
                sendAJAX(urlStr,put, JSON.stringify({"bri":bri, "on": lightOn, "hue": 16184}));
                bri-=25;
                sleepMs(200);
            }
            
            
            
        }
        
        function sendAJAX(url, method, str)
        {
            var req = new XMLHttpRequest();
            req.open(method, url, true);
            req.setRequestHeader("Content-Type", "application/json");
            req.send(str);
        }
        
        function sleepMs(msec)
        {
            var start = new Date().getTime();
            while((new Date().getTime()) < (start + msec));
        }
		
		function init()
		{
            blinkButton = document.getElementById("blinkB");
            blinkButton.addEventListener("click", lightFade);
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
