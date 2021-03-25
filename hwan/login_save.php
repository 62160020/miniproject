<?php
session_start();
// ถ้ามีการตั้งค่า session loggedin แล้ว isset() จะคืนค่า true
if (isset($_SESSION['loggedin'])) {
    header("location: index.php");   //redirect ไปยังไฟล์  main.php
}

$username = $_POST['username'];
$passwd = $_POST['password'];
  $db_host = "localhost";
  $db_user = "root";
  $db_password = "";        
  $db_name = "blog";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
$password=MD5($passwd);
$sql = "SELECT * FROM `authors` WHERE username='$username' AND passwd='$password'   ";
$result = $conn->query($sql);
// echo $sql;
// if ($_POST['username'] == 'wittawas' and $_POST['password'] == '12345')
// $result->num_rows > 0 หมายความว่า ได้ผลลัพธ์จากคำสั่ง SELECT 1 แถวขึ้นไป
if ($result->num_rows > 0) {
    $errMsg = "";
    $row=$result->fetch_object();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['penname'] = $row->penname;
    $_SESSION['id']=$row->id;
    header("location: index.php");
    exit(0);
} else {
    echo "<script>alert('กรอกข้อมูลให้ถูกต้อง');window.history.back();</script>";
}
?>
