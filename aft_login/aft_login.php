<?php
session_start();
include "../php/config.php";

$sql = "SELECT register.photo FROM register WHERE email LIKE '".$_SESSION["email"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="The Fitness Club is a state of the art GYM, complete with equipment for cardio and strength training." />

    <link rel="icon" href="../img/logo.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./index.css">

    <style>
        /* footer section */
        .site-links h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .site-links .site-link {
            display: block;
            margin-bottom: 0.5rem;
            color: #fff;
            text-decoration: none;
            transition: color 0.5s ease;
        }

        .site-links .site-link:hover {
            color: #dc3545;
            /* Red color on hover */
        }
    </style>

    <title>The Fitness Club - Gym | Cardio | Yoga | Zumba</title>
</head>

<body>
    <div class="position-fixed bottom-0 end-0">
        <a href="#top"><img class="m-4" src="../img/uparrow.png" alt="Error" height="50px" data-bs-toggle="tooltip"
                data-bs-placement="bottom" data-bs-title="Move to Top" /></a>
    </div>
    <nav class="navbar navbar-expand-lg py-4 bg-dark" data-bs-theme="dark">
        <div class="container gap-5" style="overflow: visible;">
            <a class="navbar-brand text-white order-2" href="aft_login.php" data-bs-toggle="tooltip"
                data-bs-placement="bottom" data-bs-title="TFC">The Fitness Club</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="offcanvas offcanvas-end bg-dark order-1 order-lg-2" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
                        style="filter: invert(1);"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav align-items-center justify-content-end flex-grow-1 pe-3 gap-3">
                        <li class="nav-item">
                            <a class="nav-link text-capitalize text-center active" aria-current="page"
                                href="./aft_login.php" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-title="Home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-capitalize text-center" href="./about.php" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" data-bs-title="About">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-capitalize text-center" href="./trainer.php"
                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-title="Trainers">Trainers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-capitalize text-center" href="./schedule.php"
                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-title="Schedule">Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-capitalize text-center" href="./packages.php"
                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-title="Packages">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger border border-white text-capitalize px-4 py-2 fw-bold text-center"
                                href="./ptrainer.php" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-title="Hire Private Trainer">Hire Private Trainer</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="dropdown order-3">
                <img class="rounded-circle" src="../php/photo/<?php  echo $row['photo'];?>" height="100px" width="100px"
                    style="cursor: pointer;" alt="Profile" class="dropdown-toggle" id="profileDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="../php/perinfo.php">Personal Details</a></li>
                    <li><a class="dropdown-item" href="../php/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    }
    }
    ?>

    <section class="main bg-main">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <h1
                            class="text-capitalize fw-bolder text-white text-capitalize fs-1 text-center text-md-center text-lg-start">
                            Knock out excuses, one punch at a time.</h1>
                        <p class="mt-3 mb-3 para-width text-light-grey text-center text-md-center text-lg-start">Explore
                            a world of expert workouts, nutrition insights, and a vibrant community, fostering a
                            holistic wellness journey for you.
                        </p>
                        <div class="w-100 text-center text-md-center text-lg-start">
                            <a href="" class="btn btn-danger border text-capitalize px-4 py-2 fw-bold"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Get Started">
                                Get Started <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="m-5"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="activity">
        <div class="container text-center common-title fw-bold">
            <h2 class="common-heading">What we Offer</h2>
            <hr class="w-25 mx-auto" />
        </div>
        <div class="container p-5">
            <div class="row g-5">
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="px-3 py-5 shadow d-flex rounded-2">
                        <img src="../img/gym.png" alt="gym" class="d-md-block d-none img-fluid mx-3" width="200px" />
                        <div>
                            <p class="mb-3 fw-bolder">Gym</p>
                            <p>Discover personalized workouts at our state-of-the-art gym, designed for all fitness
                                levels. From free weights to cutting-edge machines, sculpt your body and reach your
                                goals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="px-3 py-5 shadow d-flex rounded-2">
                        <img src="../img/cardio.png" alt="cardio" class="d-md-block d-none img-fluid mx-3"
                            width="200px" />
                        <div>
                            <p class="mb-3 fw-bolder">Cardio</p>
                            <p>Experience high-energy cardio workouts in our Cardio Zone. Our top-notch equipment, from
                                treadmills to ellipticals, ensures an effective workout to elevate your endurance.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="px-3 py-5 shadow d-flex rounded-2">
                        <img src="../img/zumba.png" alt="zumba" class="d-md-block d-none img-fluid mx-3"
                            width="200px" />
                        <div>
                            <p class="mb-3 fw-bolder">Zumba</p>
                            <p>Join our energetic Zumba classes at The Fitness Club! Dance to contagious rhythms for a
                                fun, effective workout and let the music inspire a healthier, happier you.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="px-3 py-5 shadow d-flex rounded-2">
                        <img src="../img/yoga.png" alt="yoga" class="d-md-block d-none img-fluid mx-3" width="200px" />
                        <div>
                            <p class="mb-3 fw-bolder">Yoga</p>
                            <p>Discover serenity at our Yoga Studio. Experienced instructors guide diverse practices for
                                flexibility, mindfulness, and inner peace, aiding your journey to holistic well-being.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-color more-info-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">
                    <h1 class="text-capitalize fw-bolder text-white">Discover Your Strength,<br /> Unleash Your
                        Potential</h1>
                    <p class="mt-3 mb-3 text-light-grey">Empower your journey at The Fitness Club – where you discover
                        strength, unlock potential, and achieve your wellness aspirations.</p>
                    <div class="w-100 text-md-start">
                        <a href="" class="btn btn-danger border text-capitalize px-4 py-2 fw-bold"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Learn More">
                            Apply Now <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-12 col-lg-6"></div>
            </div>
        </div>
    </section>

    <section class="facility-section">
        <div class="container text-center common-title fw-bold">
            <h2 class="common-heading">Our Facilities</h2>
            <hr class="w-25 mx-auto" />
        </div>
        <div class="container p-5">
            <div class="row g-5">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="px-3 py-5 d-flex rounded-2 shadow flex-lg-row flex-md-column align-items-center">
                        <img src="../img/equipment.jpg" alt="equipment" class="d-md-block d-none img-fluid mx-3 shadow"
                            width="500px" />
                        <div class="p-2 text-center d-flex align-items-center justify-content-center flex-column">
                            <p class="mb-3 fw-bolder fs-2 lh-1">Fully Equipped Gym</p>
                            <p>Step into our fully equipped gym at The Fitness Club, where cutting-edge equipment caters
                                to all levels. Sculpt your body, build strength, and achieve your goals in a space
                                designed for your success.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="px-3 py-5 d-flex rounded-2 shadow flex-lg-row flex-md-column align-items-center">
                        <img src="../img/hallroom.jpg" alt="hall" class="d-md-block d-none img-fluid mx-3 shadow"
                            width="500px" />
                        <div class="p-2 text-center d-flex align-items-center justify-content-center flex-column">
                            <p class="mb-3 fw-bolder fs-2 lh-1">Spacious Hall for Zumba & Yoga</p>
                            <p>Experience dynamic Zumba and serene Yoga at our spacious hall in The Fitness Club.
                                Energize with Zumba's rhythm or find serenity in yoga's practices, all in a welcoming
                                environment designed for fitness and wellness.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12">
                <div class="px-3 py-5 d-flex rounded-2 shadow flex-lg-row flex-md-column align-items-center">
                    <img src="../img/sauna.jpg" alt="sauna" class="d-md-block d-none img-fluid mx-3 shadow"
                        width="500px" />
                    <div class="p-2 text-center d-flex align-items-center justify-content-center flex-column">
                        <p class="mb-3 fw-bolder fs-2 lh-1">Sauna & Steam Room</p>
                        <p>Relax in luxury at The Fitness Club's sauna and steam room. Experience tranquility, stress
                            relief, and muscle rejuvenation for improved well-being and relaxation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark">
        <div class="container justify-content-center align-items-center" style="padding: 5rem 3rem 3rem;">
            <div class="row g-5" style="--bs-gutter-x: 8.5rem;">
                <div class="col-lg-4">
                    <div class="text-center text-lg-start">
                        <a class="text-white" href="#">The Fitness Club</a><br /><br />
                        <p class="text-white">Join The Fitness Club for expert-led workouts, diverse classes, and a
                            supportive community. Achieve holistic well-being with our gym, Zumba, Yoga, and luxurious
                            sauna—where passion, purpose, and wellness unite.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text-center text-lg-start">
                        <h3 class="text-white">Connect With Us</h3><br />
                        <div class="d-flex gap-2 justify-content-center justify-content-lg-start">
                            <a href="https://www.facebook.com/"><img src="../img/fb.png" class="img-fluid"
                                    alt="Facebook" width="40em" /></a>
                            <a href="https://www.instagram.com/"><img src="../img/in.png" class="img-fluid"
                                    alt="Instagram" width="40em" /></a>
                            <a href="https://twitter.com/"><img src="../img/twi.png" class="img-fluid" alt="Twitter"
                                    width="40em" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="site-links text-center text-lg-start">
                        <h3 class="text-white">Site Links</h3>
                        <div class="row">
                            <div class="col-6">
                                <a href="./aft_login.php" class="site-link">Home</a>
                                <a href="./about.php" class="site-link">About</a>
                                <a href="./trainer.php" class="site-link">Trainers</a>
                                <a href="./schedule.php" class="site-link">Schedule</a>
                            </div>
                            <div class="col-6">
                                <a href="./packages.php" class="site-link">Packages</a>
                                <a href="./ptrainer.php" class="site-link">Hire Private Trainer</a>
                                <a href="../php/perinfo.php" class="site-link">View Personal Info</a>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="text-white hr" />
                <div>
                    <p class="text-white text-center"><span>Privacy Policy | </span>Copyrights &copy; 2023 The
                        Fitness Club.
                        All rights reserved!</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const login = urlParams.get('login');

        if (login === 'success') {
            alert("Login complete! You've successfully logged in and ready to go.");
        }
    </script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>