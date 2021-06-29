<?php
    // Khởi tạo session
    // session_start();
    // if (!isset($_SESSION['accountName']) or ($_SESSION['roleId'] == 6)) {
    //     header('location:login.php');
    //     exit();
    // }
    // Gửi mail
    // function sendMail($content, $nTo, $mTo,$diachicc=''){
    //     $nFrom = 'Ephone.com';
    //     $mFrom = 'leanhhc1999@gmail.com';	//dia chi email cua ban 
    //     $mPass = 'anh31101999';		//mat khau email cua ban
    //     $mail             = new PHPMailer();
    //     $body             = $content;
    //     $mail->IsSMTP(); 
    //     $mail->CharSet 	= "utf-8";
    //     $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    //     $mail->SMTPAuth   = true;                  	// enable SMTP authentication
    //     $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    //     $mail->Host       = "smtp.gmail.com";      	
    //     $mail->Port       = 465;
    //     $mail->Username   = $mFrom;  // GMAIL username
    //     $mail->Password   = $mPass;           	 // GMAIL password
    //     $mail->SetFrom($mFrom, $nFrom);
    //     //chuyen chuoi thanh mang
    //     $ccmail = explode(',', $diachicc);
    //     $ccmail = array_filter($ccmail);
    //     if(!empty($ccmail)){
    //         foreach ($ccmail as $k => $v) {
    //             $mail->AddCC($v);
    //         }
    //     }
    //     $mail->Subject    = 'Đơn hàng từ Ephone';
    //     $mail->MsgHTML($body);
    //     $address = $mTo;
    //     $mail->AddAddress($address, $nTo);
    //     $mail->AddReplyTo('Ephone', 'Ephone.com');
    //     if(!$mail->Send()) {
    //         return 0;
    //     } else {
    //         return 1;
    //     }
    // }
    function sendMail($title, $content, $nTo, $mTo,$diachicc=''){
        $nFrom = 'Ephone.com';
        $mFrom = 'leanhhc1999@gmail.com';	//Địa chỉ mail gửi
        $mPass = 'anh31101999';		// Mật khẩu mail gửi
        $mail             = new PHPMailer();
        $body             = $content;
        $mail->IsSMTP(); 
        $mail->CharSet 	= "utf-8";
        $mail->SMTPDebug  = 0;                     // Cho phép thông tin gỡ lỗi SMTP
        $mail->SMTPAuth   = true;                  	// Xác thực SMTP
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";      	
        $mail->Port       = 465;
        $mail->Username   = $mFrom;  // Mail của người nhận
        $mail->Password   = $mPass;           	 // GMAIL password
        $mail->SetFrom($mFrom, $nFrom);
        //chuyen chuoi thanh mang
        $ccmail = explode(',', $diachicc);
        $ccmail = array_filter($ccmail);
        if(!empty($ccmail)){
            foreach ($ccmail as $k => $v) {
                $mail->AddCC($v);
            }
        }
        $mail->Subject    = $title;
        $mail->MsgHTML($body);
        $address = $mTo;
        $mail->AddAddress($address, $nTo);
        $mail->AddReplyTo('Ephone', 'Ephone.com');
        if(!$mail->Send()) {
            return 0;
        } else {
            return 1;
        }
    }
    // Menu phân quyền
    function menu_quyen($roleId){
        if($roleId == 1){
            include('menu.php');
        }elseif($roleId == 2){
            include('menu.php');
        }elseif($roleId == 3){
            include('menu_managePhone.php');
        }elseif($roleId == 4){
            include('menu_manageOrder.php');
        }elseif($roleId == 5){
            include('menu_manageNews.php');
        }
    }
?>