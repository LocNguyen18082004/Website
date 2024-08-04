

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

<section id="form">
    <h3 class="my-name">
        Cập nhật sản phẩm
    </h3>
    <?php 
        foreach($postbyid as $key => $pos){


    
    ?>
    <form action="<?php echo BASE_URL ?>/post/update_post/<?php echo $pos['id_post'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên sản phẩm</label>
            <input type="text" value="<?php echo $pos['title_post'] ?>" name="title_post" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
            
            <input  type="file" name="image_post" class="form-control" >
            <p><img src="<?php echo BASE_URL ?>/public/uploads/post/<?php echo $pos['image_post'] ?>" height="100px" width="100px" alt=""></p>
        </div>
        <div class="form-group">
            <label  for="exampleInputPassword1">Miêu tả danh mục</label>
            <textarea id="editor" type="text" name="content_post" rows="8" style="resize: none; width:100%; font-size:30px" class="form-control" ><?php echo $pos['content_post'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
            <select style="width:100%; height:50px; font-size:25px"  class="form-control" name="category_post">
                <?php 
                foreach($category_post as $key => $cate){
                ?>
                <!-- toán tử ba ngôi -->
                <option
                
                <?php  if($pos['id_category_post']==$cate['id_category_post']){
                    echo 'selected';
                }
                ?>

                value="<?php echo $cate['id_category_post']?>"> <?php echo $cate['title_category_post'] ?> </option>
                <?php
                }
                
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
    </form>
    <?php 
        }
    ?>
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