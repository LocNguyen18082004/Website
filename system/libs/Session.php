<?php 

class Session{

    public static function init(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public static function set($key,$val){
        self::init(); // Đảm bảo phiên đã được khởi tạo
        $_SESSION[$key] = $val;
    }

    public static function get($key){
        self::init(); // Đảm bảo phiên đã được khởi tạo

    
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return isset($_SESSION[$key]) ? $_SESSION[$key] : false;
        }
    }
    public static function checkSession(){
        self::init(); // Đảm bảo phiên đã được khởi tạo
        if (self::get('login') == false) {
            self::destroy();
            header("Location:".BASE_URL."/login");
            exit(); // Thêm exit() để ngăn chặn mã tiếp tục thực hiện sau khi chuyển hướng
        }
    }

    public static function destroy(){
        //Xóa tất cả biến phiên, phá hủy phiên và xóa cookie phiên.
        session_unset(); // Xóa tất cả các biến phiên
        session_destroy();
    }
    public static function unset($key){
        self::init(); // Đảm bảo phiên đã được khởi tạo
        // Xóa tất cả biến phiên nhưng không phá hủy phiên.
        unset($_SESSION[$key]);
    }
    
}






?>
