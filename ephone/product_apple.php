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
    <!-- Start header -->
    <?php
    include('header.php');
    ?>
    <!-- End header -->

    <!-- Start Content -->
    <section class="main">
        <div class="container">
            <div class="banner-left">
                <a href="https://www.google.com/">
                    <img src="images/background1.png" alt="#">
                </a>
            </div>
            <div class="banner-right">
                <div class="item-1">
                    <a href="https://www.google.com/">
                        <img src="images/background2.png" alt="#">
                    </a>
                </div>
                <div class="item-2">
                    <a href="https://www.google.com/">
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
            <span>ĐIỆN THOẠI</span>
        </div>
        <!-- <div class="txt-full">
            <a href="#">
                <span>Xem thêm</span>
            </a>
        </div> -->
    </section>
    <section class="item-all-product">
        <?php
            //Kết nối tới database
            include('admin/include/connect.php');

            $item_page = !empty($_GET['item_page'])?$_GET['item_page']:25;
            $current_page = !empty($_GET['page'])?$_GET['page']:1;
            $offset = ($current_page - 1) * $item_page;
            $select_pro = "SELECT * FROM phone WHERE producerId='1' LIMIT $item_page OFFSET $offset";
            $result = mysqli_query($conn, $select_pro);
            $total_records = mysqli_query($conn, $select_pro);
            $total_records = $total_records->num_rows;
            $total_page = ceil($total_records / $item_page);
        ?>
        <div class="row row-1">
            <?php
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
        </div>
        <?php
            include('pagination.php');
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