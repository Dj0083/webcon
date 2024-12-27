<?php

// Database connection
$conn = new mysqli('localhost', 'root', '', 'conference_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize a message variable
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nic = $_POST['nic'];
    $category = $_POST['category'];
    $country = $_POST['country'];
    $sessions = isset($_POST['sessions']) ? implode(", ", $_POST['sessions']) : '';

    if (isset($_POST['participant_name'])) {
        $participant_name = $_POST['participant_name'];
    } else {
        $participant_name = ''; // Provide a default value or handle the error
    }
    
    // Initialize file-related variables
    $file_name = $file_tmp = $file_size = $file_type = '';
    $upload_success = true;
    

    // Debugging: Check if $_FILES['payment-file'] exists
    if (isset($_FILES['payment-file'])) {
    

        // Check if file was uploaded without error
        if ($_FILES['payment-file']['error'] == 0) {
            // Retrieve file information
            $file_name = $_FILES['payment-file']['name'];
            $file_tmp = $_FILES['payment-file']['tmp_name'];
            $file_size = $_FILES['payment-file']['size'];
            $file_type = $_FILES['payment-file']['type'];
            $upload_dir = 'uploads/';

            // Ensure the file is a PDF
            if ($file_type != 'application/pdf') {
                echo 'Error: Please upload a PDF file only.';
            } else {
                // Move the file to the upload directory
                if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
                    echo 'File uploaded successfully!';
                } else {
                    echo 'Error: Failed to upload file.';
                }
            }
        } else {
            echo 'Error: No file uploaded or upload error.';
        }
    } else {
        echo 'Error: No file input detected.';
    }

    // Insert the form data into the database if needed
    echo "Form data received successfully!";

    if ($upload_success) {
        echo "<h1>File uploaded successfully!</h1>";
        
        echo "<a href='index.php'><button style='padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;'>Go to Main Menu</button></a>";
    } else {
        echo "<h1>Error in uploading file!</h1>";
    }
}

?>

    
