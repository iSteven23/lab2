<!DOCTYPE html>
<html>
<head>
	<title>lab2</title>
	<meta charset="utf-8">
	<style type="text/css"></style>

	<script type="text/javascript">

		function signUp()
		{
			document.getElementById("container").style.display ="none";
			document.getElementById("loggedIn").style.display ="block";
			console.log("sign");
		}
		function login()
		{
			document.getElementById("container").style.display ="none";
			document.getElementById("loggedIn").style.display ="block";			
			console.log("log");
		}

		function logout()
		{
			document.getElementById("container").style.display ="block";
			document.getElementById("loggedIn").style.display ="none";
			console.log("out");
		}
		
		function init()
		{
			document.getElementById("loggedIn").style.display ="none";

			var signUpButton = document.getElementById("signupB");
			signUpButton.addEventListener("click", signUp);

			var logInButton = document.getElementById("loginB");
			logInButton.addEventListener("click", login);

			var logOutButton = document.getElementById("logoutB");
			logOutButton.addEventListener("click", logout);

			
			console.log("hide");

		}

		window.addEventListener("load", init);

	</script>

</head>
<body>
	<div>
		<form>
			<div id="container">
				<h1>Registration Form</h1>
				<p>Please fill:</p>

				<label for="username"><b>Username</b></label>
				<input type="text" name="username">

				<label for="password"><b>Password</b></label>
				<input type="text" name="password"><br>

				<input type="button" id="signupB" value="Sign up">
				<input type="button" id="loginB" value="Log in">

			</div>

			<div id="loggedIn">
				<h2>Welcome, </h2>

				<input type="button" id="blinkB" value="blink"><br>
				<input type="button" id="logoutB" value="Log out">


			</div>

		</form>

	</div>
</body>
</html>