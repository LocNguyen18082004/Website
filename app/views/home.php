    <section class="features">
        <div class="container">
            <div class="feature_item">
                <img src="<?php echo BASE_URL ?>/public/img/Features/features1.png" alt="">
                <div class="text">
                    <h4>Miễn phí vận chuyển</h4>
                    <p>Miễn phí vận chuyển đối với tất cả sản phẩm</p>
                </div>
            </div>

            <div class="feature_item">
                <img src="<?php echo BASE_URL ?>/public/img/Features/features2.png" alt="">
                <div class="text">
                    <h4>Miễn phí vận chuyển</h4>
                    <p>Miễn phí vận chuyển đối với tất cả sản phẩm</p>
                </div>
            </div>

            <div class="feature_item">
                <img src="<?php echo BASE_URL ?>/public/img/Features/features3.png" alt="">
                <div class="text">
                    <h4>Miễn phí vận chuyển</h4>
                    <p>Miễn phí vận chuyển đối với tất cả sản phẩm</p>
                </div>
            </div>

            <div class="feature_item">
                <img src="<?php echo BASE_URL ?>/public/img/Features/features4.png" alt="">
                <div class="text">
                    <h4>Miễn phí vận chuyển</h4>
                    <p>Miễn phí vận chuyển đối với tất cả sản phẩm</p>
                </div>
            </div>

            <div class="feature_item">
                <img src="<?php echo BASE_URL ?>/public/img/Features/features5.png" alt="">
                <div class="text">
                    <h4>Miễn phí vận chuyển</h4>
                    <p>Miễn phí vận chuyển đối với tất cả sản phẩm</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="banner">
        <div class="container">

            <div class="banner_img">
                <div class="glass_hover"></div>
                <a href="#"></a>
                    <img src="<?php echo BASE_URL ?>/public/img/Banner/banner1.png" alt="">
                
            </div>

            <div class="banner_img">
                <div class="glass_hover"></div>
                <a href="#"></a>
                    <img src="<?php echo BASE_URL ?>/public/img/Banner/banner2.png" alt="">
                
            </div>

            <div class="banner_img">
                <div class="glass_hover"></div>
                <a href="#"></a>
                    <img src="<?php echo BASE_URL ?>/public/img/Banner/Banner3.png" alt="">
                
            </div>

        </div>
    </section>



    <section class="slide slide_sale">
        <div class="container">
        

            <div class="sale_sec mySwiper">

                <div class="top_slide">
                    <h2>Sản phẩm <span>hót hòn họt</span></h2>
                </div>
            
            <div id="swiper_items_sale" class="products swiper-wrapper">
                <?php foreach($product_index as $key => $products)  {
                    if($products['product_hot']==1){

                ?>

                
                <div class="product swiper-slide">
                    <form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="post">
                        <input type="hidden" value="<?php echo $products['id_product'] ?>" name="product_id">
                        <input type="hidden" value="<?php echo $products['title_product'] ?>" name="product_title">
                        <input type="hidden" value="<?php echo $products['code_product']?>" name="product_code">
                        <input type="hidden" value="<?php echo $products['image_product'] ?>" name="product_image">
                        <input type="hidden" value="<?php echo $products['price_product'] ?>" name="product_price">
                        <input type="hidden" value="1" name="product_quantity">
                    <div class="icons">
                        <span >
                            <button style="border:none; background:none;" type="submit" name="addtocart"><i class="fa-solid fa-cart-plus"></i></button>
                        </span>
                    </form>
                        <span><i class="fa-solid fa-heart"></i></span>
                        
                        <span><i class="fa-solid fa-share"></i></span>
                    </div>
                    <span class="sale_present">HOT</span>

                    <div class="img_product">
                        <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $products['image_product'] ?>" alt="">
                        <?php if (!empty($product_images[$products['id_product']])) { ?>
                            <div class="product-images">
                                <?php foreach ($product_images[$products['id_product']] as $index => $image) { ?>
                                    <img class="img_hover" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $image['image_path'] ?>" >
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <p>No images available.</p>
                        <?php } ?>
                    </div>

                    <h3 class="name_product"><a href="<?php echo BASE_URL ?>/sanpham/details_product/<?php echo $products['id_product'] ?>"><?php echo $products['title_product'] ?></a></h3>

                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="price">
                        <p><span><?php echo number_format($products['price_product'],0,',','.').' ₫' ?></span></p>
                        <!-- <p class="old_price">1320000 ₫</p> -->
                    </div>
                </div>
                
                <?php }

                }?>
            </div>
            

                <div class="swiper-button-next btn-Swip"></div>
                <div class="swiper-button-prev btn-Swip"></div>
                
            </div>
            
        </div>
    </section>




    <section class="banner banner_big">
        <div class="container">
            <div class="banner_img">
                <div class="glass_hover"></div>
                <a href="#"></a>
                    <img src="<?php echo BASE_URL ?>/public/img/Banner/Banner-4(1).jpg"  alt="">
                
            </div>

            <div class="banner_img">
                <div class="glass_hover"></div>
                <a href="#"></a>
                    <img src="<?php echo BASE_URL ?>/public/img/Banner/Banner-5.jpg" alt="">
                
            </div>

        </div>
    </section>


    <section class="slide slide_product">
        <div class="container">
            <div class="top_slide">
            <h2>Giày Lining <span>sản phẩm</span></h2>
            </div>
            <div class="slide_with_img">
    <div class="categ_img">
        <a href="#"><img src="<?php echo BASE_URL ?>/public/img/Banner/Banner6.jpg" alt=""></a>
    </div>

    <div class="product_swip mySwiper">
        <div class="products other_product_swiper swiper-wrapper" id="other_product_swiper">
            <?php if (!empty($lining_products)){ ?>
                <?php foreach ($lining_products as $product){ ?>
                    <div class="product swiper-slide">
                        <form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="post">
                            <input type="hidden" value="<?php echo $product['id_product'] ?>" name="product_id">
                            <input type="hidden" value="<?php echo $product['title_product'] ?>" name="product_title">
                            <input type="hidden" value="<?php echo $product['code_product']?>" name="product_code">
                            <input type="hidden" value="<?php echo $product['image_product'] ?>" name="product_image">
                            <input type="hidden" value="<?php echo $product['price_product'] ?>" name="product_price">
                            <input type="hidden" value="1" name="product_quantity">
                        
                            <div class="icons">
                                <span>
                                    <button style="border:none; background:none;" type="submit" name="addtocart"><i class="fa-solid fa-cart-plus"></i></button>
                                </span>
                                <span>
                                    <button style="border:none; background:none;" type="submit" name="add_to_favourite"><i class="fa-solid fa-heart"></i></button>
                                </span>
                                <span><i class="fa-solid fa-share"></i></span>
                            </div>
                            <span class="sale_present">-16%</span>

                            <div class="img_product">
                                <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $product['image_product'] ?>" alt="">
                                <?php if (!empty($product_images[$product['id_product']])) { ?>
                                    <div class="product-images">
                                        <?php foreach ($product_images[$product['id_product']] as $index => $image) { ?>
                                            <img class="img_hover" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $image['image_path'] ?>">
                                        <?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <p>No images available.</p>
                                <?php } ?>
                            </div>

                            <h3 class="name_product"><a href="#"><?php echo $product['title_product']; ?></a></h3>

                            <div class="stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>

                            <div class="price">
                                <p><span><?php echo number_format($product['price_product'], 0, ',', '.'); ?> ₫</span></p>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        
        <div class="swiper-button-next btn-Swip"></div>
        <div class="swiper-button-prev btn-Swip"></div>
    </div>
</div>
         </div>
    </section>

<section class="slide slide_product">
    <div class="container">
        <div class="top_slide">
            <h2>Giày Yonex <span>sản phẩm</span></h2>
        </div>

        <div class="slide_with_img">
            <div class="product_swip mySwiper">
                <div class="products other_product_swiper swiper-wrapper" id="other_product_swiper2">
                <?php if (!empty($yonex_products)){ ?>
                    <?php foreach ($yonex_products as $product){ ?>
                    <div class="product swiper-slide">
                        <form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="post">
                            <input type="hidden" value="<?php echo $product['id_product'] ?>" name="product_id">
                            <input type="hidden" value="<?php echo $product['title_product'] ?>" name="product_title">
                            <input type="hidden" value="<?php echo $product['code_product']?>" name="product_code">
                            <input type="hidden" value="<?php echo $product['image_product'] ?>" name="product_image">
                            <input type="hidden" value="<?php echo $product['price_product'] ?>" name="product_price">
                            <input type="hidden" value="1" name="product_quantity">
                                <div class="icons">
                                    <span>
                                    <button style="border:none; background:none;" type="submit" name="addtocart"><i class="fa-solid fa-cart-plus"></i></button>
                                </span>
                                    <span><i class="fa-solid fa-heart"></i></span>
                                    <span><i class="fa-solid fa-share"></i></span>
                                </div>
                                <span class="sale_present">-16%</span>

                                <div class="img_product">
                                    <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $product['image_product'] ?>" alt="">
                                    <?php if (!empty($product_images[$product['id_product']])) { ?>
                                    <div class="product-images">
                                        <?php foreach ($product_images[$product['id_product']] as $index => $image) { ?>
                                            <img class="img_hover" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $image['image_path'] ?>">
                                        <?php } ?>
                                    </div>
                                <?php } else { ?>
                                    <p>No images available.</p>
                                <?php } ?>
                                </div>

                                <h3 class="name_product"><a href="<?php echo BASE_URL ?>/sanpham/details_product/<?php echo $product['id_product'] ?>"><?php echo $product['title_product']; ?></a></h3>

                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <div class="price">
                                    <p><span><?php echo number_format($product['price_product'], 0, ',', '.'); ?> ₫</span></p>

                                </div>
                                </form>
                            </div>
                                
                        <?php } ?>
                    <?php } ?>
                </div>

                <div class="swiper-button-next btn-Swip"></div>
                <div class="swiper-button-prev btn-Swip"></div>
            </div>

            <div class="categ_img">
                <a href="#"><img src="<?php echo BASE_URL ?>/public/img/Banner/banner7.png" alt=""></a>
            </div>
        </div>
    </div>
</section>




    <section class="banner">
        <div class="container">

            <div class="banner_img">
                <div class="glass_hover"></div>
                <a href="#"></a>
                    <img src="<?php echo BASE_URL ?>/public/img/Banner/Banner8.jpg" alt="">
                
            </div>

            <div class="banner_img">
                <div class="glass_hover"></div>
                <a href="#"></a>
                    <img src="<?php echo BASE_URL ?>/public/img/Banner/Banner9.jpg" alt="">
                
            </div>

            <div class="banner_img">
                <div class="glass_hover"></div>
                <a href="#"></a>
                    <img src="<?php echo BASE_URL ?>/public/img/Banner/Banner10.jpg" alt="">
                
            </div>

        </div>
    </section>




    <div class="newsletter">
        <div class="container">
            <div class="text">
                <img src="<?php echo BASE_URL ?>/public/img/icon_email.png" alt="">
                <div class="content">
                    <h4>Đăng ký để nhận được tin tức</h4>
                    <p>Nhận thông tin cập nhật qua email về cửa hàng sản phẩm mới nhất của chúng tôi...và nhận được</p>
                    <h6>Phiếu giảm giá -30% cho lần đầu mua hàng</h6>
                </div>
            </div>

            <form action="" class="newsletter_form">
                <input type="email" placeholder="Nhấn vào email của bạn ở đây...">
                <button type="submit">Đăng ký</button>
            </form>
        </div>
    </div>

