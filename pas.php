<?php

session_start();
 
$servername = "localhost";
$username = "root";
$password =  NULL;
$dbname = "tataairline";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
} 

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "UPDATE customer_registration SET password = '$password' WHERE email_id='$username'";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Your Password has been successfully changed")
    window.open("Login.html","_parent");  
    </script>';
}
?>