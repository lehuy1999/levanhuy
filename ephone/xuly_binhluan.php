<?php
$conn = mysqli_connect('localhost', 'root', '', 'ephone');
$username = $_POST['username'];
$content = $_POST['cm_content'];
$newId = $_POST['newsId'];


$sql_3 = "INSERT INTO `cm_news_1`(`newsId`, `username`, `cm_content`) VALUES ($newId, '$username', '$content')";
if (mysqli_query($conn, $sql_3)) {
    echo "
        <div class='single-comment'>
        <div id='trave'></div>";
}
$sql_4 = "SELECT * FROM cm_news_1 WHERE newsId = {$_POST['newsId']}";
$query = mysqli_query($conn, $sql_4);
while ($row_1 = mysqli_fetch_array($query)) :
?>
    <!-- Cấp 1 -->
    <div class='user-comment'>
        <img src='https://via.placeholder.com/150x150' alt=''>
        <span><?php echo $row_1['username']; ?></span>
        <button class='btn btn-outline-danger' onclick='hienthi()' style="display: none;">Thảo
            luận</button>
    </div>
    <div class='content-comment'>
        <p><?php echo $row_1['cm_content']; ?></p>
    </div>
<?php endwhile; ?>