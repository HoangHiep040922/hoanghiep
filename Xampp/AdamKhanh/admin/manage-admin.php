<?php include ('admin/login-check.php');?>
<title> Quản Lý tài khoản </title>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
        <h2>Danh Sách Tài Khoản</h2>
        <br>
        <a href="admin.php?admin=add-admin" class="btn btn-success"><strong>Thêm Tài Khoản</strong></a>
        </div>
        <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Tên</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            
           
                <?php 
                    $sql = "SELECT * FROM admin";
                    $res = mysqli_query($conn, $sql);
                    if($res==TRUE)
                    {
                        $count = mysqli_num_rows($res);

                        if($count>0)
                        {
                            $i = 1;
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                ?>
                                <tbody>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $full_name ?></td>
                                    <td><?php echo $username ?></td>
                                    <td>
                                        <a href="admin.php?admin=edit-password&id=<?php echo $rows['id']; ?>" class="btn btn-secondary"><strong>Đổi Mật Khẩu</strong></a>&nbsp&nbsp&nbsp
                                        <a href="admin.php?admin=edit-admin&id=<?php echo $rows['id']; ?>" class="btn btn-info"><strong>Sửa</strong></a>&nbsp&nbsp&nbsp
                                        <a href="admin.php?admin=delete-admin&id=<?php echo $rows['id']; ?>" class="btn btn-danger"><strong>Xóa</strong></a>
                                    </td>
                                </tr>
                                </tbody>
                                <?php
                            }
                        }
                        else
                        {

                        }
                    }
                ?>

        </table>
        </div>
    </div>
</div>
</div>