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
    include('header.php');
  ?>

  <div class="container">

    <div class="row content">

      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

          <div style="height: 50px;"></div>

          <ul class="infomation">

              <li><a href="infoUser.php">Thông tin người dùng</a></li>
              <li style="background-color: rgb(224, 105, 105);"><a href="orderList.php">Lịch sử mua hàng</a></li>
              <li><a href="password.php">Đổi mật khẩu</a></li>
          </ul>

      </div>

      <div class="col-1"></div>

      <div class="col-8">

        <div style="height: 50px;"></div>

        <h4>Lịch sử đặt hàng</h4>

        <table class="table table-hover">
          
          <thead>
            <tr style="background-color: #191919; color: white;">
                <th scope="col">Điện thoại</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
            </tr>
          </thead>
          <tbody>
              <?php
                include('./admin/include/connect.php');
                $id= $_GET['orderId'];
                $sql_order = "SELECT * FROM orderitem WHERE orderId = $id";
                $query_order =  mysqli_query($conn, $sql_order);
                $row_order = mysqli_fetch_array($query_order)?>
              <tr>
                <td>
                    <?php
                        $sql_phone = "SELECT * FROM phone WHERE phoneId = {$row_order['phoneId']}";
                        $row_phone = mysqli_fetch_array(mysqli_query($conn, $sql_phone));
                        echo $row_phone['phoneName'];
                    ?>
                </td>
                <td><?php echo $row_order['orderItemQuantity'];?></td>
                <td><?php echo $row_order['orderItemPrice'];?></td>
              </tr>
          </tbody>

        </table>
          
      </div>

    </div>

    <div style="height: 50px;"></div>

  </div>
  <!-- Start Footer -->
  <?php
    include('footer.php');
  ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>