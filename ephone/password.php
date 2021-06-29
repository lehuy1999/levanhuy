<!doctype html>
<html lang="en">
  <head>
    <title>EPhone</title>
    <link rel="shortcut icon" type="image/png" href="images/logo1.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="plugin/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/hieu.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    .infomation {
      list-style: none;
    }

    .menu-user ul li:hover {
      background: rgb(226, 35, 35);
    }

    .menu-user ul li:hover a {
      color: white;
    }

    .infomation li:nth-child(1) {
      padding: 10px 15px;
      border: 1px solid #333;
    }

    .infomation li:nth-child(2) {
      padding: 10px 15px;
      border: 1px solid #333;
      /* background-color: rgb(105, 190, 224); */
    }

    .infomation li:nth-child(3) {
      padding: 10px 15px;
      border: 1px solid #333;
      /* background-color: rgb(98, 221, 86); */
    }

    .infomation li a {
      font-size: 15px;
      text-decoration: none;
      color: #333;
    }
  </style>
  </head>
  <body>

    <?php
      include('headerFix.php');
    ?>

    <div class="container">
        <div class="row content">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div style="height: 50px;"></div>
              <ul class="infomation">
                <li><a href="infoUser.php">Thông tin người dùng</a></li>
                <li><a href="orderList.php">Lịch sử mua hàng</a></li>
                <li style="background-color: rgb(224, 105, 105);"><a href="password.php">Đổi mật khẩu</a></li>
              </ul>
            </div>
            <div class="col-1">
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                <div style="height: 50px;"></div>
                <h4>Thay đổi mật khẩu</h4>
                  <form action="" method="POST">
                      <div class="form-group">
                        <label for="my-input">Tên tài khoản</label>
                        <input id="my-input" class="form-control disabled" type="text" value="<?php echo $_SESSION['accountName'];?>" disabled>
                      </div>
                      <div class="form-group">
                        <label>Mật khẩu cũ*</label>
                        <input class="form-control" type="password" name="old_password" placeholder="Mật khẩu cũ"  required="required">
                      </div>
                      <div class="form-group">
                        <label>Mật khẩu mới*</label>
                        <input class="form-control" type="password" name="new_password" placeholder="Nhập mật khẩu mới" required="required">
                      </div>
                      <div class="form-group">
                        <label>Nhập lại mật khẩu mới*</label>
                        <input class="form-control" type="password" name="entry_password" placeholder="Nhập lại mật khẩu mới" required="required">
                      </div>
                        <div class="form-group">
                          <!-- <div id="notify" class="hidden" style="color: red"></div>
                          <button id="hidden" hidden type="submit" class="btn btn-primary mt-15" data-toggle="tooltip" data-placement="bottom" title="Click to save">Lưu</button>
                          <div id="hidden1" hidden class="btn btn-primary mt-15" data-toggle="tooltip" data-placement="bottom" title="Click to exit" onclick="hide()">Thoát</div>
                          <div id="show" class="btn btn-primary mt-15" data-toggle="tooltip" data-placement="bottom" title="Click to change" onclick="show()">Thay đổi</div> -->
                          <input style="background-color: red; border: 1px solid red; border-radius: 5px;" type="submit" class="btn btn-primary" name="btnChange" value="Lưu thay đổi">                     
                        </div>
                  </form>
                  <?php
                    include("./admin/include/connect.php");
                    if(isset($_POST['btnChange'])){
                      $old_password = $_POST['old_password'];
                      $new_password = $_POST['new_password'];
                      $entry_password = $_POST['entry_password'];
                      $sql_acc = "SELECT * FROM account WHERE accountId = {$_SESSION['accountId']}";
                      $row_acc = mysqli_fetch_array(mysqli_query($conn, $sql_acc));
                      if ($row_acc['accountPass'] == $old_password) {
                        if ($new_password == $entry_password) {
                          $sql_pass = "UPDATE account SET accountPass = $new_password WHERE accountId = {$_SESSION['accountId']}";
                          if (mysqli_query($conn, $sql_pass)) {
                            echo "
                            <script>
                              alert('Thay đổi mật khẩu thành công');
                            </script>
                          ";
                        }else{
                          echo "
                            <script>
                              alert('Thay đổi mật khẩu không thành công');
                            </script>
                          ";
                        }
                        }else{
                          echo "
                            <script>
                              alert('Nhập mật khẩu mới không đúng');
                            </script>
                          ";
                        }
                      }else{
                        echo "
                          <script>
                            alert('Bạn nhập mật khẩu không chính xác');
                          </script>
                        ";
                      }
                    }
                  ?>
            </div>
        </div>
        <div style="height: 50px;"></div>
    </div>
  <!-- Start Footer -->
  <?php
    include('footer.php');
  ?>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
</body>
</html>