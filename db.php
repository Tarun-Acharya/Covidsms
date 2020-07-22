<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli('', '', '','');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$result = mysqli_query($conn,""); 
    //while($row = mysqli_fetch_array($result))
     //{
      //  print_r($row);
     //} 
?>