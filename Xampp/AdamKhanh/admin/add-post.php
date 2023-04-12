<?php
    include ('admin/login-check.php');
    $sql_brand = "SELECT * FROM posts";
    $query_brand = mysqli_query($conn, $sql_brand);

    if(isset($_POST['sbm'])){
        $image_post = $_FILES['image_post']['name'];
        $image_tmp = $_FILES['image_post']['tmp_name'];

        $link_post = $_POST['link_post'];

        $sql = "INSERT INTO posts (image_post, link_post )
        VALUES ('$image_post', '$link_post')";
        $query = mysqli_query($conn, $sql);
        move_uploaded_file($image_tmp, "images/".$image_post);
        
        if($query==TRUE)
        {
            // echo "thanh cong";
            $_SESSION['add-post'] = "<div class='alert alert-success container'><strong>Đã thêm bài post thành công!</strong></div>";
            header("location: admin.php?admin=index");
        }
        else
        {
            // echo "that bai";
            $_SESSION['add-post'] = "<div class='alert alert-danger container'><strong>Không thể thêm bài post!!!</strong> Hãy Làm Lại. Nếu vẫn không sửa được là do thằng coder :)</div>";
            header("location: admin.php?admin=admin=index");
        }
    }
?>
<title> Thêm bài post </title>
<div class="container-fluid">
<div class="clearfix">
    <div class="card bg-glass" style=" width: 50%; margin: 5% auto;">
        <div class="card-body py-4 px-md-5">
            <h1><strong>Thêm bài post mới</strong></h1>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Ảnh</label><br>
                    <input type="file" name="image_post" >
                </div><br>
                <div class="form-group">
                    <label for="">Link bài post</label>
                    <textarea type="text" name="link_post" class="form-control" ></textarea>
                </div><br>
                <div class="col float-md-end">                
                <button name="sbm" class="btn btn-success" type="submit"><strong>Thêm bài post</strong></button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>