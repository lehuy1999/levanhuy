<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login And Register Form</title>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	
</head>
<body>
    <?php
		include('function.php');
		// Login
        if(isset($_POST['btnLogin'])){
            $accountName = $_POST['loginusername'];
            $accountPass = $_POST['loginpassword'];
            login($accountName, $accountPass);
		}
		// Register
		if (isset($_POST['register'])) {
			$registerusername = $_POST['registerusername'];
			$registerpassword = $_POST['registerpassword'];
			$registerconfirm = $_POST['registerconfirm'];
			$registeruser = $_POST['registeruser'];
			$registeremail = $_POST['registeremail'];
			$registerphone = $_POST['registerphone'];
			$registeraddress = $_POST['registeraddress'];
			register($registerusername, $registerpassword, $registerconfirm, $registeruser, $registeremail, $registerphone, $registeraddress);
		}
	?>
	
	<div class="hero">
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Log In</button>
				<button type="button" class="toggle-btn" onclick="register()">Register</button>
			</div>
			<!-- Login -->
			<form action="" id="login" class="input-group" method="POST">
				<div class="social-icons">
					<a href="#"><img src="images/fb.png"></a>
					<a href="#"><img src="images/tw.png"></a>
					<a href="#"><img src="images/gp.png"></a>
				</div>
				<input type="text" class="input-field" name="loginusername" placeholder="Tài khoản" required>
				<input type="password" class="input-field" name="loginpassword" id="pwd" placeholder="Mật khẩu" required>
				<input type="checkbox" class="check-box" onclick="showhide()"><span>Hiển thị mật khẩu</span>
				<button type="submit" class="submit-btn" name="btnLogin">Đăng nhập</button>
			</form>
			<!-- Resgister -->
			<form action="" id="register" class="register-group" method="POST">
				<input type="text" class="input-field" name="registerusername" placeholder="Tài khoản" required>
				<input type="password" class="input-field" name="registerpassword" id="pass" placeholder="Mật khẩu" required>
				<input type="password" class="input-field" name="registerconfirm" id="" placeholder="Nhập lại mật khẩu" required>
				<input type="text" class="input-field" name="registeruser" placeholder="Tên người dùng" required>
				<input type="email" class="input-field" name="registeremail" placeholder="Email" required>
				<input type="text" class="input-field" name="registerphone" placeholder="Số điện thoại" required>
				<input type="text" class="input-field" name="registeraddress" placeholder="Địa chỉ" required>
				<input type="checkbox" class="check-box" onclick="showpass()"><span>Hiển thị mật khẩu</span>
				<button type="submit" class="submit-btn" name="register">Đăng ký</button>
			</form>
		</div>
	</div>
	<script>
		//Chuyển đổi qua lại đăng nhập, đăng ký
		var x = document.getElementById("login");
		var y = document.getElementById("register");
		var z = document.getElementById("btn");

		function register() {
			x.style.left = "-400px";
			y.style.left = "50px";
			z.style.left = "105px";
		}

		function login() {
			x.style.left = "50px";
			y.style.left = "450px";
			z.style.left = "0 ";
		}

		// Ẩn, hiển thị mật khẩu login
		function showhide() {
			var x = document.getElementById("pwd");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}

		// Ẩn, hiển thị mật khẩu đăng ký
		function showpass() {
			var y = document.getElementById("pass");
			if (y.type === "password") {
				y.type = "text";
			} else {
				y.type = "password";
			}
		}
	</script>
</body>
</html>