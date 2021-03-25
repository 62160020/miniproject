
<?php
  // connect database 
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";        
  $db_name = "blog";
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
$password=MD5($passwd);
$sql = "SELECT username FROM `authors` ";
$result = $conn->query($sql);
while ($row = $result->fetch_object()) {
  $username[]=$row->username;
}  
$json = json_encode($username);
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">
</head>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <?php

    if (!($_SESSION['loggedin'])) {
      echo ' <a class="navbar-brand" href="index.php">Baby Blog</a>';
    } else {
      echo ' <a class="navbar-brand" href="index.php">Hello ' . $_SESSION['penname'] . '</a>';
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

        if (!($_SESSION['loggedin'])) {
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
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>REGISTER</h1>
          <form  method="post" action="register_save.php" onsubmit="return validate()">
            <div class="form-group">
              <label for="text">Username</label>
              <input type="text" class="form-control" placeholder="username" name="username" value="" id="username">
            </div>
            <div class="form-group">
              <label for="text">Password</label>
              <input type="password" class="form-control" placeholder="passwd" name="passwd" value="" id="passwd1">
            </div>
            <div class="form-group">
              <label for="text">Re-Password</label>
              <input type="password" class="form-control" placeholder="passwd" name="passwd" value="" id="passwd2">
            </div>
            <div class="form-group">
              <label for="text">Name</label>
              <input type="text" class="form-control" placeholder="name" name="name" value="" id="name">
            </div>
            <div class="form-group">
              <label for="text">Penname</label>
              <input type="text" class="form-control" placeholder="penname" value="" name="penname" id="penname">
            </div>
            <div class="form-group">
              <label for="text">Email</label>
              <input type="email" class="form-control" placeholder="email" value="" name="email" id="email">
            </div>
            <p>
              <input type="submit" class="btn btn-dark" value="Register">
            </p>
        </div>
      </div>
    </div>
  </div>
</header>
<script>
function validate(){
  var json = <?php echo $json; ?>;
  var username=document.getElementById('username').value;
  var passwd1=document.getElementById('passwd1').value;
  var passwd2=document.getElementById('passwd2').value;
  var name=document.getElementById('name').value;
  var penname=document.getElementById('penname').value;
  var email=document.getElementById('email').value;
  for(var i=0;i<=json.length;i++){
    if(username==json[i]){
        alert('Username ถูกใช้งานแล้ว');
        return false;
    }
  }
    if(passwd1!=passwd2){
      alert('Password ไม่ตรงกัน');
        return false;
    }else if(name==''||penname==''||email==''||username==''||passwd1==''||passwd2==''){
      alert('กรุณากรอกข้อมูลให้ครบถ้วน');
      return false;
    }else{
      return true;
    }

}
</script>
</html>