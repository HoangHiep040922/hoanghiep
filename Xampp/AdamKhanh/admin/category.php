<?php
    include ('admin/login-check.php');
    
    $sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id ORDER BY id DESC";
    
    $query = mysqli_query($conn, $sql);
?>

<title> Thêm sản phẩm </title>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Danh Sách Sản Phẩm</h2><br>
            <a class="btn btn-success" href="admin.php?admin=add"><strong>Thêm Sản Phẩm</strong></a>
        </div>
        
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Loại Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Mô Tả</th>
                        <th>Ngày</th>
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
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['price']; ?> ₫</td>
                            <td><?php echo $row['brand_name']; ?></td>

                            <td>
                                <img style="width: 100px;" src="images/<?php echo $row['image']; ?>">
                                
                            </td>

                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['register']; ?></td>
                            <td>
                                <a href="admin.php?admin=edit&id=<?php echo $row['id']; ?>" class="btn btn-info"><strong>Sửa</strong></a>
                            </td>
                            <td>
                                <a onclick="return Del('<?php echo $row['title']; ?>')" href="admin.php?admin=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger"><strong>Xóa</strong></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>
<script>
    function Del(name){
        return confirm("Bạn có chắc muốn xóa sản phẩm " + name + " này không?");
    }
</script>