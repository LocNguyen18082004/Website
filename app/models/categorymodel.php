<?php 

    class categorymodel extends DModel{

        public function __construct()
        {
            parent::__construct();
        }


        public function category($table){
            $sql = "SELECT * FROM $table ORDER BY id_category_product ASC";
            return $this->db->select($sql);

        }
        public function category_home($table){
            $sql = "SELECT * FROM $table ORDER BY id_category_product ASC";
            return $this->db->select($sql);

        }
        public function category_index($table_product,$categoryIds){
            $placeholders = implode(',', array_fill(0, count($categoryIds), '?'));
            $sql = "SELECT * FROM $table_product WHERE id_category_product IN ($placeholders)";
            
            // Tạo một mảng với các khóa số nguyên bắt đầu từ 1
            $data = [];
            foreach ($categoryIds as $index => $id) {
                $data[$index + 1] = $id;
            }
            
            return $this->db->select($sql, $data);
        }
        public function postbyid_home($table_cate_post,$table_post,$id){
            $sql = "SELECT * FROM $table_cate_post, $table_post WHERE $table_cate_post.id_category_post=$table_post.id_category_post 
            AND $table_post.id_category_post='$id' ORDER BY $table_post.id_post ASC";
            return $this->db->select($sql);
        }
        public function list_post_home($table_all_post) {
            $sql = "SELECT * FROM $table_all_post ORDER BY $table_all_post.id_post DESC";
            return $this->db->select($sql);
        }
        public function categorybyid_home($table,$table_product,$id){
            $sql = "SELECT * FROM $table, $table_product WHERE $table.id_category_product=$table_product.id_category_product 
            AND $table_product.id_category_product='$id' ORDER BY $table_product.id_product ASC";
            return $this->db->select($sql);
        }
        public function categorybyid($table,$cond) {
            $sql = "SELECT * FROM $table WHERE $cond";
            return $this->db->select($sql);
            
        }
        public function insertcategory($table_category_product,$data){
           return $this->db->insert($table_category_product,$data);
        }
        public function updatecategory($table_category_product,$data,$cond){
            return $this->db->update($table_category_product,$data,$cond);
        }
        public function deletecategory($table_category_product,$cond){
            return $this->db->delete($table_category_product,$cond);
        }


        //category Post
        public function insertcategory_post($table,$data){
            return $this->db->insert($table,$data);
        }
        public function categorybyid_post($table,$cond) {
            $sql = "SELECT * FROM $table WHERE $cond";
            return $this->db->select($sql);
            
        }
        public function details_post_home($table_post,$table_cate_post,$cond) {
            $sql = "SELECT * FROM $table_cate_post, $table_post WHERE $cond";
            return $this->db->select($sql);
        }
        public function post_category($table){
            $sql = "SELECT * FROM $table ORDER BY id_category_post ASC";
            return $this->db->select($sql);

        }
        public function categorypost_home($table_post){
            $sql = "SELECT * FROM $table_post ORDER BY id_category_post ASC";
            return $this->db->select($sql);
        }
        public function related_post_home($table_cate_post,$table_post,$cond_related){
            $sql = "SELECT * FROM $table_cate_post, $table_post WHERE $cond_related";
            return $this->db->select($sql);
        }
        public function update_post($table_category_post,$data,$cond){
            return $this->db->update($table_category_post,$data,$cond);
        }
        public function delete_post($table_category_post,$cond){
            return $this->db->delete($table_category_post,$cond);
        }
        //product
        public function list_product_home($table_product) {
            $sql = "SELECT * FROM $table_product ORDER BY $table_product.id_product DESC";
            return $this->db->select($sql);
            
        }
        public function list_product_index($table_product) {
            $sql = "SELECT * FROM $table_product ORDER BY $table_product.id_product DESC";
            return $this->db->select($sql);
            
        }
        public function product($table_product,$table_category){
            $sql = "SELECT * FROM $table_product,$table_category WHERE $table_product.id_category_product=$table_category 
            .id_category_product ORDER BY $table_product.id_product ASC";
            return $this->db->select($sql);

        }
        public function insertproduct($table,$data){
            return $this->db->insert($table,$data);
        }
        public function deleteproduct($table_product,$cond){
            return $this->db->delete($table_product,$cond);
        }
        public function productbyid($table, $table_image, $cond) {
                    // Lấy thông tin sản phẩm
            $sql = "SELECT * FROM $table WHERE $cond";
            $product = $this->db->select($sql);
            
            // Kiểm tra nếu sản phẩm tồn tại
            if (!empty($product)) {
                // Lấy hình ảnh phụ
                $sql_images = "SELECT * FROM $table_image WHERE id_product = :id_product";
                $data = [':id_product' => $product[0]['id_product']];
                $product_images = $this->db->select($sql_images, $data);

                return ['product' => $product[0], 'images' => $product_images];
            } else {
                return ['product' => [], 'images' => []];
            }
        }
        public function updateproduct($table_category_product,$data,$cond){
            return $this->db->update($table_category_product,$data,$cond);
        }
        public function details_product_home($table,$table_product,$cond) {
            $sql = "SELECT * FROM $table_product, $table WHERE $cond";
            return $this->db->select($sql);
        }
        public function related_product_home($table,$table_product,$cond_related){
            $sql = "SELECT * FROM $table_product, $table WHERE $cond_related";
            return $this->db->select($sql);
        }
        public function list_product_home_paginate($table_product, $limit, $offset) {
            $sql = "SELECT * FROM $table_product ORDER BY id_product DESC LIMIT $limit OFFSET $offset";
            return $this->db->select($sql);
        }
        
        public function get_total_products($table_product) {
            $sql = "SELECT COUNT(*) as total FROM $table_product";
            return $this->db->select($sql)[0]['total'];
        }


        public function productExists($table_product, $product_id) {
            $sql = "SELECT COUNT(*) AS count FROM $table_product WHERE id_product = :id_product";
            $result = $this->db->select($sql, [':id_product' => $product_id]);
            return $result[0]['count'] > 0;
        }
    
        public function getProductById($table_product, $id) {
            $sql = "SELECT * FROM $table_product WHERE id_product = :id_product";
            return $this->db->select($sql, [':id_product' => $id])[0];
        }
        //search
        public function searchProducts($table_product, $keyword){
            $sql = "SELECT * FROM $table_product 
            WHERE title_product LIKE :keyword 
            OR code_product LIKE :keyword 
            ORDER BY id_product ASC";
            $data = [':keyword' => "%$keyword%"];
            return $this->db->select($sql, $data);
        }
        public function get_product_images($table_product_images, $product_id) {
            $sql = "SELECT * FROM $table_product_images WHERE id_product = :product_id ";
            $data = [':product_id' => $product_id];
            return $this->db->select($sql, $data);
        }
    
        public function insert_product_image($table, $data) {
            return $this->db->insert($table, $data);
        }
    
        public function delete_product_images($table, $product_id) {
            $cond = "id_product = :product_id";
            $data = [':product_id' => $product_id];
            return $this->db->delete($table, $cond, $data);
        }

        public function lastInsertId() {
            return $this->db->lastInsertId();
        }

        //filter

        public function get_products_by_categories($table_product, $categoryIds) {
            $sql = "SELECT * FROM $table_product WHERE id_category_product IN ($categoryIds) ORDER BY id_product DESC";
            return $this->db->select($sql);
        }
        
       
        
    }
    
?>