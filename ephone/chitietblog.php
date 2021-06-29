<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chi tiết tin tức</title>
    <link rel="stylesheet" href="plugin/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css//hieu.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- <script src="js/utils.js"></script> -->
</head>

<body>
    <?php
    include('headerFix.php');
    ?>

    <div style="clear: both;"></div>
    <div class="content" style="height: 300px; overflow: hidden;">
        <div class="journal-title">
            <img src="https://thietbiketnoi.com/wp-content/uploads/2020/01/tong-hop-hinh-nen-background-vector-designer-dep-do-phan-giai-fhd-2k-4k-moi-nhat-4.jpg" alt="" />
        </div>
    </div>

    <?php
    include('admin/include/connect.php');
    $id = $_GET['newsId'];
    $sql = "SELECT * FROM news WHERE newsId = $id";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    ?>
    <div class="content">
        <div class="stories">
            <div class="row">
                <div class="col-8">
                    <p class="detailStory">Story</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="story-detail-title">
                                <p class="pull-left story-item-title">
                                    <?php echo $row['title']; ?>
                                </p>
                                <p class="pull-right popular-item-date mt-1">
                                    <?php echo $row['createDate']; ?>
                                </p>
                                <div class="clearfix"></div>
                                <p>Tác giả:
                                    <?php
                                    $accountId = $row['accountId'];
                                    $sql_2 = "SELECT * FROM account WHERE accountId = $accountId";
                                    $query_2 = mysqli_query($conn, $sql_2);
                                    $row_2 = mysqli_fetch_array($query_2);
                                    $accountName = $row_2['fullName'];
                                    echo $accountName;
                                    ?>
                                </p>
                            </div>
                            <div class="story-detail-content">
                                <?php echo $row['content']; ?>
                            </div>
                            <div class="story-comment">
                                <div class="feedback-relate">
                                    <div class="comment">
                                        <!-- Bình luận -->
                                        <h4>Bình luận</h4>
                                        <div class="form-comment">
                                            <div class="form-group">
                                                <!-- comment 1 -->
                                                <h4>Hỏi và đáp</h4>
                                                <div class="form-group">
                                                    <input style="border: 1px solid;" id="username" class="form-control" type="text" name="username" placeholder="Nhập tên của bạn vào đây">
                                                </div>
                                                <textarea id="cm_content" name="cm_content" placeholder="Bạn vui lòng nhập nội dung của câu hỏi vào đây"></textarea>
                                                <input class="btn btn-primary" onclick="gui()" type="submit" name="btnGui" value="Gửi" />
                                            </div>
                                            <script>
                                                function gui() {
                                                    var username = document.getElementById('username').value;
                                                    var cm_content = document.getElementById('cm_content').value;
                                                    if (!username || !cm_content) {
                                                        alert('vui long` điền đủ thông tin !');
                                                    } else {
                                                        var url = window.location.href;
                                                        var newsId = url.replace('http://localhost/PHP/ephone/chitietblog.php?newsId=', '');
                                                        newsId = parseInt(newsId);
                                                        document.getElementById('username').value = '';
                                                        document.getElementById('cm_content').value = "";
                                                        var data = {
                                                            username,
                                                            cm_content,
                                                            newsId,
                                                        }

                                                        $.ajax({
                                                            url: "xuly_binhluan.php",
                                                            type: 'POST',
                                                            data: data,
                                                            success: function(data) {
                                                                document.getElementsByClassName('single-comment')[0].innerHTML = "";
                                                                document.getElementById('trave').innerHTML = data;

                                                            },
                                                            error: function(e) {
                                                                console.log(e.message);
                                                            }
                                                        });
                                                    }
                                                }
                                            </script>
                                        </div>
                                        <div id="trave"></div>
                                        <!-- Nội dung comment -->
                                        <div class="single-comment">
                                            <?php
                                            $sql_4 = "SELECT * FROM cm_news_1 WHERE newsId = '{$_GET['newsId']}'";
                                            $query = mysqli_query($conn, $sql_4);
                                            while ($row_1 = mysqli_fetch_array($query)) : ?>
                                                <!-- Cấp 1 -->
                                                <div class="user-comment">
                                                    <img src="https://via.placeholder.com/150x150" alt="">
                                                    <span><?php echo $row_1['username']; ?></span>
                                                    <button class="btn btn-outline-danger" onclick="hienthi()" style="display: none;">Thảo
                                                        luận</button>
                                                </div>
                                                <div class="content-comment">
                                                    <p><?php echo $row_1['cm_content']; ?></p>
                                                </div>
                                                <?php
                                                $cm_1 = $row_1['cm_news_1_id'];
                                                $sql_cm_2 = "SELECT * FROM cm_news_2 WHERE cm_news_1_id = $cm_1";
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

                                            <div class="form-reply hidden">
                                                <div class="form-group">
                                                    <form action="chitietblog.php?newsId=<?php echo $row['newsId']; ?>" method="POST">
                                                        <h4>Trả lời</h4>
                                                        <div class="form-group">
                                                            <input style="border: 1px solid;" class="form-control" type="text" name="username" placeholder="Nhập tên của bạn vào đây">
                                                        </div>
                                                        <textarea name="cm_content" placeholder="Bạn vui lòng nhập nội dung của câu hỏi vào đây"></textarea>
                                                        <input class="btn btn-primary" type="submit" name="btnGui_2" value="Gửi" />
                                                    </form>

                                                    <?php
                                                    if (isset($_POST['btnGui_2'])) {
                                                        $username_2 = $_POST['username'];
                                                        $cm_content_2 = $_POST['cm_content'];
                                                        $cm_news_1_id = $row_2['cm_news_1_id'];
                                                        $sql_6 = "INSERT INTO cm_news_2(cm_news_1_id, username, cm_content) VALUES($cm_news_1_id, $username_2, $cm_content_2)";

                                                        if (mysqli_query($conn, $sql_6)) {
                                                            header('Location: http://localhost/PHP/ephone/index.php');
                                                        } else {
                                                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                                        }
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-12">
                            <p class="popular">Sản phẩm hot</p>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#">
                                            <img class="popular-img" src="admin/img/iphone-8-plus-64GB.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="#">
                                            <div class="popular-item-title">
                                                Iphone-8-plus-64GB<br>
                                                Bảo hành : 12 tháng
                                            </div>
                                        </a>
                                        <div class="popular-item-date">Giá : 12.800.000</div>
                                    </div>
                                </div>
                            </div>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#">
                                            <img class="popular-img" src="admin/img/oppo-reno-3-pro-5g-xanh.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="#">
                                            <div class="popular-item-title">
                                                Oppo-reno-3-pro-5g-xanh<br>
                                                Bảo hành : 12 tháng
                                            </div>
                                        </a>
                                        <div class="popular-item-date">Giá : 7.900.000</div>
                                    </div>
                                </div>
                            </div>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#">
                                            <img class="popular-img" src="admin/img/xiaomi_minote10lite_2.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="#">
                                            <div class="popular-item-title">
                                                Xiaomi_minote10lite_2<br>
                                                Bảo hành : 12 tháng
                                            </div>
                                        </a>
                                        <div class="popular-item-date">Giá : 8.250.000</div>
                                    </div>
                                </div>
                            </div>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#">
                                            <img class="popular-img" src="admin/img/Samsung Galaxy A21s_blue.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="#">
                                            <div class="popular-item-title">
                                                Samsung Galaxy A21s_blue<br>
                                                Bảo hành : 12 tháng
                                            </div>
                                        </a>
                                        <div class="popular-item-date">Giá : 4.390.000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <p class="popular">Tin hót</p>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#">
                                            <img class="popular-img" src="admin/img/iphone_6s_plus_32GB.jpg" alt="" />
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="#">
                                            <div class="popular-item-title">
                                                Cách khắc phục tình trạng iPhone không tìm thấy tai nghe Bluetooth
                                            </div>
                                        </a>
                                        <div class="popular-item-date">18/06/2020 </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#">
                                            <img class="popular-img" src="admin/img/Vsmart_Joy_3.png" alt="" />
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="#">
                                            <div class="popular-item-title">
                                                Mẹo xử lý lỗi cảm biến vân tay không phản hồi
                                            </div>
                                        </a>
                                        <div class="popular-item-date">18/06/2020</div>
                                    </div>
                                </div>
                            </div>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#">
                                            <img class="popular-img" src="admin/img/iphone11-green-128GB.webp" alt="" />
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="#">
                                            <div class="popular-item-title">
                                                Camera iPhone 11 Pro Max chụp ảnh bị rung? Nguyên nhân và cách khắc phục
                                            </div>
                                        </a>
                                        <div class="popular-item-date">18/06/2020</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('footer.php');
    ?>
</body>

</html>