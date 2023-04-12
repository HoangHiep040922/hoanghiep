<?php
include ('admin/login-check.php');
    $id = $_GET['id'];

    $sql_brand = "SELECT * FROM brands";
    $query_brand = mysqli_query($conn, $sql_brand);

    $sql_up = "SELECT * FROM products where id = $id";
    $query_up = mysqli_query($conn, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['sbm'])){
        $title = $_POST['title'];
        $price = $_POST['price'];
        $brand_id = $_POST['brand_id'];

        if($_FILES['image']['name']==''){
            $image = $row_up['image'];
        }else{
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp, 'images/'.$image);
        }
        

        $description = $_POST['description'];

        $sql = "UPDATE products SET title = '$title', price = $price, brand_id = $brand_id, image = '$image', description = '$description'  WHERE id = $id";
        $query = mysqli_query($conn, $sql);

        if($query==TRUE)
        {
            $_SESSION['edit-product'] = "<div class='alert alert-success container'><strong>Sản phẩm đã được sửa!</strong></div>";
            header("location: admin.php?admin=index");
        }
        else
        {
            $_SESSION['edit-product'] = "<div class='alert alert-danger container'><strong>Không thể sửa sản phẩm này!!!</strong><br>Hãy kiểm tra lại. Nếu vẫn không sửa được là do thằng coder :)</div>";
            header("location: admin.php?admin=index");
        }
    }
?>
<title> Sửa Sản Phẩm </title>
<div class="container-fluid">
<div class="clearfix">
    <div class="card bg-glass" style=" width: 50%; margin: 5% auto;">
        <div class="card-body py-4 px-md-5">
            <h1><strong>Sửa Sản Phẩm</strong></h1>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên Sản Phẩm</label>
                    <input type="text" name="title" class="form-control" required  value="<?php echo $row_up['title']; ?>">
                </div><br>
                <div class="form-group">
                    <label for="">Giá</label>
                    <input type="number" name="price" class="form-control" required  value="<?php echo $row_up['price']; ?>">
                </div><br>
                <div class="form-group">
                    <label for="">Loại Sản Phẩm</label>
                    <select class="form-select" name="brand_id">
                        <?php
                            while($row_brand = mysqli_fetch_assoc($query_brand)){?>
                                <option value = "<?php echo $row_brand['brand_id']; ?>"><?php echo $row_brand['brand_name']; ?></option>
                            <?php } ?>
                    </select>
                </div><br>
                <div class="form-group">
                    <label for="">Ảnh</label><br>
                    <input type="file" name="image">
                </div><br>
                <div class="form-group">
                    <label for="">Mô Tả</label>
                    <textarea type="text" id="comment" name="description" class="form-control"><?php echo $row_up['description']; ?></textarea>
                </div><br>
                <div class="col float-md-end">                  
                <button name="sbm" class="btn btn-success" type="submit"><strong>Sửa Sản Phẩm</strong></button>
                </div><br>
            </form>
        </div>
    </div>
</div>
</div>