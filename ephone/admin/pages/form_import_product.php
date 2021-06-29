<?php
session_start();
if (!isset($_SESSION['accountName']) or ($_SESSION['roleId'] != 1)) {
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
                                            <div class="form-group">
                                                <label>Text</label>
                                                <input class="form-control" type="file" name="fileUpload">
                                            </div>
                                            <div class="form-group">
                                                <input class="btn btn-default" type="submit" name="xoa" value="Hủy">
                                                <input class="btn btn-primary" type="submit" name="btnImport"
                                                    value="Import">
                                            </div>
                                        </form>

                                        <?php
                                            include('../include/connect.php');
                                            require('Classes/PHPExcel.php');
                                            require('Classes/PHPExcel/IOFactory.php');

                                            if (isset($_POST['btnImport'])) {
                                                $file = $_FILES['fileUpload']['tmp_name'];
                                                // Sử lý excel
                                                $inputFileType = PHPExcel_IOFactory::identify($file);
                                                $objReader = PHPExcel_IOFactory::createReaderForFile($file);
                                                $objExcel = $objReader->load($file);
                                                $sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);
                                    
                                                // print_r($sheetData);

                                                $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
                                                //echo $highestRow;
                                               
                                                for ($row=2; $row<=$highestRow ; $row++) {  
                                                    $phoneId = $sheetData[$row]['A'];
                                                    $quantity = $sheetData[$row]['B'];
                                                    $sql_phone = "SELECT * FROM phone WHERE phoneId = $phoneId";
                                                    $query_phone = mysqli_query($conn, $sql_phone);
                                                    $row_phone = mysqli_fetch_array($query_phone);
                                                    $quantity_update = (int)($quantity) + (int)$row_phone['quantity'];
                                                	$sql = "UPDATE phone SET quantity = $quantity_update WHERE phoneId = $phoneId";
                                                    // echo $sql;
                                                    mysqli_query($conn, $sql);
                                                }
                                                header('Location: list_product.php');

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