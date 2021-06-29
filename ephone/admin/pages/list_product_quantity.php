<?php 
    session_start();
   if(!isset($_SESSION['accountName']) or ($_SESSION['roleId'] != 1))
   {
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

	<title>Kho hàng</title>

	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">

	<link href="../css/quan.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../css/metisMenu.min.css" rel="stylesheet">

	<!-- DataTables CSS -->
	<link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

	<!-- DataTables Responsive CSS -->
	<link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../css/startmin.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style type="text/css">
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
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Kho hàng
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>Mã sản phẩm</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Khuyến mại</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											include('../include/connect.php');
											$item_page = !empty($_GET['item_page'])?$_GET['item_page']:10;
											$current_page = !empty($_GET['page'])?$_GET['page']:1;
											$offset = ($current_page - 1) * $item_page;
											$sql = "SELECT * FROM phone LIMIT $item_page OFFSET $offset";
											$query = mysqli_query($conn, $sql);
											$total_records = mysqli_query($conn, "SELECT * FROM phone");
											$total_records = $total_records->num_rows;
											$total_page = ceil($total_records / $item_page);


											include("../include/connect.php");
											if (isset($_GET['pp']))
												$ppage = (int) $_GET['pp'];
											else
												$ppage = 10;
											if (isset($_GET['p']))
												$page = (int) $_GET['p'];
											else
												$page = 1;
											// đếm sl 
											$sql_total = "SELECT * FROM phone";
											$query_total = mysqli_query($conn, $sql_total);
											$total = mysqli_num_rows($query_total);
											$maxpage = ceil($total / $ppage);
											$start = ($page - 1) * $ppage;
											$sql = "SELECT * FROM phone LIMIT $start, $ppage";
											$query =  mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) : ?>
                                                <tr>
                                                    <td><?php echo $row['phoneId']; ?></td>
                                                    <td><?php echo $row['phoneName']; ?></td>
                                                    <td><?php echo $row['quantity']; ?></td>
                                                    <td><?php echo number_format($row['phonePrice']) . " VNĐ"; ?></td>
                                                    <td><?php echo $row['phoneSale'] . " %";?></td>
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
												echo "<a class='page-item' href='list_product_quantity.php?pp=$ppage&p=$i'>$i</a>";
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

<!-- DataTables JavaScript -->
<script src="../js/dataTables/jquery.dataTables.min.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../js/startmin.js"></script>

<script language="JavaScript">
    function checkdel(productId)
    {
        var productId=productId;
        var link="remove_product.php?productId="+productId;
        if(confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")==true)
            window.open(link,"_self",1);
    }
</script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});
	});
</script>

</body>
</html>
