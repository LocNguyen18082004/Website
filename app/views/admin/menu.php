<section id="menu">
        <div class="logo">
            <img src="<?php echo BASE_URL ?>/public/template/img/admin/logo.png" alt="">
            <h2>Dynamic</h2>
        </div>

        <div class="items">
            <li><i class="fa-solid fa-chart-pie"></i><a href="<?php echo BASE_URL ?>/login/dashboard">Trang chủ</a></li>
            <li>
                <a class="order-toggle" href="#"><i class="fab fa-uikit"></i>
                Danh mục Bài viết</a>
                <ul class="sub-menu">
                    <li ><a class="ib" href="<?php echo BASE_URL?>/post">Thêm</a></li>
                    <li ><a class="ib" href="<?php echo BASE_URL?>/post/list_category">Liệt kê</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="order-toggle"><i class="fas fa-th-large"></i>
                Bài viết</a>
                <ul class="sub-menu">
                    <li ><a class="ib" href="<?php echo BASE_URL?>/post/add_post">Thêm</a></li>
                    <li ><a class="ib" href="<?php echo BASE_URL?>/post/list_post">Liệt kê</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="order-toggle"><i class="fas fa-th-large"></i>
                Danh mục Sản phẩm</a>
                <ul class="sub-menu">
                    <li ><a class="ib" href="<?php echo BASE_URL?>/product">Thêm</a></li>
                    <li ><a class="ib" href="<?php echo BASE_URL?>/product/list_category">Liệt kê</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="order-toggle"><i class="fas fa-th-large"></i>
                Sản phẩm</a>
                <ul class="sub-menu">
                    <li ><a class="ib" href="<?php echo BASE_URL?>/product/add_product">Thêm</a></li>
                    <li ><a class="ib" href="<?php echo BASE_URL?>/product/list_product">Liệt kê</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="order-toggle"><i class="fas fa-edit"></i>
                Đơn hàng</a>
                <ul class="sub-menu">
                    <li ><a class="ib" href="<?php echo BASE_URL?>/order">Liệt kê</a></li>
                </ul>
            </li>
            <li><i class="fa-solid fa-right-from-bracket"></i><a href="<?php echo BASE_URL?>/login/logout">Đăng xuất</a></h3></li>
        </div>
    </section>