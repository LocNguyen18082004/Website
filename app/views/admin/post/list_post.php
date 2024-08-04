

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
           Liệt kê Bài viết
        </h3>

        <div class="board">
            <table width="100%">
                <thead>
                    <td>Id</td>
                    <td>Tên sản phẩm</td>
                    <td>Hình ảnh sản phẩm</td>
                    <td>Danh mục sản phẩm</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    <?php 
                    $i = 0;
                    foreach($post as $key => $pos){
                        $i++;
                    
                    ?>
                    <tr>
                        <td class="people">
                            <?php echo $i ?>
                        </td>

                        <td class="people-des">
                            <?php echo $pos['title_post'] ?>
                        </td>

                        <td class="people-des">
                            <img src="<?php echo BASE_URL ?>/public/uploads/post/<?php echo $pos['image_post'] ?>" height="100px" width="100px" alt="">
                        </td>
                        
                        <td class="people-des">
                            <?php echo $pos['title_category_post'] ?>
                        </td>
                        


                        <td class="edit">
                        <a href="<?php echo BASE_URL ?>/post/delete_post/<?php echo $pos['id_post'] ?>">Xóa</a> || 
                        <a href="<?php echo BASE_URL ?>/post/edit_post/<?php echo $pos['id_post'] ?>">Cập nhật</a>
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