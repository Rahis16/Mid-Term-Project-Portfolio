<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$first_name = $_POST['first_name'] ?? '';
$last_name = $_POST['last_name'] ?? '';
$email = $_POST['email'] ?? '';
$query_type = $_POST['query_type'] ?? '';
$gender = $_POST['gender'] ?? '';
$concern = $_POST['concern'] ?? '';

// Initialize the message variable
$message = '';

// Insert data into the database
$sql = "INSERT INTO contact_info (first_name, last_name, email, query_type, gender, concern)
VALUES ('$first_name', '$last_name', '$email', '$query_type', '$gender', '$concern')";

if ($conn->query($sql) === TRUE) {
    $message = "New record created successfully";
} else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();

// Output message for the modal
echo $message;
?>
