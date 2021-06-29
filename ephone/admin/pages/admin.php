<?php
session_start();
if (!isset($_SESSION['accountName']) or ($_SESSION['roleId'] == 6)) {
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Startmin - Bootstrap Admin Theme</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <link href="../css/timeline.css" rel="stylesheet">

    <link href="../css/startmin.css" rel="stylesheet">

    <link href="../css/morris.css" rel="stylesheet">

    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

</head>

<body>
    <?php
    include("../include/connect.php");
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
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                </div>
                <div class="row">
                    <!-- Bình luận -->
                    <?php
                        include('../include/connect.php');
                        $sql_comment = "SELECT COUNT(*) AS quantity FROM cm_news_1 WHERE createDate = CURRENT_TIMESTAMP";
                        $query = mysqli_query($conn, $sql_comment);
                        while($row_comment = mysqli_fetch_array($query)):?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $row_comment['quantity']?></div>
                                        <div>Bình luận!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <!-- Sản phẩm -->
                    <?php
                        $sql_phone = "SELECT COUNT(*) AS quantity FROM phone";
                        $query = mysqli_query($conn, $sql_phone);
                        while($row_phone = mysqli_fetch_array($query)):?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $row_phone['quantity'];?></div>
                                        <div>Sản phẩm!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endwhile;?>
                    <!-- Đơn hàng -->
                    <?php
                        $sql_order = "SELECT COUNT(*) AS quantity FROM orders WHERE orderStatus = 0";
                        $query = mysqli_query($conn, $sql_order);
                        while($row_order = mysqli_fetch_array($query)):?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $row_order['quantity'];?></div>
                                        <div>Đơn hàng!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endwhile;?>
                    <!-- Phản hồi -->
                    <?php
                        $sql_feedback = "SELECT COUNT(*) AS quantity FROM feedback";
                        $query = mysqli_query($conn, $sql_feedback);
                        while($row_feedback = mysqli_fetch_array($query)):?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $row_feedback['quantity']?></div>
                                        <div>Phản hồi!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>

                <div class="row">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Người đặt</th>
                                        <th>SĐT</th>
                                        <th>Địa chỉ</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày đặt hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * FROM orders";
                                    $query = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($query)):?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row['orderName'];?></td>
                                        <td><?php echo $row['mobile'];?></td>
                                        <td><?php echo $row['address'];?></td>
                                        <td><?php echo number_format($row['totalPrice']);?>VNĐ</td>
                                        <td>
                                            <?php 
                                                if($row['orderStatus'] == 1){
                                                    echo "Đã giao";
                                                }else{
                                                    echo "Chưa giao";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $row['orderDate'];?></td>
                                    </tr>
                                    <?php endwhile;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/metisMenu.min.js"></script>
        <script src="../js/startmin.js"></script>
        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>


</body>

</html>