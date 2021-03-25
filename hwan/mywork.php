<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("location:index.php");   //redirect ไปยังไฟล์  main.php
}

  // connect database 
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";        
  $db_name = "blog";

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
$mysqli->set_charset("utf8");

// check connection error 
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
    // connect success, do nothing
}
$id = $_SESSION['id'];

$sql = "SELECT * FROM articles WHERE `authors_id`=$id";
$result = $mysqli->query($sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    echo '<title> ' . $_SESSION['penname'] . '</title>';
    ?>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

</head>


<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <?php
            echo '<a class="navbar-brand" href="index.php">Hello ' . $_SESSION['penname'] . '</a>';

            ?>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link fas fa-home" href="index.php"> Home</a>
                    </li>
                    <?php

                    if (!($_SESSION['loggedin'])) {
                        echo ' <li class="nav-item"><a class="nav-link fas fa-user" href="login3.php"> Login</a> </li>';
                    } else {
                        echo ' <li class="nav-item"><a class="nav-link fas fa-book" href="mywork.php"> MyWork</a> </li>';
                        echo ' <li class="nav-item"><a class="nav-link fas fa-user " href="logout.php"> Logout</a> </li>';
                    }

                    ?>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('https://3.bp.blogspot.com/-F42S3G3wDHM/W0X6sh0_nvI/AAAAAAAAEtQ/YrWSVOrwAYsg50_6PvX_wpZzxZugJ_RqwCLcBGAs/s1600/jgugug.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Baby Blog</h1>
                        <?php
                        echo '<span class="subheading">Hello ' . $_SESSION['penname'] . '</span>';
                        echo '<a class="nav-link fas fa-edit " href="edit_user.php"></a>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="sticky-top">
        <form method="post" action="addblog.php">
            <div><input type="submit" class="btn btn-light" value="ADD BLOG"></div>
        </form>
    </div>
    <?php
    if (!$result) {
        echo ("Error: " . $mysqli->error);
    } else {
        while ($row = $result->fetch_object()) {
            echo '<div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="post-preview">
              <a href="post.php?id=' . $row->id . '">
                  <h1 class="post-title">' . $row->title . '</h1>
                </a>
                <p class="post-meta">Posted by
                  <a>' . $_SESSION['penname'] . '</a>
                  Create on ' . $row->create_ts . ' Update on ' . $row->updatetime . ' </p>
                  <div class="dropdown">
                <button class="btn btn-link dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </button>
                <div class="dropdown-menu  " aria-labelledby="dropdownMenuButton">
                ';
            if ($row->publish_sts == 'N') {
                echo  '<a class="dropdown-item" href="publish.php?title=' . $row->title . '">Publish</a>';
            } else {
                echo  '<a class="dropdown-item" href="publish.php?title=' . $row->title . '">UnPublish</a>';
            }
            echo '<a class="dropdown-item" href="edit.php?title=' . $row->title . '">Edit</a>
            <a class="dropdown-item"data-toggle="modal" data-target="#exampleModal'. $row->id . '">Remove</a>
            </div>
            </div>
              </div>
              </div>
              </div>
              </div>;
              <hr>
              
              <div class="modal fade" id="exampleModal'. $row->id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header" style="background-color:White">
                          <h5 class="modal-title" id="exampleModalLabel">Remove</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body" style="background-color:White">
                          <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Are you sure you want to remove this Blog? 
                      </div>
                      <div class="modal-footer" style="background-color:White">
                          <a href="remove.php?id='.$row->id.'" class="btn btn-primary" role="button">Yes</a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
              ';
        }
    }
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>