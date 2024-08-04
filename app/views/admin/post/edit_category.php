


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
        Cập nhật danh mục sản phẩm
    </h3>
    <?php 
        foreach($categorybyid as $key => $cate) {

        
    ?>
    <form action="<?php echo BASE_URL ?>/post/update_category_post/<?php echo $cate['id_category_post'] ?>" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên Danh mục</label>
            <input type="text" value="<?php echo $cate['title_category_post'] ?>" name="title_category_post" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Miêu tả danh mục</label>
            <textarea type="text" value="<?php echo $cate['title_category_post']?>" name="desc_category_post" rows="5" style="font-size: 30px; resize: none; width:100%" class="form-control">
            <?php echo $cate['desc_category_post']?>
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhập danh mục</button>
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