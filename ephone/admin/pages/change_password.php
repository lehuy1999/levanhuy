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

    <title>Change_password</title>

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
                                Thay đổi thông tin tài khoản
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Form tạo danh mục -->
                                        <?php
                                            include("../include/connect.php");
                                            $id = $_SESSION['accountId'];
                                            $sql_account = "SELECT * FROM account WHERE accountId = $id";
                                            $query_account = mysqli_query($conn, $sql_account);
                                            $row_account = mysqli_fetch_array($query_account);?>
                                        <form role="form" action="" method="POST">
                                            <!-- accountName -->
                                            <div class="form-group">

                                                <label>Mật khẩu cũ</label>
                                                <input class="form-control" type="password" name="old_password" require>
                                            </div>

                                            <!-- Password -->
                                            <div class="form-group">
                                                <label>Mật khẩu mới</label>
                                                <input class="form-control" type="password" name="new_password" require>
                                            </div>

                                            <!-- fullName -->
                                            <div class="form-group">
                                                <label>Nhập lại mật khẩu mới</label>
                                                <input class="form-control" type="password" name="enter_password" require>
                                            </div>

                                            <div class="form-group">
                                                <input type="reset" class="btn btn-default" name="xoa" value="Hủy">
                                                <input type="submit" class="btn btn-primary" name="change_pass" value="Lưu">
                                            </div>

                                        </form>

                                        <?php
                                            if (isset($_POST['change_pass'])) {

                                                include('../include/connect.php');

                                                if ($_POST['old_password'] == $row_account['accountPass']) {
                                                    $old_pass = $_POST['old_password'];
                                                    $new_pass = $_POST['new_password'];
                                                    $enter_pass = $_POST['enter_password'];
                                                    if($new_pass == $enter_pass){
                                                        $sql = "UPDATE account SET accountPass = '$new_pass' WHERE accountId = $id";
                                                        if (mysqli_query($conn, $sql)) {
                                                            // header('Location: http://localhost/PHP/ephone/admin/pages/list_admin.php');
                                                            echo "
                                                            <script>
                                                                alert('Thay đổi thành công');
                                                            </script>
                                                            ";
                                                        } else {
                                                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                                        }
                                                    }else{
                                                        echo "
                                                            <script>
                                                                alert('Nhập lại mật khẩu mới không chính xác');
                                                            </script>
                                                            ";
                                                    }
                                                }else{
                                                    echo "
                                                        <script>
                                                            alert('Nhập mật khẩu không chính xác');
                                                        </script>
                                                        ";
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