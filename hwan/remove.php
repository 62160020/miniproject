<meta charset="UTF-8">
<?php
    require_once('db.php');
    $id = $_GET['id'];
    $sql = "DELETE
            FROM articles
            WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();

 header("location: mywork.php");
?>