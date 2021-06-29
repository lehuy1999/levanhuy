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

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <link href="../css/startmin.css" rel="stylesheet">

    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="../resources/ckeditor/ckeditor.js"></script>

    <script src="../resources/ckfinder/ckfinder.js"></script>

</head>

<body>

    <?php
    include('../include/connect.php');

    if (isset($_POST['update_news'])) {
        if ($_POST['title'] != null) {
            $id = $_GET['newsId'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $img = $_FILES['fileUpload']['name'];
            $accountId = $_SESSION['accountId'];

            $sql = "UPDATE news SET title = '$title' , img = '$img' , content = '$content', accountId = $accountId WHERE newsId = $id";
            if (mysqli_query($conn, $sql)) {
                header('Location: http://localhost/PHP/ephone/admin/pages/list_producer.php');
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
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
                                Thay đổi tin tức
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php
                                        include('../include/connect.php');
                                        $sql_1 = "SELECT * FROM news WHERE newsId = '{$_GET['newsId']}'";
                                        $query = mysqli_query($conn, $sql_1);
                                        $row = mysqli_fetch_array($query);
                                        ?>

                                        <!-- Form tạo danh mục -->
                                        <form role="form" action="edit_news.php?newsId=<?php echo $row['newsId']; ?>" method="POST" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label>Tiêu đề</label>
                                                <input class="form-control" type="text" name="title" value="<?php echo $row['title']; ?>">
                                            </div>

                                            <div class="form-group">
                                                <!-- Ảnh tiêu để -->
                                                <label>Ảnh tiêu đề bài viết</label>
                                                <input class="form-control" type="file" name="fileUpload" value="<?php echo $row['img']; ?>">
                                            </div>

                                            <!-- content -->
                                            <div class="form-group">
                                                <label>Nội dung bài viết</label>
                                                <textarea class="form-control" name="content" id="description"><?php echo $row['content']; ?></textarea>
                                            </div>

                                            <script type="text/javascript">
                                                // var editor = 
                                                CKEDITOR.replace('description');
                                                // CKFinder.setupCKEditor(editor, '../ckfinder/');
                                            </script>

                                            <div class="form-group">
                                                <input type="reset" class="btn btn-default" name="xoa" value="Hủy">
                                                <input type="submit" class="btn btn-primary" name="update_news" value="Lưu">
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