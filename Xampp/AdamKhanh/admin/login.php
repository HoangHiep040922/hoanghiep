<?php ob_start();?> 
<title> Đăng Nhập AdamKhanh </title>
<!DOCTYPE html>
<html lang="en">
<head>
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
    rel="stylesheet"
    />
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
    ></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start " style="height: 638px; margin: 5%">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          AdamKhanh
        </h1>
        <h2><span style="color: hsl(218, 81%, 75%)">Phục Vụ Tốt Hơn Mỗi Ngày</span></h2>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form action="" method="POST" >

                <div class="form-outline mb-4">
                <img class="d-inline-block align-center" src="/AdamKhanh/images/logo.png" style="position: relative;width:300px; height:140px; margin: 3% auto; left: 100px" >
                </div>

                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }

                    if(isset($_SESSION['no-login-message']))
                    {
                        echo $_SESSION['no-login-message'];
                        unset($_SESSION['no-login-message']);
                    }
                ?><br>
              <!-- Email input -->
              <div class=" mb-4">
                <label class="form-label" for="form3Example3">Tên Tài Khoản</label>
                <input type="text" name="username" id="form3Example3" class="form-control" placeholder="Nhập tên tài khoản của bạn" required/>
                <div class="valid-feedback">Hãy nhập tên tài khoản của bạn</div>
              </div>

              <!-- Password input -->
              <div class=" mb-4">
              <label class="form-label" for="form3Example4">Mật Khẩu</label>
                <input type="password" name="password" id="form3Example4" class="form-control" placeholder="Nhập mật khẩu của bạn" required/>
                
              </div><br>


              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">
                Đăng Nhập
              </button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
</body>
</html>

<?php 
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
          while($rows=mysqli_fetch_assoc($res))
          {
            $_SESSION['login'] = "<div class='success'> Đăng Nhập thành công.</div>";
            $_SESSION['user'] = $username;
            $_SESSION['name'] = $rows['full_name'];
            header('location: admin.php?admin=index');
          }
        }
        else
        {
            $_SESSION['login'] = "<div class='error'> Sai tên hoặc mật khẩu.</div>";
            header("location: admin.php?admin=login");
        }
    }
    ob_end_flush();
?>
