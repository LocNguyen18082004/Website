<?php 
   $name = 'Danh mục chưa có tên';
   foreach ($category_by_id as $key => $product_name) {
   $name = $product_name['title_category_product'];

   }
?>   
      


<div class="top_page">
   <div class="container">
      <h1>Trải nghiệm sự êm ái và thoải mái trên từng bước đi của bạn với Chúng tôi SOFT TIME</h1>
      <p>Tìm mọi thứ bạn cần để biến những điều khó chịu của cuộc sống thành điều tuyệt vời. Cửa hàng Soft Time của chúng tôi cung cấp nhiều loại giày với độ êm ái và chất lượng nhất phù hợp với nhu cầu của bạn</p>
   </div>
</div>
   

<section class="all_products">
   
      <div id="product"><h2><?php echo $name ?></h2></div> 
   
      <div class="container">
         <span class="btn_filter" onclick="open_close_filter()">
         Filter <i class="fa-solid fa-filter"></i>
         </span>
         <div class="filter">
            <h2>filter</h2>
            <div class="filter_item">
               <h4>Brands</h4>
               <div class="content">
               <form action="<?php echo BASE_URL ?>/sanpham/filter_category" method="get">
               <?php foreach($category as $key => $cate){ ?>
                  <div class="item">
                        <span style="color: #333;"><?php echo $cate['title_category_product']; ?></span>
                        <input type="checkbox" name="categories[]" value="<?php echo $cate['id_category_product']; ?>">
                        
                  </div>
               <?php } ?>
               <button style="margin-top:20px; padding:10px 5px; background:#333; color:white; cursor: pointer;" type="submit">Tìm kiếm</button>
            </form>
                  
               </div>
            </div>
         </div>
         <div id="products_dev" class="products_dev">

            <?php foreach($category_by_id as $key => $product)  {
               
               ?>
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
                  <p><span><?php echo number_format($product['price_product'],0,',','.').'₫'  ?></span></p>
               </div>
            </form>
            </div>
               <?php } ?>
         </div>
      </div>
      
      <div class="pagination">
    <?php
    $total_pages = ceil($total_products / $limit);
    $prev_page = max(1, $page - 1); // Không cho phép nhỏ hơn 1
    $next_page = min($total_pages, $page + 1); // Không cho phép lớn hơn tổng số trang
    ?>
    
    <!-- Nút Prev -->
    <a href="?page=<?php echo $prev_page; ?>" class="btn_page prev <?php echo ($page == 1) ? 'disabled' : ''; ?>">
        <i class="fa-solid fa-backward-step"></i>
    </a>
    
    <!-- Liên kết trang -->
    <?php for ($i = 1; $i <= $total_pages; $i++){ ?>
        <a href="?page=<?php echo $i; ?>" class="num_page <?php echo ($i == $page) ? 'active' : ''; ?>">
            <?php echo $i; ?>
        </a>
    <?php } ?>
    
    <!-- Nút Next -->
    <a href="?page=<?php echo $next_page; ?>" class="btn_page next <?php echo ($page == $total_pages) ? 'disabled' : ''; ?>">
        <i class="fa-solid fa-forward-step"></i>
    </a>
</div>
   
</section>