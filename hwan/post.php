<?php
session_start();
  // connect database 
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";        
  $db_name = "blog";
$id=$_GET['id'];
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
$mysqli->set_charset("utf8");

// check connection error 
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
  // connect success, do nothing
}

$sql = "SELECT ar.id,ar.title,ar.body,ar.create_ts,ar.updatetime,a.penname
                FROM articles ar INNER JOIN authors a
                ON authors_id = a.id
                WHERE ar.id = $id
                ORDER BY updatetime DESC";
$result = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Baby Blog</title>

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
    if (!isset($_SESSION['loggedin'])) {
      echo '<a class="navbar-brand" href="index.php">Baby Blog</a>';
    }else{
      echo'<a class="navbar-brand" href="index.php">Hello ' . $_SESSION['penname'] . '</a>';
    }
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

          if (!isset($_SESSION['loggedin'])) {
            echo ' <li class="nav-item"><a class="nav-link fas fa-user" href="login.php"> Login</a> </li>';
          } else {
            echo ' <li class="nav-item"><a class="nav-link fas fa-book" href="mywork.php"> MyWork</a> </li>';
            echo ' <li class="nav-item"><a class="nav-link fas fa-user" href="logout.php"> Logout</a> </li>';
          }

          ?>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <?php if (!$result) {
    echo ("Error: " . $mysqli->error);
  } else {
    while ($row = $result->fetch_object()) {
      ?>
  <header class="masthead" style="background-image: url('https://www.za.in.th/wp-content/uploads/za-lifestyl-9-10-2018-66.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?php echo $row->title; ?></h1>
            <span class="meta">Posted by
              <a href="#"><?php echo $row->penname; ?></a>
              <?php echo $row->updatetime;?></span>
          </div>
        </div>
      </div>
    </div>
  </header>
      <?php echo $row->body; ?>
  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
         
        </div>
      </div>
    </div>
  </article>
    <?php }
    }?>
  <hr>

  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>