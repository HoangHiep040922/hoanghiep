<?php ob_start();
include ('admin/login-check.php');?> 

<div class="main-content">
    <div class="wrapper">
        

        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
            }
            
            if(isset($_SESSION['pwd-not-match']))
            {
                echo $_SESSION['pwd-not-match'];
                unset($_SESSION['pwd-not-match']);
            }
        ?>
        <div class="container-fluid">
            <div class="clearfix">
                <div class="card bg-glass" style=" width: 50%; margin: 5% auto;">
                    <div class="card-body py-4 px-md-5">
                    <form action="" method="POST">
                    <h1><strong>Đổi Mật Khẩu</strong></h1>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mật khẩu cũ: </label>
                            <input type="password" name="current_password" class="form-control" placeholder="Nhập lại mật khẩu cũ" required >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mật khẩu mới: </label>
                            <input type="password" name="new_password" class="form-control" placeholder="Nhập mật khẩu mới" required >
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Xác nhận mật khẩu: </label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu mới" required >
                        </div>
                            <tr>
                                <td colspan="2">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" name="submit" value="Change Password" class="btn btn-success btn-block mb-4">
                                </td>
                            </tr>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<title> Đổi mật khẩu </title>
<?php 
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        $sql = "SELECT * FROM admin WHERE id=$id AND password='$current_password'";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                // echo "Đã đổi mật khẩu thành công";
                if($new_password==$confirm_password)
                {
                    $sql2 = "UPDATE admin SET password='$new_password' WHERE id=$id";
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true)
                    {
                        $_SESSION['change-pwd'] = "<div class='alert alert-success container'><strong>Đổi mật khẩu thành công. </strong></div>";
                        header("location: admin.php?admin=index");
                    }
                    else
                    {
                        $_SESSION['change-pwd'] = "<div class='alert alert-danger container'><strong>Đổi mật khẩu thất bại!!! </strong></div>";
                        header("location: admin.php?admin=index");
                    }
                }
                else
                {
                    $_SESSION['pwd-not-match'] = "<div class='alert alert-danger container'><strong>Mật khẩu xác nhận không đúng!!! </strong></div>";
                    header("location: admin.php?admin=edit-password");
                }
            }
            else
            {
                $_SESSION['user-not-found'] = "<div class='alert alert-danger container'><strong>Sai mật khẩu!!! </strong></div>";
                header("location: admin.php?admin=edit-password");
            }
        }
    }
    ob_end_flush();
?>