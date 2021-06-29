<?php
    function login($username, $pass){
        include('./admin/include/connect.php');
        $sql = "SELECT * FROM account WHERE accountName = '$username' AND accountPass = '$pass'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) == 0){
            echo "
                <script language='javascript'>
                    alert('Tài khoản mật khẩu không đúng');
                </script>
            ";
        }else{
            while($rows = mysqli_fetch_array($query)) {
                $_SESSION['accountName'] = $rows['accountName'];
                $_SESSION['accountId'] = $rows['accountId'];
                $_SESSION['roleId'] = $rows['roleId'];
                if ($rows['roleId'] != 1) 
                    header('Location: http://localhost/PHP/ephone/index.php');
                else{
                    header('Location: http://localhost/PHP/ephone/admin/pages/admin.php');
                }
            }
            
        }
    }

    function logout(){
        unset($_SESSION['roleId']);
        unset($_SESSION['accountName']);
        echo "
            <script language='javascript'>
                alert('Thoát quản trị thành công');
                window.open('http://localhost/PHP/ephone/index.php','_self', 1);
            </script>
        ";
    }

    // Xóa giỏ hàng
    function delete_cart(){
        unset($_SESSION['cart']);
    }
    
    // Hàm đăng ký
    function register($registerusername, $registerpassword, $registerconfirm, $registeruser, $registeremail, $registerphone, $registeraddress) {
        // Kết nối với database
        include('admin/include/connect.php');

        // Kiểm tra username đã được sử dụng chưa
        if(mysqli_num_rows(mysqli_query($conn, "SELECT accountName FROM account WHERE accountName='$registerusername'"))>0) {
            echo "
            <script>
                alert('Tên đăng nhập đã được sử dụng. Vui lòng sử dụng tên đăng nhập khác.');
            </script>";
            exit;
        }

        //Kiểm tra email đã được sử dụng chưa
        if(mysqli_num_rows(mysqli_query($conn, "SELECT mail FROM account WHERE mail='$registeremail'"))>0) {
            $sql_test = "SELECT mail FROM account WHERE mail='$registeremail'";
            echo "
            <script>
                alert('Email đã được sử dụng. Vui lòng sử dụng Email khác.');
            </script>";
            exit;
        }

        //Kiểm tra mật khẩu nhập lại có chính xác không
        if($registerconfirm != $registerpassword) {
            echo "
            <script>
                alert('Mật khẩu nhập lại không đúng. Vui lòng nhập lại mật khẩu.');
            </script>";
            exit;
        }

        // Xử lý thêm tài khoản mới
        $sql_register = "INSERT INTO `account`(`roleId`, `accountName`, `accountPass`, `fullName`, `mail`, `mobile`, `address`, `accountStatus`) VALUES ('6', '$registerusername', '$registerpassword', '$registeruser', '$registeremail', '$registerphone', '$registeraddress', '1')";
        if(mysqli_query($conn, $sql_register)) {
            echo "
            <script>
                alert('Đăng ký thành công.');
                window.location.assign('index.php');
            </script>";
        }else {
            echo "
            
            <script>
                alert('Đăng ký thất bại. ');
                window.location.assign('login.php');
            </script>";
        }
    }

?>