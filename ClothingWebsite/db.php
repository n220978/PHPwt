<?php
$servername = "127.0.0.2";
$username   = "root";
$password   = "";
$database   = "userdb";
$port=3308;
$conn = mysqli_connect($servername, $username, $password, $database, $port);

if ($conn) {
    echo "✅ Database connection successful!";
} else {
    die("❌ Connection failed: " . mysqli_connect_error());
}
?>
