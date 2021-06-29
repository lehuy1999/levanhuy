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
            <tr style="background-color: #191919; color: #fff;">
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Địa chỉ giao hàng</th>
                <th scope="col">Tổng số tiền</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Ngày đặt hàng</th>
                <!-- <th scope="col">Hủy đơn</th> -->
                <th scope="col">Chi tiết</th>
            </tr>
          </thead>
          <tbody>
              <?php
                include('./admin/include/connect.php');
                // Phân trang
                // Số lượng sản phẩm trên 1 trang
                if(isset($_GET['pp']))
		              $ppage = (int) $_GET['pp'];
                else
                  $ppage = 3;
                // Trang nào
                if(isset($_GET['p']))
                  $page = (int) $_GET['p'];
                else
                 $page = 1;
                // câu lệnh
                $sql = "SELECT * FROM orders WHERE accountId= {$_SESSION['accountId']}";
                $query =  mysqli_query($conn, $sql);
                $total = mysqli_num_rows($query);
                $maxpage = ceil($total/$ppage);
                $start = ($page - 1) * $ppage;
                $sql_order = "SELECT * FROM orders WHERE accountId= {$_SESSION['accountId']} LIMIT $start, $ppage";
                $query_order =  mysqli_query($conn, $sql_order);
                while($row_order = mysqli_fetch_array($query_order)):?>
              <tr>
                <td><?php echo $row_order['orderId'];?></td>
                <td><?php echo $row_order['address'];?></td>
                <td><?php echo $row_order['totalPrice'];?></td>
                <td>
                  <?php 
                    if($row_order['orderStatus'] == 0)
                      echo "Đang chờ duyệt";
                    else
                      echo "Đang giao";
                  ?>
                </td>
                <td><?php echo $row_order['orderDate'];?></td>
                <td><a style="text-decoration: none;" href="listOrder.php?orderId=<?php echo $row_order['orderId'];?>">Chi tiết</a></td>
              </tr>
              <?php endwhile;?>
          </tbody>

        </table>
          <?php
            for($i=1; $i<=$maxpage; $i++){
              if($i!=$page){
                echo "<a style='text-decoration: none;' href = orderList.php?pp=$ppage&p=$i> $i </a>";
              }else{
                echo "<b>[$i]</b>";
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

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"> </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>