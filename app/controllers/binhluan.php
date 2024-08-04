<?php 

class binhluan extends DController {

    public function __construct(){
        parent::__construct();
    }
    public function add() {
        $table_comment = "tbl_comment";
        $table_product = "tbl_product";
        $commentModel = $this->load->model('commentmodel');
        $categorymodel = $this->load->model('categorymodel');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['product_id'];
            // Kiểm tra xem sản phẩm có tồn tại hay không
            $productExists = $categorymodel->productExists($table_product, $product_id);
            
            if ($productExists) {
                $data = [
                    'author_commnet' => $_POST['author_comment'],
                    'content_comment' => $_POST['content_comment'],
                    'id_product' => $product_id
                ];
                $commentModel->addComment($table_comment, $data);
                $message['msg'] = "Bình luận đã được thêm thành công";
            } else {
                $message['msg'] = "Sản phẩm không tồn tại";
            }
            
            header('Location:'.BASE_URL."/sanpham/details_product?msg=".urlencode(serialize($message)));
        }
    }

    public function delete($id) {
        $table_comment = "tbl_comment";
        $commentModel = $this->load->model('commentmodel');
        $cond = "id_comment = :id";
        $data = [':id' => $id];
        $commentModel->deleteComment($table_comment, $cond, $data);
    
        // Lấy id_product từ tham số GET
        $id_product = isset($_GET['id_product']) ? $_GET['id_product'] : 0;
    
        $message['msg'] = "Bình luận đã được xóa";
        header('Location:'.BASE_URL."/sanpham/details_product/" . $id_product . "?msg=".urlencode(serialize($message)));
    }
    
}
?>
