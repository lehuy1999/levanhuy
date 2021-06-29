<?php
session_start();
ob_start();
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

	<script src="../resources/ckeditor/ckeditor.js"></script>

	<script src="../resources/ckfinder/ckfinder.js"></script>

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
						<h1 class="page-header">Forms</h1>
					</div>

				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Tạo sản phẩm mới
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-12">
										<!-- Form tạo danh mục -->
										<form role="form" action="" method="post" enctype="multipart/form-data">
											<div class="col-lg-6">
												<!-- producerId -->
												<div class="form-group">
													<label>Nhà sản xuất</label>
													<select class="form-control" name="producerId">
														<?php
														include('../include/connect.php');
														$sql = "SELECT * FROM producer";
														$query = mysqli_query($conn, $sql);
														while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) : ?>
															<option value="<?php echo $row['producerId']; ?>"><?php echo $row['producerName']; ?></option>
														<?php endwhile; ?>
													</select>
												</div>

												<!-- productName -->
												<div class="form-group">
													<label>Tên sản phẩm</label>
													<input class="form-control" type="text" name="phoneName">
												</div>

												<!-- productPrice -->
												<div class="form-group">
													<label>Giá sản phẩm</label>
													<input class="form-control" type="number" name="phonePrice">
												</div>

												<!-- productSale -->
												<div class="form-group">
													<label>Khuyến mại</label>
													<input class="form-control" type="number" name="phoneSale">
												</div>

												<!-- Màn hình -->
												<div class="form-group">
													<label>Kích thước màn hình</label>
													<input class="form-control" type="text" name="screenSize">
												</div>

												<!-- Độ phân giải màn hình -->
												<div class="form-group">
													<label>Độ phân giải màn hình</label>
													<input class="form-control" type="text" name="resolution">
												</div>

												<!-- HĐH -->
												<div class="form-group">
													<label>Hệ điều hành</label>
													<input class="form-control" type="text" name="os">
												</div>

												<!-- productImg -->
												<div class="form-group">
													<label>Ảnh điện thoại 1</label>
													<input class="form-control" type="file" name="fileUpload">
												</div>

												<!-- Ảnh điện thoại 2 -->
												<div class="form-group">
													<label>Ảnh điện thoại 2</label>
													<input class="form-control" type="file" name="fileUpload2">
												</div>

												<input class="btn btn-default" type="reset" name="xoa" value="Hủy">
												<input class="btn btn-primary" type="submit" name="up" value="Lưu">
											</div>
											<div class="col-lg-6">

												<!-- CPU -->
												<div class="form-group">
													<label>CPU</label>
													<input class="form-control" type="text" name="cpu">
												</div>

												<!-- GPU -->
												<div class="form-group">
													<label>GPU</label>
													<input class="form-control" type="text" name="gpu">
												</div>

												<!-- Camera trước -->
												<div class="form-group">
													<label>Camera trước</label>
													<input class="form-control" type="text" name="frontCamera">
												</div>

												<!-- Camera sau -->
												<div class="form-group">
													<label>Camera sau</label>
													<input class="form-control" type="text" name="rearCamera">
												</div>

												<!-- Ram -->
												<div class="form-group">
													<label>Ram</label>
													<input class="form-control" type="text" name="ram">
												</div>

												<!-- Rom -->
												<div class="form-group">
													<label>Bộ nhớ trong</label>
													<input class="form-control" type="text" name="rom">
												</div>

												<!-- Dung lượng pin -->
												<div class="form-group">
													<label>Dung lượng pin</label>
													<input class="form-control" type="text" name="batteryCapacity">
												</div>

												<!-- Cân nặng -->
												<div class="form-group">
													<label>Cân nặng</label>
													<input class="form-control" type="text" name="weight">
												</div>
												
												<!-- Kết nối và mạng -->
												<div class="form-group">
													<label>Kết nối và mạng</label>
													<input class="form-control" type="text" name="netword_connect">
												</div>

											</div>
										</form>
										<!-- <script type="text/javascript">
													var editor = CKEDITOR.replace('description');
													CKFinder.setupCKEditor(editor, '../ckfinder/');
												</script> -->
										<!-- Lưu thông tin sản phẩm vào db và upload file vào file img -->
										<?php
										include('../include/connect.php');
										if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
											$producerId = $_POST['producerId'];
											$phoneName = $_POST['phoneName'];
											$phonePrice = $_POST['phonePrice'];
											$phoneSale = $_POST['phoneSale'];
											// Kích thước màn hình
											$screenSize = $_POST['screenSize'];
											// Độ phân giải
											$resolution = $_POST['resolution'];
											// HĐH
											$os = $_POST['os'];
											// CPU
											$cpu = $_POST['cpu'];
											// GPU
											$gpu = $_POST['gpu'];
											// Camera trước
											$frontCamera = $_POST['frontCamera'];
											// Camera sau
											$rearCamera = $_POST['rearCamera'];
											// Ram
											$ram = $_POST['ram'];
											// Rom
											$rom = $_POST['rom'];
											// Dung lượng pin
											$batteryCapacity = $_POST['batteryCapacity'];
											// Cân nặng
											$weight = $_POST['weight'];
											// Kết nối và mạng
											$netword_connect = $_POST['netword_connect'];
											// Ảnh
											$phoneImage = $_FILES['fileUpload']['name'];
											$phoneImage2= $_FILES['fileUpload2']['name'];
											// Tài khoản
											// $accountId = $_SESSION['accountId'];
											if (($_FILES['fileUpload']['error'] > 0) || $producerId == null || $phoneName == null)
												echo "Upload file bị lỗi!";
											else {
												// $sql = "INSERT INTO product(categoryId, producerId, productName, productPrice, productSale, unit, shortDescription, description, productImage) VALUES('$categoryId', '$producerId', '$productName', '$productPrice', '$productSale', '$unit', '$shortDescripion', '$description', '$productImg')";
												$sql = "INSERT INTO phone (`accountId`, `producerId`, `phoneName`, `screenSize`, `resolution`, `os`, `cpu`, `gpu`, `frontCamera`, `rearCamera`, `ram`, `rom`, `batteryCapacity`, `weight`, `netword_connect`,  `phoneImage`, `phoneImage2`, `phonePrice`, `phoneSale`)
												 VALUES (1, $producerId, '$phoneName', '$screenSize', '$resolution', '$os', '$cpu', '$gpu', '$frontCamera', '$rearCamera', '$ram', '$rom', '$batteryCapacity', '$weight', '$netword_connect', '$phoneImage', '$phoneImage2', '$phonePrice', '$phoneSale')";
												if (mysqli_query($conn, $sql)) {
													move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../img/' . $_FILES['fileUpload']['name']);
													move_uploaded_file($_FILES['fileUpload2']['tmp_name'], '../img/' . $_FILES['fileUpload2']['name']);
													header('Location: http://localhost/PHP/ephone/admin/pages/list_product.php');
												} else {
													echo "Error: " . $sql . "<br>" . mysqli_error($conn);
												}
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

	<script src="../js/jquery.min.js"></script>

	<script src="../js/bootstrap.min.js"></script>

	<script src="../js/metisMenu.min.js"></script>

	<script src="../js/startmin.js"></script>

</body>

</html>