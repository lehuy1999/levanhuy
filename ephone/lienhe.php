<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phản hồi</title>
    <link rel="shortcut icon" type="image/png" href="images/logo1.png">
    <link rel="stylesheet" href="plugin/font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/hieu.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body>
    <!-- header -->
    <?php
        include('headerFix.php');
    ?>

    <div class="content" style="padding: 0 10%; margin-top: 40px;">
        <div class="row content" style="padding: 0;">
            <!-- map -->
            <div class="col-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.0887767837216!2d105.75904601476402!3d21.069116185976526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345523cb295ac7%3A0xcd3e08965ffab613!2zQ-G7rWEgaMOgbmcgeGUgbcOheSBUcnVuZyBI4bqjaQ!5e0!3m2!1svi!2s!4v1590200819655!5m2!1svi!2s"
                    width="100%" height="595px" frameborder="0" style="border: 0;" allowfullscreen=""
                    aria-hidden="false" tabindex="0">
                </iframe>
            </div>
            <!-- feetback -->
            <div class="col-6 mt-1">
                <form action="" method="POST" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Họ và tên"
                            name='name' require='true' />
                    </div>
                    <div class="form-group">
                        <label>Điện thoại</label>
                        <input type="phone" class="form-control" placeholder="Số điện thoại" name="mobile" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="abc@gmail.com" name="email" />
                    </div>
                    <div class="form-group">
                        <label>Phản hồi</label>
                        <textarea style="height: 250px;" class="form-control" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary w-100" name="btnGui" style="background-color: red; color: #fff; border-radius: 5px; border: 1px solid red;">Gửi</button>
                    </div>
                </form>
            </div>
            <?php
                include('admin/include/connect.php');
                if(isset($_POST['btnGui'])){
                    if($_POST['name'] != null){
                        $name = $_POST['name'];
                        $mobile = $_POST['mobile'];
                        $mail = $_POST['email'];
                        $content = $_POST['content'];

                        $sql = "INSERT INTO `feedback`(`name`, `mobile`, `email`, `content`) VALUES ('$name', '$mobile', '$mail', '$content')";
                        if(mysqli_query($conn, $sql)){
                            echo "
                            <script language='javascript'>
                                alert('Phản hồi thành công');
                            </script>
                            ";
                        }else{
                            echo "
                            <script language='javascript'>
                                alert('Phản hồi thất bại');
                            </script>
                            ";
                        }
                    }
                }
            ?>
        </div>
    </div>

    <!-- footer -->
    <?php
        include('footer.php');
    ?>
</body>

</html>