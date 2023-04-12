<?php
include ('admin/login-check.php');
    $id = $_GET['id'];

    $sql_up = "SELECT * FROM posts where id_post = $id";
    $query_up = mysqli_query($conn, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['sbm'])){
        if($_FILES['image_post']['name']==''){
            $image_post = $row_up['image_post'];
        }else{
            $image_post = $_FILES['image_post']['name'];
            $image_tmp = $_FILES['image_post']['tmp_name'];
            move_uploaded_file($image_tmp, 'images/'.$image_post);
        }
        

        $link_post = $_POST['link_post'];

        $sql = "UPDATE posts SET image_post = '$image_post', link_post = '$link_post'  WHERE id_post = $id";
        $query = mysqli_query($conn, $sql);

        if($query==TRUE)
        {
            $_SESSION['edit-post'] = "<div class='alert alert-success container'><strong>Bài post đã được sửa!</strong></div>";
            header("location: admin.php?admin=index");
        }
        else
        {
            $_SESSION['edit-post'] = "<div class='alert alert-danger container'><strong>Không thể sửa bài post này!!!</strong><br>Hãy kiểm tra lại. Nếu vẫn không sửa được là do thằng coder :)</div>";
            header("location: admin.php?admin=index");
        }
    }
?>
<title> Sửa bài post </title>
<div class="container-fluid">
<div class="clearfix">
    <div class="card bg-glass" style=" width: 50%; margin: 5% auto;">
        <div class="card-body py-4 px-md-5">
            <h1><strong>Sửa bài post</strong></h1>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Ảnh</label><br>
                    <input type="file" name="image_post">
                </div><br>
                <div class="form-group">
                    <label for="">Link bài post</label>
                    <textarea type="text" id="comment" name="link_post" class="form-control"><?php echo $row_up['link_post']; ?></textarea>
                </div><br>
                <div class="col float-md-end">                  
                <button name="sbm" class="btn btn-success" type="submit"><strong>Sửa bài post</strong></button>
                </div><br>
            </form>
        </div>
    </div>
</div>
</div>