<?php  
session_start();
unset($_SESSION['roleId']);
unset($_SESSION['accountName']);

echo "
	<script language='javascript'>
		alert('Thoát quản trị thành công');
		window.open('http://localhost/PHP/ephone/admin/pages/login.php','_self', 1);
	</script>
";

?>