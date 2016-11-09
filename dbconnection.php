<?php
//all the variables defined here are accessible in all the files that include this one
$con= new mysqli('localhost','root','','test')or die("Could not connect to mysql in dbconection.php".mysqli_error($con));
?>