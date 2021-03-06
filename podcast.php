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
            <h1 class="logo"><a href="/">Lokesh Didwania</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="/#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="/#about">About Me </a></li>
                    <li><a class="nav-link  scrollto" href="books">My Books</a></li>
                    <li><a class="nav-link  scrollto active" href="podcast">My Podcasts</a></li>
                    <li><a class="nav-link  scrollto" href="blogs"> My Blogs</a></li>
                    <li class="dropdown"><a href="#"><span>Other Options</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="contact">Contact Me</a></li>
                            <li><a href="tnc">Terms and Conditions</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Blog Grid ======= -->
    <div id="journal-blog" class="text-left  paddsections">

        <div class="container">
            <div class="section-title text-center">
                <h2>Podcasts</h2>
            </div>
        </div>

        <div class="container">
            <div class="journal-block">
                <div class="row">

                    <?php

                    include 'connection.php';

                    $select_query = " select * from podcasts where Visible = 'Yes'
                        order by Podcast_ID desc";

                    $query = mysqli_query($conn, $select_query);

                    while ($res = mysqli_fetch_array($query)) {
                        $id = $res['Podcast_ID'];
                        $title = $res['Podcast_Title'];
                        $content = $res['Podcast_Content'];
                        $video = $res['Podcast_Link'] . '?mute=1&end=300&controls=1&amp;rel=0&fs=0&modestbranding=1&color=white&amp;showinfo=0';
                        $date = $res['Date'];
                        $visible = $res['Visible'];

                    ?>

                    <div class="col-lg-4 col-md-6">
                        <div class="journal-info mb-30">

                            <iframe src="<?php echo $video; ?>" class="img-responsive w-100" alt="Podcast" height="300">
                            </iframe>

                            <div class="journal-txt">

                                <h4><?php echo $title; ?>
                                </h4>
                                <p class="separator"><?php echo substr($content, 0, 200); ?>
                                </p>

                            </div>

                        </div>
                    </div>

                    <?php

                    }

                    ?>

                </div>
            </div>
        </div>
    </div><!-- End Blog Grid -->


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
    <script src="assets/js/time.js"></script>

</body>

</html>