<?php
    include ('admin/login-check.php');
    if(isset($_POST['sbm'])){
        $brand_name = $_POST['brand_name'];
        $sql = "INSERT INTO brands (brand_name)
        VALUES ('$brand_name')";
        $query = mysqli_query($conn, $sql);

        if($query==TRUE)
        {
            // echo "thanh cong";
            $_SESSION['add-brand'] = "<div class='alert alert-success container'><strong>Đã thêm loại sản phẩm thành công!</strong></div>";
            header("location: admin.php?admin=index");
        }
        else
        {
            // echo "that bai";
            $_SESSION['add-brand'] = "<div class='alert alert-danger container'><strong>Không thể thêm loại sản phẩm!!!</strong> Hãy Làm Lại</div>";
            header("location: admin.php?admin=admin=index");
        }
    }
?>
<title> Thêm loại sản phẩm </title>
<div class="container-fluid">
<div class="clearfix">
    <div class="card bg-glass" style=" width: 50%; margin: 5% auto;">
        <div class="card-body px-4 py-5 px-md-5">
            <h1>Thêm Loại Sản Phẩm Mới</h1>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên Loại Sản Phẩm</label>
                    <input type="text" name="brand_name" class="form-control" require>
                </div><br>
                <div class="col float-md-end">
                <button name="sbm" class="btn btn-success" type="submit"><strong>Thêm Sản Phẩm</strong></button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<style>
    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
</style>

<?php 

    
 
?>