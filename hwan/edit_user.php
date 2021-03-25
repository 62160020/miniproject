<?php
    session_start();
    $id = $_SESSION['id'];
    if (!isset($_SESSION['loggedin'])) {
    header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src='https://kit.fontawesome.com/a076d05399.js'></script>
      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
       <!-- Custom scripts for this template -->
      <script src="js/clean-blog.min.js"></script>
      
      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom fonts for this template -->
      <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

      <!-- Custom styles for this template -->
      <link href="css/clean-blog.min.css" rel="stylesheet">
      <style>
        body {
          /* background-image: linear-gradient(to bottom, #121823, #192a3a, #1a3e51, #165367, #0d6a7b, #277d8b, #3c919a, #50a5aa, #72babf, #92d0d4, #b2e6e9, #d1fdff); */
          background: #121823;
		    }
        .bg-dark {
          background-color: #13698f!important;
        }
      </style>

        <script src="validation.js"></script>
        <title>Edit User</title>

  </head>
  
  <body onload="document.addform.title.focus();">
    <?php
    // connect database 
    $db_host = "localhost";
    $db_user = "Apologize";
    $db_password = "Apologize0743++";        
    $db_name = "netclix";

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");

    // check connection error 
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
    } else {
        // connect success, do nothing
    }

    // get empno from query string
    
    // Executes a prepared Query
    $sql = "SELECT *
            FROM authors
            WHERE id = $id";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    
    // Gets a result set from a prepared statement
    $result = $stmt->get_result();

    if (!$result) {
            echo ("Error: ". $mysqli->error);
    } else {
        // fetch a row from result set
        $row = $result->fetch_object();
    ?>
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

  

  <header class="masthead" style="background-image: url('https://www.nsamedia.com/wp-content/uploads/2015/10/blog-bg-use.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Edit User</h1>
            <br>
            
            <form action="save_edituser.php" method="post" name="registform" onSubmit="return formValidationAuthor();">
            <div class="form-group">

            <div class="form-group">
              <div class="form-row">
                <label class="control-label col-sm-5" for="username">Username : </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="username" placeholder="Username" maxlength="45" value="<?php echo $row->username;?>">
                  </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <label class="control-label col-sm-5" for="name">Name : </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="name" placeholder="Name" maxlength="45" value="<?php echo $row->name;?>">
                  </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <label class="control-label col-sm-5" for="penname">Penname : </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="penname" placeholder="Penname" maxlength="45" value="<?php echo $row->penname;?>">
                  </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <label class="control-label col-sm-5" for="email">Email : </label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="email" placeholder="Email" maxlength="45" value="<?php echo $row->email;?>">
                  </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <label class="control-label col-sm-5" ></label>
                  <div class="col-sm-5">
                  <input type="submit" class='btn btn-dark' value="Edit User">
                  </div>
              </div>
            </div>

            </form>
            
          </div>
        </div>
      </div>
    </div>
  </header>
  <?php
    }
  ?>
  </body>
</html>