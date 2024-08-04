<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the comment insertion
    $author = htmlspecialchars($_POST['author_comment']);
    $content = htmlspecialchars($_POST['content_comment']);
    $id_product = htmlspecialchars($_POST['id_product']);
    
    $result = $commentModel->insertComment($author, $content, $id_product);

    if ($result) {
        // Redirect to the product details page with an anchor
        header('Location: ' . BASE_URL . '/sanpham/details_product/' . $id_product . '#commentsSection');
        exit();
    } else {
        echo "Có lỗi xảy ra khi gửi bình luận.";
    }
}
?>


<?php 
   foreach($details_product as $key => $value) {
      $name_product = $value['title_product'];
      $name_category_product = $value['title_category_product'];
      $id_cate = $value['id_category_product'];
   }
?>
<?php 
   foreach($details_product as $key => $details){
?>
<div class="item_detail">
   <form action="<?php echo BASE_URL ?>/giohang/themgiohang" method="post">
         <input type="hidden" value="<?php echo $details['id_product'] ?>" name="product_id">
         <input type="hidden" value="<?php echo $details['title_product'] ?>" name="product_title">
         <input type="hidden" value="<?php echo $details['code_product']?>" name="product_code">
         <input type="hidden" value="<?php echo $details['image_product'] ?>" name="product_image">
         <input type="hidden" value="<?php echo $details['price_product'] ?>" name="product_price">
         <input type="hidden" value="1" name="product_quantity" id="product_quantity<?php echo $details['id_product']; ?>">
   <div class="container">
      <div class="img_item">
         <div class="big_img">
            <img id="bigImg" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $details['image_product'] ?>" alt="">
         </div>
         <div class="sm_imgs">
            <?php if (!empty($product_images)) {
               foreach($product_images as $img) { ?>
                     <img onclick="ChangeItemImage(this.src)" src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $img['image_path'] ?>" alt="">
               <?php }
            } else {
               echo "No images available.";
            } ?>
         </div>
      </div>
      <div class="details_item">
         <h1 class="name"><?php echo $details['title_product'] ?></h1>
         <div class="stars">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
         </div>
         <div class="price">
            <p><span><?php echo number_format($details['price_product'],0,','.',') ?> VNĐ </span></p>
            <!-- <p class="old_price">1.300.000 VNĐ</p> -->
         </div>
         <h5>Sẵn có: <span>Trong kho</span></h5>
         <h5>Mã: <span style="text-transform: uppercase;"><?php echo $details['code_product'] ?></span> </h5>
         <div class="uu-dai">
            <h2><i style="color: red;" class="fa-solid fa-gift"></i> ƯU ĐÃI</h2>
            <ul>
               <li><i style="color: #16C60C;" class="fa-solid fa-check check"></i> Tặng 1 đôi vớ SoftTime(vớ SoftTime dài nhiều màu hoặc vớ SoftTime ngắn)</li>
               <li><i style="color: #16C60C;" class="fa-solid fa-check check"></i> Sản phẩm cam kết chính hãng</li>
               <li><i style="color: #16C60C;" class="fa-solid fa-check check"></i> Thanh toán sau khi kiểm tra và nhận hàng</li>
               <li><i style="color: #16C60C;" class="fa-solid fa-check check"></i>  Bảo hành chính hãng theo nhà sản xuất (Trừ hàng nội địa, xách tay)</li>
            </ul>
         <div class="bott">
            <h3><i style="color: red;" class="fa-solid fa-gifts"></i> Ưu đãi thêm khi mua sản phẩm tại <span style="color: #16C60C;">SoftTime Premium</span></h3>
            <ul>
               <li><i style="color: #fff; border:2px solid #333; background:#16C60C;" class="fa-solid fa-check check"></i> Sơn màu mè miễn phí</li>
               <li><i style="color: #fff; border:2px solid #333; background:#16C60C;" class="fa-solid fa-check check"></i> Bảo hành Gìay trong 72 giờ</li>
               <li><i style="color: #fff; border:2px solid #333; background:#16C60C;" class="fa-solid fa-check check"></i> Rửa giày miễn phí trọn đời</li>
               <li><i style="color: #fff; border:2px solid #333; background:#16C60C;" class="fa-solid fa-check check"></i> Tích lũy điểm thành viên Premium</li>
               <li><i style="color: #fff; border:2px solid #333; background:#16C60C;" class="fa-solid fa-check check"></i> Voucher giảm giá cho lần mua hàng tiếp theo</li>
            </ul>
         </div>
            </div>
         <div class="quantity-container">
            <button type="button" class="btn" onclick="decreaseQuantity(<?php echo $details['id_product']; ?>)">-</button>
               <span  span class="quantity" id="quantity<?php echo $details['id_product']; ?>">1</span>
            <button type="button" class="btn" onclick="increaseQuantity(<?php echo $details['id_product']; ?>)">+</button>
            
         </div>
         <h4>Hãy nhanh tay lên! Chỉ còn <?php echo $details['quantity_product'] ?> sản phẩm trong kho.</h4>
         <button name="addtocart" >Thêm vào giỏ hàng <i class="fa-solid fa-cart-arrow-down"></i></button>
         <div class="icons">
            <span><i class="fa-regular fa-heart"></i></span>
            <span><i class="fa-solid fa-sliders"></i></span>
            <span><i class="fa-solid fa-print"></i></span>
            <span><i class="fa-solid fa-share-nodes"></i></span>
         </div>
      </div>
   
   </div>
   </form>
</div>
<script>
function decreaseQuantity(productId) {
    const quantitySpan = document.getElementById('quantity' + productId);
    const quantityInput = document.getElementById('product_quantity' + productId);
    let currentQuantity = parseInt(quantitySpan.textContent);
    if (currentQuantity > 1) {
        currentQuantity--;
        quantitySpan.textContent = currentQuantity;
        quantityInput.value = currentQuantity;
    }
}

function increaseQuantity(productId) {
    const quantitySpan = document.getElementById('quantity' + productId);
    const quantityInput = document.getElementById('product_quantity' + productId);
    let currentQuantity = parseInt(quantitySpan.textContent);
    currentQuantity++;
    quantitySpan.textContent = currentQuantity;
    quantityInput.value = currentQuantity;
}
</script>
<?php } ?>
<div class="description">
   <div class="container">
      <div class="big_details">
         <h3>MÔ TẢ SẢN PHẨM</h3>
         <div class="gioithieu"> 
            <?php echo $details['title_product'] ?>
         </div>
         <p style="text-align: justify; margin-top: 20px;">
            <span style="font-size: 16px;">
               <p><?php echo $details['desc_product'] ?><p></p>
            </span>
         </p>
      </div>
   </div>
