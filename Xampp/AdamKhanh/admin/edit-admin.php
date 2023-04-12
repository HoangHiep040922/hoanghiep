<?php include ('admin/login-check.php');?>
<div class="main-content">
    <div class="wrapper">
        
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>
        <?php 

            $id = $_GET['id'];
            $sql = "SELECT * FROM admin WHERE id=$id";
            $res = mysqli_query($conn, $sql);
            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    
                    $row= mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    header("location: admin.php?admin=index");
                }
            }
?>
<title> Sửa tài khoản </title>
<div class="container-fluid">
<div class="clearfix">
    <div class="card bg-glass" style=" width: 50%; margin: 5% auto;">
        <div class="card-body py-4 px-md-5">
        <form action="" method="POST">
            <h1><strong>Sửa Tài Khoản</strong></h1><br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name: </label>
                        <input type="text" name="full_name" class="form-control" id="exampleInputEmail1" value="<?php echo $full_name ?>" required >
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">UserName: </label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" value="<?php echo $username ?>" required >
                </div><br>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Sửa tài khoản"  class="btn btn-success btn-block mb-4">
                    </td>
                </tr>
        </form>
        </div>
    </div>
</div>
</div>
</div>
</div>


<?php 
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        $sql = "UPDATE admin SET full_name='$full_name', username='$username' WHERE id='$id'";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['edit'] = "<div class='alert alert-success container'><strong>Sửa tên thành công!</strong></div>";
            header("location: admin.php?admin=index");
        }
        else
        {
            $_SESSION['edit'] = "<div class='alert alert-danger container'><strong>Không thể sửa tên!!!</strong> Hãy Sửa Lại</div>";
            header("location: admin.php?admin=index");
        }
    }
?>
<style>
    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
</style>