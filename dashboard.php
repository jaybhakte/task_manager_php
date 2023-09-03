<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

// Database connection
$connection = mysqli_connect("localhost", "root", "Suresh@123", "task_manager");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

$username = $_SESSION['username'];

// Retrieve tasks from the database
$query = "SELECT * FROM tasks WHERE username = '$username'";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Task Manager</title>
</head>
<body>
    <h1>Welcome, <?php echo $username; ?>!</h1>
    <a href="logout.php">Logout</a>
    <h2>Your Tasks</h2>
    <ul>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <li><?php echo $row['task']; ?></li>
        <?php } ?>
    </ul>
</body>
</html>

<?php
mysqli_close($connection);
?>
