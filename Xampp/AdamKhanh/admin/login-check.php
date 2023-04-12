<?php 
    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message'] = "<div class'error'>Bạn chưa đăng nhập mà đi đâu qua đó?</div>";
        header("location: admin.php?admin=login");
    }
?>