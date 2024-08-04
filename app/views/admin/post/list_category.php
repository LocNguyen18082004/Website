
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
           Danh sách danh mục bài viết
        </h3>

        <div class="board">
            <table width="100%">
                <thead>
                    <td>Id</td>
                    <td>Tên danh mục</td>
                    <td>Mô tả</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    <?php 
                    $i = 0;
                    foreach($category as $key => $cate){
                        $i++;
                    
                    ?>
                    <tr>
                        <td class="people">
                            <?php echo $i ?>
                        </td>

                        <td class="people-des">
                            <?php echo $cate['title_category_post'] ?>
                        </td>
                        
                        <td class="people-des">
                        <?php echo $cate['desc_category_post'] ?>
                        </td>

                        <td class="edit"><a href="<?php echo BASE_URL ?>/post/delete_category/<?php echo $cate['id_category_post'] ?>">Xóa</a> || <a href="<?php echo BASE_URL ?>/post/edit_category/<?php echo $cate['id_category_post'] ?>">Cập nhật</a></td>
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