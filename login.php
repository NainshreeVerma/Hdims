<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'hdims');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data and sanitize input
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];
$role = $_POST['role'];

// Verify user
$sql = "SELECT * FROM users WHERE email = '$username' AND role = '$role'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // Verify the password
    if (password_verify($password, $user['password'])) {
        // Set cookies for user information
        setcookie('user_id', $user['id'], time() + 3600, '/'); // Cookie valid for 1 hour
        setcookie('username', $user['email'], time() + 3600, '/');
        setcookie('role', $user['role'], time() + 3600, '/');
        
        // Set specific cookies for doctor or patient details
        if ($role == 'doctor') {
            setcookie('doctor_name', $user['name'], time() + 3600, '/'); // Doctor's name
            header("Location: doctor dashboard/doctor.php"); // Redirect to doctor dashboard
        } elseif ($role == 'patient') {
            setcookie('patient_name', $user['name'], time() + 3600, '/'); // Patient's name
            header("Location: client dashboard/patient.php"); // Redirect to patient profile
        }
        exit;
    } else {
        echo "Invalid password!";
    }
} else {
    echo "No user found with these credentials!";
}

$conn->close();
?>
