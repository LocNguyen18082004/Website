<?php
    $name = 'Danh mục chưa có tên';
    foreach($postbyid as $key => $post_name ) {

        $name = $post_name['title_category_post'];
    }
?>


<section id="post">
  
    <h2><?php echo $name ?></h2>
    
        <div class="container">
            <?php foreach($postbyid as $key => $post ) {

                ?>
            <div class="post">
                <a href="<?php echo BASE_URL ?>/tintuc/details_post/<?php echo $post['id_post'] ?>">
                    <img src="<?php echo BASE_URL ?>/public/uploads/post/<?php echo $post['image_post'] ?>" alt="5 công cụ giám sát cơ sở hạ tầng CNTT tốt nhất" width="200" height="200">
                </a>
                <div>
                    <h3><a href="<?php echo BASE_URL ?>/tintuc/details_post/<?php echo $post['id_post'] ?>"><?php echo $post['title_post'] ?></a></h3>
                    <p><?php echo substr($post['content_post'],0,200) ?></p>
                    <p class="time"><a href="<?php echo BASE_URL ?>/tintuc/details_post/<?php echo $post['id_post'] ?>">Xem Thêm <i class="fa-solid fa-chevron-right"></i></a></p>
                </div>
            </div>
            <?php } ?>
        </div>
</section>