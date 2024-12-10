<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hdims"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $specialization = $_POST['specialization'];
    $experience = $_POST['experience'];
    $bio = $_POST['bio'];

    // Handle profile photo upload
    $profilePhoto = "uploads/profile_photos/default-profile.png"; // Default photo if none is uploaded
    if (isset($_FILES['profilePhoto']) && $_FILES['profilePhoto']['error'] == 0) {
        $targetDir = "uploads/profile_photos/";
        $profilePhoto = $targetDir . basename($_FILES["profilePhoto"]["name"]);
        
        // Move the uploaded photo to the directory
        if (!move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $profilePhoto)) {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    }

    // Insert profile data into the database
    $stmt = $conn->prepare("INSERT INTO profiles (name, email, phone, specialization, experience, bio, profilePhoto) 
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssiss", $name, $email, $phone, $specialization, $experience, $bio, $profilePhoto);

    if ($stmt->execute()) {
        // Store profile data in session
        $_SESSION['name'] = $name;
        $_SESSION['specialization'] = $specialization;
        $_SESSION['profilePhoto'] = $profilePhoto;
        
        // Redirect to doctor dashboard after saving the profile
        header("Location: doctor.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
