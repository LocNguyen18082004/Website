<?php 

    class customermodel extends DModel{

        public function __construct()
        {
            parent::__construct();
        }
        public function insertcustomer($table_customer,$data){
           return $this->db->insert($table_customer,$data);
        }
        public function login($table_customer,$username,$password){
            $sql = "SELECT * FROM $table_customer WHERE customer_email=? AND customer_password=? ";
            return $this->db->affectedRows($sql,$username,$password);
        }
        public function getLogin($table_customer,$username,$password){
            $sql = "SELECT * FROM $table_customer WHERE customer_email=? AND customer_password=? ";
            return $this->db->selectUser($sql,$username,$password);
        }
        public function getCustomer($table_customer, $customer_id) {
            $sql = "SELECT * FROM $table_customer WHERE customer_id = :customer_id";
            $params = array(':customer_id' => $customer_id);
            $results = $this->db->select($sql, $params);
            return !empty($results) ? $results : [];
        }
        public function updateCustomer($table_customer, $data, $customer_id) {
            // Điều kiện để cập nhật đúng người dùng
            $cond = "customer_id = :customer_id";
    
            // Thêm customer_id vào dữ liệu
            $data['customer_id'] = $customer_id;
    
            return $this->db->update($table_customer, $data, $cond);
        }
        public function getOrders($table_customer_orders, $customer_id){
            $sql = "SELECT * FROM $table_customer_orders WHERE customer_id = ?";
            return $this->db->select($sql, [$customer_id]);
        }
        
        public function insert_customer_order($table, $data) {
            return $this->db->insert($table, $data);
        }
        public function get_customer_orders($table_customer_order, $customer_id, $order_status = null) {
            $sql = "SELECT * FROM $table_customer_order WHERE customer_id = :customer_id";
            $data = array(':customer_id' => $customer_id);
            
            if ($order_status !== null) {
                $sql .= " AND order_status = :order_status";
                $data[':order_status'] = $order_status;
            }
            
            return $this->db->select($sql, $data);
        }
        public function get_customer_info($table_customer, $customer_id) {
            $sql = "SELECT * FROM $table_customer WHERE id_customer = :customer_id";
            $result = $this->db->select($sql, [':customer_id' => $customer_id]);
            return $result[0] ?? null; // Trả về thông tin khách hàng hoặc null nếu không có kết quả
        }


        public function get_customer_order($table, $order_code) {
            $sql = "SELECT * FROM $table WHERE order_code = :order_code";
            $data = array(':order_code' => $order_code);
            return $this->db->select($sql, $data);
        }
        
        public function update_customer_order($table, $data, $cond) {
            return $this->db->update($table, $data, $cond);
        }
    
        
    }
    
?>