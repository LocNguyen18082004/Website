


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
        Thêm danh mục sản phẩm
    </h3>
    <form action="<?php echo BASE_URL ?>/product/insert_category" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên Danh mục</label>
            <input type="text" name="title_category_product" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Miêu tả danh mục</label>
            <input type="text" name="desc_category_product" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
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