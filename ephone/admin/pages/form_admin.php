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
    if (isset($_POST['create_account'])) {

        include('../include/connect.php');

        if ($_POST['accountName'] != null) {
            $quyen = $_POST['roleId'];
            $accountName = $_POST['accountName'];
            $fullName = $_POST['fullName'];
            $accountMail = $_POST['accountMail'];
            $address = $_POST['address'];
            $moblie = $_POST['moblie'];
            $sql = "INSERT INTO account(roleId, accountName, accountPass, fullName, mail, address, mobile) VALUES($quyen, '$accountName', 1, '$fullName', '$accountMail', '$address', '$moblie')";
            if (mysqli_query($conn, $sql)) {
                header('Location: http://localhost/PHP/ephone/admin/pages/list_admin.php');
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
                                Tạo tài khoản quản trị
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Form tạo danh mục -->
                                        <form role="form" action="form_admin.php" method="POST">
                                            <!-- Chọn quyền -->
                                            <div class="form-group">
                                                <label for="my-input">Quyền</label>
                                                <select class="form-control" name="roleId">
                                                    <?php
                                                        include("../include/connect.php");
                                                        $sql_role = "SELECT * FROM role";
                                                        $query_role = mysqli_query($conn, $sql_role);
                                                        while ($row_role = mysqli_fetch_array($query_role)):?>
                                                            <?php if($row_role['roleId']!=6 && $row_role['roleId']!=1){?>
                                                            <option value="<?php echo $row_role['roleId']; ?>"><?php echo $row_role['roleName']; ?></option>
                                                    <?php }endwhile; ?>
                                                </select>
                                            </div>
                                            
                                            <!-- accountName -->
                                            <div class="form-group">

                                                <label>Tên tài khoản</label>
                                                <input class="form-control" type="text" name="accountName">
                                            </div>

                                            <!-- fullName -->
                                            <div class="form-group">
                                                <label>Họ và tên</label>
                                                <input class="form-control" type="text" name="fullName">
                                            </div>

                                            <!-- accountMail -->
                                            <div class="form-group">
                                                <label>Mail</label>
                                                <input class="form-control" type="email" name="accountMail">
                                            </div>

                                            <!-- address -->
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input class="form-control" type="text" name="address">
                                            </div>

                                            <!-- SĐT -->
                                            <div class="form-group">
                                                <label>SĐT</label>
                                                <input class="form-control" type="text" name="moblie">
                                            </div>

                                            <div class="form-group">
                                                <input type="reset" class="btn btn-default" name="xoa" value="Hủy">
                                                <input type="submit" class="btn btn-primary" name="create_account" value="Lưu">
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