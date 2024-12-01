
<?php
// Ensure correct credentials and use mysqli for database connection
$servername = "localhost";  // Database server
$username = "root";         // Database username (change as per your setup)
$password = "";             // Database password (change as per your setup)
$dbname = "db_dokan";  // Database name (change as per your setup)

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
