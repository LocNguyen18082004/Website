<?php 

class timkiem extends DController {

    public function __construct(){
        parent::__construct();
    }
    Public function search(){
        Session::init();
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : ''; // Lấy từ khóa tìm kiếm từ form
        $table_product = 'tbl_product';
        $table = 'tbl_category_product';
        $table_post = 'tbl_category_post';
        $categorymodel = $this->load->model('categorymodel');

        $data['product_index'] = $categorymodel->list_product_index($table_product);
            $table_product_images = 'tbl_product_images';
            // Khởi tạo mảng để lưu ảnh phụ của từng sản phẩm
            $product_images = [];
            foreach ($data['product_index'] as $product) {
                $product_images[$product['id_product']] = $categorymodel->get_product_images($table_product_images, $product['id_product']);
            }

            // Truyền biến này vào view
            $data['product_images'] = $product_images;


        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        
        $data['products'] = $categorymodel->searchProducts($table_product, $keyword);
        $data['keyword'] = $keyword;
        
        $this->load->view('header', $data);
        $this->load->view('search_results', $data);
        $this->load->view('footer');
    }
    // Public function searchadmin(){
    //     Session::init();
    //     $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : ''; // Lấy từ khóa tìm kiếm từ form
    //     $table_product = 'tbl_product';
    //     $table = 'tbl_category_product';
    //     $table_post = 'tbl_category_post';
    //     $categorymodel = $this->load->model('categorymodel');

    //     $data['category'] = $categorymodel->category_home($table);
    //     $data['category_post'] = $categorymodel->categorypost_home($table_post);
        
    //     $data['products'] = $categorymodel->searchProducts($table_product, $keyword);
    //     $data['keyword'] = $keyword;
        
    //     $this->load->view('header', $data);
    //     $this->load->view('search_results', $data);
    //     $this->load->view('footer');
    // }
}
?>
