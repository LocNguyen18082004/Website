

<div class="small-container cart-page">
    <h2>Giỏ hàng của bạn</h2>
    
    <table>
       
        <tr>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Mã sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
            <th>Action</th>

        </tr>
        <?php 
            if(isset($_SESSION['shopping_cart'])){
        
        ?>
    <form action="<?php echo BASE_URL ?>/giohang/updategiohang" method="POST">
        <?php 
            $total = 0;
            foreach($_SESSION['shopping_cart'] as $key => $value){
                $product_quantity = isset($value['product_quantity']) ? intval($value['product_quantity']) : 0;
                $product_price = isset($value['product_price']) ? floatval($value['product_price']) : 0.0;
                $subtotal = $product_quantity * $product_price;
                $total += $subtotal;
                
        ?>
        <tr>
            <td>
                <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $value['product_image'] ?>" alt="">
            </td>
            <td><?php echo $value['product_title'] ?></td>
            <td style="text-transform: uppercase;"><?php echo $value['product_code'] ?></td>
            <td>
                    <input type="number" min="1" name="qty[<?php echo $value['product_id'] ?>]" value="<?php echo $value['product_quantity'] ?>">
                    
            </td>
            <td><?php echo number_format($value['product_price'],0,',','.').' ₫' ?></td>
            <td><?php echo number_format($subtotal,0,',','.').' ₫' ?></td>
            <td>                
                <button class="delete" type="submit" value="<?php echo $value['product_id'] ?>" name="delete_cart">Xóa</button>
                <button class="update" type="submit" value="Cập nhật" name="update_cart">Cập nhật</button>

            </td>
        </tr>
            
        <?php 
        }
        ?>
        </form>
        <?php 
    }
    ?>
    </table>
    <div class="total">
        <a href="<?php echo BASE_URL ?>/sanpham/all"><strong>>> Tiếp tục mua hàng</strong></a>
        <a href="<?php echo BASE_URL ?>/giohang/dathang"><button type="submit">Tiếp tục đặt hàng</button></a>
        <p>Tổng thành tiền: <span><?php echo number_format($total,0,',','.').' ₫' ?></span></p>
        </div>
    
</div>