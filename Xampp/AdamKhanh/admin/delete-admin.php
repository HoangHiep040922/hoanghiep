<?php 
    include ('admin/login-check.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM admin WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        $_SESSION['delete'] = "<div class='alert alert-success container'><strong>Tài Khoản Đã Được Xóa!</strong></div>";
        header("location: admin.php?admin=index");
    }
    else
    {
        $_SESSION['delete'] = "<div class='alert alert-danger container'><strong>Không Thể Xóa Tài Khoản!!!</strong> Hãy Xóa Lại</div>";
        header("location: admin.php?admin=index");
    }
?>
