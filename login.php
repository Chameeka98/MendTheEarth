<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "mendtheearth";

// Create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the username and password from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the SQL query to check if the username and password exist in the database
$sql = "SELECT name,password FROM login WHERE name='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

// Check if the query returned any rows
if (mysqli_num_rows($result) == 1) {
    // Login successful
    header("Location: index.html");
        exit();
} else {
    // Login failed
    header("Location: login2.html");
        exit();
}

// Close the database connection
mysqli_close($conn);
?>
