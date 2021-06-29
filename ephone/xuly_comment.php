<?php
$conn = mysqli_connect('localhost', 'root', '', 'ephone');
$username = $_POST['username'];
$content = $_POST['cm_content'];
$phoneId = $_POST['phoneId'];

if ($username == '' && $content == '') {
} else {
    $sql_3 = "INSERT INTO `cm_phone_1`(`phoneId`, `username`, `cm_content`) VALUES ($phoneId, '$username','$content')";
    if (mysqli_query($conn, $sql_3)) {
        //header("http://localhost/ephone/chitietdienthoai.php?phoneId='$phoneId'");
        echo "
        <div class='single-comment'>
        <div id='trave'></div>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
}
$sql_4 = "SELECT * FROM cm_phone_1 WHERE phoneId = '{$_POST['phoneId']}'";
$query = mysqli_query($conn, $sql_4);
while ($row_1 = mysqli_fetch_array($query)) :
?>
    <div class="user-comment">
        <img src="https://via.placeholder.com/150x150" alt="">
        <span><?php echo $row_1['username']; ?></span>
        <button class="btn btn-outline-danger" style="display: none;" name="<?php echo $row_1['cm_phone_1']; ?>">
        </button>
    </div>
    <div class="content-comment">
        <p><?php echo $row_1['cm_content']; ?></p>
    </div>
<?php endwhile; ?>