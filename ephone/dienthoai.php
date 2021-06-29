<!Doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="plugin/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="./admin/css/quan.css"> -->
</head>

<body>
    <!-- Start header -->
    <?php
    include("header.php");
    ?>

    <section class="menu">
        <div class="txt-menu">
            <span>ĐIỆN THOẠI</span>
        </div>
    </section>

    <section class="item-all-product">
        <div class="row row-1">
            <?php
            include('admin/include/connect.php');
            $item_page = !empty($_GET['item_page']) ? $_GET['item_page'] : 25;
            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) * $item_page;
            $select_pro = "SELECT * FROM phone LIMIT $item_page OFFSET $offset";
            $result = mysqli_query($conn, $select_pro);
            $total_records = mysqli_query($conn, "SELECT * FROM phone");
            $total_records = $total_records->num_rows;
            $total_page = ceil($total_records / $item_page);
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


    <!-- Start Footer -->
        <?php
            include('footer.php');
        ?>
    <!-- End Footer -->

</body>

</html>