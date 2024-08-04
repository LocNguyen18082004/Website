<?php 

    if(!empty($_GET['msg'])){
        $msg = unserialize(urldecode($_GET['msg']));
        foreach ($msg as $key => $value){
            echo '<div id="product"><span style="font-size:25px">'.$value.'</span></div>';
        }
    }
?> 
<section class="account-info">
    <div class="account-details">
        <h4>Thông tin tài khoản</h4>
        <p>Xin chào, <span><?php echo isset($customer['customer_name']) ? $customer['customer_name'] : 'Chưa cập nhật'; ?></span></p>
        <h2>Thông tin khách hàng</h2>
        <p><i class="fa-solid fa-user"></i> Họ và Tên: <?php echo isset($customer['customer_name']) ? $customer['customer_name'] : 'Chưa cập nhật'; ?></p>
        <p><i class="fa-solid fa-phone"></i>Số điện thoại: <?php echo isset($customer['customer_phone']) ? $customer['customer_phone'] : 'Chưa cập nhật'; ?></p>
        <p><i class="fa-solid fa-location-dot"></i>Địa chỉ: <?php echo isset($customer['customer_address']) ? $customer['customer_address'] : 'Chưa cập nhật'; ?></p>
        <a href="<?php echo BASE_URL ?>/khachang/account_update" class="btn">Sửa thông tin</a>
    </div>
    
    <div class="order-details">
    <h2>Đơn hàng của bạn</h2>
    <?php if(isset($customer_orders) && is_array($customer_orders) && !empty($customer_orders)) { ?>
    <table class="carten">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>   
                <th>Tình trạng</th>
                <th>Chi tiết đơn hàng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($customer_orders as $order) { ?>
                <tr>
                    <td><?php echo $order['order_code']; ?></td>
                    <td><?php echo $order['order_date']; ?></td>
                    <td><?php echo $order['order_status'] == 1 ? 'Đã xử lý' : 'Chưa xử lý'; ?></td>
                    <td><a href="<?php echo BASE_URL ?>/khachang/order_details/<?php echo $order['order_code']; ?>">Xem chi tiết</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } else { ?>
        <p>Không có đơn hàng nào cho khách hàng này.</p>
    <?php } ?>
</div>
</section>
