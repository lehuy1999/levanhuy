<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết điện thoại</title>
    <link rel="stylesheet" href="plugin/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/hieu.css" />
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- <script src="js/utils.js"></script> -->
    <style>
        .gift {
            border: 1px solid red;
            border-radius: 5px;
            box-sizing: border-box;
            padding: 30px 0px 10px 30px;
            line-height: 30px;
            position: relative;
            margin-top: 20px;
        }

        .gift-frames {
            position: absolute;
            margin-top: -50px;
            background-color: red;
            color: white;
            padding: 3px 10px;
            border-radius: 5px
        }
    </style>
</head>

<body>
    <!-- header -->
    <?php
    include('headerFix.php');
    ?>

    <div style="height: 20px;"></div>
    <?php
    include('admin/include/connect.php');
    $sql = "SELECT * FROM phone WHERE phoneId = '{$_GET['phoneId']}'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    ?>
    <div class="content" style="padding: 0 10%;">
        <div class="detail">
            <p style="font-family: arial; margin-bottom: -5px;"><?php echo $row['phoneName']; ?></p>
            <hr style="color: red; border: none;">
            <div class="detail-left" style="text-align: center; border: 1px solid #cccccc; padding: 30px 50px;">
                <img src="./admin/img/<?php echo $row['phoneImage']; ?>" alt="" style="width: 505px; height: 505px;">
            </div>
            <div class="detail-right">
                <div class="detail-cost">
                    <span style="color: red; font-weight: bold; font-size: 18px;"><?php echo number_format($row['phonePrice'] - ($row['phonePrice'] * $row['phoneSale'] / 100)); ?><sup>đ</sup>
                        <span class="old-cost" style="font-size: 14px;">Giá niêm yết :
                            <strike style="font-weight: 100;"><?php echo number_format($row['phonePrice']) ?></strike><sup>đ</sup>
                        </span>
                    </span>
                    <div style="clear: both;"></div>
                    <?php
                    $name = substr($row['phoneName'], 0, 10);
                    $sql_phone = "SELECT * FROM phone WHERE phoneName LIKE '%$name%' LIMIT 0,2";
                    $query_phone = mysqli_query($conn, $sql_phone);
                    while ($row_phone = mysqli_fetch_array($query_phone)) :
                    ?>
                        <div class="relate-product" style="float: left; padding-top: 10px;">
                            <a href="http://localhost/PHP/ephone/chitietdienthoai.php?phoneId=<?php echo $row_phone['phoneId'] ?>">
                                <button class="relate-product-item" style="border: 1px solid #efefef; padding: 8px 16px; background-color: #fff; border-radius: 0; box-shadow: 0 0 5px 0 #7f7f7f3d;">
                                    <h6 style="font-size: 13px; font-weight: 100;"><?php echo $row_phone['ram'] ?> | <?php echo $row_phone['rom'] ?></h6>
                                    <span style="color: red; font-weight: bold;"><?php echo number_format($row_phone['phonePrice'] - ($row_phone['phonePrice'] * $row_phone['phoneSale'] / 100)); ?>&nbsp;₫</span>
                                </button>
                            </a>
                        </div>
                    <?php endwhile; ?>
                    <div style="clear: both;"></div>
                    <div class="gift" style="margin-top: -20px;">
                        <div class="gift-frames" style="border-radius: 20px; padding: 3px 20px; font-size: 14px;">
                            <i class="fa fa-gift" aria-hidden="true" style="color: white;"></i> Khuyến mại
                        </div>
                        <ul style="line-height: 20px;">
                            <h6 style="color: red; font-size: 12px;">Trả góp 0%:</h6>
                            <li style=" font-size: 12px;">
                                Trả góp lãi suất 0% với Home Credit.
                            </li>
                            <li style=" font-size: 12px;">
                                Trả trước 50%, kỳ hạn 8 tháng (Áp dụng trên GIÁ NIÊM YẾT, không áp dụng cùng các khuyến
                                mại khác)
                            </li>
                            <h6 style="color: red; font-size: 12px;">Chương trình khuyến mãi:</h6>
                            <li style=" font-size: 12px;">
                                Giảm 200.000đ khi mua kèm Tai nghe Airpods
                            </li>
                            <li style=" font-size: 12px;">
                                Thu cũ đổi mới iPhone chính hãng VNA - Trợ giá tới 500.000Đ
                            </li>
                        </ul>

                    </div>
                    <div class="promotion">
                        <ul>
                            <li>Giảm thêm tới 1% cho <span style="color: red;">thành viên của Shop</span></li>
                            <li><span style="color: red;">Thu cũ đổi mới - Trợ giá tốt nhất</span></li>
                            <li><span>Giảm giá 50% tối đa 300k khi mua sim với data khủng, giá cực tốt</span></li>
                        </ul>
                    </div>

                    <form action="" method="POST">
                        <div class="payment" style="margin-top: -10px;">
                            <p style="font-size: 18px;">Thanh toán online | Miễn phí giao hàng thu tiền</p>
                            <button name="btnMua" onclick="pay(<?php echo $row['phoneId']; ?>)" style="border: 1px solid red; width: 80%; font-size: 16px; font-weight: bold; padding: 8px 0;">Mua ngay</button>
                        </div>
                    </form>
                    <div class="addCart">
                        <button onclick="addCart(<?php echo $row['phoneId'] ?>)" style="border: 1px solid red; width: 80%; font-size: 16px; font-weight: bold; padding: 8px 0;">Thêm vào giỏ hàng</a></button>
                    </div>
                    <div style="height: 30px;"></div>
                    <?php
                    if (isset($_POST['btnMua'])) {
                        if (isset($_SESSION['cart'])) {
                            $cart = $_SESSION['cart'];
                            $id = $_GET['phoneId'];
                            if (array_key_exists($id, $cart)) {
                                $cart[$id] = array(
                                    'name' => $row['phoneName'],
                                    'num' => (int) $cart[$id]['num'] + 1,
                                    'price' => $row['phonePrice'],
                                    'image' => $row['phoneImage']
                                );
                            } else {
                                $cart[$id] = array(
                                    'name' => $row['phoneName'],
                                    'num' => 1,
                                    'price' => $row['phonePrice'],
                                    'image' => $row['phoneImage']
                                );
                            }
                        } else {
                            $id = $_GET['phoneId'];
                            $cart = array();
                            $cart[$id] = array(
                                'name' => $row['phoneName'],
                                'num' => 1,
                                'price' => $row['phonePrice'],
                                'image' => $row['phoneImage']
                            );
                        }
                        $_SESSION['cart'] = $cart;
                        header('Location: http://localhost/PHP/ephone/viewCart.php');
                    }
                    ?>
                </div>
            </div>
            <!-- Thông số kỹ thuật -->
            <div class="detail-bottom">
                <div class="product-prop" style="border: none;">
                    <h4 style="border: 1px solid red; padding: 8px; font-size: 18px;">Thông số kỹ thuật</h4>
                    <div class="simple-prop" style="font-size: 14px;">
                        <?php
                        $id = $row['producerId'];
                        $sql_2 = "SELECT * FROM producer WHERE producerId = $id";
                        $query = mysqli_query($conn, $sql_2);
                        $rows = mysqli_fetch_array($query);
                        ?>
                        <p><label>Nhà sản xuất</label><span><?php echo $rows['producerName']; ?></span></p>
                        <p><label>Kích thước màn hình</label><span><?php echo $row['screenSize']; ?></span></p>
                        <p><label>Độ phân giải màn hình</label><span><?php echo $row['resolution']; ?></span></p>
                        <p><label>Hệ điều hành</label><span><?php echo $row['os']; ?></span></p>
                        <p><label>Chip xử lý (CPU)</label><span><?php echo $row['screenSize']; ?></span></p>
                        <p><label>Ram</label><span><?php echo $row['ram']; ?></span></p>
                        <p><label>Camera trước</label><span><?php echo $row['frontCamera']; ?></span></p>
                        <p><label>Camera sau</label><span><?php echo $row['rearCamera']; ?></span></p>
                        <p><label>Bộ nhớ trong</label><span><?php echo $row['rom']; ?></span></p>
                        <p><label>Dung lượng pin (mAh)</label><span><?php echo $row['batteryCapacity']; ?></span></p>
                        <p><label>Cân nặng</label><span><?php echo $row['weight']; ?> g</span></p>
                        <p><label>Dữ liệu & Kết nối</label><span><?php echo $row['netword_connect']; ?></span></p>
                        <p></p>
                    </div>
                </div>

                <!-- Comment -->
                <div class="feedback-relate">
                    <div class="product-comment" style="border: none; width: 65%;">
                        <h4 style="border: none; padding: 8px; background-color: red; color: #fff; font-size: 18px;">Đánh giá sản phẩm</h4>
                        <div class="form-comment">
                            <div class="form-group">
                                <h4 style="font-size: 18px;">Hỏi và đáp</h4>
                                <div class="form-group">
                                    <input style="border: 1px solid; font-family: arial; font-size: 16px; padding: 5px 10px;" class="form-control" type="text" id="username" name="username" placeholder="Nhập tên của bạn vào đây">
                                </div>
                                <textarea id="cm_content" name="cm_content" placeholder="Bạn vui lòng nhập nội dung của câu hỏi vào đây" style="font-family: arial; font-size: 16px; padding: 5px 10px;"></textarea>
                                <input class="btn btn-primary" onclick="gui()" type="submit" name="btnGui" value="Gửi" style="font-family: arial; border-radius: 5px; font-size: 16px; background-color: red; border: 1px solid red; padding: 5px 15px;"/>
                                <script>
                                    // Xử lý comment
                                    function gui() {
                                        var username = document.getElementById('username').value;
                                        var cm_content = document.getElementById('cm_content').value;
                                        if (username && cm_content) {
                                            var url = window.location.href;
                                            var phoneId = url.replace(
                                                'http://localhost/PHP/ephone/chitietdienthoai.php?phoneId=', '');
                                            phoneId = parseInt(phoneId);
                                            document.getElementById('username').value = '';
                                            document.getElementById('cm_content').value = "";

                                            var data = {
                                                username,
                                                cm_content,
                                                phoneId,
                                            }

                                            $.ajax({
                                                url: "xuly_comment.php",
                                                type: 'POST',
                                                data: data,
                                                success: function(data) {
                                                    document.getElementsByClassName('single-comment')[0]
                                                        .innerHTML = "";
                                                    document.getElementById('trave').innerHTML = data;
                                                },
                                                error: function(e) {
                                                    console.log(e.message);
                                                }
                                            });
                                        } else {
                                            alert('Vui lòng nhập đủ dữ liệu!!!');
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                        <div id="trave"></div>
                        <div class="single-comment">
                            <?php
                            $sql_4 = "SELECT * FROM cm_phone_1 WHERE phoneId = '{$_GET['phoneId']}'";
                            $query = mysqli_query($conn, $sql_4);
                            while ($row_1 = mysqli_fetch_array($query)) : ?>
                                <div class="user-comment">
                                    <img src="https://via.placeholder.com/150x150" alt="" style="width: 40px; height: 40px;">
                                    <span style="font-family: arial; font-size: 16px;"><?php echo $row_1['username']; ?></span>
                                    <button class="btn btn-outline-danger" style="display: none;" name="<?php echo $row_1['cm_phone_1']; ?>">Bình
                                        luận</button>
                                </div>
                                <div class="content-comment">
                                    <p style="font-size: 16px; font-family: arial;"><?php echo $row_1['cm_content']; ?></p>
                                </div>
                                <?php
                                $cm_1 = $row_1['cm_phone_1_id'];
                                $sql_cm_2 = "SELECT * FROM cm_phone_2 WHERE cm_phone_1_id = $cm_1";
                                $query_cm_2 = mysqli_query($conn, $sql_cm_2);
                                while ($row_cm_2 = mysqli_fetch_array($query_cm_2)) : ?>
                                    <!-- Comment cấp 2 -->
                                    <div class="content-reply">
                                        <div class="user-comment">
                                            <img src="https://via.placeholder.com/150x150" alt="">
                                            <span><?php echo $row_cm_2['username']; ?></span>
                                            <div class="btn btn-outline-danger">QTV</div>
                                        </div>
                                        <div class="content-comment">
                                            <p><?php echo $row_cm_2['cm_content']; ?></p>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>

                    <!-- Sản phẩm liên quan -->
                    <div class="product-relate" style="margin-right: -20px; border: none;">
                        <h4 style="padding-left: 0; border: none; padding: 8px; background-color: red; color: #fff; font-size: 18px;">Sản phẩm liên quan</h4>
                        <?php
                        $name = substr($row['phoneName'], 0, 6);
                        $sql_phone = "SELECT * FROM phone WHERE phoneName LIKE '%$name%' LIMIT 0,4";
                        $query_phone = mysqli_query($conn, $sql_phone);
                        while ($row_phone = mysqli_fetch_array($query_phone)) : ?>
                            <div class="product-item" style="padding: 10px; text-align: center; width: calc(50% - 10px);">
                                <a href="http://localhost/PHP/ephone/chitietdienthoai.php?phoneId=<?php echo $row_phone['phoneId'] ?>" style="text-decoration: none;">
                                    <img src="./admin/img/<?php echo $row_phone['phoneImage']; ?>" alt="" style="width: 170px; height: 170px;">
                                    <div class="name-cost" style="text-align: center;">
                                        <p style="margin: 0px; font-size: 13px; font-family: arial; font-weight: bold;"><?php echo $row_phone['phoneName']; ?></p>
                                        <span style="font-size: 13px; font-weight: bold;"><?php echo number_format($row_phone['phonePrice'] - ($row_phone['phonePrice'] * $row_phone['phoneSale'] / 100)); ?><sup>đ</sup></span>
                                        <span style="font-size: 13px; font-weight: bold;">
                                            <strike>
                                                <?php echo number_format($row_phone['phonePrice']) ?><sup>đ</sup>
                                            </strike>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include('footer.php');
    ?>
    <!-- Sử lý addCart -->
    <script>
        function addCart(id) {
            num = 1;
            $.post("addCart.php", {
                    'id': id,
                    'num': num
                },
                function(data) {
                    $('#numCart').text(data);
                });
        }
    </script>
</body>

</html>