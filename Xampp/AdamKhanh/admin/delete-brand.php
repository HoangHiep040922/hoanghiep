<?php
    include ('admin/login-check.php');
    $brand_id = $_GET['brand_id'];
    $sql = "DELETE FROM brands where brand_id = $brand_id";
    $query = mysqli_query($conn, $sql);

    if($query==TRUE)
    {
        $_SESSION['delete-brand'] = "<div class='alert alert-success container'><strong>Loại sản phẩm đã được xóa!</strong></div>";
        header("location: admin.php?admin=index");
    }
    else
    {
        $_SESSION['delete-brand'] = "<div class='alert alert-danger container'><strong>Không thể xóa loại sản phẩm này!!!</strong><br>Hãy kiểm tra và xóa hết sản phẩm thuộc loại sản phẩm này trước.</div>";
        header("location: admin.php?admin=index");
    }
?>