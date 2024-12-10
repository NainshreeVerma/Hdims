<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'hdims');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$role = $_POST['role'];

// Insert into database
$sql = "INSERT INTO users (firstname, lastname, email, password, role) 
        VALUES ('$firstname', '$lastname', '$email', '$password', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
    header("Location: index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
