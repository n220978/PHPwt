
<?php
include "db.php";

function validateLogin() {
    global $conn;
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM userdetails WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed");
    }

    if (mysqli_num_rows($result) > 0) {
        print "Login Successful!";
    } else {
        print "Invalid Username or Password";
    }
}

validateLogin();
?>