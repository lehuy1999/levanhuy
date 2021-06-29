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

    <script src="../resources/ckeditor/ckeditor.js"></script>

    <script src="../resources/ckfinder/ckfinder.js"></script>

</head>

<body>

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
                                Reset mật khẩu tài khoản
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Form reset mật khẩu tài khoản  -->
                                        <form role="form" action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <!-- Tên tài khoản -->
                                                <label>Tên tài khoản</label>
                                                <input class="form-control" type="text" name="accountName" required="true">
                                            </div>

                                            <input class="btn btn-default" type="reset" name="xoa" value="Hủy">
                                            <input class="btn btn-primary" type="submit" name="btnReset" value="Đổi mật khẩu">

                                        </form>
                                        
                                        <?php
                                            include("../include/connect.php");
                                            if(isset($_POST['btnReset'])){
                                                $name = $_POST['accountName'];
                                                $sql = "UPDATE account SET accountPass = 1 WHERE accountName = '$name'";
                                                if(mysqli_query($conn, $sql)){
                                                    echo "Thành công";
                                                }else{
                                                    echo "Thất bại";
                                                }
                                            }
                                        ?>
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