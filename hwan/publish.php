<?php
    // connect database 
    require_once('db.php');
    $title = $_GET['title'];

    echo $title;
    // Executes a prepared Query
    $sql = "SELECT *
            FROM articles
            WHERE title = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $title);

    $stmt->execute();
    
    // Gets a result set from a prepared statement
    $result = $stmt->get_result();
    $row = $result->fetch_object();
    if($row->publish_sts == 'N')
        $publish = 'Y';
    else if ($row->publish_sts == 'Y')
        $publish = 'N';

    $id = $row->id;
    // Executes a prepared Query

    $sql = connectDB7(); //7 publish / unpublish
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $publish , $id);
    $stmt->execute();
    if($stmt->affected_rows == -1){
        echo $sql;
        // echo $stmt->affected_rows . " row inserted.";
    }else{
       header("location: mywork.php");
    }
?>