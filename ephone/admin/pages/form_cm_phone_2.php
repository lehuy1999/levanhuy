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

    <title>Trả lời bình luận</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

    <link href="../css/startmin.css" rel="stylesheet">

    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style>
    th {
        text-align: center;
    }

    td {
        text-align: center;
    }
    </style>
</head>

<body>

    <div id="wrapper">

        <?php
        include('menu.php');
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
                                Trả lời bình luận khách hàng
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Form tạo danh mục -->
                                        <form action="" method="POST">
                                            <?php
                                                include('../include/connect.php');
                                                $id = $_GET['cm_phone_1_id'];
                                                $sql_cm_1 = "SELECT * FROM cm_phone_1 WHERE cm_phone_1_id = $id";
                                                $query_cm_1 = mysqli_query($conn,$sql_cm_1);
                                                $row_cm_1 = mysqli_fetch_array($query_cm_1);
                                            ?>
                                            <div class="form-group">
                                                <!-- Tên người bình luận -->
                                                <label>Tên người bình luận</label>
                                                <input class="form-control" type="text" disabled="disabled" name="email"
                                                    value="<?php echo $row_cm_1['username'];?>" disabled>
                                            </div>
                                            
                                            <!-- Nội dung bình luận  -->
                                            <div class="form-group">
                                                <label>Bình luận của khách hàng</label>
                                                <input class="form-control" type="text" name="content_feedback_user" value="<?php echo $row_cm_1['cm_content'];?>" disabled>
                                            </div>

                                            <!-- Nội dung trả lời -->
                                            <div class="form-group">
                                                <label>Trả lời bình luận</label>
                                                <input class="form-control" type="text" name="content" require>
                                            </div>

                                            <div class='form-group'>
                                                <button type='reset' name='btnHuy' class='btn btn-default'>Hủy</button>
                                                <button type='submit' name='btnGui' class='btn btn-primary'>Gửi</button>
                                            </div>                                            
                                        </form>

                                        <?php
                                            if(isset($_POST['btnGui'])){
                                                // include("../include/connect.php"); 
                                                $id = $_GET['cm_phone_1_id'];
                                                $username = $_SESSION['accountName'];
                                                $content = $_POST['content'];
                                                $sql_cm_2 = "INSERT INTO cm_phone_2(cm_phone_1_id, username, cm_content) VALUES($id, '$username', '$content')";
                                                if(mysqli_query($conn, $sql_cm_2)){
                                                    echo "
                                                    <script>
                                                        alert('Thành công');
                                                    </script>
                                                    ";
                                                }else{
                                                    echo "
                                                        <script>
                                                            alert('Thất bại');
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

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/metisMenu.min.js"></script>

    <script src="../js/dataTables/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

    <script src="../js/startmin.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>