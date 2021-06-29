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
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Danh sách danh mục
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped table-bordered table-hover" id="dataTables-example">
										<thead>
											<tr>
												<th>Mã tin tức</th>
												<th>Ảnh tiêu đề</th>
												<th>Tiêu đề</th>
												<th>Ngày tạo</th>
												<th>Lựa chọn</th>
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
											$sql_total = "SELECT * FROM news";
											$query_total = mysqli_query($conn, $sql_total);
											$total = mysqli_num_rows($query_total);
											$maxpage = ceil($total / $ppage);
											$start = ($page - 1) * $ppage;
											$sql = "SELECT * FROM news LIMIT $start, $ppage";
											$query =  mysqli_query($conn, $sql);
											while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) : ?>
												<tr>
													<td><?php echo $row['newsId']; ?></td>
													<td style="text-align: center;"><img src="../img/<?php echo $row['img'] ?>" alt="" width='60'></td>
													<td><?php echo $row['title']; ?></td>
													<td><?php echo $row['createDate']; ?></td>
													<td style="text-align: center;">
														<?php
														$id = $row['newsId'];
														echo "<a class='btn btn-default' href='edit_news.php?newsId=$id'><i class='fa fa-edit'></i></a>"; ?>
														<?php echo "<p class='btn btn-default' onclick = 'checkdel({$row['newsId']})'><i class='fa fa-remove'></i></p>"; ?>
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
		// 	$('#dataTables-example').DataTable({
		// 		responsive: true
		// 	});
		// });
	</script>

</body>

</html>