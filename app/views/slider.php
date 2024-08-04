<section class="slider">
        <div class="container">
            <div class="side_bar">
                <h2><i class="fa-solid fa-bars"></i>Mua sắm theo danh mục </h2>
                <?php foreach($category as $key => $cate){

                 ?>
                <a href="<?php echo BASE_URL ?>/sanpham/category_product/<?php echo $cate['id_category_product'] ?>"><?php 
                echo $cate['title_category_product'] ?></a>
                <?php } ?>
               
            </div>


            <div class="slide-swp mySwiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <a href="#"><img src="<?php echo BASE_URL ?>/public/img/Slide/slide 5.jpg"  alt=""></a>
                  </div>

                  <div class="swiper-slide">
                    <a href="#"><img src="<?php echo BASE_URL ?>/public/img/Slide/slide 1.jpg"  alt=""></a>
                  </div>

                  <div class="swiper-slide">
                    <a href="#"><img src="<?php echo BASE_URL ?>/public/img/Slide/slide 3.jpg" alt=""></a>
                  </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>