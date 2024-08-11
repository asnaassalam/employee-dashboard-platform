<?php
// Establish a connection to the database
include 'config.php';

// Function to generate a random password
function generatePassword() {
    $length = 10; // Length of the password
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Available characters
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $password .= $characters[$randomIndex];
    }

    return $password;
}

// Retrieve data submitted by the form
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$salary = $_POST['salary'];
$dateOfBirth = $_POST['dateOfBirth'];
$password = generatePassword();

// Prepare and execute the SQL query to insert the data into the Employee table
$sql = "INSERT INTO employee (email, firstName, lastName, gender, phone, salary, dateOfBirth, password) VALUES ('$email', '$firstName', '$lastName', '$gender', '$phone', '$salary', '$dateOfBirth', '$password')";

// Execute the SQL statement
try {
    if ($conn->query($sql) === TRUE) {
        header('Location:login.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} catch (mysqli_sql_exception $e) {
    $errorMessage = $e->getMessage();
    if (strpos($errorMessage, 'Duplicate entry') !== false) {
        header('Location:register.php?error');
        exit();

    } else {
        echo "Error occurred: " . $errorMessage;
    }
} 



// Close the database connection
$conn->close();

?>