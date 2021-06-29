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

    <title>Change_Account</title>

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

                                                <label>Tên tài khoản</label>
                                                <input class="form-control" type="text" name="accountName"
                                                    value="<?php echo $row_account['accountName'];?>">
                                            </div>

                                            <!-- fullName -->
                                            <div class="form-group">
                                                <label>Họ và tên</label>
                                                <input class="form-control" type="text" name="fullName"
                                                    value="<?php echo $row_account['fullName'];?>">
                                            </div>

                                            <!-- accountMail -->
                                            <div class="form-group">
                                                <label>Mail</label>
                                                <input class="form-control" type="email" name="accountMail"
                                                    value="<?php echo $row_account['mail'];?>">
                                            </div>

                                            <!-- address -->
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input class="form-control" type="text" name="address"
                                                    value="<?php echo $row_account['address'];?>">
                                            </div>

                                            <!-- SĐT -->
                                            <div class="form-group">
                                                <label>SĐT</label>
                                                <input class="form-control" type="text" name="moblie"
                                                    value="<?php echo $row_account['mobile'];?>">
                                            </div>

                                            <div class="form-group">
                                                <input type="reset" class="btn btn-default" name="xoa" value="Hủy">
                                                <input type="submit" class="btn btn-primary" name="change_account" value="Lưu">
                                            </div>

                                        </form>

                                        <?php
                                            if (isset($_POST['change_account'])) {

                                                include('../include/connect.php');

                                                if ($_POST['accountName'] != null) {
                                                    $quyen = $_SESSION['roleId'];
                                                    $accountName = $_POST['accountName'];
                                                    $accountPass = $_POST['accountPass'];
                                                    $fullName = $_POST['fullName'];
                                                    $accountMail = $_POST['accountMail'];
                                                    $address = $_POST['address'];
                                                    $moblie = $_POST['moblie'];
                                                    $sql = "UPDATE account SET roleId = $quyen, accountName = '$accountName', fullName = '$accountPass', mail = '$accountMail', address = '$address', mobile = '$moblie' WHERE accountId = $id";
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