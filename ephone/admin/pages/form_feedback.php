<?php

use PHPMailer\PHPMailer\PHPMailer;

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

    <title>Phản hồi</title>

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
                <!-- Thông tin sản phẩm người mua -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Phản hồi ý kiến khách hàng
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Form tạo danh mục -->
                                        <form action="" method="POST">
                                            <!--  -->
                                            <?php
                                                include('../include/connect.php');
                                                $id = $_GET['feedbackId'];
                                                $sql_feedback = "SELECT * FROM feedback WHERE feedbackId = $id";
                                                $query = mysqli_query($conn,$sql_feedback);
                                                $row_feedback = mysqli_fetch_array($query);
                                            ?>
                                            <div class="form-group">
                                                <!-- Mail khách hàng -->
                                                <label>Mail khách hàng</label>
                                                <input class="form-control" type="text" disabled="disabled" name="email"
                                                    value="<?php echo $row_feedback['email'];?>">
                                            </div>
                                            
                                            <!-- Nội dung khách hàng phản hồi -->
                                            <div class="form-group">
                                                <label>Nội dung của khách hàng phản hồi</label>
                                                <input class="form-control" type="text" name="content_feedback_user" value="<?php echo $row_feedback['content'];?>" disabled>
                                            </div>

                                            <div class="form-group">
                                                <!-- Nội dung phản hồi -->
                                                <label>Nội dung phản hồi</label>
                                                <input class="form-control" type="text" name="content" require>
                                            </div>

                                            <?php
                                                if($row_feedback['status'] == 0){
                                                    echo "
                                                        <div class='form-group'>
                                                            <button type='reset' name='btnHuy' class='btn btn-default'>Hủy</button>
                                                            <button type='submit' name='btnGui' class='btn btn-primary'>Gửi</button>
                                                        </div>
                                                    ";
                                                }
                                            ?>
                                            
                                        </form>

                                        <!-- Gửi thông tin qua mail -->
                                        <?php
                                            if(isset($_POST['btnGui'])){
                                                // Thư viện
                                                include('PHPMailer/class.phpmailer.php');
                                                include('PHPMailer/class.smtp.php');
                                                include("functions.php");
                                                include("../include/connect.php"); 
                                                // Nội dung
                                                $title = "Phản hồi từ Ephone";
                                                $nTo = $row_feedback['name'];
                                                $mTo = $row_feedback['email'];
                                                $diachi = 'teamdibo1234@gmail.com';
                                                $content = $_POST['content'];
                                                //Mail
                                                $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
                                                if($mail == 1){
                                                    $id = $_GET['feedbackId'];
                                                    $accountId = $_SESSION['accountId'];
                                                    $sql_answer = "INSERT INTO `answer_feedback`(`feedbackId`, `accountId`, `answer_content`) VALUES ($id, $accountId, '$content')";
                                                    if(mysqli_query($conn, $sql_answer)){
                                                        $sql_update_feedback = "UPDATE feedback SET status = 1 WHERE feedbackId = $id";
                                                        if(mysqli_query($conn, $sql_update_feedback)){
                                                            echo "
                                                            <script>
                                                                alert('Thành công');
                                                            </script>
                                                            ";
                                                        }
                                                    }else{
                                                        echo "Lỗi ". mysqli_errno($conn);
                                                    }
                                                    
                                                }else
                                                    echo "
                                                    <script>
                                                        alert('Thất bại');
                                                    </script>
                                                    ";
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