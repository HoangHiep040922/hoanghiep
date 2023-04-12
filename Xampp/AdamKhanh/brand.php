<?php
include ('header.php');
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql_brand = "SELECT * FROM brands WHERE brand_id=$id";

        $query_brand = mysqli_query($conn, $sql_brand);
        $row_brand = mysqli_fetch_assoc($query_brand);
    }
    $sql_all = "SELECT * FROM brands";
    $query_all = mysqli_query($conn, $sql_all);
    $sql = "SELECT * FROM products WHERE brand_id=$id";
        $query = mysqli_query($conn, $sql);
?>

<title>Danh Mục Sản Phẩm</title>



<div class="container mt-3">
    <table class="table table-borderless">
        <tbody>
            <tr>
                <td class="col-sm-2">
                    <div class="text-center">
                        <h3><strong><?php echo $row_brand['brand_name']; ?></strong></h3><hr ><br>
                        <h5>Danh Mục Sản Phẩm</h5>
                        <?php
                        while($row_all = mysqli_fetch_assoc($query_all)){?>
                            <a class="sanpham1 d-flex" style="position:relative;left:5px;text-decoration: none;color: black; top:10px; padding: 5px" href = "index.php?trang=danh-muc&id=<?php echo $row_all['brand_id']; ?>"><i class="bi bi-arrow-right-square"></i>&nbsp&nbsp&nbsp&nbsp<?php echo $row_all['brand_name']; ?></a>
                        <?php } ?>
                    </div>
                </td>
                <td class="col-sm-10">              
                <div class="container mt-3">
                    <div class="row">
                        <?php
                            if(mysqli_num_rows($query) > 0) {
                                while($row = mysqli_fetch_assoc($query)){?>
                                <div class="col-md-4 zoom" style="box-sizing: border-box; padding: auto; margin: 15px;">
                                    <div class="card mb-4" style="max-width: 300px;max-height: 450px; margin: 0 auto; padding: 0 0; width: 100%; position: relative;">
                                        <a class="rounded" style="align-items: center" href="index.php?trang=san-pham&id=<?php echo $row['id']; ?>">
                                            <img height="350px" src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" class="card-img-top"></a>
                                        <div class="card-body">
                                        <div class="d-flex justify-content-center align-item-center">
                                        <a href="index.php?trang=san-pham&id=<?php echo $row['id']; ?>" style="text-decoration: none; color: #00664d" class="text-center"><?php echo $row['title']; ?></a>
                                        </div>
                                            <div class="d-flex justify-content-center">
                                                        <div class="small-ratings">
                                                            <i class="bi bi-star-fill rating-color"></i>
                                                            <i class="bi bi-star-fill rating-color"></i>
                                                            <i class="bi bi-star-fill rating-color"></i>
                                                            <i class="bi bi-star-fill rating-color"></i>
                                                            <i class="bi bi-star-fill rating-color"></i>
                                                        </div>
                                                </div>
                                            <div class="d-flex justify-content-between align-item-center">
                                                <span class="h5 mt-auto" style="font-size: 17px;margin-right: auto;margin-left: auto;margin-top: auto;margin-bottom: auto; font-weight: 500; color: red"><?php echo $row['price']; ?>đ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <?php } } ?>
                    </div>
                </div><br><br><br><br>
                </td>
            </tr>  
        </tbody>
    </table> 
</div>            
<br><br><br><br><br><br>                           




<?php
    include ('footer.php');
?>
<style>
.zoom {
  padding: 10px;
  background-color: none;
  transition: transform .2s; /* Animation */
  width: 300px;
  height: 300px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(1.03); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}


.rating-color{
    color:#fbc634;
}

.small-ratings{
  color:#cecece;   
}


/* Container needed to position the button. Adjust the width as needed */
.container-fluid{
  position: relative;
  width: 70%;
}

/* Make the image responsive */
.container-fluid img {
  width: 100%;
  height: 300px;
}

/* Style the button and place it in the middle of the container/image */
.container-fluid .btn {
  position: absolute;
  top: 65%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: white;
  color: #666666;
  font-size: 16px;
  padding: 5px 20px;
  border-radius: 0px;
}

.container-fluid .adk {
  position: absolute;
  top: 45%;
  left: 50%;
  color: white;
  text-align: center;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}


.container-fluid .btn:hover {
  background-color: #e6e6e6;
}

.sanpham1:hover{
    opacity: 0.3; text-decoration: none;
}
</style>                