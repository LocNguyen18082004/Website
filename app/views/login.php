<section class="signin sec_form">
        <div class="form_container">
            <p class="title">Chào mừng bạn đã trở lại</p>
       

            <form autocomplete="off" action="<?php echo BASE_URL ?>/khachang/login_customer" class="form" method="post">
                <input type="text" name="username" required placeholder="Email">
                <input type="password" name="password" required placeholder="Password">
                <span class="sig">     
                    <p>Không có tài khoản <a href="#" class="sign-up-link">Đăng ký</a></p>
                    <span><a href="#" class="page-links-label">Quên mật khẩu</a></span>
                </span>
                <button name="dangnhap" class="form-btn">Login</button>
            </form>

            
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
                    <span>Đăng nhập bằng Facebook</span>
                </div>

                <div class="google-login-button">
                    <i class="fa-brands fa-google"></i>
                    <span>Đăng nhập bằng Google</span>
                </div>
            </div>




        </div>
    </section>