<?php
    session_start();
    unset($_SESSION['accountName']);
    unset($_SESSION['accountId']);
    unset($_SESSION['roleId']);
    header('Location: http://localhost/PHP/ephone/index.php');
?>