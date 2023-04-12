<?php
    include ('admin/login-check.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM products where id = $id";
    $query = mysqli_query($conn, $sql);
    if($query==TRUE)
    {
        $_SESSION['delete-product'] = "<div class='alert alert-success container'><strong>Sản phẩm đã được xóa!</strong></div>";
        header("location: admin.php?admin=index");
    }
    else
    {
        $_SESSION['delete-product'] = "<div class='alert alert-danger container'><strong>Không thể xóa sản phẩm này!!!</strong><br>Hãy kiểm tra lại.</div>";
        header("location: admin.php?admin=index");
    }
?>