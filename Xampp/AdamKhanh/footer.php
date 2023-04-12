<?php
    $sql = "SELECT * FROM products inner join brands on products.brand_id = brands.brand_id";
    $query = mysqli_query($conn, $sql);
    $sql_brand = "SELECT * FROM brands";
    $query_brand = mysqli_query($conn, $sql_brand);
?>

<!-- start #footer -->
<footer id="footer" class="bg-white text-black py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
            <div class="d-flex flex-column flex-wrap">
                <h4 class="font-rubik font-size-20">AdamKhanh</h4>
                <p class="font-size-14 font-rale text-black-50" >Thương hiệu AdamKhanh là thương hiệu có các sản phẩm thời trang cao cấp, với các sản phẩm như tất với áo được sản xuất tại CÔNG TY TNHH SẢN XUẤT THƯƠNG MẠI ADAM KHÁNH.</p>
            </div>
            </div>
            <div class="col-lg-3 col-12">
                <h5 class="font-rubik font-size-20">Danh Mục Sản Phẩm</h5>
                <div class="d-flex flex-column flex-wrap">
                <?php
                    while($row_brand = mysqli_fetch_assoc($query_brand)){?>
                    <a class="font-rale font-size-14 text-black-50 pb-1 gachchan" href="index.php?trang=danh-muc&id=<?php echo $row_brand['brand_id']; ?>"><li><?php echo $row_brand['brand_name']; ?></li></a>
                <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <h5 class="font-rubik font-size-20">Thông Tin</h5>
                <div class="d-flex flex-column flex-wrap">
                    <a href="thongtin.php?thong-tin=thong-bao" class="font-rale font-size-14 text-black-50 pb-1 gachchan"><li> Giới Thiệu</li></a>
                    <a href="thongtin.php?thong-tin=chinh-sach" class="font-rale font-size-14 text-black-50 pb-1 gachchan"><li> Chính Sách Bảo Mật</li></a>
                    <a href="thongtin.php?thong-tin=dieu-khoan" class="font-rale font-size-14 text-black-50 pb-1 gachchan"><li> Điều Khoản</li></a>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <h5 class="font-rubik font-size-20">Hỗ Trợ</h5>
                <div class="d-flex flex-column flex-wrap">
                    <p class="font-size-14 font-rale text-black-50">Mọi thắc mắc và góp ý cần được hỗ trợ xin khách hàng vui lòng liên hệ với chúng tôi qua Fanpage và Email.</p>
                    <div class="row">
                        <div class="col-sm-2"> 
                            <a href="https://www.facebook.com/messages/t/111334815151822"  target="_blank">
                            <img class="d-inline-block align-top logo" src="/AdamKhanh/images/logo-facebook.png" alt="" width="40" height="40">
                            </a>
                        </div>
                        <div class="col-sm-2">
                            <a class="navbar-brand mb-0 h1" href="https://mail.google.com/mail/u/0/#inbox?compose=VpCqJVFvsxddKQSxJrjJJPXrQNgDNbQLtzWltLMVPwTZbnlLjnDnkTKjHrjhxpHWHrRXzqg" target="_blank">
                            <img class="d-inline-block align-top logo" src="/AdamKhanh/images/logo-mail.jpg" alt="" width="40" height="35">
                            </a> 
                        </div>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
    
</footer>

<div class=" text-center bg-white text-black py-2">
<hr/>
    <p class="font-size-14">&copy; Copyrights 2023. AdamKhanh</p>
</div>

<style>


.logo:hover{
    opacity: 0.7;
}

.gachchan {text-decoration: none}

.gachchan:hover {
  opacity: 0.3;
  text-decoration: none;
}
hr {
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 1px;
  width:70%;
}
</style>
