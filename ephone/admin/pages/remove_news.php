<?php  
	include("../include/connect.php");
	$sql = "DELETE FROM news WHERE newsId='{$_GET['newsId']}'";

	if (mysqli_query($conn, $sql))
	    {
	        header('location: http://localhost/PHP/ephone/admin/pages/list_news.php');
	    }
    else
        echo "Xóa bài viết thất bại";
?>