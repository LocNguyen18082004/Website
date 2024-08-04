
<section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <div class="search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>

            <div class="profile">
                <i class="far fa-bell"></i>
                <img src="<?php echo BASE_URL ?>/public/template/img/admin/1.jpg" alt="">
            </div>
        </div>

        <h3 class="i-name">
           Danh sách chi tiết đơn hàng
        </h3>

        <div class="board">
            <table width="100%">
                <thead>
                    <th>ID</th>
                    <th>email</th>
                    <th>Tên người đặt</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Nội dung</th>
                </thead>
                <tbody>
                    <?php 
                    $i = 0;

                    foreach($order_info as $key => $ord){
                        // $total+=$ord['product_quantity']*$ord['price_product'];
                        $i++;
                    
                    ?>
                    <tr style="text-align: center;">
                        <td class="people-des">
                            <?php echo $i ?>
                        </td>

                        <td class="people-des">
                            <?php echo $ord['email'] ?>
                        </td>
                        <td class="people-des">
                            <?php echo $ord['name'] ?>
                        </td>
                        
                        <td class="people-des">
                            <?php echo $ord['address'] ?>
                        </td>
                        <td class="people-des">
                            <?php echo $ord['phone'] ?>
                        </td>
                        <td class="people-des">
                        <?php echo $ord['content'] ?>
                        </td>
                        <td class="edit"></td>
                    </tr>

                    <?php 
                    }
                    
                    ?>
                    
                </tbody>
            </table>
            
        </div>
        <div class="board">
            <table width="100%">
                <thead>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php 
                    $i = 0;
                    $total = 0;
                    foreach($order_details as $key => $ord){
                        $total+=$ord['product_quantity']*$ord['price_product'];
                        $i++;
                    
                    ?>
                    <tr style="text-align: center;">
                        <td class="people-des">
                            <?php echo $i ?>
                        </td>

                        <td class="people-des">
                            <?php echo $ord['title_product'] ?>
                        </td>
                        
                        <td class="people-des">
                            <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $ord['image_product'] ?>" height="300px" width="300px" alt="">
                        </td>
                        <td class="people-des">
                            <?php echo $ord['product_quantity'] ?>
                        </td>
                        <td class="people-des">
                            <?php echo number_format($ord['price_product'],0,',','.').' ₫' ?>
                        </td>
                        <td class="people-des">
                            <?php echo number_format($ord['product_quantity']*$ord['price_product'],0,',','.').' ₫'  ?>
                        </td>
                        <td class="people-des">
                            <?php 
                            if (isset($ord['processed_date']) && !empty($ord['processed_date'])) {
                                echo date('d/m/Y', strtotime($ord['processed_date']));
                            } else {
                                echo 'N/A';
                            }
                            ?>
                        </td>

                        <td class="edit"></td>
                    </tr>

                    <?php 
                    }
                    
                    ?>
                    
                </tbody>
            </table>
            
        </div>
        <form action="<?php echo BASE_URL ?>/order/order_confirm/<?php echo $ord['order_code'] ?>" method="post">
            <div class="total">
                    <input type="submit" name="update_order" value="Đã xử lý">
                    <p>Tổng thành tiền: <span><?php echo number_format($total,0,',','.').' ₫' ?></span></p>
            </div>
        </form>
</section>