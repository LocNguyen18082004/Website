<?php 

    class sanpham extends DController {

        public function __construct(){
            $data = array();
            parent::__construct();
        }
        public function index(){
            $this->category_product();
        }
        public function all(){
            $table = 'tbl_category_product';
            $table_post = 'tbl_category_post';
            $table_product = 'tbl_product';
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

            $limit = 3; // Số sản phẩm mỗi trang
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($page - 1) * $limit;

            $data['list_product'] = $categorymodel->list_product_home_paginate($table_product, $limit, $offset);
            $data['total_products'] = $categorymodel->get_total_products($table_product);
            $data['limit'] = $limit;
            $data['page'] = $page;
            
            $this->load->view('header', $data);
            $this->load->view('list_product', $data);
            $this->load->view('footer');
        }
        public function category_product($id){
            $table = 'tbl_category_product';
            $table_post = 'tbl_category_post';
            $table_product = 'tbl_product';
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table);
            $data['category_post'] = $categorymodel->categorypost_home($table_post);
            $data['category_by_id'] = $categorymodel->categorybyid_home($table,$table_product,$id);

            $data['product_index'] = $categorymodel->list_product_index($table_product);
            $table_product_images = 'tbl_product_images';
            // Khởi tạo mảng để lưu ảnh phụ của từng sản phẩm
            $product_images = [];
            foreach ($data['product_index'] as $product) {
                $product_images[$product['id_product']] = $categorymodel->get_product_images($table_product_images, $product['id_product']);
            }

            $limit = 4; // Số sản phẩm mỗi trang
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($page - 1) * $limit;

            $data['list_product'] = $categorymodel->list_product_home_paginate($table_product, $limit, $offset);
            $data['total_products'] = $categorymodel->get_total_products($table_product);
            $data['limit'] = $limit;
            $data['page'] = $page;

            // Truyền biến này vào view
            $data['product_images'] = $product_images;
            
            $this->load->view('header', $data);
            // $this->load->view('slider', $data);
            $this->load->view('categoryproduct', $data);
            $this->load->view('footer');
        }
        public function details_product($id){
            $table = 'tbl_category_product';
            $table_post = 'tbl_category_post';
            $table_product = 'tbl_product';
            $table_product_images = 'tbl_product_images'; // Thêm dòng này để lấy ảnh phụ
        
            $cond = "$table_product.id_category_product=$table.id_category_product AND $table_product.id_product='$id'";
            
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category_home($table);
            $data['category_post'] = $categorymodel->categorypost_home($table_post);
            $data['details_product'] = $categorymodel->details_product_home($table,$table_product,$cond);
            foreach($data['details_product'] as $key => $cate){
                $id_cate = $cate['id_category_product'];
            }
        
            $cond_related = "$table_product.id_category_product=$table.id_category_product AND $table.id_category_product='$id_cate'
            AND $table_product.id_product NOT IN ('$id')";
            $data['related'] = $categorymodel->related_product_home($table,$table_product,$cond_related);
        
            // Lấy ảnh phụ
            $data['product_images'] = $categorymodel->get_product_images($table_product_images, $id);


            $commentmodel = $this->load->model('commentmodel');
            $table_comment = "tbl_comment";
            
            // Get comments
            $data['comment'] = $commentmodel->getCommentsByProduct($table_comment, $id);

            date_default_timezone_set('Asia/Ho_Chi_Minh');

            // Handle new comment submission
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $author = $_POST['author_comment'];
                $content = $_POST['content_comment'];
                
                // Validate inputs
                if (!empty($author) && !empty($content)) {
                    $commentData = [
                        'id_product' => $id,
                        'author_comment' => $author,
                        'content_comment' => $content,
                        'created_at' => date('Y-m-d H:i:s')
                    ];
                    
                    $commentmodel->addComment($table_comment, $commentData);
                    // Redirect to avoid resubmission on page refresh
                    header("Location: " . BASE_URL . "/sanpham/details_product/" . $id);
                    exit();
                }
            }
        
            $this->load->view('header', $data);
            $this->load->view('details_product', $data);
            $this->load->view('footer');
        }

        public function filter_category(){
            $table = 'tbl_category_product';
            $table_post = 'tbl_category_post';
            $table_product = 'tbl_product';
            $categorymodel = $this->load->model('categorymodel');
        
            $categories = isset($_GET['categories']) ? $_GET['categories'] : [];
            
            $data['category'] = $categorymodel->category_home($table);
            $data['category_post'] = $categorymodel->categorypost_home($table_post);
            
            if (!empty($categories)) {
                $categoryIds = implode(',', array_map('intval', $categories));
                $data['list_product'] = $categorymodel->get_products_by_categories($table_product, $categoryIds);
            } else {
                $data['list_product'] = [];
            }
        
            // Pagination logic (nếu cần thiết)
            $limit = 4; // Số sản phẩm mỗi trang
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($page - 1) * $limit;
        
            $data['total_products'] = count($data['list_product']); // Số lượng sản phẩm sau khi lọc
            $data['list_product'] = array_slice($data['list_product'], $offset, $limit); // Chia trang
            $data['limit'] = $limit;
            $data['page'] = $page;
        
            // Truyền biến này vào view
            $data['product_index'] = $categorymodel->list_product_index($table_product);
            $table_product_images = 'tbl_product_images';
            $product_images = [];
            foreach ($data['product_index'] as $product) {
                $product_images[$product['id_product']] = $categorymodel->get_product_images($table_product_images, $product['id_product']);
            }
            $data['product_images'] = $product_images;
        
            $this->load->view('header', $data);
            $this->load->view('list_product', $data);
            $this->load->view('footer');
        }
        
        
        
        
    }

?>