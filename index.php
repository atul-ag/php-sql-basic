<!DOCTYPE HTML>
<html>
    <head>
    <title>Login/SignUp</title>
    </head>
    <body>
		<?php 
		include_once 'dbConnection.php';
		session_start();
		?>
		<h1>
		<?php
		if(isset($_SESSION['logged_in']))
		{
		echo "Welcome, ".$_SESSION['name'];
		}
		?>
		</h1>
		<h2>Sign Up</h2>
		<form action="entry.php" class="form" method="post" enctype="multipart/form-data">
		
			<label for="first_name">First Name</label>
			<input type="text" id="first_name" name="fname" required/>
			
			<label for="last_name">Last Name</label>
			<input type="text" id="last_name" name="lname" required/>
			
			<label for="email">E-mail</label>
			<input type="email" id="email" name="email" required/>
			
			<label for="pass">Password</label>
			<input type="password" id="pass" name="pass" required/>
			
			<label for="conf_pass">Confirm Password</label>
			<input type="password" id="conf_pass" name="conf_pass" required/>
			<br><br><br><br>
			<center><input type="submit" id="submit" value="Enter" name="register"/></center>
			
		</form>
		<br><br>
		
		<h2>Login</h2>
		<form action="entry.php" class="form" method="post" enctype="multipart/form-data">
		
			<label for="lemail">E-mail</label>
			<input type="email" id="lemail" name="email" required/>
			
			<label for="lpass">Password</label>
			<input type="password" id="lpass" name="pass" required/>
			
			<br><br><br><br>
			<input type="submit" id="sumbmit" value="Login" name="login"/>
		</form>
		<br><br>
		
		<h2>Log Out</h2>
		<form action="entry.php" class="form" method="post" enctype="multipart/form-data">
			<input type="submit" id="sumbmit" value="Log Out" name="logout"/>
		</form>
		<br><br><br><br>&copy;Copyright AtulAg
    </body>
</html>