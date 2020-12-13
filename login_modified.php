<?php 
session_start(); 
session_unset(); 
session_destroy(); 
?> 

<html>
<head>
<link rel="stylesheet" type="text/css" href="login_css.css">
</head>

<h2>ARSHAL</h2>



<div class="container" id="container">
	<div class="form-container sign-up-container">
	</div>



	<div class="form-container sign-in-container">
		<form name="myloginForm" method="post" action="login_check.php">
			<h1>Sign in</h1>
			<input name="login" type="text" placeholder="Username" id="login"/>
			<input name="password" type="password" placeholder="Password" id="password"/>
			<a href="forgot_password.php">Forgot your password?</a>
			<button type="submit" value="Login" name="submit">Sign In</button>
		</form>
	</div>

	<div class="container">
		<div class="overlay-container" style="color:white">
		<form name="mySignUpForm" method="post" action="signup.php" style="background-color:#dc143c">
			<h1>Sign up</h1>
			<input name="real_name" type="text" placeholder="Your Name" id="real_name"/>
			<input name="name" type="text" placeholder="Username" id="login"/>
			<input name="password" type="password" placeholder="Password" id="password"/>
			<input name="phone_number" type="text" placeholder="Phone Number" id="phone_number"/>
			<input name="department" type="text" placeholder="Department" id="department"/>
			<button type="submit" value="SignUp" name="submit">Sign Up</button>
		</form>
	</div>
	</div>



</div>
</html>