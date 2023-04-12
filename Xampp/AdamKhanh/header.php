<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="/AdamKhanh/images/icon.jpg" type="images/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body style="background-color:#eeeeee;">


<nav class="navbar sticky-top navbar-expand-md  navbar-light bg-white" style="z-index: 1;">
  <div class="container text-center">
    
    <a class="navbar-brand mb-0 h1" href="index.php">
        <img class="d-inline-block align-top" src="/AdamKhanh/images/logo.jpg" alt="" width="135" height="60">
      </a>&emsp;&emsp;&emsp;&emsp;
      <button 
      class="navbar-toggler" 
      type="button"
      data-bs-toggle="collapse" 
      data-bs-target="#navbarNav" 
      aria-controls="navbarNav" 
      aria-expanded="false" 
      aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><i class="bi bi-search"></i></button>
          <div id="id01" class="modal">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container" style="padding: 100px 100px; margin: 100px; position:relative;left:300px;">
              <form class="d-flex" action="search.php" method="GET">
              <input class="form-control me-2" type="search" placeholder="Search.." name="search" required>
              <button class="btn btn-success btnsearch" name="tim-kiem" type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div>
          </div>

          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown active" data-bs-toggle="offcanvas" data-bs-target="#demo">
            <div class="offcanvas offcanvas-top nav-item dropdown active" style="position: fixed; bottom: 0; right: 0; width: 100%;height: 310px; border: 10px; top: 83px;" id="demo">
              <div class="offcanvas-body ">
                <div class="row">
                  <div class="col-lg-3">
                    <h4 >Danh Mục Sản Phẩm</h4>
                    <?php
                        $sql_brand = "SELECT * FROM brands";
                        $query_brand = mysqli_query($conn, $sql_brand);
                      while($row_brand = mysqli_fetch_assoc($query_brand)){?>
                        <a class="nav-link  d-flex" style="position:relative;left:50px;" href="index.php?trang=danh-muc&id=<?php echo $row_brand['brand_id']; ?>"><i class="bi bi-caret-right"></i>&nbsp&nbsp&nbsp&nbsp<?php echo $row_brand['brand_name']; ?></a>
                    <?php } ?>
                  </div>
                    <div class="col-lg-3">
                      <img class="" src="/AdamKhanh/images/ao1.jpg" alt="" width="300" height="230" top="300"><br><br>
                      <a>Áo nam xám</a>
                    </div>
                    <div class="col-lg-3">
                      <img class="" src="/AdamKhanh/images/ao2.jpg" alt="" width="300" height="230" top="300"><br><br>
                      <a>Áo nam đen</a>
                    </div>
                    <div class="col-lg-3">
                      <img class="" src="/AdamKhanh/images/ao4.jpg" alt="" width="300" height="230" top="300"><br><br>
                      <a>Áo nam trắng</a>
                    </div>
                </div>
              </div>
            </div>
          
              <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="offcanvas" data-bs-target="#demo" aria-expanded="false">
              Danh Mục Sản Phẩm
                </a>
        <div class="col-mt-10">
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="thongtin.php?thong-tin=thong-bao">Thông Báo</a>
          </li>
          
        </div>
        
            
          
        </ul>
                    
          <ul class="nav justify-content-end">
            <li class="nav-item active">
                <a class="nav-link" style="margin: 0 auto; padding:15px; color:black"  href="tel:0908381238" ><i class="bi bi-telephone-fill"></i> 0908381238</a>
              
            </li>
              <h2 style="margin: 0 auto; padding:3px;">|</h2>
           
              <a style="margin: 0 auto; padding:15px;">Mua Tại:</a>
              
              <a class="navbar-brand mb-0 h1" href="https://shopee.vn/adamkhanh" target="_blank">&nbsp
              <img class="d-inline-block align-top logo" src="/AdamKhanh/images/logo-shopee.jpg" alt="" width="40" height="40">
              </a> 
              <a class="navbar-brand mb-0 h1" href="https://www.lazada.vn/shop/adamkhanh" target="_blank">
              <img class="d-inline-block align-top logo" src="/AdamKhanh/images/logo-lazada.jpg" alt="" width="40" height="40">
              </a></ul> </div>
              </div>
        </div> 
      </div>
  </div>
  </div>
</nav>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>
<style>


/* Full-width input fields */
input[type=search] {
  width: 50%;
  padding: 10px 15px;
  margin: 10px;
  display: inline-block;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: white;
  color: black;
  border: none;
  cursor: pointer;
  
}
.btnsearch{
  padding: 10px 15px;
  margin: 10px;
}
button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>


 