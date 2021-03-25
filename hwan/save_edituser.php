<?php
    session_start();
    if (!isset($_SESSION['loggedin'])) {
    header("location: login2.php");
    } 
?>
<html>
<head>
    <style>
    body {
        background-image: linear-gradient(to top, #000000, #2f242c, #4f465d, #606f96, #5b9fcc, #6ab7de, #7cd0ef, #92e8ff, #b9ebff, #daf0ff, #f2f6ff, #ffffff);
    }
    </style>
    
</head>

<meta charset="UTF-8">
    <?php
    // connect database 
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";        
    $db_name = "blog";

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");

    // echo "<pre>";
    // print_r($_POST);
    // echo"</pre>";
    $username = $_POST['username'];
    $name = $_POST['name'];
    $penname = $_POST['penname'];
    $email = $_POST['email'];
    $id = $_SESSION['id'];

    // $sql = "SELECT *
    //         FROM articles
    //         WHERE username = ?";
    // $stmt = $mysqli->prepare($sql);
    // $stmt->bind_param("s", $username);
    // $stmt->execute();
    // $result = $stmt->get_result();
    // $row = $result->fetch_object();

    $sql = "UPDATE
                authors
            SET
                username = ?,
                name = ?,
                penname = ?,
                email = ?
            WHERE id = ?";
    
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssss", $username , $name, $penname ,$email ,$id);
    $stmt->execute();
        
        // echo $stmt->affected_rows . " row inserted.";
        // echo $id;
    header("location: logout.php");
?>
