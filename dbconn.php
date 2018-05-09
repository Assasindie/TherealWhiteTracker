
<?php session_start();
$connection = mysqli_connect('localhost','Admin','Assasindie');
if (!$connection) {
    die("Database connection failed: " . mysqli_error());
}

$db_select = mysqli_select_db($connection, 'whitetracker');
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}
$_SESSION['connection'] = $connection;

?>