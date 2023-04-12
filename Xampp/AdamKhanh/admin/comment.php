<?php
    include ('admin/login-check.php');
    $cmtsql = "SELECT * FROM comment inner join products on comment.product_id = products.id ORDER BY cmtid DESC";
    $cmtquery = mysqli_query($conn, $cmtsql);
?>
<title> Bình luận </title>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Bình luận</h2><br>
            <select class="form-select" name="product_id">
                <?php
                    $query = mysqli_query($conn, "SELECT id, title FROM products");
                    $num = mysqli_num_rows($query);
                    if($num > 0){
                        while($row = mysqli_fetch_array($query)){
                            ?>
                            <option value = "<?php echo $row['id']; ?>"><?php echo $row['title'];?></option>
                            <?php
                        }
                    } ?>
                    
                        
            </select>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Sản Phẩm</th>
                        <th>Tên khách hàng</th>
                        <th>Email khách hàng</th>
                        <th>Bình luận</th>
                        <th>Ngày đăng</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    if(mysqli_num_rows($cmtquery) > 0) {
                        while($cmtrow = mysqli_fetch_assoc($cmtquery)){?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $cmtrow['title']; ?></td>
                            <td><?php echo $cmtrow['sender']; ?></td>
                            <td><?php echo $cmtrow['email']; ?></td>
                            <td><?php echo $cmtrow['comment']; ?></td>
                            <td><?php echo $cmtrow['date']; ?></td>
                            <td>
                                <a href="admin.php?admin=delete-comment&cmtid=<?php echo $cmtrow['cmtid']; ?>" class="btn btn-danger"><strong>Xóa</strong></a>
                            </td>
                        </tr>
                    <?php } } ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>