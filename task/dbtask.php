<?php
session_start();
if(!isset($_SESSION['userloggedin'])) {
 header("Location: ../login.php");
 exit();
}
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ai-php";
$email = $_SESSION['userloggedin'];

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$taskList = $_POST['taskList'];
$caption = $_POST['caption'];

// Insert data into the table
$sql = "INSERT INTO task (taskList, caption, email) VALUES (?, ?, ?) ORDER BY dateCreated DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $taskList, $caption, $email);
$stmt->execute();

// Redirect to index.php page
header("Location: ../task/index.php");
exit();

// Close the statement and connection
$stmt->close();
$conn->close();

?>
