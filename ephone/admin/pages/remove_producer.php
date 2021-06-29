<?php  
	include("../include/connect.php");
	$sql = "DELETE FROM producer WHERE producerId='{$_GET['producerId']}'";

	if (mysqli_query($conn, $sql))
	    {
	        header('location: http://localhost/PHP/ephone/admin/pages/list_producer.php');
	    }
    else
        echo "Xóa danh mục thất bại";
?>