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
                                Tạo bài viết mới
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Form tạo danh mục -->
                                        <form role="form" action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <!-- Tiêu để -->
                                                <label>Tiêu đề bài viết</label>
                                                <input class="form-control" type="text" name="title" required="true">
                                            </div>

                                            <div class="form-group">
                                                <!-- Ảnh tiêu để -->
                                                <label>Ảnh tiêu đề bài viết</label>
                                                <input class="form-control" type="file" name="fileUpload">
                                            </div>

                                            <!-- content -->
                                            <div class="form-group">
                                                <label>Nội dung bài viết</label>
                                                <textarea class="form-control" name="description"
                                                    id="description"></textarea>
                                            </div>

                                            <input class="btn btn-default" type="reset" name="xoa" value="Hủy">
                                            <input class="btn btn-primary" type="submit" name="up" value="Lưu">

                                        </form>
                                        <script type="text/javascript">
                                        // var editor = 
                                        CKEDITOR.replace('description');
                                        // CKFinder.setupCKEditor(editor, '../ckfinder/');
                                        </script>
                                        <!-- Lưu thông tin sản phẩm vào db và upload file vào file img -->
                                        <?php
                                            include('../include/connect.php');
                                            if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
                                                $title = $_POST['title'];
                                                $img = $_FILES['fileUpload']['name'];
                                                $content = $_POST['description'];
                                                $accountId = $_SESSION['accountId'];
                                                if ($_FILES['fileUpload']['error'] > 0)
                                                    echo "Upload file bị lỗi!";
                                                else {
                                                    
                                                    $sql = "INSERT INTO news(accountId, title, img, content) VALUES($accountId,'$title', '$img', '$content')";
                                                    if (mysqli_query($conn, $sql)) {
                                                        move_uploaded_file($_FILES['fileUpload']['tmp_name'], '../img/' . $_FILES['fileUpload']['name']);
                                                        header('Location: http://localhost/PHP/ephone/admin/pages/list_news.php');
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