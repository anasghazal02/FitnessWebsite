<?php

 session_start(); 

if(!( isset($_SESSION['username']) && isset($_SESSION['pass']) )){
	die("<script>alert('Unauthorized access'); window.location='login.html';</script>");
}

?>
<!DOCTYPE html>
<!-- Name: Dr. Mohammad Abu Snober -->
<html lang="en">
<head>
	<title>Profile Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    
    <link rel="stylesheet" href="profilePage.css">
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ltrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

</head>

<header>

<div class="container-fluid bg-white text-center pt-5 pb-5">
    <div class="row">
        
        <div class="col-sm  text-center">
            <img  src="Logo Final.png">
        </div>

        <div class="col-sm">
            <div class="links">
                <div class="row text-center text-white float-right">
                    <div class="col-sm  pt-5  " allign="center"><a class="headernav" href="landing.html">Home</a></div>
                    <div class="col-sm  pt-5  " allign="center"><a class="headernav" href="About.html">About</a></div>
                    <div class="col-sm  pt-5  " allign="center"><a class="headernav" href="Privacy.html">Privacy</a></div>
                    <div class="col-sm  pt-5  " allign="center"><a class="headernav" href="services.html">Services</a></div>
                    <div class="col-sm  pt-5  " allign="center"><a class="headernav" href="Contact.html">Logout</a></div>

                </div>
            </div>
        </div>
    
    </div>
</div>


</header>

<body>
<?php

$conn = new mysqli('localhost','root','','registration');

include_once("connect.php");

$username = $_SESSION['username'];

// 3- build SQL Query
$query = "SELECT username, email, gender
			From registration
			Where username = '$username'
";

// 4- execute SQL query
$result = $conn->query($query);

// checking for the number of rows for the dataset
if ($result->num_rows == 0)
{
	exit("No rows retrieved");
}

// fetching for data
// displaying data in atabular format
// header info
echo '<table border="border">';


while($row = $result->fetch_assoc())
{
	echo '<tr>';
		echo '<th>Full Name:</th>';
		echo '<td>' . $row['username'] . '</td>';
	echo '</tr>';

	echo '<tr>';
		echo '<th>Email:</th>';
		echo '<td>' . $row['email'] . '</td>';
	echo '</tr>';

}

echo '</table>';


// 5- close db connection
$conn->close();

?>
<br>
<br>

<a href="logout.php">Logout</a>
</body>


<footer style="background-color: #a91a24;">

        <div class="row text-center text-white">
    
            <div class="col-sm  pt-5  " allign="center"> 
                <img  src="Logo Final.png">
             </div>
    
             <div class="col-sm  pt-5  " allign="center"> 
                <a class="footernav" href="landing.html">Home</a>
                <a class="footernav" href="About.html">About</a>
                <a class="footernav" href="Privacy.html">Privacy</a>
                <a class="headernav" href="services.html">Services</a>
                <a class="footernav" href="logout.php">Logout</a>

             </div>

             

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ltrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

    
             <div class="col-sm  pt-5  " allign="center"> 
                <p> &copy; Fitness Makers 2022 </p>
             </div>
    
        </div>
    
    </footer>

</html>