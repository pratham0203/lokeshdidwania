<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Podcast Edit</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <?php 
                    include 'connection.php';

                    $ip = "";

                        if (!empty($_SERVER["HTTP_CLIENT_IP"]))
                        {
                            // Check for IP address from shared Internet
                            $ip = $_SERVER["HTTP_CLIENT_IP"];
                        }
                        elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
                        {
                            // Check for the proxy user
                            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                        }
                        else
                        {
                            $ip = $_SERVER["REMOTE_ADDR"];
                        }
                    
                    $select_query = "select Ip_Address from admin_login where Ip_Address = '$ip'";

                    $query = mysqli_query($conn, $select_query);

                    while ($res = mysqli_fetch_array($query)) {
                        $ipaddress = $res['Ip_Address'];
                    }

                    if ($ip !== $ipaddress){
                      ?>
                <script>
                window.location.replace("/index.html");
                </script>
                <?php 
                    }

                    $select_query = "select count(Comment_ID) from blog_comments where notify = 'Yes'";

                    $query = mysqli_query($conn, $select_query);

                    while ($res = mysqli_fetch_array($query)) {
                        $count2 = $res['count(Comment_ID)'];
                    }
                    
                    $select_query = "select count(message_id) from contact_message where notify = 'Yes'";

                    $query = mysqli_query($conn, $select_query);

                    while ($res = mysqli_fetch_array($query)) {
                        $count = $res['count(message_id)'];
                ?>
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge"><?php echo $count; ?></span>
                    </a>

                    <?php
                        }
                    
                    ?>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- Message Start -->
                        <?php

                                $select_query = " select * from contact_message
                                where notify = 'Yes'
                                order by message_id desc";

                                $query = mysqli_query($conn, $select_query);

                                while ($res = mysqli_fetch_array($query)) {
                                    $id = $res['message_id'];
                                    $name = $res['name'];
                                    $email = $res['email'];
                                    $subject = $res['subject'];
                                    $message = $res['message'];
                                    $notify = $res['notify'];
                            ?>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <!-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle"> -->
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        <?php echo $name; ?>
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm"><?php echo substr($message, 0, 100); ?></p>
                                    <!-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> -->
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <?php
                        }
                        
                        ?>
                        <a href="/admin/pages/examples/contacts.php" class="dropdown-item dropdown-footer">See
                            All
                            Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge"><?php echo $count + $count2; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <span class="dropdown-item dropdown-header"><?php echo $count + $count2; ?>
                            Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> <?php echo $count; ?> New Messages
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> <?php echo $count2; ?> New Comments
                        </a>
                        <div class="dropdown-divider"></div>

                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index.php" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-"
                    style="opacity:1; max-height: 45px;">
                <span class="brand-text font-weight-light" style="visibility: hidden;">Admin Panel</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Lokesh Didwania</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="/admin/index.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-pen"></i>
                                <p>
                                    Books
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/pages/examples/books-add.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Books Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/pages/examples/books-detail.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Books Detail</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Blogs
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/pages/examples/blogs-add.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Blogs Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/pages/examples/blogs-edit.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Blogs Edit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/pages/examples/blogs-detail.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Blogs Detail</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-microphone"></i>
                                <p>
                                    Podcasts
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/pages/examples/podcasts-add.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Podcast Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/pages/examples/podcasts-edit.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Podcast Edit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/pages/examples/podcasts-detail.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Podcast Detail</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item">
                            <a href="/admin/pages/examples/contacts.php" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>Contacts</p>
                            </a>
                        </li>
                        </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Podcasts Edit</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Podcasts Edit</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <?php 
                include 'connection.php';

                $id = $_GET['id'];
                
                $ip = "";

                        if (!empty($_SERVER["HTTP_CLIENT_IP"]))
                        {
                            // Check for IP address from shared Internet
                            $ip = $_SERVER["HTTP_CLIENT_IP"];
                        }
                        elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
                        {
                            // Check for the proxy user
                            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                        }
                        else
                        {
                            $ip = $_SERVER["REMOTE_ADDR"];
                        }
                    
                    $select_query = "select Ip_Address from admin_login where Ip_Address = '$ip'";

                    $query = mysqli_query($conn, $select_query);

                    while ($res = mysqli_fetch_array($query)) {
                        $ipaddress = $res['Ip_Address'];
                    }

                    if ($ip !== $ipaddress){
                      ?>
                <script>
                window.location.replace("/index.html");
                </script>
                <?php 
                    }

                $select_query = "select * from podcasts
                where Podcast_ID = '$id'";
                
                $query = mysqli_query($conn, $select_query);

                while ($res = mysqli_fetch_array($query)) {
                    $pid = $res['Podcast_ID'];
                    $title = $res['Podcast_Title'];
                    $content = $res['Podcast_Content'];
                    $video = $res['Podcast_Link'];
                    $date = $res['Date'];
                    $visible = $res['Visible'];


                ?>
                <form role="form" action="php/updatepodcasts.php?id=<?php echo $pid; ?>" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Podcast</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputID">Podcast ID</label>
                                        <input type="type" value="<?php echo $pid; ?>" id="inputID" class="form-control"
                                            name="blid" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTitle">Podcast Title</label>
                                        <input type="text" value="<?php echo $title; ?>" id="inputTitle"
                                            class="form-control" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputContent">Content</label>
                                        <textarea id="inputContent" class="form-control" rows="4" name="content"
                                            required><?php echo $content; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputImage">Embed Link</label>
                                        <input type="text" id="inputImage" value="<?php echo $video; ?>"
                                            class="form-control" name="link" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputVisible">Visibility</label>
                                        <select id="inputVisible" class="form-control custom-select" name="visible"
                                            required>
                                            <option selected value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn btn-secondary">Cancel</a>
                            <a href="php/deletepodcast.php?id=<?php echo $pid; ?>"
                                onclick="return confirm('Are you sure you want to delete the podcast?')"
                                class=" btn btn-danger float-right" name="delete">Delete Podcast</a>
                            <input type="submit" value="Update Podcast"
                                onclick="return confirm('Are you sure? This will update the podcast.')"
                                class="btn btn-success float-right" name="submit" style="margin-right:16px;">
                        </div>
                    </div>
                </form>
                <?php 
                }
                ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2021 <a>Lokesh Didwania</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>

</html>