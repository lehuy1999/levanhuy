<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <header>
        <div class="navbar_header" style="margin: 0 10%;">
            <div class="nav-left" style="padding: 10px 20px 9px 20px;">
                <a href="index.php">
                    <img src="images/logo1.png" alt="logo" style="width: 33px;">
                </a>
                <div class="nav-search">
                    <div class="location">
                        <button class="btn-location">Hà Nội<i class="fa fa-sort-desc"></i></button>
                        <div class="show-location">
                            <ul>
                                <li><a href="http://localhost/PHP/ephone/index.php"><i class="fa fa-map-marker"></i>Hà Nội</a></li>
                                <li><a href="http://localhost/PHP/ephone/index.php"><i class="fa fa-map-marker"></i>Hồ Chí Minh</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="combo-search">
                        <input class="txt-search" type="text" name="search_value" placeholder="Sản phẩm bạn cần tìm...">
                        <button class="btn-search" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="nav-right">
                <ul>
                    <a href="dienthoai.php?q='%%'">
                        <li>
                            <i class="fa fa-mobile"></i><br>
                            <span>ĐIỆN THOẠI</span>
                        </li>
                    </a>
                    <a href="blog.php">
                        <li>
                            <i class="fa fa-newspaper-o"></i><br>
                            <span>TIN TỨC</span>
                        </li>
                    </a>
                    <a href="lienhe.php">
                        <li>
                            <i class="fa fa-address-card-o"></i><br>
                            <span>LIÊN HỆ</span>
                        </li>
                    </a>
                    <?php
                            if(isset($_SESSION['cart'])){
                                $cart = $_SESSION['cart'];
                                $numCart = 0;
                                foreach($cart as $key => $value){
                                    $numCart ++;
                                }
                                echo "
                                    <a href='viewCart.php'>
                                        <li>
                                            <i class='fa fa-shopping-bag'><sup id='numCart' style='background:red;border-radious:20px;color:#fff;padding:2px;font-size:11px;'>$numCart</sup></i><br>
                                            <span>GIỎ HÀNG</span>
                                        </li>
                                    </a>
                                ";
                            }else{
                                echo "
                                    <a href='index.php'>
                                        <li>
                                            <i class='fa fa-shopping-bag'></i><br>
                                            <span>GIỎ HÀNG</span>
                                        </li>
                                    </a>
                                ";
                            }
                        ?>

                    <?php
                        if(isset($_SESSION['accountName'])){
                            echo "
                                <a href='infoUser.php'>
                                    <li>
                                        <i class='fa fa-user'></i><br>
                                        <span>{$_SESSION['accountName']}</span>
                                    </li>
                                </a>
                                <a href='logout.php' class='register' id='logout'>
                                    <li>
                                        <i class='fa fa-sign-out'></i><br>
                                        <span>ĐĂNG XUẤT</span>
                                    </li>
                                </a>
                            ";
                        }else{
                            echo "
                                <a href='login.php'>
                                    <li>
                                        <i class='fa fa-user'></i><br>
                                        <span>ĐĂNG NHẬP</span>
                                    </li>
                                </a>
                            ";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </header>
    <div id="revert-search" style="display: none;">
        <div class="item-revert" style="position: absolute; background-color: white; width: 100%; padding-bottom: 5px; z-index: 3; ">
            <div class="list" style=" position: relative;  overflow-y: auto; width: 100%; height: 170px;">
                <div id="content"></div>
            </div>
        </div>
    </div>

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