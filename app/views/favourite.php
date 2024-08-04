<section class="slide slide_sale">
    <div class="container">
        <div class="sale_sec mySwiper">
            <div class="top_slide">
                <h2>Sản phẩm yêu thích của bạn</h2>
            </div>
            
            <div id="swiper_items_sale" class="products swiper-wrapper">
                <?php if (!empty($favourite_products)) { ?>
                    <?php foreach($favourite_products as $product) { ?>
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
                            </form>
                                    <span>
                                    <form action="<?php echo BASE_URL ?>/favourite/addFavourite" method="post">
                                        <input type="hidden" value="<?php echo $product['id_product'] ?>" name="product_id">
                                        <input type="hidden" value="<?php echo $_SESSION['customer_id']; ?>" name="customer_id"> <!-- Thêm ID khách hàng -->
                                    </form>
                                    </span>
                                    
                                    <span><i class="fa-solid fa-share"></i></span>
                                </div>
                                <span class="sale_present">-16%</span>

                                <div class="img_product">
                                    <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $product['image_product'] ?>" alt="">
                                    <?php 
                                    $product_images = $categorymodel->get_product_images('tbl_product_images', $product['id_product']);
                                    if (!empty($product_images) && is_array($product_images)) {
                                        $main_image = $product_images[0]; // Lấy hình ảnh đầu tiên
                                    ?>
                                        <img id="hoverImage" class="img_hover" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $main_image['image_path'] ?>" alt="Hover Image">
                                    <?php } else {
                                        echo "No images available.";
                                    } ?>
                                </div>

                                <h3 class="name_product"><a href="<?php echo BASE_URL ?>/sanpham/details_product/<?php echo $product['id_product'] ?>"><?php echo $product['title_product'] ?></a></h3>

                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <div class="price">
                                    <p><span><?php echo number_format($product['price_product'],0,',','.').' ₫' ?></span></p>
                                    <p class="old_price">1320000 ₫</p>
                                </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p>Không có sản phẩm yêu thích nào.</p>
                <?php } ?>
            </div>
            
            <div class="swiper-button-next btn-Swip"></div>
            <div class="swiper-button-prev btn-Swip"></div>
        </div>
    </div>
</section>
