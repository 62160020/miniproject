<?php
// print_r($_POST);
  // connect database 
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";        
  $db_name = "blog";

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
$mysqli->set_charset("utf8");

$username = $_POST['username'];
$passwd1 = $_POST['password'];
$passwd  = md5($passwd1);
$name = $_POST["name"];
$penname = $_POST["penname"];
$email = $_POST["email"];
$sql = "INSERT INTO authors (username, passwd, name, penname, email)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sssss", $username, $passwd, $name, $penname, $email);
$stmt->execute();

header("location: index.php");
