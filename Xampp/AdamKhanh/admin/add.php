<?php
    include ('admin/login-check.php');
    $sql_brand = "SELECT * FROM brands";
    $query_brand = mysqli_query($conn, $sql_brand);

    if(isset($_POST['sbm'])){
        $title = $_POST['title'];
        $price = $_POST['price'];
        $brand_id = $_POST['brand_id'];

        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $description = $_POST['description'];

        $sql = "INSERT INTO products (title, price, brand_id, image, description )
        VALUES ('$title', $price, $brand_id, '$image', '$description')";
        $query = mysqli_query($conn, $sql);
        move_uploaded_file($image_tmp, "images/".$image);
        
        if($query==TRUE)
        {
            // echo "thanh cong";
            $_SESSION['add-product'] = "<div class='alert alert-success container'><strong>Đã thêm  sản phẩm thành công!</strong></div>";
            header("location: admin.php?admin=index");
        }
        else
        {
            // echo "that bai";
            $_SESSION['add-product'] = "<div class='alert alert-danger container'><strong>Không thể thêm sản phẩm!!!</strong> Hãy Làm Lại. Nếu vẫn không sửa được là do thằng coder :)</div>";
            header("location: admin.php?admin=admin=index");
        }
    }
?>
<title> Thêm sản phẩm </title>
<div class="container-fluid">
<div class="clearfix">
    <div class="card bg-glass" style=" width: 50%; margin: 5% auto;">
        <div class="card-body py-4 px-md-5">
            <h1><strong>Thêm Sản Phẩm Mới</strong></h1>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên Sản Phẩm</label>
                    <input type="text" name="title" class="form-control" >
                </div><br>
                <div class="form-group">
                    <label for="">Giá</label>
                    <input type="number" name="price" class="form-control" >
                </div><br>
                <div class="form-group">
                    <label for="">loại Sản Phẩm</label>
                    <select class="form-control" name="brand_id" >
                        <?php
                            while($row_brand = mysqli_fetch_assoc($query_brand)){?>
                                <option value = "<?php echo $row_brand['brand_id']; ?>"><?php echo $row_brand['brand_name']; ?></option>
                            <?php } ?>
                    </select>
                </div><br>
                <div class="form-group">
                    <label for="">Ảnh</label><br>
                    <input type="file" name="image" >
                </div><br>
                <div class="form-group">
                    <label for="">Mô Tả</label>
                    <textarea type="text" name="description" class="form-control" ></textarea>
                </div><br>
                <div class="col float-md-end">                
                <button name="sbm" class="btn btn-success" type="submit"><strong>Thêm Sản Phẩm</strong></button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>