<?php
    include ('admin/login-check.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM posts where id_post = $id";
    $query = mysqli_query($conn, $sql);
    if($query==TRUE)
    {
        $_SESSION['delete-post'] = "<div class='alert alert-success container'><strong>Bài post đã được xóa!</strong></div>";
        header("location: admin.php?admin=index");
    }
    else
    {
        $_SESSION['delete-post'] = "<div class='alert alert-danger container'><strong>Không thể xóa bài post này!!!</strong><br>Hãy kiểm tra lại.</div>";
        header("location: admin.php?admin=index");
    }
?>