<?php
// Start the session at the beginning
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "db_dokan");
if (!$conn) die("Oops! Database connection failed.");

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    // Check if password and confirm password match
    if ($password !== $confirm) {
        $_SESSION['error'] = "Passwords do not match!";
        header("Location: form.html");
        exit;
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query to insert user data into the database
    $sql = "INSERT INTO users (fullname, username, email, password) 
            VALUES (?, ?, ?, ?)";

    // Prepare and execute the statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $fullname, $username, $email, $hashedPassword);

        if ($stmt->execute()) {
            // Store success message in session
            $_SESSION['success'] = "User registered successfully!";
            header("Location: form.html"); // Redirect to the form page or a new page
            exit;
        } else {
            // Store error message in session
            $_SESSION['error'] = "Error: " . $stmt->error;
            header("Location: form.html");
            exit;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Store connection error in session
        $_SESSION['error'] = "Error: " . $conn->error;
        header("Location: form.html");
        exit;
    }

    // Close the database connection
    $conn->close();
}
?>
