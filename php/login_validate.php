<?php
include "config.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = md5($password); 

    $sql = "SELECT * FROM register WHERE email = '$email' AND password = '$hashed_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['loggedin'] = true; 
        $_SESSION['email'] = $email;
        header("Location: ../aft_login/aft_login.php?login=success");
        exit();
    } else {
        echo 'Invalid email or password!';  
    }
    $conn->close();
}
?>
