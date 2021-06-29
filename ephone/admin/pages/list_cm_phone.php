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

    <title>Bình luận điện thoại</title>
	<link href="../css/quan.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

    <link href="../css/startmin.css" rel="stylesheet">

    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- <style type="text/css">
		th{
			text-align: center;
		}
	</style> -->
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
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Danh bình luận sản phẩm
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                        id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Mã bình luận</th>
                                                <th>Tên điện thoại</th>
                                                <th>Tên người bình luận</th>
                                                <th>Nội dung bình luận</th>
                                                <th>Ngày bình luận</th>
                                                <th>Lựa chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 

                                                // include ("../include/connect.php");
                                                // // $sql = "SELECT * FROM cm_phone_1";
                                                // // $query_cm = mysqli_query($conn,$sql);

                                                // $item_page = !empty($_GET['item_page'])?$_GET['item_page']:10;
												// $current_page = !empty($_GET['page'])?$_GET['page']:1;
												// $offset = ($current_page - 1) * $item_page;
												// $sql = "SELECT * FROM cm_phone_1 LIMIT $item_page OFFSET $offset";
												// $query = mysqli_query($conn, $sql);
												// $total_records = mysqli_query($conn, "SELECT * FROM cm_phone_1");
												// $total_records = $total_records->num_rows;
												// $total_page = ceil($total_records / $item_page);

                                                include("../include/connect.php");
                                                if (isset($_GET['pp']))
                                                    $ppage = (int) $_GET['pp'];
                                                else
                                                    $ppage = 5;
                                                if (isset($_GET['p']))
                                                    $page = (int) $_GET['p'];
                                                else
                                                    $page = 1;
                                                // đếm sl 
                                                $sql_total = "SELECT * FROM cm_phone_1";
                                                $query_total = mysqli_query($conn, $sql_total);
                                                $total = mysqli_num_rows($query_total);
                                                $maxpage = ceil($total / $ppage);
                                                $start = ($page - 1) * $ppage;
                                                $sql = "SELECT * FROM cm_phone_1 LIMIT $start, $ppage";
                                                $query =  mysqli_query($conn, $sql);
                                                while ($row = mysqli_fetch_array($query)) : ?>
                                            <tr>
                                                <td><?php echo $row['cm_phone_1_id']; ?></td>
                                                <td style="text-align: center;">
                                                    <?php 
                                                        $id =  $row['phoneId'];
                                                        $sql_2 = "SELECT * FROM phone WHERE phoneId = $id";
                                                        $query1 = mysqli_query($conn, $sql_2);
                                                        $row_2 = mysqli_fetch_array($query1);
                                                        echo $row_2['phoneName'];
                                                    ?>
                                                </td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['cm_content']; ?></td>
                                                <td><?php echo $row['createDate'];?></td>
                                                <td style="text-align: center;">
                                                    <a class='btn btn-default' href="form_cm_phone_2.php?cm_phone_1_id=<?php echo $row['cm_phone_1_id'];?>" ><i class='fa fa-mail-forward'></i></a>
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
												echo "<a class='page-item' href='list_news.php?pp=$ppage&p=$i'>$i</a>";
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

    <script src="../js/jquery.min.js"></script>

    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/metisMenu.min.js"></script>

    <script src="../js/dataTables/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

    <script src="../js/startmin.js"></script>

    <script language="JavaScript">
    function checkdel(newsId) {
        var newsId = newsId;
        var link = "remove_news.php?newsId=" + newsId;
        if (confirm("Bạn có chắc chắn muốn xóa bài viết này?") == true)
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