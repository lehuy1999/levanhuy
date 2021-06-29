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
                                        <?php
                                        include('../include/connect.php');
                                        $sql_1 = "SELECT * FROM phone WHERE phoneId = '{$_GET['phoneId']}'";
                                        $query_1 = mysqli_query($conn, $sql_1);
                                        $rows = mysqli_fetch_array($query_1);
                                        ?>
                                        <!-- Form tạo danh mục -->
                                        <form role="form" action="" method="post" enctype="multipart/form-data">
                                            <div class="col-lg-6">
                                                <!-- producerId -->
                                                <div class="form-group">
													<label>Nhà sản xuất</label>
													<select class="form-control" name="producerId">
                                                        <?php
                                                            // include('../include/connect.php');
                                                            $id = $rows['producerId'];
                                                            $sql_producer = "SELECT * FROM producer WHERE producerId = $id";
                                                            $row_p = mysqli_fetch_array(mysqli_query($conn, $sql_producer));

                                                        ?>
                                                        <option value="<?php echo $rows['producerId'];?>"><?php echo $row_p['producerName'];?></option>
														<?php
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
                                                    <input class="form-control" type="text" name="phoneName"
                                                        value="<?php echo $rows['phoneName']; ?>">
                                                </div>

                                                <!-- productPrice -->
                                                <div class="form-group">
                                                    <label>Giá sản phẩm</label>
                                                    <input class="form-control" type="number" name="phonePrice"
                                                        value="<?php echo $rows['phonePrice']; ?>">
                                                </div>

                                                <!-- productSale -->
                                                <div class="form-group">
                                                    <label>Khuyến mại</label>
                                                    <input class="form-control" type="number" name="phoneSale"
                                                        value="<?php echo $rows['phoneSale']; ?>">
                                                </div>

                                                <!-- Màn hình -->
                                                <div class="form-group">
                                                    <label>Kích thước màn hình</label>
                                                    <input class="form-control" type="text" name="screenSize"
                                                        value="<?php echo $rows['screenSize']; ?>">
                                                </div>

                                                <!-- Độ phân giải màn hình -->
                                                <div class="form-group">
                                                    <label>Độ phân giải màn hình</label>
                                                    <input class="form-control" type="text" name="resolution"
                                                        value="<?php echo $rows['resolution']; ?>">
                                                </div>

                                                <!-- HĐH -->
                                                <div class="form-group">
                                                    <label>Hệ điều hành</label>
                                                    <input class="form-control" type="text" name="os"
                                                        value="<?php echo $rows['os']; ?>">
                                                </div>

                                                <!-- productImg -->
                                                <div class="form-group">
                                                    <label>Ảnh điện thoại 1</label>
                                                    <br>
                                                    <img src="../img/<?php echo $rows['phoneImage']; ?>" width="150px" height="150px">
                                                    <input class="form-control" type="file" name="fileUpload">
                                                </div>

                                                <!-- Ảnh điện thoại 2 -->
                                                <div class="form-group">
                                                    <label>Ảnh điện thoại 2</label>
                                                    <br>
                                                    <img src="../img/<?php echo $rows['phoneImage2']; ?>" width="150px" height="150px">
                                                    <input class="form-control" type="file" name="fileUpload2">
                                                </div>

                                                <input class="btn btn-default" type="reset" name="xoa" value="Hủy">
                                                <input class="btn btn-primary" type="submit" name="up" value="Lưu">
                                            </div>
                                            <div class="col-lg-6">

                                                <!-- CPU -->
                                                <div class="form-group">
                                                    <label>CPU</label>
                                                    <input class="form-control" type="text" name="cpu"
                                                        value="<?php echo $rows['cpu']; ?>">
                                                </div>

                                                <!-- GPU -->
                                                <div class="form-group">
                                                    <label>GPU</label>
                                                    <input class="form-control" type="text" name="gpu"
                                                        value="<?php echo $rows['gpu']; ?>">
                                                </div>

                                                <!-- Camera trước -->
                                                <div class="form-group">
                                                    <label>Camera trước</label>
                                                    <input class="form-control" type="text" name="frontCamera"
                                                        value="<?php echo $rows['frontCamera']; ?>">
                                                </div>

                                                <!-- Camera sau -->
                                                <div class="form-group">
                                                    <label>Camera sau</label>
                                                    <input class="form-control" type="text" name="rearCamera"
                                                        value="<?php echo $rows['rearCamera']; ?>">
                                                </div>

                                                <!-- Ram -->
                                                <div class="form-group">
                                                    <label>Ram</label>
                                                    <input class="form-control" type="text" name="ram"
                                                        value="<?php echo $rows['ram']; ?>">
                                                </div>

                                                <!-- Rom -->
                                                <div class="form-group">
                                                    <label>Bộ nhớ trong</label>
                                                    <input class="form-control" type="text" name="rom"
                                                        value="<?php echo $rows['rom']; ?>">
                                                </div>

                                                <!-- Dung lượng pin -->
                                                <div class="form-group">
                                                    <label>Dung lượng pin</label>
                                                    <input class="form-control" type="text" name="batteryCapacity"
                                                        value="<?php echo $rows['batteryCapacity']; ?>">
                                                </div>

                                                <!-- Cân nặng -->
                                                <div class="form-group">
                                                    <label>Cân nặng</label>
                                                    <input class="form-control" type="text" name="weight"
                                                        value="<?php echo $rows['weight']; ?>">
                                                </div>

                                                <!-- Kết nối và mạng -->
                                                <div class="form-group">
                                                    <label>Kết nối và mạng</label>
                                                    <input class="form-control" type="text" name="netword_connect"
                                                        value="<?php echo $rows['netword_connect']; ?>">
                                                </div>

                                            </div>
                                        </form>

                                        <!-- Lưu thông tin sản phẩm vào db và upload file vào file img -->
                                        <?php include('../include/connect.php');
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
											$accountId = $_SESSION['accountId'];
											
                                            // Không có update ảnh
                                            if($phoneImage == null && $phoneImage2 == null){
                                                $sql_phone = "UPDATE  phone SET `accountId` = $accountId, producerId= $producerId,`phoneName` = '$phoneName', `screenSize`= '$screenSize', `resolution` = '$resolution', `os` = '$os', `cpu` = '$cpu', `gpu` = '$gpu', `frontCamera` = '$frontCamera', `rearCamera` = '$rearCamera', `ram` = '$ram', `rom` = '$rom', `batteryCapacity` = '$batteryCapacity', `weight` = '$weight', `netword_connect` = '$netword_connect', `phonePrice` = '$phonePrice', `phoneSale` = '$phoneSale' WHERE phoneId = '{$_GET['phoneId']}'";
                                                
                                                if (mysqli_query($conn, $sql_phone)) {
                                                    echo "<script>window.location='http://localhost/PHP/ephone/admin/pages/list_product.php'</script>";
                                                } else {
													echo "Error: " . $sql_phone . "<br>" . mysqli_error($conn);
                                                }
                                            // Update ảnh phoneImage
                                            }elseif($phoneName != null && $phoneImage2 == null){
                                                $sql_phoneImage = "UPDATE  phone SET `accountId` = $accountId, producerId= $producerId, `phoneName` = '$phoneName', `screenSize`= '$screenSize', `resolution` = '$resolution', `os` = '$os', `cpu` = '$cpu', `gpu` = '$gpu', `frontCamera` = '$frontCamera', `rearCamera` = '$rearCamera', `ram` = '$ram', `rom` = '$rom', `batteryCapacity` = '$batteryCapacity', `weight` = '$weight', `netword_connect` = '$netword_connect',  `phoneImage` = '$phoneImage', `phonePrice` = '$phonePrice', `phoneSale` = '$phoneSale' WHERE phoneId = '{$_GET['phoneId']}'";
                                                if(mysqli_query($conn, $sql_phoneImage)){
                                                    move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../img/' . $_FILES['fileUpload']['name']);
                                                    echo "<script>window.location='http://localhost/PHP/ephone/admin/pages/list_product.php'</script>";
                                                }else{
                                                    echo "Lỗi: " . $sql_phone . "<br>" . mysqli_error($conn);
                                                }
                                            // Update ảnh phoneImage2
                                            }elseif($phoneImage2 != null && $phoneImage == null){
                                                $sql_phoneImage2 = "UPDATE  phone SET `accountId` = $accountId, producerId= $producerId, `phoneName` = '$phoneName', `screenSize`= '$screenSize', `resolution` = '$resolution', `os` = '$os', `cpu` = '$cpu', `gpu` = '$gpu', `frontCamera` = '$frontCamera', `rearCamera` = '$rearCamera', `ram` = '$ram', `rom` = '$rom', `batteryCapacity` = '$batteryCapacity', `weight` = '$weight', `netword_connect` = '$netword_connect',  `phoneImage2` = '$phoneImage2', `phonePrice` = '$phonePrice', `phoneSale` = '$phoneSale' WHERE phoneId = '{$_GET['phoneId']}'";
                                                if(mysqli_query($conn, $sql_phoneImage2)){
                                                    move_uploaded_file($_FILES['fileUpload2']['tmp_name'], '../img/' . $_FILES['fileUpload']['name']);
                                                    echo "<script>window.location='http://localhost/PHP/ephone/admin/pages/list_product.php'</script>";
                                                }else{
                                                    echo "Lỗi: " . $sql_phone . "<br>" . mysqli_error($conn);
                                                }
                                            // Update tất cả thông tin của điện thoại
                                            }elseif($phoneImage != null && $phoneImage2 != null){
                                                $sql_phoneImage3 = "UPDATE  phone SET `accountId` = $accountId, producerId= $producerId, `phoneName` = '$phoneName', `screenSize`= '$screenSize', `resolution` = '$resolution', `os` = '$os', `cpu` = '$cpu', `gpu` = '$gpu', `frontCamera` = '$frontCamera', `rearCamera` = '$rearCamera', `ram` = '$ram', `rom` = '$rom', `batteryCapacity` = '$batteryCapacity', `weight` = '$weight', `netword_connect` = '$netword_connect',  `phoneImage` = '$phoneImage', `phoneImage2` = '$phoneImage2', `phonePrice` = '$phonePrice', `phoneSale` = '$phoneSale' WHERE phoneId = '{$_GET['phoneId']}'";
                                                if(mysqli_query($conn, $sql_phoneImage3)){
                                                    move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../img/' . $_FILES['fileUpload']['name']);
                                                    move_uploaded_file($_FILES['fileUpload2']['tmp_name'], '../img/' . $_FILES['fileUpload2']['name']);
                                                    echo "<script>window.location='http://localhost/PHP/ephone/admin/pages/list_product.php'</script>";
                                                }else{
                                                    echo "Lỗi: " . $sql_phone . "<br>" . mysqli_error($conn);
                                                }
                                            }
                                            
										}?>
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