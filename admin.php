<?php

include 'conference_admin.php';
session_start();

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['signup'])) {
        // Handle Sign-Up
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $role = $_POST['role'];

        // Check if passwords match
        if ($password !== $confirm_password) {
            $message = "Passwords do not match!";
        } else {
            // Check if user already exists
            $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                $message = "Username already taken. Please choose another one.";
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert user into database
                $stmt = $conn->prepare("INSERT INTO admins (username, password, role) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $hashed_password, $role);

                if ($stmt->execute()) {
                    // Account created successfully
                    $message = "Account created successfully! You can now log in.";
                } else {
                    $message = "Error: " . $stmt->error;
                }
            }

            $stmt->close();
        }
    }

    // Handle Sign-In
    if (isset($_POST['signin'])) {
        $username = $_POST['signin_username'];
        $password = $_POST['signin_password'];

        // Check if username exists
        $stmt = $conn->prepare("SELECT id, password, role FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($user_id, $hashed_password, $role);

        if ($stmt->num_rows > 0) {
            // Fetch user details
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashed_password)) {
                // Set session variables
                $_SESSION['user_id'] = $user_id;
                $_SESSION['role'] = $role;

                // Redirect to dashboard based on role
                header("Location: admin_dashboard.php");
                exit();
            } else {
                $message = "Invalid username or password!";
            }
        } else {
            $message = "User does not exist!";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up / Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin: 20px 0;
            padding: 15px;
            border: 1px solid #ccc;
            max-width: 400px;
            background-color: #f9f9f9;
        }
        label, input, select, button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <h1>Sign Up / Sign In</h1>
    
    <!-- Display messages -->
    <?php if ($message) echo "<p class='" . (strpos($message, "success") !== false ? "success" : "error") . "'>$message</p>"; ?>

    <!-- Sign-Up Form -->
    <h2>Sign Up</h2>
    <form method="POST" action="">
        <input type="hidden" name="signup">
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required>
        <label>Role:</label>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="staff">Staff</option>
        </select>
        <button type="submit">Sign Up</button>
    </form>

    <!-- Sign-In Form -->
    <h2>Sign In</h2>
    <form method="POST" action="">
        <input type="hidden" name="signin">
        <label>Username:</label>
        <input type="text" name="signin_username" required>
        <label>Password:</label>
        <input type="password" name="signin_password" required>
        <button type="submit">Sign In</button>
    </form>
</body>
</html>
