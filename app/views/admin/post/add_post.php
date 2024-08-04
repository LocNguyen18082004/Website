<?php 

    if(!empty($_GET['msg'])){
        $msg = unserialize(urldecode($_GET['msg']));
        foreach ($msg as $key => $value){
            echo '<span style="color:blue;font-weight:bold;position:absolute;left:400px;top:550px;font-size:30px">'.$value.'</span>';
        }
    }

?>


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
        Thêm bài viết
    </h3>
    <form action="<?php echo BASE_URL ?>/post/insert_post" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên bài viết</label>
            <input type="text" name="title_post" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh bài viết</label>
            <input style="border: 1px solid #ccc; width:100%; padding: 20px; " type="file" name="image_post" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Chi tiết bài viết</label>
            <textarea id="editor" type="text" name="content_post" rows="9" style="resize: none; width:100%; font-size:30px" class="form-control" ></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Danh mục Bài viết</label>
            <select style="width:100%; height:50px; font-size:25px" class="form-control" name="category_post">
                <?php 
                
                foreach($category as $key => $cate){

                    
                
                ?>
                <option value="<?php echo $cate['id_category_post']?>"> <?php echo $cate['title_category_post'] ?> </option>
                <?php
                }
                
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
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