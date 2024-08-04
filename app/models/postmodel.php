<?php 

    class postmodel extends DModel{

        public function __construct()
        {
            parent::__construct();
        }

        public function post($table_post,$table_category){
            $sql = "SELECT * FROM $table_post,$table_category WHERE $table_post.id_category_post=$table_category 
            .id_category_post ORDER BY $table_post.id_post ASC";
            return $this->db->select($sql);

        }

        public function category_post($table_category){
            $sql = "SELECT * FROM $table_category ORDER BY id_category_post ASC";
            return $this->db->select($sql);

        }
        public function postbyid($table,$cond) {
            $sql = "SELECT * FROM $table WHERE $cond";
            return $this->db->select($sql);
            
        }
        public function insertpost($table,$data){
           return $this->db->insert($table,$data);
        }
        public function updatepost($table_category_post,$data,$cond){
            return $this->db->update($table_category_post,$data,$cond);
        }
        public function deletepost($table,$cond){
            return $this->db->delete($table,$cond);
        }
    }


?>