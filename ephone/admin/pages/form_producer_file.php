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
    
        <?php

        	require('Classes/PHPExcel.php');

            if(isset($_POST['create_producer'])){
            	$file = $_FILES['fileUpload']['tmp_name'];
            	echo 'Lỗi';
            	$objReader = PHPExcel_IOFactory::createReaderForFile($file);
            	// $objReader-> setLoadSheetsOnly('Sheet1');

            	$objExcel = $objReader->load($file);
            	$sheetData = $objExcel->getActiveSheet()->toArray('null', true, true, true);

            	print_r($sheetData);
            	echo $sheetData;
            }
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
                            <h1 class="page-header">Forms</h1>
                        </div>

                    </div>
 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tạo danh mục mới
                                    <button type="button" style="float: right;"><a href="#">Import file</a></button>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <!-- Form tạo danh mục -->
                                            <form role="form" action="" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>File dữ liệu</label>
                                                    <input class="form-control" type="file" name="fileUpload">
                                                </div>
                                                <div class="form-group">
                                                    <input type="reset" class="btn btn-default" name="xoa" value="Hủy">
                                                    <input type="submit" class="btn btn-primary" name="create_producer" value="Lưu">
                                                </div>
                                            </form>
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
