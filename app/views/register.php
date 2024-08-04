<section class="signin sec_form">
        <div class="form_container">
            <p class="title">Chào mừng bạn đã trở lại</p>
       

            <form action="<?php echo BASE_URL ?>/khachang/insert_dangky" method="post" class="form">

                <input type="text" name="name" required placeholder="Họ và tên">
                <input type="text" name="email" required placeholder="Email">
                <input type="text" name="phone" required placeholder="Số điện thoại">
                <input type="text" name="password" required placeholder="password">

                <button name="đăng ký" class="form-btn">Đăng ký</button>
                
            </form>

            <p class="sign-up-label">
                Có tài khoản? <a href="#" class="sign-up-link">Đăng nhập</a>
            </p> 
            <?php 

if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
        echo '<div id="product">
            <span style="font-size:20px;">'.$value.'</span>
            </div>';
    }
}

?>

            <div class="buttons-container">
                <div class="facebook-login-button">
                    <i class="fa-brands fa-facebook"></i> 
                    <span>Đăng ký bằng Facebook</span>
                </div>

                <div class="google-login-button">
                    <i class="fa-brands fa-google"></i>
                    <span>Đăng ký bằng Google</span>
                </div>
            </div>
            



        </div>
        
    </section>
    