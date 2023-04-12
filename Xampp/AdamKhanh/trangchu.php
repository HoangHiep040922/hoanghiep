<?php
    require_once 'config/connet.php';
// include header.php file
include ('header.php');
?>
<?php
    $item_per_page= 24;
    $current_page = !empty($_GET['san_pham'])?$_GET['san_pham']:1;
    $offset = ($current_page - 1) * $item_per_page;
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT ".$item_per_page." OFFSET ".$offset." ";
    $query = mysqli_query($conn, $sql);
    $totalRecords = mysqli_query($conn, "SELECT * FROM products ");
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
?>
 <title>AdamKhanh</title>


<div id="demo" class="carousel slide" data-bs-ride="carousel">

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="/AdamKhanh/images/backgroud.png" alt="backgroud" class="d-block w-100">
  </div>
</div>

<br><br><br>
<div class="container" id="san-pham">
    <h1 class="mt-5 mb-6 text-center"><strong>SẢN PHẨM BÁN CHẠY NHẤT</strong></h1><br><br><br>
    <div class="row">
        <?php
            if(mysqli_num_rows($query) > 0) {
                while($row = mysqli_fetch_assoc($query)){?>
                <div class="col-md-4 zoom" style="box-sizing: border-box; padding: auto; margin: 15px; ">
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
<ul class="pagination justify-content-center">
    <?php if($current_page > 1) {
        $prev_page = $current_page - 1; ?>
        <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 7px 12px;width: 40px; height: 40px; color: black;" href="index.php?san_pham=<?=$prev_page?>#san-pham"><strong>←</strong></a>
    <?php } ?>
    <?php if($current_page > 3) {
        $first_page = 1; ?>
        <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 9px 14px;width: 40px; height: 40px; color: black;" href="index.php?san_pham=<?=$first_page?>#san-pham"><strong>1</strong></a>
        <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 9px 13px;width: 40px; height: 40px; color: black;" ><strong>...</strong></a>
    <?php } ?>
    <?php for($num = 1; $num <= $totalPages; $num++) { ?>
        <?php if($num != $current_page) { ?>
            <?php if($num > $current_page - 3 && $num < $current_page + 3) { ?>
                <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 9px 14px;width: 40px; height: 40px; color: black;" href="index.php?san_pham=<?=$num?>#san-pham"><strong><?=$num?></strong></a>
            <?php } ?>
        <?php } else { ?>
        <a class="page-item  test" style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 9px 14px;width: 40px; height: 40px; color: white;"><strong><?=$num?></strong></a>
        <?php } ?>
    <?php } ?>
    <?php if($current_page < $totalPages - 3) {
        $end_page = $totalPages; ?>
            <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 9px 13px;width: 40px; height: 40px; color: black;" ><strong>...</strong></a>
            <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 9px 14px;width: 40px; height: 40px; color: black;" href="index.php?san_pham=<?=$end_page?>#san-pham"><strong><?=$end_page?></strong></a>
            <?php } ?>
    <?php if($current_page < $totalPages - 1) {
        $next_page = $current_page + 1; ?>
        <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 7px 12px;width: 40px; height: 40px; color: black;" href="index.php?san_pham=<?=$next_page?>#san-pham"><strong>→</strong></a>
        <?php } ?>
</ul><br><br><br>
<style>
.test {
    background: #5a8c8c;
}
</style>


                         
                         
<div class="container-fluid">
    
  <img src="/AdamKhanh/images/background fanpage.png" alt="Snow" class="d-block w-100">
  <span class="adk"><a style="font-size: 20px"><strong>AdamKhanh</strong></a><br><small style="font-size: 15px">Cập Nhập Thông Tin Về Sản Phẩm Mới</small></span>
  <a href="https://www.facebook.com/adamkhanh.vn"  target="_blank"><button class="btn"><strong>FANPAGE</strong></button></a>
</div><br><br>  




  <h2 class="mt-5 mb-6 text-center"><strong>CẬP NHẬP FANPAGE</strong></h2><br><br><br>



<div class="wrapper" id="post">

    <ul>
    <?php 
    $item_per_page_post= 20;
    $current_page_post = !empty($_GET['post'])?$_GET['post']:1;
    $offset_post = ($current_page_post - 1) * $item_per_page_post;
    $sql_post = "SELECT * FROM posts ORDER BY id_post DESC LIMIT ".$item_per_page_post." OFFSET ".$offset_post." ";
    $query_post = mysqli_query($conn, $sql_post);
    $totalRecords_post = mysqli_query($conn, "SELECT * FROM posts ");
    $totalRecords_post = $totalRecords_post->num_rows;
    $totalPages_post = ceil($totalRecords_post / $item_per_page_post);

    ?>
        <?php if(mysqli_num_rows($query_post) > 0) {
        while($row_post = mysqli_fetch_assoc($query_post)){?>
        <li><a href="<?php echo $row_post['link_post']; ?>" target="_blank" class="social-content">
        <img src="images/<?php echo $row_post['image_post']; ?>" alt="" class="social-photo post" style="width: 280px; height: 350px;"></a></li>
        <?php } } ?>
        
    </ul>
</div>
<ul class="pagination justify-content-center">
    <?php if($current_page_post > 1) {
        $prev_page_post = $current_page_post - 1; ?>
        <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 7px 12px;width: 40px; height: 40px; color: black;" href="index.php?post=<?=$prev_page_post?>#post"><strong>←</strong></a>
    <?php } ?>
    <?php if($current_page_post > 3) {
        $first_page_post = 1; ?>
        <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 9px 14px;width: 40px; height: 40px; color: black;" href="index.php?post=<?=$first_page_post?>#post"><strong>1</strong></a>
        <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 9px 13px;width: 40px; height: 40px; color: black;" ><strong>...</strong></a>
    <?php } ?>
    <?php for($num_post = 1; $num_post <= $totalPages_post; $num_post++) { ?>
        <?php if($num_post != $current_page_post) { ?>
            <?php if($num_post > $current_page_post - 3 && $num_post < $current_page_post + 3) { ?>
                <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 9px 14px;width: 40px; height: 40px; color: black;" href="index.php?post=<?=$num_post?>#post"><strong><?=$num_post?></strong></a>
            <?php } ?>
        <?php } else { ?>
        <a class="page-item  test" style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 9px 14px;width: 40px; height: 40px; color: white;"><strong><?=$num_post?></strong></a>
        <?php } ?>
    <?php } ?>
    <?php if($current_page_post < $totalPages_post - 3) {
        $end_page_post = $totalPages_post; ?>
            <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 9px 13px;width: 40px; height: 40px; color: black;" ><strong>...</strong></a>
            <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 9px 14px;width: 40px; height: 40px; color: black;" href="index.php?post=<?=$end_page_post?>#post"><strong><?=$end_page_post?></strong></a>
            <?php } ?>
    <?php if($current_page_post < $totalPages_post - 1) {
        $next_page_post = $current_page_post + 1; ?>
        <a class="page-item page-link " style="border: 1px solid #73a5a5; border-radius: 20px; margin: 3px; padding: 7px 12px;width: 40px; height: 40px; color: black;" href="index.php?post=<?=$next_page_post?>#post"><strong>→</strong></a>
        <?php } ?>
</ul><br><br><br>
<style>
.wrapper{
    width: 1500px;
    min-height: auto;
    margin: 1px auto;
}
.wrapper ul{
    list-style: none;
    padding: 0;
}
.wrapper ul::after{
    content: '';
    display: table;
    clear: both;
}
.wrapper ul li a img{
    width: calc(30% - 5px);
    margin: 20px 10px 0;
    height: 150px;
    background-size: cover;
    background-position: center center;
    float: left;
    box-shadow: 0 5px 5px 1px rgba(0, 0, 0, 0.2);
}

</style>

        
</body>
</html>
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
  height: 340px;
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


.post:hover {
  opacity: 0.6;
}


</style>                
<br><br><br><br><br><br><br><br><br>  


<?php
// include footer.php file
include ('footer.php');
?>