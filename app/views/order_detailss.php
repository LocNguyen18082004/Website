<div class="small-container cart-page">
    
        <h2>Chi tiết đơn hàng của bạn <a href="<?php echo BASE_URL ?>/khachang/account" class="button">Quay lại</a></h2>
        
    <table>
       
        <tr>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Mã sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>

        </tr>
            <?php
            $total = 0;
            foreach ($order_details as $detail) { 
                $total+=$detail['product_quantity']*$detail['price_product'];
                ?>
                <tr>
                <td>
                    <img src="<?php echo BASE_URL; ?>/public/uploads/product/<?php echo $detail['image_product']; ?>" alt=""></td>
                    <td><?php echo $detail['title_product']; ?></td>
                    <td style="text-transform: uppercase;"><?php echo $detail['code_product']; ?></td>
                    <td><?php echo $detail['product_quantity']; ?></td>
                    <td><?php echo number_format($detail['price_product'], 0, ',', '.'); ?> ₫</td>
                    <td><?php echo number_format($detail['product_quantity'] * $detail['price_product'], 0, ',', '.'); ?> ₫</td>
                </tr>
            <?php } ?>
        </table>
    <div class="total">
        <p>Tổng thành tiền: <span><?php echo number_format($total,0,',','.').' ₫' ?></span></p>
    </div>
</div>