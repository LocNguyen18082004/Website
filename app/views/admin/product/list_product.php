

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
           Liệt kê sản phẩm
        </h3>

        <div class="board">
            <table width="100%">
                <thead>
                    <td>Mã</td>
                    <td>Tên sản phẩm</td>

                    <td>Hình ảnh sản phẩm</td>
                    <td>Danh mục sản phẩm</td>
                    <td>Giá sản phẩm</td>
                    <td>Số lượng sản phẩm</td>
                    <td>Sản phẩm hot</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    <?php 

                    foreach($product as $key => $pro){

                    
                    ?>
                    <tr>
                        <td class="people" style="text-transform: uppercase; padding-top: 25px;">
                            <?php echo $pro['code_product'] ?>
                        </td>

                        <td class="people-des">
                            <?php echo $pro['title_product'] ?>
                        </td>

                        <td class="people-des">
                            <img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $pro['image_product'] ?>" height="100px" width="100px" alt="">
                        </td>
                        <td class="people-des">
                            <?php echo $pro['title_category_product'] ?>
                        </td>
                        <td class="people-des">
                            <?php echo number_format($pro['price_product'],0,',','.').' ₫'  ?>
                        </td>
                        <td class="people-des">
                            <?php echo $pro['quantity_product'] ?>
                        </td>
                        <td class="people-des">
                            <?php  if($pro['product_hot']==0){
                                    echo 'Không có';
                                }else{
                                    echo 'có';
                                } 
                            ?>
                        </td>


                        <td class="edit">
                        <a href="<?php echo BASE_URL ?>/product/delete_product/<?php echo $pro['id_product'] ?>">Xóa</a> || 
                        <a href="<?php echo BASE_URL ?>/product/edit_product/<?php echo $pro['id_product'] ?>">Cập nhật</a>
                        </td>
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