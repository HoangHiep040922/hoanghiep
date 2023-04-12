<?php
    include ('admin/login-check.php');
    $sql = "SELECT * FROM posts ORDER BY id_post DESC";
    $query = mysqli_query($conn, $sql);
?>

<title> Post </title>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Danh Sách Bài Post</h2><br>
            <a class="btn btn-success" href="admin.php?admin=add-post"><strong>Thêm bài Post</strong></a>
        </div>
        
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Link bài Post</th>
                        <th>Ảnh</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                        while($row = mysqli_fetch_assoc($query)){?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['link_post']; ?></td>
                            <td>
                                <img style="width: 100px;" src="images/<?php echo $row['image_post']; ?>">
                                
                            </td>
                            <td>
                                <a href="admin.php?admin=edit-post&id=<?php echo $row['id_post']; ?>" class="btn btn-info"><strong>Sửa</strong></a>
                            </td>
                            <td>
                                <a href="admin.php?admin=delete-post&id=<?php echo $row['id_post']; ?>" class="btn btn-danger"><strong>Xóa</strong></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>