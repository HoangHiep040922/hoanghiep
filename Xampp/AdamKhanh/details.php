
<?php

$id = $_GET['id'];


$sql_brand = "SELECT * FROM brands";
$query_brand = mysqli_query($conn, $sql_brand);

$sql = "SELECT * FROM products where id = $id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

if(isset($_GET['sbm'])){
    $title = $_GET['title'];
    $price = $_GET['price'];
    $image = $_GET['image'];
    $description = $_GET['description'];
    $register = $_GET['register'];

    $sql = "SELECT products SET title = '$title', price = $price, image = '$image', description = '$description', register = '$register'  WHERE id = $id";
    $query = mysqli_query($conn, $sql);
}

include ('header.php');
?>

<title><?php echo $row['title']; ?></title>
<body>
<br><br>
<div class="container-lg ">
    <div class="row">
        <div class="col-sm-9 anhsanpham" >
        <img  id="myImg" alt="<?php echo $row['title']; ?>" src="images/<?php echo $row['image']; ?>"><br><br><br>
        </div>
        <div id="myModal" class="modal">
          <span class="close">&times;</span>
          <img class="modal-content" id="img01">
          <div id="caption"></div>
        </div>

        <div class="col-sm-4">
            <h2><strong><?php echo $row['title']; ?></strong></h2>
            <a><s>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</s></a>
                <div class="small-ratings">
                    <i class="bi bi-star-fill rating-color"></i>
                    <i class="bi bi-star-fill rating-color"></i>
                    <i class="bi bi-star-fill rating-color"></i>
                    <i class="bi bi-star-fill rating-color"></i>
                    <i class="bi bi-star-fill rating-color"></i>
                </div>
            <a style="color: #00804d;">(Đánh giá của khách hàng)</a><br><br>              
            <a style="font-size:20px"><strong>Giá: <?php echo $row['price']; ?> ₫</strong></a><br>
            <a style="font-size: 14px; color: #669900;"><strong>Còn hàng</strong></a><br><br>
            <a style="font-size:16px;">Mua: &nbsp&nbsp<a style="text-decoration: none" href="https://shopee.vn/adamkhanh" target="_blank">&nbsp
            <img class="d-inline-block align-top logo" src="/AdamKhanh/images/logo-shopee.jpg" alt="" width="50" height="50">
            </a>
            <a style="text-decoration: none;" href="https://www.lazada.vn/shop/adamkhanh" target="_blank">&nbsp
            <img class="d-inline-block align-top logo" src="/AdamKhanh/images/logo-lazada.jpg" alt="" width="50" height="50">
            </a></a><br>
            <a><s>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</s></a><br>
          
            <a href="http://www.facebook.com/sharer.php?u=https://adamkhanh.vn/index.php?trang=san-pham&id=<?php echo $row['id']; ?>" target="_blank" style="text-decoration: none" data-bs-toggle="tooltip" title="Chia sẻ trên Facebook!">
            <i class="bi bi-facebook" style="font-size:30px;color:gray;"></i>&nbsp&nbsp
            <a href="https://twitter.com/intent/tweet?url=https://adamkhanh.vn/index.php?trang=san-pham&id=<?php echo $row['id']; ?>&amp;text=Hãy%20mua%20sản%20phẩm%20tại%20shop%20AdamKhanh%20vì%20chất%20liệu%20sản%20phẩm%20vừa%20tốt%20lại%20còn%20đẹp.&amp;hashtags=AdamKhanh" target="_blank" style="text-decoration: none" data-bs-toggle="tooltip" title="Chia sẻ trên Twitter!">
            <i class="bi bi-twitter" style="font-size:30px;color:gray;"></i>&nbsp&nbsp
            <a href="https://mail.google.com/mail/u/0/#inbox?compose=new" target="_blank" style="text-decoration: none" data-bs-toggle="tooltip" title="Chia sẻ trên Mail!">
            <i class="bi bi-envelope" style="font-size:30px;color:gray;"></i>&nbsp&nbsp
            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://adamkhanh.vn/index.php?trang=san-pham&id=<?php echo $row['id']; ?>" target="_blank" style="text-decoration: none" data-bs-toggle="tooltip" title="Chia sẻ trên Linked in!">
            <i class="bi bi-linkedin" style="font-size:30px;color:gray;"></i>&nbsp&nbsp
  
            </a>
            </a>
            </a>
            </a>
            </a>
            </a><br><br><br><br><br><br>
        </div>
    </div>

    <div class="container mt-3">
        
        <!-- Nav tabs -->
        
        <nav class="navbar navbar-expand-sm  navbar-light">
        <ul class="navbar-nav" >
            <li class="nav-item">
            <a class="nav-link"  href="#mo-ta-san-pham"><strong>Mô Tả Sản Phẩm</strong></a>
            </li>
            <h3>|</h3>
            <li class="nav-item">
            <a class="nav-link"  href="#danh-gia"><strong>Đánh giá</strong></a>
            </li>
        </ul>
        </nav>
        <!-- Tab panes -->
        <div class="tab-content">
            <div id="mo-ta-san-pham" class="container "><br>
            <h3>Sản Phẩm: <?php echo $row['title']; ?> phiên bản mới</h3><br>
            <pre style="font-size:17px"><?php echo $row['description']; ?></pre>
            </div><br><br><hr><br>
            <div id="danh-gia" class="container"><br>
            <h3>Các đánh giá về sản phẩm <?php echo $row['title']; ?></h3>
            <table class="table" style="background-color:#eeeeee;">
              <tbody>
                <tr><br><br>
                  <td class="col-sm-7">
                    
                    <?php 
                     
                    $item_per_page= 10;
                    $current_page = !empty($_GET['binh_luan'])?$_GET['binh_luan']:1;
                    $offset = ($current_page - 1) * $item_per_page;
                    $cmtquery = mysqli_query($conn, "SELECT * FROM comment WHERE product_id='$id' LIMIT ".$item_per_page." OFFSET ".$offset."");
                    $checkquery = mysqli_num_rows($cmtquery);
                    $totalRecords = mysqli_query($conn, "SELECT * FROM comment WHERE product_id='$id'");
                    $totalRecords = $totalRecords->num_rows;
                    $totalPages = ceil($totalRecords / $item_per_page);

                    if($checkquery){
                      while($cmtrow= mysqli_fetch_array($cmtquery)){

                        ?>
                        <table class="table  table-borderless" style="background-color:#eeeeee;">
                          <tbody>
                            <tr>
                              <td class="col-sm-1"><img class="rounded-circle" src="/AdamKhanh/images/avatar.jpg" alt="Cinque Terre" style="width:40px; height:40px"></td>
                              <td class="col-sm-11"><a><strong><?php echo $cmtrow['sender'] ?></strong></a>&nbsp&nbsp<a">(<?php echo $cmtrow['date'] ?>)</a><br>
                              <a><?php echo $cmtrow['comment'] ?></a>
        
                            </td>
                            </tr>
                          </tbody>
                        </table>
                        
                        <?php } }   
                        ?>
                        
                        <ul class="pagination justify-content-center">
                            <?php if($current_page > 1) {
                                $prev_page = $current_page - 1; ?>
                                <a class="page-item page-link rounded-circle border-dark" style="margin: 4px; color: black;" href="index.php?trang=san-pham&id=<?php echo $row['id']; ?>&binh_luan=<?=$prev_page?>#danh-gia"><strong>←</strong></a>
                            <?php } ?>
                            <?php if($current_page > 3) {
                                $first_page = 1; ?>
                                <a class="page-item page-link rounded-circle border-dark" style="margin: 4px; color: black;" href="index.php?trang=san-pham&id=<?php echo $row['id']; ?>&binh_luan=<?=$first_page?>#danh-gia"><strong>1</strong></a>
                                <a class="page-item page-link rounded-circle border-dark" style="margin: 4px; color: black;" ><strong>...</strong></a>
                            <?php } ?>
                        <?php for($num = 1; $num <= $totalPages; $num++) { ?>
                            <?php if($num != $current_page) { ?>
                                <?php if($num > $current_page - 3 && $num < $current_page + 3) { ?>
                                    <a class="page-item page-link rounded-circle border-dark" style="margin: 4px; color: black;" href="index.php?trang=san-pham&id=<?php echo $row['id']; ?>&binh_luan=<?=$num?>#danh-gia"><strong><?=$num?></strong></a>
                                <?php } ?>
                            <?php } else { ?>
                            <a class="page-item page-link rounded-circle border-dark bg-secondary" style="margin: 4px; color: black;"><strong><?=$num?></strong></a>
                            <?php } ?>
                        <?php } ?>
                        <?php if($current_page < $totalPages - 3) {
                            $end_page = $totalPages; ?>
                                <a class="page-item page-link rounded-circle border-dark" style="margin: 4px; color: black;" ><strong>...</strong></a>
                                <a class="page-item page-link rounded-circle border-dark" style="margin: 4px; color: black;" href="index.php?trang=san-pham&id=<?php echo $row['id']; ?>&binh_luan=<?=$end_page?>#danh-gia"><strong><?=$end_page?></strong></a>
                                <?php } ?>
                        <?php if($current_page < $totalPages - 1) {
                            $next_page = $current_page + 1; ?>
                            <a class="page-item page-link rounded-circle border-dark" style="margin: 4px; color: black;" href="index.php?trang=san-pham&id=<?php echo $row['id']; ?>&binh_luan=<?=$next_page?>#danh-gia"><strong>→</strong></a>
                            <?php } ?>
                        </ul>
                        

                      
                     
                  </td>
                  <td class="col-sm-5">
                    <form style=" width: 500px;border: 2px solid #1f1f7a;padding: 30px;margin: 30px;" action="index.php?trang=danh-gia" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <h4><strong>Viết bình luận</strong></h4>
                    <strong style="color:#208000">
                      <?php 
                        if(isset($_SESSION['errorMSG']))
                        {
                            echo $_SESSION['errorMSG'];
                            unset($_SESSION['errorMSG']);
                        }
                      ?><br><br>
                    </strong>
                      
                      <div class="mb-3" >
                        <div class="row g-5">
                          <div class="col-lg">
                            <label><strong>Tên của bạn *</strong></label>
                            <input type="text" name="cmtName" class="form-control" required>
                          </div>
                          <div class="col-lg">
                            <label><strong>Email của bạn *</strong></label>
                            <input type="email" name="cmtEmail" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"><strong>Nhận xét của bạn *</strong></label>
                        <textarea type="text" name="cmtMSG" class="form-control" required></textarea>
                      </div><br>
                      
                      <button name="cmtbtn" class="btn btn-success float-md-end"><strong>Gửi</strong></button>
                      <br>
                    </form>
                  </td>
                </tr>
              </tbody>
            </table>
            </div>
            <div id="menu2" class="container tab-pane fade"><br>
        
        </div></div></div>
