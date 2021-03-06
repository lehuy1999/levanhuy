<?php
session_start();
if (!isset($_SESSION['accountName']) or ($_SESSION['roleId'] == 6)) {
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    </head>
    <body>
    
        <?php 
            if(isset($_POST['create_producer'])){
                include "../include/connect.php";
                if($_POST['producerName'] != null){
                    $producerName = $_POST['producerName'];
                    $sql = "INSERT INTO producer(producerName) VALUES('$producerName')";
                    if (mysqli_query($conn, $sql)) {
                            header('Location: http://localhost/PHP/ephone/admin/pages/list_producer.php');
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }
                }
        ?>

        <div id="wrapper">

            <?php  
                include('functions.php');
                $quyen = $_SESSION['roleId'];
                menu_quyen($quyen);
            ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Forms</h1>
                        </div>

                    </div>
 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    T???o danh m???c m???i
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- Form t???o danh m???c -->
                                            <form role="form" action="form_producer.php" method="POST">
                                                <div class="form-group">
                                                    <label>T??n NSX</label>
                                                    <input class="form-control" type="text" name="producerName">
                                                </div>
                                                <div class="form-group">
                                                    <input type="reset" class="btn btn-default" name="xoa" value="H???y">
                                                    <input type="submit" class="btn btn-primary" name="create_producer" value="L??u">
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                
            </div>

        </div>

        <script src="../js/jquery.min.js"></script>

        <script src="../js/bootstrap.min.js"></script>

        <script src="../js/metisMenu.min.js"></script>

        <script src="../js/startmin.js"></script>

    </body>
</html>
