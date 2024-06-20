<?php
session_start();
$uname = $_POST['email'];
$pass = $_POST['password'];
//Handling the admin login to access userlist.php file.
if($uname == "admin@gmail.com" && $pass == "admin2024"){
    $_SESSION['adminloggedin'] = true; 
    header('Location:userlist.php');
     exit();
}
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Handling the user Login to access dashboard.php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ai-php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the email and password from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and execute the SQL query to check the login details
$sql = "SELECT * FROM employee WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

try {
    // Check if the login details are correct
    if ($result->num_rows > 0) {
        // Redirect to the desired page
        $_SESSION['userloggedin'] = $uname; 
        header("Location: dashboard.php");
        exit();
    } else {
        // Redirect to the login page with an error message
        header("Location: login.php?error");
        exit();
    }
} catch (Exception $e) {
    // Handle the error (e.g., log the error)
    header("Location: login.php?error");
    exit();
}


   

// Close the database connection
$conn->close();
?>
