<?php
ob_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="plugin/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css//hieu.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
</head>

<body>

    <!-- header -->
    <?php
    include('headerFix.php');
    ?>

    <div id="revert-search" style="display: none;">
        <div class="item-revert" style="position: absolute; background-color: white; width: 100%; padding-bottom: 5px; z-index: 3; ">
            <div class="list" style=" position: relative;  overflow-y: auto; width: 100%; height: 170px;">
                <div id="content"></div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row content">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="module" style="padding: 10px 0; border-bottom: 2px solid #cccccc;">
                    <a href="index.php" style="text-decoration: none; font-weight: bold;">
                        Tiếp tục tìm kiếm sản phẩm</a>
                    <!-- <h6>Giỏ hàng của bạn</h6> -->
                </div>
                <div class="row">
                    <div class="col-12" id="listCart">
                        <!-- Cart Item -->
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $total = 0;
                            foreach ($_SESSION['cart'] as $key => $value) { ?>
                                <div class='cartItem' id="cartx">
                                    <div class='row'>
                                        <div class='col-5'>
                                            <div class='cartItem-img'>
                                                <img src="admin/img/<?php echo $value['image'] ?>" alt='' />
                                            </div>
                                        </div>
                                        <div class='col-7' style="padding: 10px 0 20px 0;">
                                            <div class='cartItem-content'>
                                                <p style='font-weight: bold; font-family: arial;'><?php echo $value['name'] ?></p>
                                                <p style='color: red; font-family: arial; font-size: 14px; font-weight: bold;'><?php echo number_format($value['price']); ?>₫</p>

                                                <div class='quantity'>
                                                    <div class='form-group'>
                                                        <input placeholder="Số lượng sản phẩm" style="border-radius: 0; height: 40px; width: 87%;" id='num_<?php echo $key ?>' class='form-control' type='number' min='0' max='10' name="num_<?php echo $key ?>" value="<?php
                                                                                                                                                                                    echo $value['num'];
                                                                                                                                                                                    $total += ($value['price'] * $value['num']);
                                                                                                                                                                                    ?>" />
                                                    </div>
                                                    <div class='btn-group' role='group' aria-label='Button group'>
                                                        <button class='btn btn-danger' onclick="deleteCart(<?php echo $key ?>)" style="border-radius: 0;">Xóa sản phẩm</button>
                                                        <button class='btn btn-success' onclick="updateCart(<?php echo $key ?>)" style="border-radius: 0;">Cập nhập số lượng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } else {
                            echo "Bạn chưa mua hàng";
                        }
                        ?>

                        <div class="col-12">
                            <div class="costTotal" id="total">
                                <div class="row">
                                    <div class="col-4" style="margin-top: 10px;">Tổng tiền</div>
                                    <div class="col-8" style="margin-top: 10px;">
                                        <span class="pull-right">
                                            <?php
                                            if (isset($_SESSION['cart'])) {
                                                echo number_format($total);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                            VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="information_userOrder mt-3">
                            <div class="row">
                                <div class="col-12">
                                    <h6>Thông tin mua hàng</h6>
                                    <form action="viewcart.php" method="POST">
                                        <div class="form-group">
                                            <label>Tên khách hàng</label>
                                            <input id="my-input" class="form-control" type="text" name="orderName" require>
                                        </div>
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input id="my-input" class="form-control" type="text" name="mobile" require>
                                        </div>
                                        <div class="form-group">
                                            <label>Địa chỉ</label>
                                            <input id="my-input" class="form-control" type="text" name="address" require>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input id="my-input" class="form-control" type="email" name="mail" require>
                                        </div>
                                        <input style="border-radius: 5px; background-color: red; border: 1px solid red;" class="btn btn-primary" name="btnThanhtoan" type="submit" value="Thanh toán" />
                                    </form>
                                </div>
                                <?php
                                include('./admin/include/connect.php');
                                include('function.php');
                                if (isset($_POST['btnThanhtoan'])) {
                                    if (isset($_SESSION['accountId'])) {
                                        $accountId = $_SESSION['accountId'];
                                        $orderName = $_POST['orderName'];
                                        $mobile = $_POST['mobile'];
                                        $address = $_POST['address'];
                                        $mail = $_POST['mail'];
                                        if ($orderName != null && $mobile != null && $address != null && $mail != null) {
                                            $sql = "INSERT INTO `orders`(`accountId`, `orderName`, `mobile`, `address`, `totalPrice`, `mail`, `orderStatus`) VALUES ($accountId, '$orderName', '$mobile', '$address', $total, '$mail', 0)";
                                            if (mysqli_query($conn, $sql)) {
                                                $orderId = mysqli_insert_id($conn);
                                                foreach ($_SESSION['cart'] as $key => $value) {
                                                    $orderQuantity = $value['num'];
                                                    $orderPice = $value['price'];
                                                    $sql_2 = "INSERT INTO `orderitem`(`orderId`, `phoneId`, `orderItemQuantity`, `orderItemPrice`) VALUES ($orderId, $key, $orderQuantity, $orderPice)";
                                                    if (mysqli_query($conn, $sql_2)) {
                                                        $sql_3 = "SELECT * FROM phone WHERE phoneId = $key";
                                                        $row_3 = mysqli_fetch_array(mysqli_query($conn, $sql_3));
                                                        $quantity_update = $row_3['quantity'] - $orderQuantity;
                                                        $sql_4 = "UPDATE phone SET quantity = $quantity_update WHERE phoneId = $key";
                                                        if (mysqli_query($conn, $sql_4)) {
                                                            echo "
                                                                <script>
                                                                    alert('Đặt hàng thành công');
                                                                    window.open('http://localhost/PHP/ephone/index.php','_self', 1);
                                                                </script>
                                                            ";
                                                        } else {
                                                            echo "
                                                                <script>
                                                                    alert('Đặt hàng thất bại');
                                                                </script>
                                                                ";
                                                        }
                                                    }
                                                }
                                                delete_cart();
                                            } else {
                                                echo "Thất bại" . mysqli_errno($conn);
                                            }
                                        } else {
                                            echo "
                                                <script>
                                                    alert('Nhập đầy đủ thông tin để đặt hàng');
                                                </script>
                                                ";
                                        }
                                    } else {
                                        header('Location: http://localhost/PHP/ephone/login.php');
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include('footer.php');
    ?>
    <script>
        function updateCart(id) {
            num = $("#num_" + id).val();
            $.post("updateCart.php", {
                    'id': id,
                    'num': num
                },
                function(data) {
                    $('#listCart').load("http://localhost/PHP/ephone/viewCart.php #cartx, #total");
                    $('#numCart').text(data);
                });
        }

        function deleteCart(id) {
            $.post("updateCart.php", {
                    'id': id,
                    'num': 0
                },
                function(data) {
                    $('#listCart').load("http://localhost/PHP/ephone/viewCart.php #cartx, #total");
                    $('#numCart').text(data);
                });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- Tìm kiếm -->
    <script>
        let x = $('#revert-search');
        let dem = 0;
        let value = $("input[name='search_value']");

        value.on("change keyup paste click", () => {
            if (value.val() == "") {
                x.attr('style', 'width: 370px; margin: 5px 0 0 15%; padding:0px 5px 0px 5px ; position: relative; display: none;');
            } else {
                x.attr('style', 'width: 370px; margin: 5px 0 0 15%; padding:0px 5px 0px 5px ; position: relative; display: block;');
            }
        });

        function debounce(func, wait) {
            var timeout;
            return function() {
                var context = this,
                    args = arguments;
                var executeFunction = function() {
                    func.apply(context, args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(executeFunction, wait);
            };
        };

        value.on("change keyup paste click", debounce(() => {
            let data = value.val();
            $.post('./searchForm.php', {
                data
            }, (success) => {
                document.getElementById('content').innerHTML = success;
            })
        }, 300));
    </script>

</body>

</html>