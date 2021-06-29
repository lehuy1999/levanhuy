<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tin tức</title>
    <link rel="shortcut icon" type="image/png" href="images/logo1.png">
    <link rel="stylesheet" href="plugin/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/hieu.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
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


    <div style="clear: both;"></div>
    <div class="content" style="height: 300px; overflow: hidden; padding: 0 10%; margin-top: 20px;">
        <div class="journal-title">
            <img src="https://i.pinimg.com/originals/f5/3a/40/f53a408ceffc17c12ee98d05fb2d4017.jpg" alt="" />
            <span>Tạp chí</span>
        </div>
    </div>

    <div class="content" style="padding: 0 10%;">
        <div class="stories">
            <div class="row">
                <div class="col-8">
                    <p class="latestStory">Latest Stories</p>
                    <?php
                        include('./admin/include/connect.php');
                        $sql = "SELECT * FROM news";
                        $query = mysqli_query($conn, $sql);
                        while($row =  mysqli_fetch_array($query, MYSQLI_ASSOC)):?>
                    <div class="story-item mb-2">
                        <div class="row">
                            <div class="col-4">
                                <a href="#">
                                    <img class="story-img" src="./admin/img/<?php echo $row['img'] ?>" />
                                </a>
                            </div>
                            <div class="col-8 p-1 pr-4">
                                <?php
                                    $id = $row['newsId'];
                                    $title = $row['title'];
                                    echo 
                                    "<a class='story-item-a' href='chitietblog.php?newsId=$id'>
                                    <p class='story-item-title'>$title</p>
                                     </a>"
                                ?>
                                <p class="story-item-date"><?php echo $row['createDate'];?></p>
                                <p class="story-item-contentDemo" style="font-family: Arial, Helvetica, sans-serif;">
                                    <?php
                                        $content = substr($row['content'], 100, 253);
                                        echo $content. '.....';
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <?php endwhile;  ?>

                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-12">
                            <p class="popular"> Tin tức các dòng điện thoại </p>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="https://tintuc.shopdunk.com/iphone-x.html">
                                            <img class="popular-img" src="admin/img/iphone_x_64gb.jpg" alt=" " height="90px"/>
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="https://tintuc.shopdunk.com/iphone-x.html">
                                            <div class="popular-item-title">
                                                Bỏ lỡ iPhone X bạn sẽ bỏ lỡ mất những điều tuyệt vời gì ?
                                            </div>
                                        </a>
                                        <div class="popular-item-date">14/06/2020, 13:45 GMT+07:00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="https://tapchicongnghe.vn/realme-x50-5g-smartphone-5g-realme/">
                                            <img class="popular-img" src="admin/img/realme-x50-mc-polar.jpg" alt=""  height="90px" />
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="https://tapchicongnghe.vn/realme-x50-5g-smartphone-5g-realme/">
                                            <div class="popular-item-title">
                                                Realme X50 5G: Smartphone 5G đầu tiên của Realme ra mắt
                                            </div>
                                        </a>
                                        <div class="popular-item-date"> 11/01/2020 </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="https://congngheviet.com/samsung-ra-mat-galaxy-s20-s20-s20-ultra/">
                                            <img class="popular-img" src="admin/img/Sumsung galaxy S20+.jpg" alt="" height="90px"/>
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="https://congngheviet.com/samsung-ra-mat-galaxy-s20-s20-s20-ultra/">
                                            <div class="popular-item-title">
                                                Samsung ra mắt Galaxy S20, S20+, S20 Ultra: Siêu camera 108MP, quay video 8K, 5G và nhiều hơn thế nữa
                                            </div>
                                        </a>
                                        <div class="popular-item-date">12/02/2020</div>
                                    </div>
                                </div>
                            </div>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="https://didongviet.vn/tin-tuc/xiaomi-mi-note-10-va-mi-note-10-pro-ro-ri-thong-so-ky-thuat-moi/">
                                            <img class="popular-img" src="admin/img/xiaomi_minote10pro_2.jpg" alt=" " height="90px" />
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="https://didongviet.vn/tin-tuc/xiaomi-mi-note-10-va-mi-note-10-pro-ro-ri-thong-so-ky-thuat-moi/">
                                            <div class="popular-item-title">
                                                Xiaomi Mi Note 10 và Mi Note 10 Pro rò rỉ thông số kỹ thuật mới
                                            </div>
                                        </a>
                                        <div class="popular-item-date">31-10-2019</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <p class="popular"> Tin Tức Công nghệ </p>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    
                                    <div class="col-3">
                                        <a href="#">
                                            <img class="popular-img" src="images/capbien.jpg" alt=" " height="90px"/>
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="#">
                                            <div class="popular-item-title">
                                            Sắp có tuyến cáp quang biển mới kết nối Việt Nam: Nhanh gấp 3 lần APG
                                            </div>
                                        </a>
                                        <div class="popular-item-date">14/06/2020, 13:45 GMT+07:00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#">
                                            <img class="popular-img" src="images/iphone12.jpg" alt=""  height="90px" />
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="#">
                                            <div class="popular-item-title">
                                            Kế hoạch ra mắt iPhone 12 có thể bị hoãn, thời gian đẩy xuống tháng 11
                                            </div>
                                        </a>
                                        <div class="popular-item-date">28/05/2020, 16:36 GMT+07:00 </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popular-item mb-1">
                                <div class="row">
                                    <div class="col-3">
                                        <a href="#">
                                            <img class="popular-img" src="images/realme.jpg" alt="" height="90px"/>
                                        </a>
                                    </div>
                                    <div class="col-9 p-1 pl-0">
                                        <a class="popular-item-a" href="#">
                                            <div class="popular-item-title">
                                                Realme toàn cầu ghi nhận doanh số 1,000,000 sản phẩm AloT và chuẩn bị ra mắt tại thị trường Việt Nam
                                            </div>
                                        </a>
                                        <div class="popular-item-date">05/06/2020, 18:55 GMT+07:00</div>
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
    <!-- End Footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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