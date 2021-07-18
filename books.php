<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Lokesh Didwania</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/image.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="assets/img/1.png" rel="1-icon">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i|Playfair+Display:400,400i,500,500i,600,600i,700,700i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top" style="position: sticky;">
        <div class="container d-flex align-items-center justify-content-between">

            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
            <!-- Uncomment below if you prefer to use an text logo -->
            <h1 class="logo"><a href="index.html">Lokesh Didwania</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="index.html#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="index.html#about">About Me </a></li>
                    <li><a class="nav-link  scrollto" href="books.html">My Books</a></li>
                    <li><a class="nav-link  scrollto" href="podcast.html">My Podcasts</a></li>
                    <li><a class="nav-link  scrollto" href="blogs.html"> My Blogs</a></li>
                    <li class="dropdown"><a href="#"><span>Other Options</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="contact.html">Contact Me</a></li>
                            <li><a href="tnc.html">Terms and Conditions</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->


    <main id="main">
        <div class="nine">
            <h1 style="text-align: center;">New Arrivals</h1>
            <br>
        </div>

        <?php

include 'connection.php';

$select_query = " select * from books where Visible = 'Yes'";

$query = mysqli_query($conn, $select_query);

while ($res = mysqli_fetch_array($query)) {
    $id = $res['Book_ID'];
    $name = $res['Book_Name'];
    $link = $res['Book_Link'];
    $image = $res['Book_Cover'];
    $desc = $res['Book_Description'];
    $price = $res['Price'];
    $visible = $res['Visible'];
?>
        <div id="portfolio" class="paddsection">
            <div class="container">
                <div class="row">
                    <div class="row portfolio-container">
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="text-align: center;">
                            <a href="<?php echo $link; ?>"><img src="<?php echo $image; ?>" class="img-fluid" alt=""
                                    width="250"></a>
                            <div class="portfolio-info">
                                <h4><?php echo strtoupper($name); ?></h4>
                                <a href="<?php echo $link; ?>">
                                    <p style="color: black; font-weight: 600;">Click here to buy now</p>
                                </a>
                                <a href="<?php echo $link; ?>" class="details-link" title="More Details"><i
                                        class="bx bx-link"></i></a>
                            </div>
                            <h3 style="text-align: center;"><?php echo $price; ?></h3>
                        </div>
                        <div class="col-lg-7 col-md-2 portfolio-item filter-app" style="padding: 20px;">
                            <h1 style="color: rgb(170, 117, 36);"><?php echo $name; ?></h1>
                            <p style="color: rgb(29, 26, 26); font-weight: 200; font-size: larger;"><?php echo $desc; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div><!-- End Portfolio Section -->
        </div>
        <?php

                }

                    ?>
    </main>

    <!-- ======= Footer ======= -->
    <div id="footer" class="text-center">
        <div class="container">
            <div class="socials-media text-center">

                <ul class="list-unstyled">
                    <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                    <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                    <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                    <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                </ul>

            </div>

            <p>&copy; Lokesh Didwania. All rights reserved.</p>
            <div class="credits">
                <p>Designed By <a class="footerlink" href="https://www.webdeveloperrajatagrawal.com/">R A Creators</a>
                </p>
            </div>
        </div>
    </div><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>