<!doctype html>
<html lang="en">

<head>
    <title>EPhone</title>
    <link rel="shortcut icon" type="image/png" href="images/logo1.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="plugin/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/hieu.css" />
    <!-- <script src="js/code.js"></script> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
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
  include("headerFix.php");
  ?>

    <div class="container">

        <div class="row content">

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

                <div style="height: 50px;"></div>

                <ul class="infomation">
                    <li style="background-color: rgb(224, 105, 105);"><a href="infoUser.php">Thông tin người dùng</a>
                    </li>
                    <li><a href="orderList.php">Lịch sử mua hàng</a></li>
                    <li><a href="password.php">Đổi mật khẩu</a></li>
                </ul>

            </div>

            <div class="col-1"></div>

            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">

                <div style="height: 50px;"></div>
                <h4>Thay đổi thông tin</h4>
                <?php
        include("./admin/include/connect.php");
        $sql = "SELECT * FROM account WHERE accountId = {$_SESSION['accountId']}";
        $row = mysqli_fetch_array(mysqli_query($conn, $sql));
      ?>
                <form action="" method="POST">
                    <!-- Name -->
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $row['accountName'];?>"
                            disabled>
                    </div>
                    <!-- FullName -->
                    <div class="form-group">
                        <label>Fullname*</label>
                        <input class="form-control" type="text" name="fullname" value="<?php echo $row['fullName'];?>"
                            required="required">
                    </div>
                    <!-- Địa chỉ -->
                    <div class="form-group">
                        <label>Address*</label>
                        <input class="form-control" type="text" name="address" value="<?php echo $row['address'];?>"
                            required="required">
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <label>Email*</label>
                        <input class="form-control" type="email" name="email" value="<?php echo $row['mail']?>"
                            required="required">
                    </div>
                    <!-- SĐT -->
                    <div class="form-group">
                        <label>Phone*</label>
                        <input class="form-control" type="text" name="phone" value="<?php echo $row['mobile'];?>"
                            required="required">
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-default mt-15"
                            style="background-color: yellow; border-radius: 5px; background-color: #000; color: #fff;">Hủy</button>
                        <button id="hidden" type="submit" class="btn btn-primary mt-15" name="btnChange" style="border-radius: 5px; background-color: red; border: 1px solid red;">Lưu thay
                            đổi</button>
                    </div>
                </form>
                <?php
      if(isset($_POST['btnChange'])){
        $fullName = $_POST['fullname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $mobile = $_POST['phone'];
        if($fullName != null || $address != null || $email != null || $mobile != null){
          $sql_change = "UPDATE `account` SET `fullName` = '$fullName', `mail` = '$email', `mobile` = '$mobile', `address` = '$address' WHERE accountId = {$_SESSION['accountId']}";
          if(mysqli_query($conn, $sql_change)){
            echo "
              <script>
                alert('Thay đổi thành công');
                window.location.assign('infoUser.php');
              </script>
            ";
          }else{
            echo "Lỗi ". mysqli_errno($conn);
          }
        }else{
          echo "
            <script>
              alert('Nhập đầy đủ thông tin');
            </script>
          ";
        }
      }
    ?>
    </div>
    </div>
    <div style="height: 50px;"></div>
  </div>
  <?php
  include("footer.php");
  ?>
    <!-- End Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>