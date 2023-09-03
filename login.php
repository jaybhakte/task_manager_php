<?php
session_start();
// Database connection
$connection = mysqli_connect("localhost", "root", "Suresh@123", "task_manager");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

// Check user credentials
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
} else {
    echo "Invalid credentials. <a href='index.html'>Go back</a>";
}

mysqli_close($connection);
?>
