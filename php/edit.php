<?php
    session_start();
    include "./config.php";

    if (isset($_POST["update"])){ 
        $email = $_SESSION['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $pnumber = $_POST['pnumber'];
        $address = $_POST['address'];
        $mem_type = $_POST['mem_type'];
        $mem_duration = $_POST['mem_duration'];
        $ppic=$_FILES['photo']['name'];
        $extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
        $allowed_extensions = array(".jpg","jpeg",".png",".gif");
        if(in_array($extension,$allowed_extensions))
        {
            $imgnewfile='ismt'.time().$extension;
            move_uploaded_file($_FILES["photo"]["tmp_name"],"photo/".$imgnewfile);
        
            $sql = "UPDATE register SET fname='$fname', lname='$lname', age='$age', pnumber='$pnumber', `address`='$address', photo='$imgnewfile', mem_type='$mem_type', mem_duration='$mem_duration' WHERE email='$email'";
        
            $result = $conn->query($sql);

            if($result == true){
                echo("Record Updated Successfully!");
                header("Location: ./perinfo.php");
            }
            else{
                echo "Error:" . $sql . "<br>" . $conn->error;
            }
        }
    }

    if (isset($_GET["email"])){
        $email = $_GET['email'];

        $sql = "SELECT * FROM register WHERE email = '$email'";
        
        $result = $conn->query($sql);

        if($result -> num_rows > 0){
            while($row = $result -> fetch_assoc()){
                $fname = $row['fname'];
                $lname = $row['lname'];
                $pnumber = $row['pnumber'];
                $address = $row['address'];
                $age = $row['age'];
                $mem_type = $row['mem_type'];
                $mem_duration = $row['mem_duration'];
                $pp = $row['photo'];
            }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="file"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        img {
            margin-top: 10px;
            border-radius: 50%;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        input[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        span.error-message {
            color: red;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <h3>Edit Page</h3>
        <label for="fname">First Name:</label> <br>
        <input type="text" name="fname" value="<?php echo $fname; ?>"> <br>
        <label for="lname">Last Name:</label> <br>
        <input type="text" name="lname" value="<?php echo $lname; ?>"> <br>
        <label for="age">Age:</label> <br>
        <input type="number" name="age" value="<?php echo $age; ?>"> <br>
        <label for="phone">Phone Number:</label> <br>
        <input type="number" name="pnumber" value="<?php echo $pnumber; ?>"> <br>
        <label for="address">Address:</label> <br>
        <input type="text" name="address" value="<?php echo $address; ?>"> <br><br>
        <div>
            <img src="./photo/<?php  echo $pp;?>" width="120" height="120">
        </div>
        <div>
            <input type="file" name="photo" required="true">
            <span style="color:red; font-size:12px;">Only jpg / jpeg/ png /gif format allowed.</span>
        </div>
        <br>
        <label class='me-2'>Membership Type:</label>
        <select name="mem_type" id="mem_type">
            <option class="text-center" value="option" disabled>- Select -</option>
            <option value="Basic" <?php if ($mem_type==='Basic' ) echo 'selected' ; ?>>Basic</option>
            <option value="Zumbastic" <?php if ($mem_type==='Zumbastic' ) echo 'selected' ; ?>>Zumbastic</option>
            <option value="Yogastic" <?php if ($mem_type==='Yogastic' ) echo 'selected' ; ?>>Yogastic</option>
            <option value="Elite" <?php if ($mem_type==='Elite' ) echo 'selected' ; ?>>Elite</option>
            <option value="Platinum" <?php if ($mem_type==='Platinum' ) echo 'selected' ; ?>>Platinum</option>
        </select>
        <label class=' me-2'>Membership Duration:</label>
        <input class='ms-2 me-2' type="radio" name='mem_duration' value="1" <?php if ($mem_duration==='1' )
            echo 'checked' ; ?>/><label>1 Month</label>
        <input class='ms-2 me-2' type="radio" name='mem_duration' value="3" <?php if ($mem_duration==='3' )
            echo 'checked' ; ?>/><label>3 Months</label>
        <input class='ms-2 me-2' type="radio" name='mem_duration' value="6" <?php if ($mem_duration==='6' )
            echo 'checked' ; ?>/><label>6 Months</label>
        <input class='ms-2 me-2' type="radio" name='mem_duration' value="12" <?php if ($mem_duration==='12' )
            echo 'checked' ; ?>/><label>1 Year</label>
        <input type="submit" name="update" value="Update">
    </form>
</body>

</html>

<?php
        } 
        else {
            header('Location: ./perinfo.php');
        }
    }
?>