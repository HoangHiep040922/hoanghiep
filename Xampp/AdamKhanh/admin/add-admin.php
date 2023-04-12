<?php include ('admin/login-check.php');?>
<title> Thêm tài khoản </title>
<section class="background-radial-gradient overflow-hidden">
<div class="container md-1">
    <div class="wrapper">
        
        <div class="card bg-glass" style=" width: 50%; margin: 5% auto;">
        <div class="card-body px-4 py-5 px-md-5">
        
        <form action="" method="POST" style="border: 1px; width: 100%; margin: 5% auto;">
        <h2>Thêm Tài Khoản</h2><br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name: </label>
                    <input type="text" name="full_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập Tên Của Bạn" required > 
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">UserName: </label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Nhập Tên Đăng Nhập" required >
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password: </label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập Mật Khẩu" required >
                </div><br>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Thêm tài khoản" class="btn btn-success btn-block mb-4">
                    </td>
                </tr>
        </form>
        </div>
        </div>
    </div>
</div>
</section>


<?php 

    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO admin SET full_name='$full_name', username='$username', password='$password'";
        $query = mysqli_query($conn, $sql);

        if($query==TRUE)
        {
            // echo "thanh cong";
            $_SESSION['add'] = "<div class='alert alert-success container'><strong>Thêm tài khoản thành công!</strong></div>";
            header("location: admin.php?admin=index");
        }
        else
        {
            // echo "that bai";
            $_SESSION['add'] = "<div class='alert alert-danger container'><strong>Không thể thêm tài khoản!!!</strong> Hãy Làm Lại</div>";
            header("location: admin.php?admin=admin=index");
        }
    }
 
?>
<style>
    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
</style>