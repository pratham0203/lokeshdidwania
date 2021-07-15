<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Folio Bootstrap Template - Blog Single</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
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
    <!-- End Header -->

    <main id="main">

        <?php

        include 'connection.php';

        $select_query = " select Blog_ID from blog_single";

        $query = mysqli_query($conn,$select_query);

        while($res = mysqli_fetch_array($query)){
            $id = $res['Blog_ID'];
        }
        
        $select_query2 = " select count(Comment_ID) from blog_comments where Blog_ID = '$id'";

        $query = mysqli_query($conn,$select_query2);

        while($res = mysqli_fetch_array($query)){
            $comments = $res['count(Comment_ID)'];
        }

        if ($comments==1){
            $comment_check = " Comment";
        }
        else{
            $comment_check = " Comments";
        }
        
        
        $select_query3 = " select * from blogs where Blog_ID = '$id'";
      
        $query = mysqli_query($conn,$select_query3);

        while($res = mysqli_fetch_array($query)){
            $id = $res['Blog_ID'];
            $title = $res['Blog_Title'];
            $content = $res['Blog_Content'];
            $image = $res['Book_Image'];
            $author = $res['Blog_Author'];
            $date = $res['Date'];
            $visible = $res['Visible'];
        
        
        ?>

        <!-- ======= Blog Single ======= -->
        <div class="main-content paddsection">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="container-main single-main">
                                <div class="col-md-12">
                                    <div class="block-main mb-30">
                                        <img src="<?php echo $image; ?>" class="img-responsive" alt="reviews2">
                                        <div class="content-main single-post padDiv">
                                            <div class="journal-txt">
                                                <h4><a href="#"><?php echo $title; ?></a></h4>
                                            </div>
                                            <div class="post-meta">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="author">by:<a href="#"><?php echo $author; ?></a></li>
                                                    <li class="date">date:<a href="#"><?php echo $date; ?></a></li>
                                                    <li class="commont"><i class="ion-ios-heart-outline"></i><a
                                                            href="#"><?php echo $comments . $comment_check; ?></a></li>
                                                </ul>
                                            </div>
                                            <p class="mb-30"><?php echo $content; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="comments text-left padDiv mb-30">
                                        <div class="entry-comments">
                                            <h6 class="mb-30"><?php echo $comments . $comment_check; ?></h6>
                                            <?php 
                                            }
                                            
                                            $select_query4 = " select * from blog_comments where Blog_ID = '$id'";
      
                                            $query = mysqli_query($conn,$select_query4);

                                            while($res = mysqli_fetch_array($query)){

                                                $cid = $res['Comment_ID'];
                                                $bid = $res['Blog_ID'];
                                                $name = $res['Name'];
                                                $email = $res['Email'];
                                                $comment = $res['Comment'];
                                                $date = $res['Date'];
                                                $time = $res['Time'];
                                            
                                            ?>
                                            <ul class="entry-comments-list list-unstyled">
                                                <li>
                                                    <div class="entry-comments-item">
                                                        <!-- <img src="assets/img/avatar.jpg" class="entry-comments-avatar"
                                                            alt=""> -->
                                                        <div class="entry-comments-body">
                                                            <span class="entry-comments-author"
                                                                title="Email ID: <?php echo $email; ?>"><?php echo $name; ?></span>
                                                            <span><a href="#"><?php echo $date; ?> at
                                                                    <?php echo $time; ?></a></span>
                                                            <p class="mb-10"><?php echo $comment; ?> </p>
                                                            <!-- <a class="rep" href="#">Reply</a> -->
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <?php 
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="cmt padDiv">
                                        <form id="comment-form" method="post" action="" role="form">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input id="form_name" type="text" name="name"
                                                            class="form-control" placeholder="Name *"
                                                            required="required">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input id="form_email" type="email" name="email"
                                                            class="form-control" placeholder="Email ID *"
                                                            required="required">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <textarea id="form_comment" name="comment" class="form-control"
                                                            placeholder="Comment *" style="height: 200px;"
                                                            required="required"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="submit" name="submit" class="btn btn-defeault btn-send"
                                                        value="Post">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Blog Single -->

        <?php
                    include 'connection.php'; // Connection to the databases
                    if(isset($_POST['submit'])){
                    //Submitted Form values
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $comment = $_POST['comment'];
                    date_default_timezone_set('Asia/Kolkata');
                    $date = date("Y-m-d");
                    $time = date("h:i A");

                    //SQL Insert Query
                    $insert_query = "INSERT INTO blog_comments(Blog_ID, Name, Email, Comment, Date, Time)
                    VALUES ('$id', '$name', '$email', '$comment', '$date', '$time')";

                    $ins = mysqli_query($conn,$insert_query);


                    if($ins){
                    ?>

        <script>
        window.location.replace("blog-single.php");
        </script>
        <?php
                    }
                    else{
                    ?>
        <script>
        alert("Unable to post comment");
        window.location.replace("blog-single.php");
        </script>
        <?php
                    }
                    }
                    ?>
    </main><!-- End #main -->

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

            <p>&copy; Copyrights Folio. All rights reserved.</p>

            <div class="credits">
                <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Folio
      -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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
