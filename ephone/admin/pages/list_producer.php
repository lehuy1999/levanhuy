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

    <title>NSX</title>
    <link href="../css/quan.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

    <link href="../css/startmin.css" rel="stylesheet">

    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style type="text/css">
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
        include('functions.php');
        $quyen = $_SESSION['roleId'];
        menu_quyen($quyen);
        ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh mục</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Danh sách danh mục
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Mã NSX</th>
                                                <th>Tên NSX</th>
                                                <th>Ngày tạo</th>
                                                <th>Lựa chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "../include/connect.php";
                                            // $sql = "SELECT * FROM producer";
                                            // $query = mysqli_query($conn, $sql);
                                            // $item_page = !empty($_GET['item_page']) ? $_GET['item_page'] : 10;
                                            // $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                                            // $offset = ($current_page - 1) * $item_page;
                                            // $sql = "SELECT * FROM producer LIMIT $item_page OFFSET $offset";
                                            // $query = mysqli_query($conn, $sql);
                                            // $total_records = mysqli_query($conn, "SELECT * FROM producer");
                                            // $total_records = $total_records->num_rows;
                                            // $total_page = ceil($total_records / $item_page);

                                            if (isset($_GET['pp']))
                                                $ppage = (int) $_GET['pp'];
                                            else
                                                $ppage = 5;
                                            if (isset($_GET['p']))
                                                $page = (int) $_GET['p'];
                                            else
                                                $page = 1;
                                            // đếm sl 
                                            $sql_total = "SELECT * FROM producer";
                                            $query_total = mysqli_query($conn, $sql_total);
                                            $total = mysqli_num_rows($query_total);
                                            $maxpage = ceil($total / $ppage);
                                            $start = ($page - 1) * $ppage;
                                            $sql = "SELECT * FROM producer LIMIT $start, $ppage";
                                            $query =  mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) : ?>
                                                <tr>
                                                    <td><?php echo $row['producerId']; ?></td>
                                                    <td><?php echo $row['producerName']; ?></td>
                                                    <td><?php echo $row['createDate']; ?></td>
                                                    <td>
                                                        <?php
                                                        $id = $row['producerId'];
                                                        echo "<a class='btn btn-default' href='edit_producer.php?producerId=$id'><i class='fa fa-edit'></i></a>"; ?>
                                                        <?php echo "<p class='btn btn-default' onclick = 'checkdel({$row['producerId']})'><i class='fa fa-trash'></i></p>"; ?>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="page">
									<?php
									if ($maxpage > 1) {
										for ($i = 1; $i <= $maxpage; $i++) {
											if ($i != $page)
												echo "<a class='page-item' href='list_producer.php?pp=$ppage&p=$i'>$i</a>";
											else
												echo "<strong class='current-page'>$i</strong>";
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

    <script language="JavaScript">
        function checkdel(producerId) {
            var producerId = producerId;
            var link = "remove_producer.php?producerId=" + producerId;
            if (confirm("Bạn có chắc chắn muốn xóa NSX này?") == true)
                window.open(link, "_self", 1);
        }
    </script>

    <script>
        // $(document).ready(function() {
        //     $('#dataTables-example').DataTable({
        //         responsive: true
        //     });
        // });
    </script>

</body>

</html>