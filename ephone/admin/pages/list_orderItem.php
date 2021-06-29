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

    <title>OrderItem</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

    <link href="../css/startmin.css" rel="stylesheet">

    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style>
        th{
            text-align: center;
        }
        td{
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
                        <h1 class="page-header">Danh mục</h1>
                    </div>
                </div>
                <!-- Thông tin người mua hàng -->
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            include "../include/connect.php";
                            $sql_order = "SELECT * FROM orders WHERE orderId = {$_GET['orderId']}";
                            $query = mysqli_query($conn, $sql_order);
                            $row_order = mysqli_fetch_array($query);
                        ?>
                        <table class="table table-striped table-bordered table-hover">
                            <tr>
                                <th>Người mua hàng</th>
                                <td><?php echo $row_order['orderName'];?></td>
                            </tr>
                            <tr>
                                <th>SĐT</th>
                                <td><?php echo $row_order['mobile'];?></td>
                            </tr>
                            <tr>
                                <th>Mail</th>
                                <td><?php echo $row_order['mail'];?></td>
                            </tr>   
                            <tr>
                                <th>Địa chỉ</th>
                                <td><?php echo $row_order['address'];?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- Thông tin sản phẩm người mua -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Danh sách điện thoại khách hàng mua
                            </div>
                            
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Tên điện thoại</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM orderitem WHERE orderId = {$_GET['orderId']}";
                                            $query = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($query)) : ?>
                                                <tr>
                                                    <td>
                                                    <?php 
                                                        $id = $row['phoneId']; 
                                                        $sql_phone = "SELECT * FROM phone WHERE phoneId = $id";
                                                        $query_phone = mysqli_query($conn, $sql_phone);
                                                        $row_phone = mysqli_fetch_array($query_phone);
                                                        echo $row_phone['phoneName'];
                                                    ?></td>
                                                    <td><?php echo $row['orderItemQuantity']; ?></td>
                                                    <td><?php echo number_format($row['orderItemPrice']); ?>VNĐ</td>
                                                    <?php
                                                        $content_mail = array(
                                                        'phoneName' => $row_phone['phoneName'],
                                                        'quantity' => $row['orderItemQuantity'],
                                                        'price' => $row['orderItemPrice']
                                                        );
                                                    ?>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    if($row_order['orderStatus'] != 1){
                        echo "
                        <form action='' method='POST'>
                            <button type='submit' class='btn btn-primary' name='btnDuyet' style='float: right;'>Duyệt</button>
                        </form>
                        ";
                    }
                ?>
                
                <!-- Duyệt đơn và gửi mail --> 
                <?php
                    if(isset($_POST['btnDuyet'])){
                        // Thư viện
                        include('PHPMailer/class.phpmailer.php');
                        include('PHPMailer/class.smtp.php');
                        include("functions.php"); 
                        // Nội dung
                        $title = "Đơn hàng từ Ephone";
                        $nTo = $row_order['orderName'];
                        $mTo = $row_order['mail'];
                        $diachi = 'teamdibo1234@gmail.com';
                        $total = 0;
                        $content = "Bạn có một đơn hàng từ Ephone là:<br>";
                        $content .= "Thông tin đơn hàng:<br>";
                        $content .= "<table border='1'>
                        <tr><th>Thông tin thanh toán</th><th>SĐT</th><th>Địa chỉ giao hàng</th></tr>
                        <tr><td>".$row_order['orderName']."</td><td>".$row_order['mobile']."</td><td>".$row_order['address']."</td></tr>
                        </table>";
                        // Chi tiết đơn hàng
                        $content .= "Chi tiết đơn hàng:<br>";
                        $content .= "<table width='500' border='1'>";
                        $content .= "<tr><th>Tên điện thoại</th><th>Số lượng</th><th>Đơn giá</th></tr>";
                        $sql_2 = "SELECT * FROM orderitem WHERE orderId = {$_GET['orderId']}";
                        $query_2 = mysqli_query($conn, $sql_2);
                        while ($row_2 = mysqli_fetch_array($query_2)){
                        $sql_3 = "SELECT * FROM phone WHERE phoneId = {$row_2['phoneId']}";
                            $query_3 = mysqli_query($conn, $sql_3);
                            $row_3 = mysqli_fetch_array($query_3);
                            $total += ($row_2['orderItemQuantity'] * $row_2['orderItemPrice']);
                            $content .= "<tr><td>".$row_3['phoneName']."</td><td>".$row_2['orderItemQuantity']."</td><td>".number_format($row_2['orderItemPrice'])."VNĐ</td></tr>";
                        }
                        $content .= "<tr><th colspan='2'>Tổng tiền:</th><th>".number_format($total)."VNĐ</th></tr>";
                        $content .= "</table>";
                        $content .= "<br>Đơn hàng của bạn đang được giao bạn chờ 2,3 ngày để nhận hàng. Cảm ơn đã bạn mua điện thoại ở Ephone!!!";                    
                        //Mail
                        $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
                        if($mail == 1){
                            $sql_4 = "UPDATE orders SET orderStatus = 1 WHERE orderId = {$row_order['orderId']}";
                            mysqli_query($conn, $sql_4);
                            echo "
                                <script>
                                    alert('Đã duyệt đơn');
                                    window.location.href='list_order.php';
                                </script>
                            ";
                        }else
                            echo "Thất bại";
                    }
                ?>
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

    <script language="JavaScript">
        function checkdel(producerId) {
            var producerId = producerId;
            var link = "remove_producer.php?producerId=" + producerId;
            if (confirm("Bạn có chắc chắn muốn xóa NSX này?") == true)
                window.open(link, "_self", 1);
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
    </script>


</body>

</html>