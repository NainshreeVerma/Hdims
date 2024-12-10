<?php
// Database connection parameters
$servername = "localhost"; // Your database server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "your_database"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to upload a file
function uploadFile($file, $targetDir) {
    $targetFile = $targetDir . basename($file["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (e.g., limit to 2MB)
    if ($file["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats (you can adjust this as needed)
    if (!in_array($fileType, ["jpg", "jpeg", "png", "pdf", "docx"])) {
        echo "Sorry, only JPG, JPEG, PNG, PDF & DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return false;
    } else {
        // If everything is ok, try to upload the file
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile; // Return the file path for database storage
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO doctors (name, email, specialization, qualifications, experience, availability, photo, documents) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisss", $name, $email, $specialization, $qualifications, $experience, $availability, $photoPath, $documentsPath);

    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $specialization = $_POST['specialization'];
    $qualifications = $_POST['qualifications'];
    $experience = $_POST['experience'];
    $availability = $_POST['availability'];

    // Define target directory for uploads
    $targetDir = "uploads/";

    // Upload photo
    $photoPath = uploadFile($_FILES['photo'], $targetDir);

    // Handle multiple document uploads
    $documentsPaths = [];
    foreach ($_FILES['documents']['tmp_name'] as $key => $tmpName) {
        $fileArray = [
            'name' => $_FILES['documents']['name'][$key],
            'type' => $_FILES['documents']['type'][$key],
            'tmp_name' => $tmpName,
            'error' => $_FILES['documents']['error'][$key],
            'size' => $_FILES['documents']['size'][$key]
        ];
        $docPath = uploadFile($fileArray, $targetDir);
        if ($docPath) {
            $documentsPaths[] = $docPath; // Add successful upload paths
        }
    }
    $documentsPath = implode(",", $documentsPaths); // Store as a comma-separated string

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
