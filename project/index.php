<?php
session_start();
include("include/dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>iRepair - The total repair solution</title>
    <link rel="icon" href="assets/siteicon.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/customcss.css" rel="stylesheet" />
</head>

<body>

    <!-- Header-->
    <header class="position-relative">
        <div class="position-absolute top-50 start-50 translate-middle">
            <h1 class="text-white text-center">iRepair</h1>
            <p class=" text-white-50 text-center">The ultimate repaire solution for your smartphones.<br>We fix it with keen care and quality.</p>
            <div class="d-flex justify-content-center">
                <a class="btn btn-outline-light btn-lg px-4" href="selectrepairtype.php"><i class="bi bi-gear-wide-connected"></i> REPAIR</a>
            </div>
        </div>
    </header>

    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow static-top navmine">
        <div class="container">
            <a class="navbar-brand" href="index.html">iRepair</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#brand">Brand</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#feedback">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>

                    <?php
                    if (isset($_SESSION["id"]) == session_id()) {
                        $nam = $_SESSION["s_name"];
                        $status = $_SESSION["s_status"];
                        echo "<li class=nav-item><a class=nav-link href=logout.php>Logout</a></li>";
                        echo "<li class=nav-item><a class=nav-link href=userpage.php>$nam</a></li>";
                    } else {
                        echo "<li class=nav-item><a class=nav-link href=userlogin.php>Account</a></li>";
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Features section-->
    <section class="p-2 mt-5 mb-5" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="text-center mb-5">
                    <h2 class="sectionhead">WHY CHOOSE US?</h2>
                    <p class="sectionheaddescription mb-0">WE WISH TO BE DISTINCT FROM OTHERS</p>
                </div>
                <div class="col-lg-3 mt-4 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-truck-flatbed"></i></div>
                    <h2 class="h4 fw-bolder">Initiate Pickup</h2>
                    <p>Start a service with us by requesting a pickup for your phone from our website.</p>
                    <a class="text-decoration-none" href="#!">
                        Call to action
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-3 mt-4 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-check2-circle"></i></div>
                    <h2 class="h4 fw-bolder">Choose spare parts</h2>
                    <p>We provide you the liberty to choose the appropriate spare part to repair your phone from our available collection of spare parts.</p>
                    <a class="text-decoration-none" href="#!">
                        Call to action
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-3 mt-4 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-geo"></i></div>
                    <h2 class="h4 fw-bolder">Track repair status</h2>
                    <p>A realtime status update of your service is provided through our website for each of our customers.</p>
                    <a class="text-decoration-none" href="#!">
                        Call to action
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-3 mt-4 mb-5 mb-lg-0">
                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-truck"></i></div>
                    <h2 class="h4 fw-bolder">Initiate delivery</h2>
                    <p>Finally we provide the service of delivering the repaired phone to you. You will also have the provision to pick up the phone from our shop.</p>
                    <a class="text-decoration-none" href="#!">
                        Call to action
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service section-->
    <section class="bg-light p-2 mt-5 mb-5" id="services">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="text-center mb-5">
                    <h2 class="sectionhead">SERVICES</h2>
                    <p class="sectionheaddescription mb-0">We provide these rapi</p>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <div class="card  mx-auto" style="width: 18rem;">
                                <img src="https://rapidrepair.in/wp-content/uploads/2020/03/iPhone-8-Screen-replacement.jpg" class="card-img-top" alt="Display Repair">
                                <div class="card-body">
                                    <h5 class="card-title">Screen replacment</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Repair</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card  mx-auto" style="width: 18rem;">
                                <img src="https://photos5.appleinsider.com/gallery/28658-45022-000-3x2-Batterygate-iPhones-li-ion-battery-(iFixit)-l.jpg" class="card-img-top" alt="Display Repair" style="height:150px;">
                                <div class="card-body">
                                    <h5 class="card-title">Battery replacment</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Repair</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card mx-auto" style="width: 18rem;">
                                <img src="https://thumbs.dreamstime.com/b/kiev-ukraine-may-close-up-image-central-board-apple-iphone-se-golden-apple-service-repair-kiev-ukraine-may-close-up-184173626.jpg" class="card-img-top" alt="Display Repair" style="height:150px;">
                                <div class="card-body">
                                    <h5 class="card-title">Board replacment</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Repair</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer feedback section-->
    <section class="p-2 mt-5 mb-5" id="feedback">
        <div class="container px-5 my-5">
            <div class="text-center mb-5">
                <h2 class="sectionhead">Customer Feedback</h2>
                <p class="sectionheaddescription">Our customers love working with us</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <!-- Testimonial 1-->
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                <div class="ms-4">
                                    <p class="mb-1">Thank you for putting together such a great product. We loved working with you and the whole team, and we will be recommending you to others!</p>
                                    <div class="small text-muted">- Client Name, Location</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 2-->
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-primary fs-1"></i></div>
                                <div class="ms-4">
                                    <p class="mb-1">The whole team was a huge help with putting things together for our company and brand. We will be hiring them again in the near future for additional work!</p>
                                    <div class="small text-muted">- Client Name, Location</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact section-->
    <section class="bg-light p-2 mt-5 mb-5 contact" id="contact" #contact>
        <div class="container px-5 my-5 px-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h2 class="sectionhead">Get in touch</h2>
                <p class="sectionheaddescription">We'd love to hear from you</p>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Full name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">Phone number</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-4 bg-dark">
        <div class="container px-5">
            <p class="m-0 text-center text-white">All rights reserved &copy; iRepair 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- Form validation-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>