<section id="update_account">
    <div class="container">
        <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
            <div class="alert alert-danger">
                <?php foreach ($_SESSION['errors'] as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
            <?php unset($_SESSION['errors']); ?>
        <?php endif; ?>
        
        <form action="<?php echo BASE_URL ?>/khachang/update_account" method="POST" class="account-update-form">
            <h4 style="text-transform:uppercase;">Trang Thông tin tài khoản</h4>
            <button class="tonbut" onclick="window.location.href='<?php echo BASE_URL ?>/khachang/account'; return false;">Quay Lại</button>
            <h2>Cập nhật thông tin tài khoản</h2>
            
            <label for="customer_name">Tên:</label>
            <input type="text" id="customer_name" name="customer_name" value="<?php echo isset($customer['customer_name']) ? htmlspecialchars($customer['customer_name']) : ''; ?>" required>
            
            <label for="customer_phone">Số điện thoại:</label>
            <input type="text" id="customer_phone" name="customer_phone" value="<?php echo isset($customer['customer_phone']) ? htmlspecialchars($customer['customer_phone']) : ''; ?>" required pattern="\d{10,11}" title="Số điện thoại phải có từ 10 đến 11 ký tự và chỉ chứa số.">
            
            <label for="customer_email">Email:</label>
            <input type="email" id="customer_email" name="customer_email" value="<?php echo isset($customer['customer_email']) ? htmlspecialchars($customer['customer_email']) : ''; ?>" required>
            
            <label for="customer_address">Địa chỉ:</label>
            <input type="text" id="customer_address" name="customer_address" value="<?php echo isset($customer['customer_address']) ? htmlspecialchars($customer['customer_address']) : ''; ?>" required>
            
            <label for="customer_gender">Giới tính:</label>
            <select id="customer_gender" name="customer_gender" required>
                <option value=""></option>
                <option value="Nam" <?php if (isset($customer['customer_gender']) && $customer['customer_gender'] == 'Nam') echo 'selected'; ?>>Nam</option>
                <option value="Nữ" <?php if (isset($customer['customer_gender']) && $customer['customer_gender'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
                <option value="Khác" <?php if (isset($customer['customer_gender']) && $customer['customer_gender'] == 'Khác') echo 'selected'; ?>>Khác</option>
            </select>
            
            <label for="customer_dob">Ngày sinh:</label>
            <input type="date" id="customer_dob" name="customer_dob" value="<?php echo isset($customer['customer_dob']) ? htmlspecialchars($customer['customer_dob']) : ''; ?>" required>
            
            <button type="submit" class="btn">Cập nhật</button>
        </form>
    </div>
</section>
