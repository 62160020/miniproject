<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        crossorigin="anonymous">

    <title>Add Blog</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
        type='text/css'>
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
        rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="validation.js"></script>

    <style>
    </style>
</head>
<body onload="document.addform.title.focus();">

    <?php
        // connect database 
        require_once('db.php');

        // echo "<pre>";
        // print_r($_POST);
        // echo"</pre>";
        session_start();
        if(isset($_POST['submit'])){
            $titles = $_POST['title'];
            $bodys = $_POST['body'];
            $id = $_SESSION['id'];
            $updatetime = date('Y-m-d H:i:s');
            $publish_sts = 'N';
    
            $sql = connectDB6(); //6 หน้าเพิ่มบทความใหม่
            $result = $mysqli->query($sql);
    
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("sssss", $titles,$bodys,$id,$updatetime,$publish_sts);
            $stmt->execute();
            // echo $stmt->affected_rows;
            if($stmt->affected_rows == -1){
                // echo $sql;
                // echo $stmt->affected_rows . " row inserted.";
            }else{
                header("location: mywork.php");
            }
        }
       
    ?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 mx-auto">
                    <div class="site-heading">
                        <h3>Add Articles</h3><br>
                        <form action="" method="post" name="addform" onSubmit="return addformValidation();">
                            <!-- Title -->
                            <div class="form-group row">
                                <label for="title" class="col-md-1 col-sm-1 col-3 col-form-label">
                                    <i class="fas "></i></label>
                                <div class="col-md-4 col-sm-3 col-8">
                                    <input type="text" class="form-control" id="title" placeholder="Your Title"
                                        name="title" maxlength="255">
                                </div>
                            </div>
                            <!-- Body -->
                            <div class="form-group row">
                                <label for="body" class="col-md-1 col-sm-1 col-3 col-form-label">
                                    <i class="fas "></i></label>
                                <div class="col-md-11 col-sm-3 col-8">
                                    <textarea type="text" class="form-control" id="body" placeholder="Your Body"
                                        name="body" rows="7"></textarea>
                                </div>
                            </div>
                            <form class="imgForm" action="leanform.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="upload" />
                                <input type="submit"  name="save"  value="upload" />
                                
                            <!-- Name & Publish_sts-->
                            <div class="form-group">
                                <div class="row justify-content-center">
                                    <!-- <input type="text" readonly class="col-md-2 col-8 form-control" id="updatetime"
                                        name="updatetime" value="<?php #echo date('Y-m-d H:i:s');?>"> -->
                                    <label class="col-md-5 col-10 radio-inline">
                                        <!-- <input type="radio" name="publish_sts" value="N" checked>
                                        <i class="fas fa-eye-slash"></i> Draft /
                                        <input type="radio" name="publish_sts" value="Y">
                                        <i class="fas fa-eye"></i>
                                        Publish -->
                                    </label>
                                </div>
                            </div>

                            <input type="submit" name="submit" class='btn btn-light btn-sm px-3 py-1 mx-4' value="Add">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>

</html>