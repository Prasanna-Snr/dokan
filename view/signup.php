<?php
include "../database/dbcon.php";

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $role = $_POST['role'];  // Role from the form (admin or customer)

    // Check if passwords match
    if ($password !== $confirm) {
        echo "Passwords do not match!";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Determine which table to insert into based on the role
    if ($role == 'admin') {
        // Insert into admin table
        $query = "INSERT INTO tbl_admin (fullname, username, email, password, role) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssss", $fullname, $username, $email, $hashedPassword, $role);
    } else if ($role == 'customer') {
        // Insert into customer table
        $query = "INSERT INTO tbl_customer (fullname, username, email, password, role) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssss", $fullname, $username, $email, $hashedPassword, $role);
    } else {
        echo "Invalid role!";
        exit;
    }

    // Execute the query
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <p id="login-txt">Sign Up</p>
    <div class="login-container">
        <div class="login-box">
            <form action="">
                <div class="from-field">
                    <label for="fullname">Fullname:</label>
                    <input type="text" name="fullname" id="fullname" class="contact-input-field" placeholder="Fullname">
                </div>
    
                <div class="from-field">
                    <label for="uname">Username:</label>
                    <input type="text" name="username" class="contact-input-field" id="username" placeholder="Username">
                </div>

                <div class="from-field">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="contact-input-field" placeholder="Email">
                </div>

                <div class="from-field">
                    <label for="psw">Password:</label>
                    <input type="password" name="password" id="password" class="contact-input-field" placeholder="Password">
                </div>

                <div class="from-field">
                    <label for="cpsw">Confirm:</label>
                    <input type="password" name="confirm" id="confirm" class="contact-input-field" placeholder="Confirm">
                </div>

                <div class="from-field">
                    <label for="role">Role:</label>
                    <select name="role" id="role" class="contact-input-field">
                        <option value="customer">Customer</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <button id="btn-login" name="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a href="" id="sign-up-txt">Login</a></p>
        </div>
        <div class="image-box">
            <div class="login-image-container">
                <img src="/dokan/images/login.png" alt="">
            </div>
        </div>
    </div>
</body>
</html>
