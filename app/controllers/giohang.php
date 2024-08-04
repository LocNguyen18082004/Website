<?php 
    // require_once(__DIR__ . '/../config/email_config.php');
    class giohang extends DController {

        public function __construct(){
            $data = array();
            parent::__construct();
        }
        public function index(){
            $this->giohang();
        }
        public function giohang(){
            Session::init();
            $table = 'tbl_category_product';
            $table_post = 'tbl_category_post';
            $categorymodel = $this->load->model('categorymodel');

            $data['category'] = $categorymodel->category_home($table);
            $data['category_post'] = $categorymodel->categorypost_home($table_post);
            $this->load->view('header', $data);
            $this->load->view('cart');
            $this->load->view('footer');
        }
        public function dathang() {
            Session::init();
            $table = 'tbl_category_product';
            $table_post = 'tbl_category_post';
            $categorymodel = $this->load->model('categorymodel');
        
            $data['category'] = $categorymodel->category_home($table);
            $data['category_post'] = $categorymodel->categorypost_home($table_post);
            $data['cart'] = isset($_SESSION['shopping_cart']) ? $_SESSION['shopping_cart'] : array();
            $data['total'] = array_reduce($data['cart'], function($carry, $item) {
                return $carry + ($item['product_quantity'] * $item['product_price']);
            }, 0);
        
            $data['postData'] = [
                'email' => $_SESSION['customer_email'] ?? '',
                'name' => $_SESSION['customer_name'] ?? '',
                'address' => $_SESSION['customer_address'] ?? '',
                'phone' => $_SESSION['customer_phone'] ?? ''
            ];
        
            $this->load->view('header', $data);
            $this->load->view('checkout', $data);
            $this->load->view('footer');
        }        

        public function thanhtoan(){
            Session::init();

            // Lấy dữ liệu từ form
            $email = $_POST['email'] ?? '';
            $name = $_POST['name'] ?? '';
            $address = $_POST['address'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $content = $_POST['content'] ?? '';

            // Kiểm tra tính hợp lệ của email
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message['msg'] = "Email không hợp lệ.";
                header('Location:'.BASE_URL."/giohang/dathang?msg=".urlencode(serialize($message)));
                exit;
            }

            // Kiểm tra tính hợp lệ của tên
            if (empty($name)) {
                $message['msg'] = "Họ và tên không được để trống.";
                header('Location:'.BASE_URL."/giohang/dathang?msg=".urlencode(serialize($message)));
                exit;
            }

            // Kiểm tra tính hợp lệ của số điện thoại
            if (empty($phone) || !preg_match('/^\d{10,11}$/', $phone)) {
                $message['msg'] = "Số điện thoại không hợp lệ.";
                header('Location:'.BASE_URL."/giohang/dathang?msg=".urlencode(serialize($message)));
                exit;
            }

            $table_order = "tbl_order";
            $table_order_details = "tbl_order_details";
            $ordermodel = $this->load->model('ordermodel');
            $order_code = rand(0,9999);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $order_date = date("Y-m-d H:i:s");

            // Dữ liệu đơn hàng
            $data_order = array(
                'order_status' => 'mới',
                'order_code' => $order_code,
                'order_date' => $order_date
            );
            
            // Chèn dữ liệu vào bảng đơn hàng
            $result_order = $ordermodel->insert_order($table_order, $data_order);

            if (Session::get("shopping_cart")) {
                foreach (Session::get("shopping_cart") as $key => $value) {
                    $data_details = array(
                        'order_code' => $order_code,
                        'product_id' => $value['product_id'],
                        'product_quantity' => $value['product_quantity'],
                        'email' => $email,
                        'name' => $name,
                        'address' => $address,
                        'phone' => $phone,
                        'content' => $content,
                    );
                    $result_order_details = $ordermodel->insert_order($table_order_details, $data_details);
                }
                unset($_SESSION["shopping_cart"]);
            }

            // Gọi hàm sendOrderConfirmationEmail khi đặt hàng thành công
            if ($result_order && $result_order_details) {
                $customer_id = Session::get('customer_id');
                $data_customer_order = array(
                    'customer_id' => $customer_id,
                    'order_code' => $order_code,
                    'order_date' => $order_date,
                    'order_status' => 0 // 0 cho chưa xử lý, 1 cho đã xử lý
                );
                $table_customer_order = "tbl_customer_order";
                $result_customer_order = $ordermodel->insert_customer_order($table_customer_order, $data_customer_order);

                // // Gửi email xác nhận đơn hàng
                // $to = $email; // Địa chỉ email của khách hàng
             
                // $subject = "Xác nhận đơn hàng " ;
                // $body = "Cảm ơn bạn đã đặt hàng. Mã đơn hàng của bạn là: " . $order_code . "<p>Chi tiết đơn hàng bạn có thể xem trong thông tin đơn hàng sẽ được cập nhật tại đó !</p>";
                // sendOrderConfirmationEmail($to, $subject, $body);

                $message['msg'] = "Chúc mừng bạn đã đặt hàng thành công";
                header('Location:'.BASE_URL."/khachang/account?msg=".urlencode(serialize($message)));
            } else {
                $message['msg'] = "Bạn đã đặt hàng thất bại. Vui lòng thử lại.";
                header('Location:'.BASE_URL."/giohang/dathang?msg=".urlencode(serialize($message)));
            }
        }

        
        
        
        
        public function themgiohang(){
            Session::init();
            //Session::destroy();
            if(isset($_SESSION["shopping_cart"])){
                $avaiable = 0;
                foreach($_SESSION["shopping_cart"] as $key => $value){
                   if($_SESSION["shopping_cart"][$key]['product_id']== $_POST['product_id']){
                        $avaiable++;
                        $_SESSION["shopping_cart"][$key]['product_quantity'] =
                        $_SESSION["shopping_cart"][$key]['product_quantity'] 
                        + $_POST['product_quantity'];
                   }
                }
                if($avaiable == 0 ){
                    $item = array(
                        'product_id' => $_POST["product_id"],
                        'product_title' => $_POST["product_title"],
                        'product_code' => $_POST["product_code"],
                        'product_price' => $_POST["product_price"],
                        'product_image' => $_POST["product_image"],
                        'product_quantity' => $_POST["product_quantity"]
    
                    );
                    $_SESSION["shopping_cart"][] = $item;
                }
            }else{
                $item = array(
                    'product_id' => $_POST["product_id"],
                    'product_title' => $_POST["product_title"],
                    'product_code' => $_POST["product_code"],
                    'product_price' => $_POST["product_price"],
                    'product_image' => $_POST["product_image"],
                    'product_quantity' => $_POST["product_quantity"]

                );
                $_SESSION["shopping_cart"][] = $item;
            }
            header("Location:".BASE_URL.'/giohang');
        }
        public function updategiohang(){
            Session::init();
            if(isset($_POST['delete_cart'])){
                if(isset($_SESSION["shopping_cart"])){
                    foreach($_SESSION["shopping_cart"] as $key => $value){
    
                        if($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['delete_cart']){
                            unset($_SESSION["shopping_cart"][$key]);
                        }
                    }
                    header('Location:'.BASE_URL.'/giohang');
                }else{
                    header('Location:'.BASE_URL);
                }
            }else{
                foreach($_POST['qty'] as $key => $qty){
                    foreach($_SESSION["shopping_cart"] as $session => $value){
                        if($value['product_id']== $key && $qty >= 1){
                            $_SESSION["shopping_cart"][$session]['product_quantity'] = $qty;
                        }else if($value['product_id']==$key && $qty <= 0 ){
                                $_SESSION["shopping_cart"][$session];
                            }
                        }
                    }
                    header('Location:'.BASE_URL.'/giohang');
                }
                // if(isset($_SESSION["shopping_cart"])){
                //     foreach($_SESSION["shopping_cart"] as $key => $value){
    
                //         if($_SESSION["shopping_cart"][$key]['product_id'] == $_POST['update_cart']){
                //             $_SESSION["shopping_cart"][$key];
                //         }
                //     }
                //     header('Location:'.BASE_URL.'/giohang');
                // }else{
                //     header('Location:'.BASE_URL);
                // }
            }
            public function favourite(){
                $table = 'tbl_category_product';
                $table_post = 'tbl_category_post';
                $categorymodel = $this->load->model('categorymodel');
                $data['category'] = $categorymodel->category_home($table);
                $data['category_post'] = $categorymodel->categorypost_home($table_post);

                $this->load->view('header', $data);
                // $this->load->view('slider', $data);
                $this->load->view('favourite');
                $this->load->view('footer');
            }
             
        }

?>