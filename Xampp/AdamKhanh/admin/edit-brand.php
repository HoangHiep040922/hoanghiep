<?php
    include ('admin/login-check.php');
    if(isset($_GET['brand_id']))
    {
        $brand_id = $_GET['brand_id'];
        $sql_brand = "SELECT * FROM brands WHERE brand_id=$brand_id;";

        $query_brand = mysqli_query($conn, $sql_brand);
        $row_brand = mysqli_fetch_assoc($query_brand);
    }


    if(isset($_POST['sbm'])){
        $brand_name = $_POST['brand_name'];
        $sql = "UPDATE brands SET brand_name = '$brand_name' WHERE brand_id = $brand_id;";
        $query = mysqli_query($conn, $sql);

        if($query==true)
        {
            $_SESSION['edit-brand'] = "<div class='alert alert-success container'><strong>Đã sửa loại sản phẩm thành công!</strong></div>";
            header("location: admin.php?admin=index");
        }
        else
        {
            $_SESSION['edit-brand'] = "<div class='alert alert-danger container'><strong>Không thể sửa loại sản phẩm!!!</strong> Hãy Sửa Lại</div>";
            header("location: admin.php?admin=index");
        }
    }

    
?>
<title> Sửa loại sản phẩm </title>
<div class="container-fluid">
<div class="clearfix">
    <div class="card bg-glass" style=" width: 50%; margin: 5% auto;">
        <div class="card-body py-4 px-md-5">
            <h1><strong>Sửa Loại Sản Phẩm</strong></h1>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên Loại Sản Phẩm</label>
                    <input type="text" name="brand_name" class="form-control" value="<?php echo $row_brand['brand_name']; ?>">
                </div><br>
                <div class="col float-md-end">  
                <button name="sbm" class="btn btn-success" type="submit"><strong>Sửa Loại Sản Phẩm</strong></button>
            </form>
        </div>
    </div>
</div>
</div>