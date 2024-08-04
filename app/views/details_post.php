<section id="post">
        <div class="container">
         <?php 
         
            foreach($details_post as $key => $details){


         ?>
            <h3 style="text-align: center; margin-bottom: 20px;"><?php echo $details['title_post'] ?></h3>
            <img width="100%" height="auto" style="" src="<?php echo BASE_URL ?>/public/uploads/post/<?php echo $details['image_post'] ?>" alt="">
            <p><?php echo $details['content_post'] ?></p>
         <?php } ?>
         </div>
    </section>

    <section class="slide slide_sale">
        <div class="container">
           <div class="sale_sec">
              <div class="top_slide">
                 <h2>Những tin tức Liên quan </h2>
              </div>
                  
              <div id="swiper_items_sale" class="products swiper-wrapper">
              <?php  foreach($related as $key => $relate){ ?>
                 <div class="product" style="margin-right: 15px; width: 30%">
                    
                    <h3 class="name_product" style="margin-bottom: 20px;"><a href="<?php echo BASE_URL ?>/tintuc/details_post/<?php echo $relate['id_post'] ?>"><?php echo $relate['title_post'] ?></a></h3>
                    <div class="img_product">
                       <a href="<?php echo BASE_URL ?>/tintuc/details_post/<?php echo $relate['id_post'] ?>"><img src="<?php echo BASE_URL ?>/public/uploads/post/<?php echo $relate['image_post'] ?>" alt=""></a>
                    </div>
                 </div>
                 <?php } ?>
              </div> 
              
           </div>
        </div>
   </section>