</div>

<section>
    <h2>Add a Comment</h2>
    <form id="commentForm" action="<?php echo BASE_URL ?>/sanpham/details_product/<?php echo $details['id_product']; ?>" method="post" onsubmit="scrollToComments();">
        <input type="hidden" name="id_product" value="<?php echo htmlspecialchars($details['id_product']); ?>">
        <label for="author_comment">Author:</label>
        <input type="text" name="author_comment" id="author_comment" required>
        <br>
        <label for="content_comment">Comment:</label>
        <textarea name="content_comment" id="content_comment" required></textarea>
        <br>
        <button type="submit">Add Comment</button>
    </form>

    <h2>Comments</h2>
    <div id="commentsSection">
        <?php if (!empty($comment)): ?>
            <ul>
                <?php foreach ($comment as $comment_item): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($comment_item['author_comment']); ?>:</strong>
                        <p><?php echo htmlspecialchars($comment_item['content_comment']); ?></p>
                        <small><?php echo date('F j, Y, g:i a', strtotime($comment_item['created_at'])); ?></small>
                        <a href="<?php echo BASE_URL; ?>/binhluan/delete/<?php echo $comment_item['id_comment']; ?>?id_product=<?php echo $details['id_product']; ?> "onclick="deleteComment(<?php echo $comment_item['id_comment']; ?>, <?php echo $details['id_product']; ?>); ">Delete</a>
                     </li>
                    
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No comments yet.</p>
        <?php endif; ?>
    </div>
</section>

<script>
   function deleteComment(commentId, productId) {
    var formData = new FormData();
    formData.append('id_comment', commentId);
    formData.append('id_product', productId);

    fetch('<?php echo BASE_URL; ?>/binhluan/delete', {
        method: 'POST',
        body: formData
    }).then(response => {
        if (response.ok) {
            // After successful deletion, reload the page and scroll to the comments section
            window.location.hash = 'commentsSection';
            location.reload();
        } else {
            alert('Failed to delete comment.');
        }
    });
}
    function scrollToComments() {
        // Prevent the default form submission
        event.preventDefault();

        // Submit the form
        var form = document.getElementById('commentForm');
        var formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        }).then(response => {
            if (response.ok) {
                // After successful submission, scroll to the comments section
                window.location.hash = 'commentsSection';
                // Reload the page to show the new comment
                location.reload();
            } else {
                alert('Failed to submit comment.');
            }
        });
    }


</script>


<section class="slide slide_sale">
   <div class="container">
      <div class="sale_sec mySwiper">
         <div class="top_slide">
            <h2>Sản phẩm <span>liên quan</span></h2>
         </div>
         <div id="swiper_items_sale" class="products swiper-wrapper">
            <?php  foreach($related as $key => $relate){ ?>
            <div class="product swiper-slide">
               <div class="icons">
                  <span><i class="fa-solid fa-cart-plus"></i></span>
                  <span><i class="fa-solid fa-heart"></i></span>
                  <span><i class="fa-solid fa-share"></i></span>
               </div>
               <div class="img_product">
                  <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $relate['image_product'] ?>" alt="">
                  <img class="img_hover" src="<?php echo BASE_URL ?>/public/img/Product/Lining1.2.jpg" alt="">
               </div>
               <h3 class="name_product"><a href="<?php echo BASE_URL ?>/sanpham/details_product/<?php echo $relate['id_product'] ?>"><?php echo $relate['title_product'] ?></a></h3>
               <div class="stars">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
               </div>
               <div class="price">
                  <p><span><?php echo number_format($relate['price_product'],0,',','.').'₫'  ?></span></p>
                  <p class="old_price">1320000 ₫</p>
               </div>
            </div>
            <?php } ?>
         </div>
         <div class="swiper-button-next btn-Swip"></div>
         <div class="swiper-button-prev btn-Swip"></div>
      </div>
   </div>
</section>
