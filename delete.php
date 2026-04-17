<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $rollNumber = $_GET['id'];

    $sql = "DELETE FROM Form WHERE RollNumber = '$rollNumber'";
    if (mysqli_query($conn, $sql)) {
        echo "Row deleted successfully.";
        echo "</br>";
        echo "<button><a href= './admin.php' style= 'text-decoration:none;' >Go Back</a></button>";
    } else {
        echo "Error deleting row: " . mysqli_error($conn);
    }
}

?>
