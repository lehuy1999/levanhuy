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
                                Tạo tài khoản quản trị
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
                                        <form role="form" action="form_admin.php" method="POST">
                                            <!-- Chọn quyền -->
                                            <div class="form-group">
                                                <label for="my-input">Quyền</label>
                                                <!-- <select class="form-control" name="roleId"> -->
                                                    <?php
                                                        include("../include/connect.php");
                                                        $sql_role = "SELECT * FROM role";
                                                        $query_role = mysqli_query($conn, $sql_role);
                                                        $row_role = mysqli_fetch_array($query_role);
                                                    ?>
                                                    
                                                    <input class="form-control" type="text" name="roleId" value="<?php echo $row_role['roleName'];?>" disabled>
                                                <!-- </select> -->
                                            </div>

                                            <!-- accountName -->
                                            <div class="form-group">

                                                <label>Tên tài khoản</label>
                                                <input class="form-control" type="text" name="accountName" value="<?php echo $row_account['accountName'];?>" disabled>
                                            </div>

                                            <!-- fullName -->
                                            <div class="form-group">
                                                <label>Họ và tên</label>
                                                <input class="form-control" type="text" name="fullName" value="<?php echo $row_account['fullName'];?>" disabled>
                                            </div>

                                            <!-- accountMail -->
                                            <div class="form-group">
                                                <label>Mail</label>
                                                <input class="form-control" type="email" name="accountMail" value="<?php echo $row_account['mail'];?>" disabled>
                                            </div>

                                            <!-- address -->
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input class="form-control" type="text" name="address" value="<?php echo $row_account['address'];?>" disabled>
                                            </div>

                                            <!-- SĐT -->
                                            <div class="form-group">
                                                <label>SĐT</label>
                                                <input class="form-control" type="text" name="moblie" value="<?php echo $row_account['mobile'];?>" disabled>
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