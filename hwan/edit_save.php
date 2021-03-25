<?php
    // connect database 
    require_once('db.php');
    // echo "<pre>";
    // print_r($_POST);
    // echo"</pre>";
    $title = $_POST['title'];
    $body = $_POST['body'];
    $updatetime = date('Y-m-d H:i:s');
    // $publish_sts = $_POST['publish_sts'];
    $id = $_POST['id'];
    $sql = "UPDATE 
                articles
            SET
                title = ?,
                body = ?,
                updatetime = ?
            WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssss", $title, $body, $updatetime,$id);
    $stmt->execute();
    if($stmt->affected_rows == -1){
        // echo $sql;
        // echo $stmt->affected_rows . " row inserted.";
    }else{
        header("location: mywork.php");
    }
?>