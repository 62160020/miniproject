<?php
  // connect database 
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";        
  $db_name = "blog";
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

$sql = "SELECT username FROM `authors` ";
$result = $conn->query($sql);
while ($row = $result->fetch_object()) {
  $username[]=$row->username;
}  
$json = json_encode($username);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
    <?php

if (!isset($_SESSION['loggedin'])) {
    echo ' <a class="navbar-brand" href="index.php">Baby Blog</a>';
  } else {
  echo ' <a class="navbar-brand" href="index.php">Hello ' . $_SESSION['penname'] . '</a>';
  }

?>
      <button class="navbar-toggler navbar-brand navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="navbar-brand " href="index.php"> Home</a>
          </li>
         
        </ul>
      </div>
    </div>
  </nav>
<form method="post" action="register_save.php" onsubmit="return validate()">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
					Register
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
					<input class="input100" type="text" name="username"  value="" id="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input"  >
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" value="" id="passwd1" >
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="wrap-input100 validate-input" >
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" value="" id="passwd2" >
						<span class="focus-input100" data-placeholder="Re-Password"></span>
					</div>

					<div class="wrap-input100 validate-input" >
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="text" name="name" value="" id="name" >
						<span class="focus-input100" data-placeholder="Name"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="text" value="" name="penname" id="penname" >
						<span class="focus-input100" data-placeholder="Penname"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="email" value="" name="email" id="email" >
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
							Register
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	</form>
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

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>