<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background: url(../img/login_page_bg.jpg) no-repeat;
            background-size: cover;
            overflow-x: hidden;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: rgb(220, 53, 69);
        }

        .card {
            border: none;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card-header {
            background-color: #f8f9fa;
            padding: 15px;
            border-bottom: 1px solid #ccc;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .value {
            margin-top: 5px;
            color: #333;
        }

        .icon-span {
            margin-top: 20px;
            width: 40px;
            height: 40px;
            background-color: rgb(220, 53, 69);
            color: #fff !important;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .icon-span:hover {
            background-color: rgb(236, 34, 54);
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .card-body {
                flex-direction: column;
            }

            .d-flex {
                flex-direction: column;
                text-align: center;
            }

            .row {
                margin-left: 0;
                margin-right: 0;
            }
        }
    </style>

</head>

<body>
    <?php
    include("./config.php");

    $sql = "SELECT * FROM register WHERE email LIKE '" . $_SESSION["email"] . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $first_name = $row['fname'];
        $last_name = $row['lname'];
        $email = $row['email'];
        $address = $row['address'];
        $phone_number = $row['pnumber'];
        $age = $row['age'];
        $mem_type = $row['mem_type'];
        $mem_duration = $row['mem_duration'];
        $regis_date = $row['registered_date'];
        
        $dateTime = new DateTime($regis_date);
        $dateTime->add(new DateInterval("P{$mem_duration}M"));
        $newTimestamp = $dateTime->format('Y-m-d H:i:s');
    ?>

    <div class="container">
        <div class="d-flex justify-content-center align-items-center mb-4">
            <a href="../aft_login/aft_login.php" class="border border-black icon-span rounded-circle text-center p-2"><i
                    class="fa-solid fa-chevron-left"></i></a>
        </div>

        <div class="card p-5">
            <h2 class="text-center lh-lg">Personal Information</h2>
            <div class="card-body d-flex justify-content-center align-items-center">
                <div class="d-flex">
                    <div class="text-center me-5">
                        <div class="value">
                            <img class="rounded-circle border border-black" src="./photo/<?php  echo $row['photo'];?>"
                                height="200px" width="200px" alt="Profile"><br><br>
                        </div>
                    </div>

                    <div class="row ms-5">
                        <div class="col-md-6 mb-3">
                            <div class="label">First Name:</div>
                            <div class="value">
                                <?php echo $first_name; ?>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="label">Last Name:</div>
                            <div class="value">
                                <?php echo $last_name; ?>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="label">Age:</div>
                            <div class="value">
                                <?php echo $age; ?>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="label">Address:</div>
                            <div class="value">
                                <?php echo $address; ?>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="label">Phone Number:</div>
                            <div class="value">
                                <?php echo $phone_number; ?>
                            </div>
                        </div><br><br><br><br>
                        <div class="col-md-6">
                            <div class="label">Membership Type:</div>
                            <div class="value">
                                <?php echo $mem_type; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="label">Membership Duration:</div>
                            <div class="value">
                                <?php echo $mem_duration . ' Months'; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="label">Registered In:</div>
                            <div class="value">
                                <?php echo $regis_date; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="label">Expires In:</div>
                            <div class="value">
                                <?php echo $newTimestamp; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="edit.php?email=<?php echo $row['email']; ?>" class="btn btn-danger mt-3">Edit</a>
            </div>
        </div>
    </div>

    <?php
    } 
    ?>
</body>

</html>