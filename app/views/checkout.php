<section class="checkout">

                <?php 

                if(!empty($_GET['msg'])){
                    $msg = unserialize(urldecode($_GET['msg']));
                    foreach ($msg as $key => $value){
                        echo '<div id="product"><span style="font-size:25px">'.$value.'</span></div>';
                    }
                }

                ?> 
<?php 

if (isset($_SESSION['customer'])) {
    $name = $_SESSION['customer_name'];
    $email = $_SESSION['customer_email'];
    $phone = $_SESSION['customer_phone'];
} else {
    $name = '';
    $email = '';
    $phone = '';
}

?>
<div class="container">
    <form autocomplete="off" method="post" action="<?php echo BASE_URL ?>/giohang/thanhtoan">
        <div class="address">
            <h2>Địa chỉ giao hàng</h2>
            <div class="inputs">
                <label for="">Email <strong style="color: red;">*</strong></label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($postData['email']); ?>" placeholder="Email">

                <label for="">Họ và Tên <strong style="color: red;">*</strong></label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($postData['name']); ?>" placeholder="Họ và tên">

                <label for="">Địa chỉ <strong style="color: red;">*</strong></label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($postData['address']); ?>" placeholder="Địa chỉ">

                <label for="">Số điện thoại <strong style="color: red;">*</strong></label>
                <input type="text" name="phone" value="<?php echo htmlspecialchars($postData['phone']); ?>" placeholder="Số điện thoại">

                <label for="">Nội dung <strong style="color: red;">*</strong></label>
                <textarea rows="10" name="content" id=""><?php echo htmlspecialchars($content ?? ''); ?></textarea>
            </div>
        </div>

        <div class="payment-method">
            <h2>Phương thức thanh toán</h2>
            <div class="inputs">
                <div class="payment-option">
                    <label style="font-size: 20px;" for="payment-cash">Thanh toán khi nhận hàng <i style="font-size: 20px;" class="fa-regular fa-money-bill-1"></i></label>
                    <input style="margin-bottom:8px;" type="radio" id="payment-cash" name="payment_method" value="cash">
                </div>
                <div class="payment-option">
                    
                    <label style="font-size: 20px;" for="payment-bank">Chuyển khoản ngân hàng <i class="fa-solid fa-building-columns"></i></label>
                    <input style="margin-bottom:8px;" type="radio" id="payment-bank" name="payment_method" value="bank">
                    <div id="bank-info" class="bank-info" style="display: none;">
                        <p >Ngân hàng: <strong style="color: #333;">TP BANK</strong></p>
                        <p>Số TK: <strong style="color: #333;">00003716314</strong></p>
                        <p>Chủ TK: <strong style="color: #333;">Nguyễn Đức Lộc</strong></p>
                        <img style="width: 200px; align-items:center;" src="<?php echo BASE_URL ?>/public/img/payment/TP.jpg" alt="QR Code" style="width: 100px; height: 100px;">
                        <p>(Nội dung chuyển khoản: Tên + Số ĐT đặt hàng)</p>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="coupon">
            <h2>Phiếu giảm giá</h2>
            <div class="inputs">
                <label for="">Phiếu giảm giá</label>
                <input type="text" placeholder="Nhập Phiếu giảm giá vào (Nếu có)">
            </div>
        </div>

        <div class="shipping-code">
            <h2>Mã vận chuyển</h2>
            <div class="inputs">
                <label for="shipping-code">Nhập mã vận chuyển</label>
                <input type="text" name="shipping_code" id="shipping-code" placeholder="Nhập mã vận chuyển vào (Nếu có)">
            </div>
        </div>

        <div class="button_div">
            <button>Đặt hàng</button>
        </div>
    </form>

    <div class="ordersummary">
    <h1>Order Summary</h1>
    <div class="items">
        <?php if(isset($data['cart']) && !empty($data['cart'])){ ?>
            <?php foreach($data['cart'] as $item){ ?>
                <div class="item_cart">
                    <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $item['product_image'] ?>" alt="">
                    <div class="content">
                        <h4><?php echo $item['product_title']; ?></h4>
                        <p>Mã: <span style="text-transform: uppercase"><?php echo $item['product_code']; ?></span></p>
                        <p>Quantity: <?php echo $item['product_quantity']; ?></p>

                        <p class="price_cart">Price: <span><?php echo number_format($item['product_price'], 0, ',', '.'); ?> ₫</span></p>
                        
                    </div>
                </div>
            <?php } ?>
            <div class="total">
                <p>Tổng: </p>
                <span>
                    <?php echo number_format($data['total'], 0, ',', '.'); ?> ₫
                </span>
            </div>
        <?php }else{ ?>
            <p>Your cart is empty.</p>
        <?php } ?>
    </div>
</div>

</div>

        
       
    </section>

    

    