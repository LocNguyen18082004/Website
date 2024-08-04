<?php 

    class khachang extends DController {

        public function __construct(){
            $data = array();
            parent::__construct();
        }
        public function index(){
            $this->lichsudonhang();
        }
        
        public function lichsudonhang() {
            Session::init();
            $customer_id = Session::get('customer_id');
            
            // Kiểm tra xem khách hàng đã đăng nhập chưa
            if (!$customer_id) {
                header('Location:'.BASE_URL."/khachang/login");
                exit();
            }
        
            $table_order = 'tbl_order';
            $customermodel = $this->load->model('customermodel');
        
            // Lấy danh sách đơn hàng của khách hàng
            $data['orders'] = $customermodel->getOrders($table_order, $customer_id);
        
            // Gửi dữ liệu tới view
            $this->load->view('header', $data);
            $this->load->view('account', $data);
            $this->load->view('footer');
        }
        public function order_details($order_code) {
            $ordermodel = $this->load->model('ordermodel');
    
            $table_order_details = "tbl_order_details";
            $table_product = "tbl_product";
            $cond = "$table_product.id_product = $table_order_details.product_id AND $table_order_details.order_code = '$order_code'";
            $cond_info = "$table_order_details.order_code = '$order_code'";
    
            $data['order_details'] = $ordermodel->list_order_details($table_product, $table_order_details, $cond);
            $data['order_info'] = $ordermodel->list_info($table_order_details, $cond_info);
    
            $this->load->view('header');
            $this->load->view('order_detailss', $data);
            $this->load->view('footer');
        }
       
        public function logout(){
            Session::init();
            Session::destroy();  // Xóa toàn bộ session
            Session::unset('customer');
            $message['msg'] = "Đăng xuất thành công";
            header('Location:'.BASE_URL."/khachang/login?msg=".urlencode(serialize($message)));
        }
        public function login_customer(){
            $username = trim($_POST['username']);
            $password = trim(md5($_POST['password']));
        
            $errors = [];
        
            // Kiểm tra email và mật khẩu
            if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ";
            }
        
            if (strlen($password) < 3) {
                $errors[] = "Mật khẩu cần ít nhất 3 ký tự";
            }
        
            if (!empty($errors)) {
                $message['msg'] = implode(", ", $errors);
                header('Location:' . BASE_URL . "/khachang/login?msg=" . urlencode(serialize($message)));
                exit();
            }
        
            $table_customer = 'tbl_customers';
            $customermodel = $this->load->model('customermodel');
        
            $count = $customermodel->login($table_customer, $username, $password);
        
            if($count == 0){
                $message['msg'] = "Email hoặc mật khẩu sai, xin kiểm tra lại";
                header('Location:' . BASE_URL . "/khachang/login?msg=" . urlencode(serialize($message)));
            } else {
                $result = $customermodel->getLogin($table_customer, $username, $password);
                Session::init();
                Session::set('customer', true);
                Session::set('customer_email', $result[0]['customer_email']);
                Session::set('customer_name', $result[0]['customer_name']);
                Session::set('customer_phone', $result[0]['customer_phone']);
                Session::set('customer_id', $result[0]['customer_id']);
                Session::set('customer_address', $result[0]['customer_address']);
        
                $message['msg'] = "Đăng nhập thành công";
                header('Location:' . BASE_URL . "/khachang/account?msg=" . urlencode(serialize($message)));
            }
        }
        
        public function account() {
           
            $table = 'tbl_category_product';
            // $table_order = "tbl_order";
            $table_post = 'tbl_category_post';
            $table_customer = 'tbl_customers';
            $table_customer_order = "tbl_customer_order";
            $customer_id = Session::get('customer_id');
            if (!$customer_id) {
                header('Location:'.BASE_URL."/khachang/login");
                exit();
            }
            
            $ordermodel = $this->load->model('ordermodel');
            $categorymodel = $this->load->model('categorymodel');
            $customermodel = $this->load->model('customermodel');
        
            $data['category'] = $categorymodel->category_home($table);
            $data['category_post'] = $categorymodel->categorypost_home($table_post);
            $customerData = $customermodel->getCustomer($table_customer, $customer_id);
            $data['customer_orders'] = $customermodel->get_customer_orders($table_customer_order, $customer_id);

            if (empty($customerData)) {
                $data['customer'] = []; 
            } else {
                $data['customer'] = $customerData[0]; 
            }

  
        
            $this->load->view('header', $data);
            $this->load->view('account', $data);
            $this->load->view('footer');
        }
        
        
        
        
        public function login(){
           
            $table = 'tbl_category_product';
            $table_post = 'tbl_category_post';
            $table_product = 'tbl_product';
            $categorymodel = $this->load->model('categorymodel');
        
            $data['category'] = $categorymodel->category_home($table);
            $data['category_post'] = $categorymodel->categorypost_home($table_post);
            $data['product_index'] = $categorymodel->list_product_index($table_product);
            Session::init();
            $this->load->view('header', $data);
            // $this->load->view('slider', $data);
            $this->load->view('login');
            $this->load->view('footer');
        }
        public function insert_dangky(){
            $table_customer = "tbl_customers";
    
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $password = trim($_POST['password']);
    
            $errors = [];
    
            // Kiểm tra email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ";
            } else {
                $email_parts = explode('@', $email);
                if (count($email_parts) != 2 || strlen($email_parts[0]) < 6 || !preg_match('/\.com$/', $email)) {
                    $errors[] = "Email phải có ít nhất 6 ký tự trước dấu @ và phải kết thúc bằng '.com'.";
                }
            }
    
            // Kiểm tra số điện thoại
            if (!preg_match('/^\d{10,11}$/', $phone)) {
                $errors[] = "Số điện thoại phải là chữ số và có độ dài từ 10 đến 11 ký tự.";
            }
    
            // Kiểm tra mật khẩu
            if (strlen($password) < 4) {
                $errors[] = "Mật khẩu phải có ít nhất 4 ký tự.";
            }
    
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                $_SESSION['postData'] = $_POST;
                header('Location:'.BASE_URL."/giohang/dathang");
                exit;
            }
    
            // Dữ liệu hợp lệ
            $data = array(
                'customer_name' => $name,
                'customer_email' => $email,
                'customer_phone' => $phone,
                'customer_password' => md5($password)
            );
    
            $customermodel = $this->load->model('customermodel');
            $result = $customermodel->insertcustomer($table_customer, $data);
    
            if ($result !== false) {
                $message['msg'] = "Đăng ký thành công";
                header('Location:'.BASE_URL."/khachang/register?msg=".urlencode(serialize($message)));
            } else {
                $message['msg'] = "Đăng ký thất bại";
                header('Location:'.BASE_URL."/khachang/register?msg=".urlencode(serialize($message)));
            }
        }
        public function account_update() {
            Session::init();
            $customer_id = Session::get('customer_id');
            $table_customer = 'tbl_customers';
            $customermodel = $this->load->model('customermodel');
            $customer = $customermodel->getCustomer($table_customer, $customer_id);
        
            if (!empty($customer)) {
                $data['customer'] = $customer[0]; // Đảm bảo rằng dữ liệu khách hàng không rỗng và lấy giá trị đầu tiên
            } else {
                $data['customer'] = [
                    'customer_name' => '',
                    'customer_phone' => '',
                    'customer_email' => '',
                    'customer_address' => '',
                    'customer_gender' => '',
                    'customer_dob' => ''
                ];
            }
        
            $table = 'tbl_category_product';
            $table_post = 'tbl_category_post';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table);
            $data['category_post'] = $categorymodel->categorypost_home($table_post);
        
            $this->load->view('header', $data);
            $this->load->view('account_update', $data);
            $this->load->view('footer');
        }

        public function update_account() {
            $table_customer = "tbl_customers";
        
            // Lấy dữ liệu từ form
            $customer_id = $_SESSION['customer_id'];
            $data = [
                'customer_name' => $_POST['customer_name'],
                'customer_phone' => $_POST['customer_phone'],
                'customer_email' => $_POST['customer_email'],
                'customer_address' => $_POST['customer_address'],
                'customer_gender' => $_POST['customer_gender'],
                'customer_dob' => $_POST['customer_dob']
            ];
        
            $errors = [];
        
            // Kiểm tra địa chỉ
            if (empty($data['customer_address']) || !preg_match('/^\d+\s[A-Za-zÀ-ỹà-ỹ\s]+(,\s[A-Za-zÀ-ỹà-ỹ\s]+)*$/', $data['customer_address'])) {
                $errors[] = "Địa chỉ phải có số nhà, tên đường và thành phố.";
            }
        
            // Kiểm tra email
            if (strlen($data['customer_email']) < 6 || !preg_match('/^[^\s@]+@[^\s@]+\.[^\s@]+$/', $data['customer_email'])) {
                $errors[] = "Email phải có ít nhất 6 ký tự trước dấu '@' và phải kết thúc bằng '.com'.";
            }
        
            // Kiểm tra số điện thoại
            if (!preg_match('/^\d{10,11}$/', $data['customer_phone'])) {
                $errors[] = "Số điện thoại phải có từ 10 đến 11 ký tự.";
            }
        
            // Kiểm tra ngày sinh
            $dob = DateTime::createFromFormat('Y-m-d', $data['customer_dob']);
            if (!$dob || $dob->diff(new DateTime())->y < 18) {
                $errors[] = "Ngày sinh phải cho phép người dùng trên 18 tuổi.";
            }
        
            // Nếu có lỗi, hiển thị thông báo và dừng xử lý
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header('Location: ' . BASE_URL . "/khachang/account_update");
                exit;
            }
        
            // Gọi model để cập nhật thông tin
            $customermodel = $this->load->model('customermodel');
            $result = $customermodel->updateCustomer($table_customer, $data, $customer_id);
        
            if ($result) {
                Session::set('customer_name', $data['customer_name']);
                Session::set('customer_phone', $data['customer_phone']);
                Session::set('customer_email', $data['customer_email']);
                Session::set('customer_address', $data['customer_address']);
                header("Location: " . BASE_URL . "/giohang/dathang");
            } else {
                echo "Cập nhật thông tin thất bại!";
            }
        }
        
        
        
        
        
        public function register(){
            $table = 'tbl_category_product';
            $table_post = 'tbl_category_post';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table);
            $data['category_post'] = $categorymodel->categorypost_home($table_post);

            $this->load->view('header', $data);
            // $this->load->view('slider', $data);
            $this->load->view('register');
            $this->load->view('footer');
        }
        public function notfound(){
            
            $this->load->view('404');
        }
    }

?>