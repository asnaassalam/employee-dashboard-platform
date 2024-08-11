<?php
session_start();
if(!isset($_SESSION['userloggedin'])) {
 header("Location: ../login.php");
 exit();
}
// Connect to the database
include '../config.php';
$email = $_SESSION['userloggedin'];

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
