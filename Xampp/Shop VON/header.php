<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop VON</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">
    <?php
    // require functions.php file
    require ('functions.php');
    ?>

</head>
<body>

<!-- start #header -->
<header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-rale font-size-12 text-black-50 m-0">Bài Tập Của Nguyễn Hoàng Hiệp 'VON'</p>
        <div class="font-rale font-size-14">
            <a href="login.php" class="px-3 border-right border-left text-dark">Login</a>
            <a href="#" class="px-3 border-right text-dark">Whishlist (0)</a>
        </div>
    </div>

    <!-- Primary Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
        <a class="navbar-brand" href="index.php">Shop VON</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto font-rubik">
                <li class="nav-item active">
                    <a class="nav-link" href="#">On Sale</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Laptop</a>
                    <ul class="dropdown-menu dropdown-menu-dark" >
                        <li><a class="dropdown-item" href="#">MacBook</a></li>
                        <li><a class="dropdown-item" href="#">Dell</a></li>
                        <li><a class="dropdown-item" href="#">HP</a></li>
                        <li><a class="dropdown-item" href="#">Asus</a></li>
                        <li><a class="dropdown-item" href="#">Lenovo</a></li>
                        <li><a class="dropdown-item" href="#">Acer</a></li>
                        <li><a class="dropdown-item" href="#">MSI </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Phone</a>
                        <ul class="dropdown-menu dropdown-menu-dark" >
                            <li><a class="dropdown-item" href="#">IPhone</a></li>
                            <li><a class="dropdown-item" href="#">Samsung</a></li>
                            <li><a class="dropdown-item" href="#">OPPO</a></li>
                            <li><a class="dropdown-item" href="#">Huawei</a></li>
                            <li><a class="dropdown-item" href="#">Xiaomi</a></li>
                            <li><a class="dropdown-item" href="#">Vivo</a></li>
                            <li><a class="dropdown-item" href="#">Lenovo </a></li>
                            <li><a class="dropdown-item" href="#">OnePlus </a></li>
                            <li><a class="dropdown-item" href="#">Google </a></li>
                            <li><a class="dropdown-item" href="#">Asus </a></li>
                            <li><a class="dropdown-item" href="#">Razer </a></li>
                            <li><a class="dropdown-item" href="#">ZTE </a></li>
                        </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Camera</a>
                    <ul class="dropdown-menu dropdown-menu-dark" >
                        <li><a class="dropdown-item" href="#">Camera KBVISION</a></li>
                        <li><a class="dropdown-item" href="#">Camera Questek</a></li>
                        <li><a class="dropdown-item" href="#">Camera HIKVISION</a></li>
                        <li><a class="dropdown-item" href="#">Camera DAHUA</a></li>
                        <li><a class="dropdown-item" href="#">Camera Yoosee</a></li>
                        <li><a class="dropdown-item" href="#">Camera Afiri</a></li>
                        <li><a class="dropdown-item" href="#">Camera Vantech</a></li>
                        <li><a class="dropdown-item" href="#">Camera Ezviz</a></li>
                        <li><a class="dropdown-item" href="#">Camera Ebitcam</a></li>
                        <li><a class="dropdown-item" href="#">Camera IMOU</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Television</a>
                    <ul class="dropdown-menu dropdown-menu-dark" >
                        <li><a class="dropdown-item" href="#">TV Sony</a></li>
                        <li><a class="dropdown-item" href="#">TV Samsung</a></li>
                        <li><a class="dropdown-item" href="#">TV LG</a></li>
                        <li><a class="dropdown-item" href="#">TV TCL</a></li>
                        <li><a class="dropdown-item" href="#">TV Panasonic</a></li>
                        <li><a class="dropdown-item" href="#">TV Sharp</a></li>
                        <li><a class="dropdown-item" href="#">TV Toshiba</a></li>
                        <li><a class="dropdown-item" href="#">TV Skyworth</a></li>
                        <li><a class="dropdown-item" href="#">TV Skyworth</a></li>
                        <li><a class="dropdown-item" href="#">TV FFALCON</a></li>
                        <li><a class="dropdown-item" href="#">TV Asanzo</a></li>
                        <li><a class="dropdown-item" href="#">TV AQUA</a></li>
                        <li><a class="dropdown-item" href="#">TV Darling</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="#">Computer</a></li>
                        <li><a class="dropdown-item" href="#">Phone</a></li>
                        <li><a class="dropdown-item" href="#">Camera</a></li>
                        <li><a class="dropdown-item" href="#">Television</a></li>
                        <li><a class="dropdown-item" href="#">Air Conditioner</a></li>
                        <li><a class="dropdown-item" href="#">Microwave Oven</a></li>
                        <li><a class="dropdown-item" href="#">Fridge</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Coming Soon</a>
                </li>
            </ul>
            <form action="#" class="font-size-14 font-rale">
                <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                    <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')); ?></span>
                </a>
            </form>
        </div>
    </nav>
    <!-- !Primary Navigation -->

</header>
<!-- !start #header -->

<!-- start #main-site -->
<main id="main-site">