<section class="slide slide_sale">
   <div class="container">
      <div class="sale_sec mySwiper">
         <div class="top_slide">
            <h2>Kết quả tìm kiếm cho "<?php echo $data['keyword']; ?>"</h2>
         </div>
         <?php if (!empty($data['products'])){ ?>
         <div id="swiper_items_sale" class="products swiper-wrapper">
         <?php foreach ($data['products'] as $product){ ?>
            <div class="product swiper-slide">
            
               
               <form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="post">
                  <input type="hidden" value="<?php echo $product['id_product'] ?>" name="product_id">
                  <input type="hidden" value="<?php echo $product['title_product'] ?>" name="product_title">
                  <input type="hidden" value="<?php echo $product['code_product']?>" name="product_code">
                  <input type="hidden" value="<?php echo $product['image_product'] ?>" name="product_image">
                  <input type="hidden" value="<?php echo $product['price_product'] ?>" name="product_price">
                  <input type="hidden" value="1" name="product_quantity">
                  <div class="icons">
                     <span >
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
                                    <img class="img_hover" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $image['image_path'] ?>" >
                                <?php } ?>
                            </div>
                        <?php } else { ?>
                            <p>No images available.</p>
                        <?php } ?>
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
               </form>
            </div>
            <?php } ?>
         </div>
         <?php }else{ ?>
         <p style="margin-bottom:50px; padding:20px">Không tìm thấy sản phẩm nào.</p>
         <?php } ?>
      </div>
   </div>
</section>







   </div>
        