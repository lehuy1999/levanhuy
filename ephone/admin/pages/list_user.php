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
						<h1 class="page-header">Danh sách</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Danh sách người dùng
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>Tên đăng nhập</th>
												<th>Tên khách hàng</th>
												<th>Địa chỉ</th>
												<th>SĐT</th>
											</tr>
										</thead>
										<tbody>
											<?php
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
											$sql_total = "SELECT * FROM account WHERE roleId = 6";
											$query_total = mysqli_query($conn, $sql_total);
											$total = mysqli_num_rows($query_total);
											$maxpage = ceil($total / $ppage);
											$start = ($page - 1) * $ppage;
											$sql = "SELECT * FROM account WHERE roleId = 6 LIMIT $start, $ppage";
											$query =  mysqli_query($conn, $sql);
											while ($row = mysqli_fetch_array($query)) : ?>
												<tr>
													<td><?php echo $row['accountName']; ?></td>
													<td><?php echo $row['fullName']; ?></td>
													<td><?php echo $row['address']; ?></td>
													<td><?php echo $row['mobile']; ?></td>
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
												echo "<a class='page-item' href='list_user.php?pp=$ppage&p=$i'>$i</a>";
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

	<script>
		// $(document).ready(function() {
		// 	$('#dataTables-example').DataTable({
		// 		responsive: true
		// 	});
		// });
	</script>

</body>

</html>