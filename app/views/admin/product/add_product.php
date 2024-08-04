


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
        Thêm sản phẩm
    </h3>
    <form action="<?php echo BASE_URL ?>/product/insert_product" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="#">Tên sản phẩm</label>
            <input type="text" name="title_product" class="form-control" >
        </div>
        <div class="form-group">
            <label for="#">Mã sản phâm</label>
            <input type="text" name="code_product" class="form-control" >
        </div>
        <div class="form-group">
            <label for="#">Hình ảnh sản phẩm</label>
            <input type="file" name="image_product" class="form-control" >
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Hình ảnh sản phẩm phụ</label>
        <input type="file" name="product_images[]" class="form-control" multiple="multiple">
    </div>
        <div class="form-group">
            <label for="#">Gía sản phẩm</label>
            <input type="text" name="price_product" class="form-control" >
        </div>
        
        <div class="form-group">
            <label for="#">Số lượng sản phẩm</label>
            <input type="text" name="quantity_product" class="form-control" >
        </div>
        <div class="form-group" >
            <label for="#">Size</label> 
        
            <input type="checkbox" name="Example-1" value="on" id="Example-1"> 35 
            <input type="checkbox" name="Example-1" value="on" id="Example-1"> 36
            <input type="checkbox" name="Example-1" value="on" id="Example-1"> 37
            <input type="checkbox" name="Example-1" value="on" id="Example-1"> 38
            <input type="checkbox" name="Example-1" value="on" id="Example-1"> 39
            <input type="checkbox" name="Example-1" value="on" id="Example-1"> 40
            <input type="checkbox" name="Example-1" value="on" id="Example-1"> 41
            <input type="checkbox" name="Example-1" value="on" id="Example-1"> 42
            <input type="checkbox" name="Example-1" value="on" id="Example-1"> 43
            <input type="checkbox" name="Example-1" value="on" id="Example-1"> 44
            <input type="checkbox" name="Example-1" value="on" id="Example-1"> 45
       
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Miêu tả sản phẩm</label>
            <textarea id="editor" type="text" name="desc_product" rows="8" style="resize: none; width:100%; font-size:30px" class="form-control" ></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
            <select style="width:100%; height:50px; font-size:25px" class="form-control" name="category_product">
                <?php 
                
                foreach($category as $key => $cate){

                    
                
                ?>
                <option value="<?php echo $cate['id_category_product']?>"> <?php echo $cate['title_category_product'] ?> </option>
                <?php
                }
                
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Sản phẩm hot</label>
            <select style="width:100%; height:50px; font-size:25px" class="form-control" name="product_hot">
                <option value="0">Không</option>
                <option value="1">Có</option>
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