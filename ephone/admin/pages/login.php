<?php
session_start();
if (isset($_SESSION['accountName'])) {
  if ($_SESSION['roleId'] != 6) {
      header("location: admin.php");
  }
  if ($_SESSION['roleId'] == 6) {
      // header("");
      echo "Người dùng";
  }
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

    </head>
    <body>
    <?php  
        include "../include/connect.php";
        
        if(isset($_POST['login'])){
            if ($_POST['username'] == null || $_POST['password'] == null) {
                echo "
                    <script language='javascript'>
                        alert('Nhập tài khoản');
                    </script>
                ";
            }else{
                $username = $_POST['username'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM account WHERE accountName = '$username' AND accountPass = '$password'";
                $query = mysqli_query($conn, $sql);
                if(mysqli_num_rows($query) == 0){
                    echo "Mật khẩu không đúng";
                }else{
                  while($rows = mysqli_fetch_array($query)) {
                    $_SESSION['accountName'] = $_POST['username'];
                    $_SESSION['accountId'] = $rows['accountId'];
                    $_SESSION['roleId'] = $rows['roleId'];
                    if ($rows['roleId'] != 6) {
                      echo "
                        <script language='javascript'>
                          alert('Đăng nhập quản trị thành công');
                          window.open('admin.php','_self', 1);
                        </script>
                      ";
                    }else{
                        echo "
                            <script language='javascript'>
                                alert('Không phải tài khoản admin');
                            </script>
                        ";
                    }
                  }
                }
            }
        }
    ?>   
      
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="color: green; text-align: center;">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus required="true">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required="true">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" name="login" value="Login" >
                            </fieldset>
                        </form>
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
