<?php
session_start();

if(isset($_POST['submit'])){
   // Get the form data
   $username = $_POST['username'];
   $pass = $_POST['pass'];
   $email = $_POST['email'];
   $birthday = $_POST['birthday'];
   $gender = $_POST['gender'];
   
   // Connect to the database
   $conn = new mysqli('localhost','root','','registration');
   if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
   } 
   
   // Prepare and bind the SQL statement
   $stmt = $conn->prepare("INSERT INTO registration (username, pass, gender, email, birthday) VALUES (?, ?, ?, ?, ?)");
   $stmt->bind_param("sssss", $username, $pass, $gender, $email, $birthday);
   
   // Execute the statement
   if($stmt->execute()){
      
      // Set session variables
      $_SESSION['username'] = $username;
      $_SESSION['pass'] = $pass;
      $_SESSION['email'] = $email;
      // Redirect to success page
      header("Location: profilePage.php");
    exit();
   }else{
    echo "Error: " . $stmt->error;
   }
   
   // Close the statement and connection
   $stmt->close();
   $conn->close();
}
?>
