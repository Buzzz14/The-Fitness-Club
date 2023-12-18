<?php
include "config.php";

if (isset($_POST["submit"])) { 
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $phone_number = $_POST['pnumber'];
    $email_address = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = md5($password);
    $mem_type = $_POST['mem_type'];
    $mem_duration = $_POST['mem_duration'];

    $check_query = "SELECT * FROM `register` WHERE `email` = '$email_address'";
    $check_result = $conn->query($check_query);

    $ppic=$_FILES['photo']['name'];
    $extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");

    if ($check_result->num_rows > 0) {
        echo "Email already exists. Please use a different email address.";
    } 
    else {
        if(in_array($extension,$allowed_extensions)){
        $imgnewfile=time().$extension;
        move_uploaded_file($_FILES["photo"]["tmp_name"],"photo/".$imgnewfile);

        $insert_query = "INSERT INTO `register` (`fname`, `lname`, `address`, `pnumber`, `age`, `email`, `password`, `photo`, `mem_type`, `mem_duration`) VALUES ('$first_name', '$last_name', '$address', '$phone_number', '$age', '$email_address', '$hashed_password', '$imgnewfile', '$mem_type', '$mem_duration')";

        $insert_result = $conn->query($insert_query);

        if ($insert_result === TRUE) {
            header("Location: index.html?signup=success");
            exit();
        } 
        else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
        }
    $conn->close();
    }
}
?>
