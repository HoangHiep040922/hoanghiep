<?php
    include ('admin/login-check.php');
    $sql = "SELECT * FROM brands ORDER BY brand_id DESC";
    $query = mysqli_query($conn, $sql);
?>
<title> Danh sách thể loại sản phẩm </title>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Danh Sách Thể Loại Sản Phẩm</h2><br>
            <a class="btn btn-success" href="admin.php?admin=add-brand" ><strong>Thêm loại sản phẩm</strong></a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Tên Loại Sản Phẩm</th>
                        <th>Sửa & Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                        while($row = mysqli_fetch_assoc($query)){?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['brand_name']; ?></td>
                            <td>
                                <a href="admin.php?admin=edit-brand&brand_id=<?php echo $row['brand_id']; ?>"class="btn btn-info"><strong>Sửa</strong></a>&nbsp&nbsp&nbsp
                                <a onclick="return Del('<?php echo $row['brand_name']; ?>')" href="admin.php?admin=delete-brand&brand_id=<?php echo $row['brand_id']; ?>" class="btn btn-danger"><strong>Xóa</strong></a>
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
