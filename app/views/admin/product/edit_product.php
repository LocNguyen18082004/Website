
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
     if (!empty($productbyid['product'])) {
        $pro = $productbyid['product'];
    ?>
     <form action="<?php echo BASE_URL ?>/product/update_product/<?php echo $pro['id_product'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Tên sản phẩm</label>
            <input type="text" value="<?php echo $pro['title_product'] ?>" name="title_product" class="form-control" >
        </div>
        <div class="form-group">
            <label for="#">Mã sản phẩm</label>
            <input type="text" value="<?php echo $pro['code_product'] ?>" name="code_product" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
            <input type="file" name="image_product" class="form-control" >
            <p><img src="<?php echo BASE_URL ?>/public/uploads/product/<?php echo $pro['image_product'] ?>" height="100px" width="100px" alt=""></p>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh sản phẩm phụ</label>
            <input type="file" name="product_images[]" class="form-control" multiple="multiple">
            <div>
                <?php
                if(!empty($productbyid['images'])){
                    foreach($productbyid['images'] as $image){
                        echo '<img src="'.BASE_URL.'/public/uploads/product/'.$image['image_path'].'" height="100px" width="100px" alt="">';
                    }
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Gía sản phẩm</label>
            <input type="text" value="<?php echo $pro['price_product'] ?>" name="price_product" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Số lượng sản phẩm</label>
            <input type="text" value="<?php echo $pro['quantity_product'] ?>" name="quantity_product" class="form-control" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Miêu tả sản phẩm</label>
            <textarea id="editor" type="text" name="desc_product" rows="8" style="resize: none; width:100%; font-size:30px" class="form-control" ><?php echo $pro['desc_product'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
            <select style="width:100%; height:50px; font-size:25px"  class="form-control" name="category_product">
                <?php 
                foreach($category as $key => $cate){
                ?>
                <option
                <?php  if($pro['id_category_product']==$cate['id_category_product']){
                    echo 'selected';
                }
                ?>
                value="<?php echo $cate['id_category_product']?>"> <?php echo $cate['title_category_product'] ?> </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Sản phẩm hot</label>
            <select style="width:100%; height:50px; font-size:25px" class="form-control" name="product_hot">
                <?php
                    if($pro['product_hot']==0){
                ?>
                <option selected value="0">Không</option>
                <option value="1">Có</option>
                <?php
                    }else{
                ?>
                <option value="0">Không</option>
                <option selected value="1">Có</option>
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
