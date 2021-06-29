<?php  
	include("../include/connect.php");
	$sql = "DELETE FROM phone WHERE phoneId='{$_GET['phoneId']}'";

	if (mysqli_query($conn, $sql))
	    {
	        header('location: http://localhost/PHP/ephone/admin/pages/list_product.php');
	    }
    else
        echo "Xóa danh mục thất bại";
?>