<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Edit Blog</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="validation.js"></script>


</head>

<body onload="document.addform.title.focus();">
    <?php
    // connect database 
    require_once('db.php');

    $title = $_GET['title'];
    // Executes a prepared Query
    $sql = "SELECT *
                FROM articles
                WHERE title = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $title);
    $stmt->execute();

    // Gets a result set from a prepared statement
    $result = $stmt->get_result();

    if (!$result) {
        echo ("Error: " . $mysqli->error);
    } else {
        // fetch a row from result set
        $row = $result->fetch_object();
    ?>
       
        <!-- Page Header -->
        <header class="masthead" style="background-image: url('img/home-bg.jpg')">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 mx-auto">
                        <div class="site-heading">
                            <h3>Edit Blog</h3>
                            <!-- Modal -->
                            <form action="edit_save.php" method="post" name="addform" onSubmit="return addformValidation();">
                                <!-- ID hidden -->
                                <input type="hidden" name="id" value=<?php echo $row->id; ?>>

                                <!-- Title -->
                                <div class="form-group row">
                                    <div class="col-md-11 col-sm-3 col-8">
                                        <input type="text" class="form-control" id="title" placeholder="Your Title" name="title" value="<?php echo $title; ?>">
                                    </div>

                                </div>
                                <!-- Body -->
                                <div class="form-group row">
                                    <div class="col-md-11 col-sm-3 col-8">
                                        <textarea type="text" class="form-control" id="body" placeholder="Your Body" name="body" rows="7"><?php echo $row->body; ?></textarea>
                                    </div>
                                </div>

                                <input type="submit" class='btn btn-light btn-sm px-3 py-1 mx-4' value="Edit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    <?php
    }
    ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>

</html>