<p></p>
</div>
</body>
<br><br><br><br><br><br>
<?php

include ('footer.php');
?>

<style>

html {
box-sizing: border-box;
}
/* Container needed to position the button. Adjust the width as needed */
.anhsanpham{
position: relative;
width: 600px;
}

/* Make the image responsive */
.anhsanpham img {
width: 100%;
height: 700px;
}


.rating-color{
color:#fbc634;
}

.small-ratings{
color:#cecece;   
}







/* The Modal (background) */
.modal {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 6; /* Sit on top */
padding-top: 100px; /* Location of the box */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
margin: auto;
display: block;
width: 80%;
max-width: 480px;
}

/* Caption of Modal Image */
#caption {
margin: auto;
display: block;
width: 80%;
max-width: 700px;
text-align: center;
color: #ccc;
padding: 10px 0;
height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
-webkit-animation-name: zoom;
-webkit-animation-duration: 0.6s;
animation-name: zoom;
animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
from {-webkit-transform:scale(0)} 
to {-webkit-transform:scale(1)}
}

@keyframes zoom {
from {transform:scale(0)} 
to {transform:scale(1)}
}

/* The Close Button */
.close {
position: absolute;
top: 15px;
right: 35px;
color: #f1f1f1;
font-size: 40px;
font-weight: bold;
transition: 0.3s;
}

.close:hover,
.close:focus {
color: #bbb;
text-decoration: none;
cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
.modal-content {
width: 100%;
}
}


</style>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
modal.style.display = "block";
modalImg.src = this.src;
captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
modal.style.display = "none";
}
</script>
