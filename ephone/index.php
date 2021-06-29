<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>EPhone</title>
    <link rel="shortcut icon" type="image/png" href="images/logo1.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- header -->
    <?php
    include('header.php');
    ?>

    <!-- Start Content -->
    <section class="main">
        <div class="container">
            <div class="banner-left">
                <a href="blog.php">
                    <img src="images/background1.png" alt="#">
                </a>
            </div>
            <div class="banner-right">
                <div class="item-1">
                    <a href="blog.php">
                        <img src="images/background2.png" alt="#">
                    </a>
                </div>
                <div class="item-2">
                    <a href="blog.php">
                        <img src="images/background3.png" alt="#">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="menu-producer">
        <div class="producer">
            <a href="product_apple.php">
                APPLE
            </a>
        </div>
        <div class="producer">
            <a href="product_samsung.php">
                SAMSUNG
            </a>
        </div>
        <div class="producer">
            <a href="product_oppo.php">
                OPPO
            </a>
        </div>
        <div class="producer">
            <a href="product_xiaomi.php">
                XIAOMI
            </a>
        </div>
        <div class="producer">
            <a href="product_vsmart.php">
                VSMART
            </a>
        </div>
    </section>
    <section class="menu">
        <div class="txt-menu">
            <span>ĐIỆN THOẠI NỔI BẬT</span>
        </div>
        <div class="txt-full">
            <a href="dienthoai.php">
                <span>Xem thêm</span>
            </a>
        </div>
    </section>
    <section class="item-product">
        <?php
        include('admin/include/connect.php');
        $select_pro = "SELECT * FROM phone ORDER BY phonePrice DESC LIMIT 0, 5";
        $result = mysqli_query($conn, $select_pro);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="col col-1">
                <div class="images">
                    <a href="chitietdienthoai.php?phoneId=<?php echo $row['phoneId']; ?>">
                        <img src="admin/img/<?php echo $row['phoneImage']; ?>" alt="#">
                    </a>
                </div>
                <div class="title-product">
                    <a href="chitietdienthoai.php?phoneId=<?php echo $row['phoneId']; ?>">
                        <h5><?php echo $row['phoneName']; ?></h5>
                    </a>
                    <div class="price">
                        <p><?php echo number_format($row['phonePrice'] - ((($row['phonePrice']) * ($row['phoneSale'])) / 100)); ?>&nbsp;₫<span><?php echo number_format($row['phonePrice']); ?>&nbsp;₫</span></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>


    </section>
    <section class="menu">
        <div class="txt-menu">
            <span>ĐIỆN THOẠI</span>
        </div>
        <div class="txt-full">
            <a href="dienthoai.php">
                <span>Xem thêm</span>
            </a>
        </div>
    </section>
    <section class="item-all-product">
        <?php
        for ($i = 0; $i < 5; $i++) {
            echo "<div class='row row-1'>";
            $a = $i * 5;
            $sql_2 = "SELECT * FROM phone LIMIT $a, 5";
            $query = mysqli_query($conn, $sql_2);
            while ($row = mysqli_fetch_array($query)) {
                $price = number_format($row['phonePrice']);
                $priceSale = number_format($row['phonePrice'] - ($row['phonePrice'] * $row['phoneSale']) / 100);
                echo "
                    <div class='col col-1'>
                        <div class='images'>
                            <a href='chitietdienthoai.php?phoneId={$row['phoneId']}'>
                                <img src='admin/img/{$row['phoneImage']}' alt='#'>
                            </a>
                        </div>
                        <div class='title-product'>
                            <a href='chitietdienthoai.php?phoneId={$row['phoneId']}'>
                                <h5>{$row['phoneName']}</h5>
                            </a>
                            <div class='price'>
                                <p>{$priceSale}&nbsp;₫<span>{$price}&nbsp;₫</span></p>
                            </div>
                        </div>
                    </div>
                    ";
            }
        echo '</div>';
        }
        ?>

    </section>
    <!-- End Content -->

    <!-- Start Footer -->
        <?php
            include('footer.php');
        ?>
    <!-- End Footer -->
</body>

</html>