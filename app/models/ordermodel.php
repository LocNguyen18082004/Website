<?php 

    class ordermodel extends DModel{
        public function __construct(){
           parent::__construct();
        }
        public function insert_order($table_order, $data_order) {
            return $this->db->insert($table_order, $data_order);
        }
        
        public function insert_order_details($table_order_details, $data_details) {
            return $this->db->insert($table_order_details, $data_details);
        }
        public function list_order($table_order) {
            $sql = "SELECT * FROM $table_order ORDER BY order_id ASC";
            return $this->db->select($sql);
        }
        
        public function list_order_details($table_order_details, $table_product, $cond) {
            $sql = "SELECT * FROM $table_order_details JOIN $table_product ON $cond";
            return $this->db->select($sql);
        }
        public function list_info($table_order_details,$cond){
            $sql = "SELECT * FROM $table_order_details WHERE $cond LIMIT 1 ";
            return $this->db->select($sql);
        }
        public function order_confirm($table_order, $data, $cond) {
            return $this->db->update($table_order, $data, $cond);
        }
        
        
        public function get_customer_info($table, $customer_id){
            $sql = "SELECT * FROM $table WHERE customer_id='$customer_id'";
            return $this->db->select($sql);
        }
        public function insert_customer_order($table, $data) {
            return $this->db->insert($table, $data);
        }
        public function get_confirmed_orders($table) {
            $sql = "SELECT * FROM $table WHERE order_status = 1";
            return $this->db->select($sql);
        }
    }


?>