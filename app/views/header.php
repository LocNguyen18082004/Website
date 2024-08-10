<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa hàng Shoes</title>

    <!-- Link Style CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/css/styles.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/css/login_regss.css">
    <!-- Link Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    


    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL ?>/public/css/custom-swiper.css">
</head>
<body>    
    <header>
        <div class="container top-nav">
            <a href="#" class="logo"><img src="<?php echo BASE_URL ?>/public/img/logo.png" style="width: 80px; height: 80px;" alt=""></a>
            <form action="<?php echo BASE_URL ?>/timkiem/search" method="GET" class="search">
                <input type="search" name="keyword" placeholder="Hãy tìm kiếm tại đây....." value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" /> 
                <button type="submit">Tìm kiếm</button>
            </form>
            
            <div class="cart_header">
                <a href="<?php echo BASE_URL ?>/giohang">
                <div class="icon_cart">
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>
                </a>
                <a href="<?php echo BASE_URL ?>/giohang/favourite">
                <div  class="icon_cart">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <a href="<?php echo BASE_URL ?>/khachang/account">
                <div  class="icon_cart">
                    <i class="fa-solid fa-user"></i>
                </div>
                </a>
            </div>
        </div>

        <nav>
            <div class="links container">
                <i onclick="open_menu()" class="fa-solid fa-bars btn_open_menu"></i>
                <ul id="menu">
                    <span onclick="close_menu()" class="bg-overlay"></span>
                    <i onclick="close_menu()" class="fa-regular fa-circle-xmark btn_close_menu"></i>
                    <img class="logo_menu" src="<?php echo BASE_URL ?>/public/img/Logo.png" style="width: 80px; height: 80px;" alt="">

                    <li ><a href="<?php echo BASE_URL ?>">Trang chủ</a></li>
                    <li><a href="<?php echo BASE_URL ?>/sanpham/all">Sản phẩm</a>
                        <ul class="dropdown">
                            <?php foreach($category as $key => $cate){

                            ?>
                            <li>
                           
                            <a href="<?php echo BASE_URL ?>/sanpham/category_product/<?php echo $cate['id_category_product'] ?>"><?php 
                            echo $cate['title_category_product'] ?></a>
                            </li>
                            <?php } ?>
                        </ul>

                    </li>
                    <li><a href="<?php echo BASE_URL ?>/index/about">Giới thiệu</a></li>
                    <li ><a href="<?php echo BASE_URL ?>/tintuc/all">Tin tức</a>
                        <ul>
                            <?php foreach($category_post as $key => $cate_post){

                            ?>
                            <li>
                                <a href="<?php echo BASE_URL ?>/tintuc/categorypost/<?php echo $cate_post['id_category_post'] ?>"><?php 
                                echo $cate_post['title_category_post'] ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a href="<?php echo BASE_URL ?>/index/contact">Liên hệ</a></li>
                </ul>
                <div class="loging_signup">

                    <?php 
                        if(isset($_SESSION['customer']) && $_SESSION['customer'] === true){
                            
                    ?>
                    <a href="<?php echo BASE_URL ?>/khachang/logout">Đăng xuất  <i class="fa-solid fa-user-minus"></i></a>
                    <?php }else{
                    ?>

                    <a href="<?php echo BASE_URL ?>/khachang/login">Đăng Nhập <i class="fa-solid fa-user-plus"></i></a>
                    <a href="<?php echo BASE_URL ?>/khachang/register">Đăng Ký <i class="fa-solid fa-pen-to-square"></i></a>
                    
                    <?php } ?>
                    
                    
                </div>
            </div>
            
        </nav>
    </header>