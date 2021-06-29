<?php
include('admin/include/connect.php');
if (isset($_POST['data'])) {
    $data = $_POST['data'];
    if ($data == "") {
    } else {
        $sql = "SELECT * FROM phone WHERE phoneName LIKE '%${data}%'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            echo "        
                <div id='item' style='margin-bottom: 5px; width: 100%; position: relative;'>
                    <a href='http://localhost/PHP/ephone/chitietdienthoai.php?phoneId={$row['phoneId']}'>
                        <img src='http://localhost/PHP/ephone/admin/img/{$row['phoneImage']}'width='50px' style='float: left;' alt=''>
                    </a>
                    <a href='http://localhost/PHP/ephone/chitietdienthoai.php?phoneId={$row['phoneId']}' style='text-decoration: none; color: #333'>
                        <h5>{$row['phoneName']}</h5>
                    </a>
                    <div style='display: flex; padding: 5px 0px 5px 0px; font-weight: bold;'>
                        <p style='color: red; padding-right: 20px'>
                        ";
            $SalePrice = $row['phonePrice'] * (100 - $row['phoneSale']) / 100;
            echo number_format($SalePrice);
            echo "&nbsp;₫</p>
                        <p style='color: grey;'>";

            echo number_format($row['phonePrice']);
            echo "&nbsp;₫</p>
                    </div>
                    <div style='clear: both;'></div>
                </div>
            ";
        }
    }
}
