<?php
include 'dbconnection.php';
session_start();

 if(isset($_POST['register'])){
	$f_name=$_POST['fname'];
	$l_name=$_POST['lname'];
	$mail=$_POST['email'];
	$password=$_POST['pass'];
	$conf_pass=$_POST['conf_pass'];

	$f_name=mysqli_real_escape_string($con,$f_name);
	$l_name=mysqli_real_escape_string($con,$l_name);
	$mail=mysqli_real_escape_string($con,$mail);
	$password=mysqli_real_escape_string($con,$password);
	$conf_pass=mysqli_real_escape_string($con,$conf_pass);
	
	if($password==$conf_pass)
	{
		
		$result= mysqli_query($con,"SELECT * FROM user WHERE email = '$mail'");
		$count=mysqli_num_rows($result);
		if($count==0)
		{
			$q=mysqli_query($con,"INSERT INTO user (first_name, last_name, email, pass) VALUES  ('$f_name' , '$l_name' , '$mail' , '$password' )");
			echo "Thank You For Registration";
		}
		else
		{
			echo "Already registered,Check email or contact administrator";
		}
	}
	else
	{
		echo "Password did not match";
	}
 
 }
 else if(isset($_POST['login'])){
	$mail=$_POST['email'];
	$password=$_POST['pass'];
	
	$mail=mysqli_real_escape_string($con,$mail);
	$password=mysqli_real_escape_string($con,$password);
	
	$result= mysqli_query($con,"SELECT first_name,last_name FROM user WHERE email = '$mail' and pass = '$password'");
	$count=mysqli_num_rows($result);
		if($count==1)
		{
			$data=mysqli_fetch_array($result);
			$_SESSION['logged_in']=true;
			$_SESSION['name']= $data['first_name']." ".$data['last_name'];
			echo "Login Successful";
			header('location:index.php');
		}
		else
		{
			echo "Wrong Email or Password";
		}
 }
 
 else if(isset($_POST['logout'])) {
	unset($_SESSION['logged_in']);
	echo 'Successfully Logged Out';
	header('location:index.php');
 }
 
?>