<?php 
    include ('admin/login-check.php');
    $cmtid = $_GET['cmtid'];
    $sql = "DELETE FROM comment WHERE cmtid=$cmtid";
    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        $_SESSION['delete-comment'] = "<div class='alert alert-success container'><strong>Bình luận đã được xóa!</strong></div>";
        header("location: admin.php?admin=index");
    }
    else
    {
        $_SESSION['delete-comment'] = "<div class='alert alert-danger container'><strong>Không thể xóa bình luận!!!</strong> Hãy Xóa Lại</div>";
        header("location: admin.php?admin=index");
    }
?>