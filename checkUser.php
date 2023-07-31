<?php
session_start();

// 0- preparing variable 
$username = $_POST['username'];
$pass = $_POST['pass'];

// 1- connect to DB server

$con = new mysqli("localhost", "root", "", "registration");

if($con->connect_error)
	die("connection failed " . $con->connect_error);


// 2- building SQL query
$sql = "select * from registration where username='$username' and pass = '$pass'";
 
 // 3- execute SQL query
 $res = $con->query($sql);
 
 if($res->num_rows == 0)
	 echo "Wrong username or password";
 else
 {
	 // register for session variable 
	 $_SESSION['username'] = $username;
	 $_SESSION['pass'] = $pass;
	 
     header("Location: profilePage.php");
	 
 }

setcookie('country', 'jo', time() + 7*24*60*60);
	
// 4- close connection
$con->close();

?>