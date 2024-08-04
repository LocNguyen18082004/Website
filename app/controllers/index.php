<?php 

    class index extends DController {

        public function __construct(){
            $data = array();
            parent::__construct();
        }
        public function index(){
            $this->homepage();
        }
        
        public function homepage(){
            $table = 'tbl_category_product';
            $table_post = 'tbl_category_post';
            $table_product = 'tbl_product';
            $table_product_images = 'tbl_product_images';
            $categorymodel = $this->load->model('categorymodel');
        
            $data['category'] = $categorymodel->category_home($table);
            $data['category_post'] = $categorymodel->categorypost_home($table_post);
            $data['product_index'] = $categorymodel->list_product_index($table_product);

            // Khởi tạo mảng để lưu ảnh phụ của từng sản phẩm
            $product_images = [];
            foreach ($data['product_index'] as $product) {
                $product_images[$product['id_product']] = $categorymodel->get_product_images($table_product_images, $product['id_product']);
            }

            // Truyền biến này vào view
            $data['product_images'] = $product_images;
        
            // Lấy sản phẩm từ hai category cụ thể
            $liningCategoryId = 32; // ID của category Giày Lining
            $yonexCategoryId = 46;  // ID của category Giày Yonex
        
            $data['lining_products'] = $categorymodel->category_index($table_product, [$liningCategoryId]);
            $data['yonex_products'] = $categorymodel->category_index($table_product, [$yonexCategoryId]);
            

        
            
            // Truyền biến này vào view
            $data['product_images'] = $product_images;

            // Lấy ảnh phụ cho sản phẩm đầu tiên trong mỗi category
            if (!empty($data['lining_products'])) {
                $lining_product_id = $data['lining_products'][0]['id_product'];
                $data['lining_product_images'] = $categorymodel->get_product_images($table_product_images, $lining_product_id); // Khởi tạo mảng để lưu ảnh phụ của từng sản phẩm
                

            }
        
            if (!empty($data['yonex_products'])) {
                $yonex_product_id = $data['yonex_products'][0]['id_product'];
                $data['yonex_product_images'] = $categorymodel->get_product_images($table_product_images, $yonex_product_id);
            }
        
            $this->load->view('header', $data);
            $this->load->view('slider', $data);
            $this->load->view('home', $data);
            $this->load->view('footer');
        }
        public function contact(){
            $table = 'tbl_category_product';
            $table_post = 'tbl_category_post';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table);
            $data['category_post'] = $categorymodel->categorypost_home($table_post);

            $this->load->view('header', $data);
            // $this->load->view('slider', $data);
            $this->load->view('contact');
            $this->load->view('footer');
        }
        public function notfound(){
            
            $this->load->view('404');
        }
    }

?>