<?php 

    class order extends DController {

        public function __construct()
        {
            Session::checkSession();
            parent::__construct();
        }
        public function index(){
            $this->order();
        }
        public function order() {
            $table_order = "tbl_order";
            $ordermodel = $this->load->model('ordermodel');
            $data['order'] = $ordermodel->list_order($table_order);
    
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/order/order', $data);
            $this->load->view('admin/footer');
        }
    
        public function order_details($order_code) {
            $ordermodel = $this->load->model('ordermodel');
    
            $table_order_details = "tbl_order_details";
            $table_product = "tbl_product";
            $cond = "$table_product.id_product = $table_order_details.product_id AND $table_order_details.order_code = '$order_code'";
            $cond_info = "$table_order_details.order_code = '$order_code'";
    
            $data['order_details'] = $ordermodel->list_order_details($table_product, $table_order_details, $cond);
            $data['order_info'] = $ordermodel->list_info($table_order_details, $cond_info);
    
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/order/order_details', $data);
            $this->load->view('admin/footer');
        }

        
        // File: controllers/OrderController.php

        public function order_confirm($order_code) {
            $ordermodel = $this->load->model('ordermodel');
            $customermodel = $this->load->model('customermodel');
            $table_order = "tbl_order";
            $table_customer_order = "tbl_customer_order";
            
            $cond = "$table_order.order_code = '$order_code'";
            $data = array(
                'order_status' => 1  // 1 đại diện cho "đã xử lý"
            );
            $result = $ordermodel->order_confirm($table_order, $data, $cond);
            
            if ($result == 1) {
                $order_info = $ordermodel->list_info($table_order, $cond);
                if (!empty($order_info)) {
                    $order_info = $order_info[0];
                    
                    if (isset($order_info['customer_id'])) {
                        $customer_order_data = array(
                            'customer_id' => $order_info['customer_id'],
                            'order_code' => $order_info['order_code'],
                            'order_date' => $order_info['order_date'],
                            'processed_date' => date('Y-m-d H:i:s'),
                            'order_status' => 1  // Cập nhật trạng thái thành "đã xử lý"
                        );
                        
                        // Kiểm tra xem đơn hàng đã tồn tại trong bảng customer_order chưa
                        $existing_order = $customermodel->get_customer_order($table_customer_order, $order_code);
                        
                        if ($existing_order) {
                            // Nếu đã tồn tại, cập nhật trạng thái
                            $update_result = $customermodel->update_customer_order($table_customer_order, $customer_order_data, "order_code = '$order_code'");
                        } else {
                            // Nếu chưa tồn tại, thêm mới
                            $insert_result = $customermodel->insert_customer_order($table_customer_order, $customer_order_data);
                        }
                        
                        // Gửi email thông báo cho khách hàng (nếu cần)
                        // $this->send_order_processed_email($order_info);
                    } else {
                        echo "Customer ID is missing in the order information";
                    }
                }
                
                $message['msg'] = "Xử lý đơn hàng thành công";
                header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
            } else {
                $message['msg'] = "Xử lý đơn hàng thất bại";
                header('Location:'.BASE_URL."/order?msg=".urlencode(serialize($message)));
            }
        }

        
        
        public function customer_order_info($customer_id){
            $ordermodel = $this->load->model('ordermodel');
            $customermodel = $this->load->model('customermodel');
            
            $table_order = "tbl_order";
            $table_customer = "tbl_customer";
            $cond = "$table_order.customer_id='$customer_id'";
            
            $data['customer_info'] = $customermodel->get_customer_info($table_customer, $customer_id);
            $data['customer_orders'] = $ordermodel->get_customer_orders($table_order, $cond);
        
            // Debugging output
            var_dump($data['customer_orders']);
            
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/order/customer_order_info', $data);
            $this->load->view('admin/footer');
        }
        
    }

?>