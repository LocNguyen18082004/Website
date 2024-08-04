<?php 

    class commentmodel extends DModel{

        public function __construct()
        {
            parent::__construct();
        }
        
        public function getCommentsByProduct($table_comment, $id_product) {
            $sql = "SELECT * FROM $table_comment WHERE id_product = :id_product ORDER BY created_at DESC";
            return $this->db->select($sql, [':id_product' => $id_product]);
        }
    
        public function addComment($table_comment, $data) {
            return $this->db->insert($table_comment, $data);
        }
        
    
        public function deleteComment($table_comment, $cond, $data) {
            $sql = "DELETE FROM $table_comment WHERE $cond";
            return $this->db->delete($table_comment, $cond, $data);
        }
        

        
        
    }
    
?>