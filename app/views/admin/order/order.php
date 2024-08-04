
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
           Danh sách đơn hàng 
        </h3>

        <div class="board">
            <table width="100%">
                <thead>
                    <td>Id</td>
                    <td>Mã đơn hàng</td>
                    <td>Ngày đặt</td>
                    <td>Trình trạng đơn hàng</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    <?php 
                    $i = 0;
                    foreach($order as $key => $ord){
                        $i++;
                    
                    ?>
                    <tr>
                        <td class="people">
                            <?php echo $i ?>
                        </td>

                        <td class="people-des">
                            <?php echo $ord['order_code'] ?>
                        </td>
                        
                        <td class="people-des">
                            <?php echo $ord['order_date'] ?>
                        </td>
                        <td class="people-des">
                        <?php echo $ord['order_status'] == 0 ? 'đơn hàng mới' : 'đã xử lý' ?>
                        </td>

                        <td class="edit"><a href="<?php echo BASE_URL ?>/order/order_details/<?php echo $ord['order_code'] ?>">Xem chi tiết đơn hàng</a></td>
                    </tr>

                    <?php 
                    }
                    
                    ?>
                </tbody>
            </table>
        </div>
        <?php 

if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
        echo '<div id="product">
            <span style="font-size:25px">'.$value.'</span>
        </div>';
    }
}

?>                
</section>
