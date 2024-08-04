<?php 

    class product extends DController {
        public function __construct()
        {
            parent::__construct();
        }
        public function index(){
            $this->add_category();
        }
        public function add_category(){
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/product/add_category');
            $this->load->view('admin/footer');
        }
        public function add_product(){
            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $table = "tbl_category_product";
            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category($table);

            $this->load->view('admin/product/add_product', $data);
            $this->load->view('admin/footer');
        }
        public function insert_product(){
            $table = "tbl_product";
            $table_product_images = "tbl_product_images"; // Bảng ảnh phụ
            $categorymodel = $this->load->model('categorymodel');
        
            $title = $_POST['title_product'];
            $code = $_POST['code_product'];
            $desc = $_POST['desc_product'];
            $price = $_POST['price_product'];
            $hot = $_POST['product_hot'];
            $quantity = $_POST['quantity_product'];
            $category = $_POST['category_product'];
        
            $image = $_FILES['image_product']['name'];
            $tmp_image = $_FILES['image_product']['tmp_name'];
            $div = explode('.', $image);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;
            $path_uploads = "public/uploads/product/".$unique_image;
            
            if($image){
                move_uploaded_file($tmp_image, $path_uploads);
            }
        
            $data = array(
                'title_product' => $title,
                'code_product' => $code,
                'desc_product' => $desc,
                'quantity_product' => $quantity,
                'price_product' => $price,
                'product_hot' => $hot,
                'image_product' => $unique_image,
                'id_category_product' => $category
            );
            $result = $categorymodel->insertproduct($table,$data);
            if($result !== false){
                $id_product = $categorymodel->lastInsertId(); // Lấy ID sản phẩm mới vừa thêm
                
                // Xử lý ảnh phụ
                if(isset($_FILES['product_images'])){
                    $product_images = $_FILES['product_images'];
                    $num_files = count($product_images['name']);
                    
                    for($i = 0; $i < $num_files; $i++){
                        $image_name = $product_images['name'][$i];
                        $tmp_image = $product_images['tmp_name'][$i];
                        $div = explode('.', $image_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = $div[0].time().$i.'.'.$file_ext;
                        $path_uploads = "public/uploads/product/".$unique_image;
                        
                        move_uploaded_file($tmp_image, $path_uploads);
                        
                        // Thêm bản ghi ảnh phụ vào cơ sở dữ liệu
                        $image_data = array(
                            'id_product' => $id_product,
                            'image_path' => $unique_image
                        );
                        $categorymodel->insert_product_image($table_product_images, $image_data);
                    }
                }
                
                $message['msg'] = "Thêm sản phẩm thành công";
                header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }else{
                $message['msg'] = "Thêm sản phẩm thất bại";
                header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }
        }
        
        public function insert_category(){
            $title = $_POST['title_category_product'];
            $desc = $_POST['desc_category_product'];

            $table = "tbl_category_product";
            $data = array(
                'title_category_product' => $title,
                'desc_category_product' => $desc
            );
            $categorymodel = $this->load->model('categorymodel');
            $result = $categorymodel->insertcategory($table,$data);
            if($result !== false){
                
                $message['msg'] = "Thêm danh mục sản phẩm thành công";
                header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
            }else{
                $message['msg'] = "Thêm danh mục sản phẩm thất bậi";
                header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
            }
        }
        public function list_product(){
            $this->load->view('admin/header');
            $this->load->view('admin/menu');

            $table_product = "tbl_product";
            $table_category = "tbl_category_product";

            $categorymodel = $this->load->model('categorymodel');
            $data['product'] = $categorymodel->product($table_product,$table_category);

            $this->load->view('admin/product/list_product',$data);
            $this->load->view('admin/footer');
        }
        public function list_category(){
            $this->load->view('admin/header');
            $this->load->view('admin/menu');

            $table = "tbl_category_product";

            $categorymodel = $this->load->model('categorymodel');
            $data['category'] = $categorymodel->category($table);

            $this->load->view('admin/product/list_category',$data);
            $this->load->view('admin/footer');
        }
        public function delete_product($id){
            $table = "tbl_product";
            $cond = "id_product='$id'";
            $categorymodel = $this->load->model('categorymodel');
            $result = $categorymodel->deleteproduct($table,$cond);
            if($result==1){
                $message['msg'] = "Xóa sản phẩm thành công";
                header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }else{
                $message['msg'] = "Xóa sản phẩm thất bậi";
                header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }
        }
        public function delete_category($id){
            $table = "tbl_category_product";
            $cond = "id_category_product='$id'";
            $categorymodel = $this->load->model('categorymodel');
            $result = $categorymodel->deletecategory($table,$cond);
            if($result==1){
                $message['msg'] = "Xóa danh mục sản phẩm thành công";
                header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
            }else{
                $message['msg'] = "Xóa danh mục sản phẩm thất bậi";
                header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
            }
        }
        public function edit_product($id){

            $table = "tbl_product";
            $table_category = "tbl_category_product";
            $cond = "id_product='$id'";
            $table_image = 'tbl_product_images';
            $categorymodel = $this->load->model('categorymodel');

            $data['productbyid'] = $categorymodel->productbyid($table, $table_image, $cond);
            $data['category'] = $categorymodel->category($table_category);

            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/product/edit_product',$data);
            $this->load->view('admin/footer');
        }
        public function edit_category($id){

            $table = "tbl_category_product";
            $cond = "id_category_product='$id'";
            $categorymodel = $this->load->model('categorymodel');
            $data['categorybyid'] = $categorymodel->categorybyid($table,$cond);

            $this->load->view('admin/header');
            $this->load->view('admin/menu');
            $this->load->view('admin/product/edit_category',$data);
            $this->load->view('admin/footer');
        }
        public function update_product($id) {
            $table = "tbl_product";
            $table_product_images = "tbl_product_images"; // Bảng ảnh phụ
            $cond = "id_product='$id'";
            $categorymodel = $this->load->model('categorymodel');
        
            $title = $_POST['title_product'];
            $code = $_POST['code_product'];
            $desc = $_POST['desc_product'];
            $price = $_POST['price_product'];
            $hot = $_POST['product_hot'];
            $quantity = $_POST['quantity_product'];
            $category = $_POST['category_product'];
        
            $image = $_FILES['image_product']['name'];
            $tmp_image = $_FILES['image_product']['tmp_name'];
            $div = explode('.', $image);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0].time().'.'.$file_ext;
            $path_uploads = "public/uploads/product/".$unique_image;
        
            $data = array(
                'title_product' => $title,
                'code_product' => $code,
                'desc_product' => $desc,
                'quantity_product' => $quantity,
                'price_product' => $price,
                'product_hot' => $hot,
                'id_category_product' => $category
            );
        
            if ($image) {
                // Xóa ảnh cũ nếu có
                $existing_product = $categorymodel->productbyid($table, $table_product_images, $cond);
                if ($existing_product && $existing_product['image_product']) {
                    $path_unlink = "public/uploads/product/";
                    unlink($path_unlink.$existing_product['image_product']);
                }
        
                // Cập nhật ảnh mới
                move_uploaded_file($tmp_image, $path_uploads);
                $data['image_product'] = $unique_image;
            }
        
            $result = $categorymodel->updateproduct($table, $data, $cond);
            if ($result == 1) {
                // Xử lý ảnh phụ
                if (isset($_FILES['product_images']) && $_FILES['product_images']['name'][0] != '') {
                    $product_images = $_FILES['product_images'];
                    $num_files = count($product_images['name']);
        
                    // Xóa ảnh phụ cũ
                    $existing_images = $categorymodel->get_product_images($table_product_images, $id);
                    foreach ($existing_images as $img) {
                        $path_unlink = "public/uploads/product/";
                        unlink($path_unlink.$img['image_path']);
                    }
                    $categorymodel->delete_product_images($table_product_images, $id);
        
                    // Tải lên ảnh phụ mới
                    for ($i = 0; $i < $num_files; $i++) {
                        $image_name = $product_images['name'][$i];
                        $tmp_image = $product_images['tmp_name'][$i];
                        $div = explode('.', $image_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = $div[0].time().$i.'.'.$file_ext;
                        $path_uploads = "public/uploads/product/".$unique_image;
        
                        if (move_uploaded_file($tmp_image, $path_uploads)) {
                            // Thêm bản ghi ảnh phụ mới vào cơ sở dữ liệu
                            $image_data = array(
                                'id_product' => $id,
                                'image_path' => $unique_image
                            );
                            $categorymodel->insert_product_image($table_product_images, $image_data);
                        } else {
                            // Xử lý lỗi tải lên
                            $message['msg'] = "Tải lên ảnh phụ thất bại.";
                            header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
                            exit;
                        }
                    }
                }
                
                $message['msg'] = "Cập nhật sản phẩm thành công";
                header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            } else {
                $message['msg'] = "Cập nhật sản phẩm thất bại";
                header('Location:'.BASE_URL."/product/list_product?msg=".urlencode(serialize($message)));
            }
        }
        
        
        
        
        public function update_category_product($id){
            $table = "tbl_category_product";
            $cond = "id_category_product='$id'";

            $title = $_POST['title_category_product'];
            $desc = $_POST['desc_category_product'];

            $data = array(
                'title_category_product' => $title,
                'desc_category_product' => $desc
            );
            $categorymodel = $this->load->model('categorymodel');

            $result = $categorymodel->updatecategory($table,$data,$cond);

            if($result==1){

                $message['msg'] = "Cập nhật danh mục sản phẩm thành công";
                header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
            }else{
                $message['msg'] = "Cập nhật danh mục sản phẩm thất bậi";
                header('Location:'.BASE_URL."/product/list_category?msg=".urlencode(serialize($message)));
            }
        }
    }

?>