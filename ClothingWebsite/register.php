<?php
include "db.php";

function registerUser() {
    global $conn;   
    static $count = 0;   
    $count++;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userData = array(
        "username" => $username,
        "email" => $email,
        "password" => $password
    );
    
   $sql = "INSERT INTO userdetails (username, email, password)
        VALUES ('$username', '$email', '$password')";

  $success = false;

    if (mysqli_query($conn, $sql)) {
        $success = true;
    }
    
    if ($success) {
    echo "Registration successful!<br>";
    echo "Registrations in this request: " . $count;
    }
    else {
            die("Registration failed");
        }
}

registerUser();
?>