<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    
</head>
<style>
    body {
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
    text-align: center;
   
}
.container {
    display: flex;
    flex-direction: column;
  justify-content: center;
  align-items: center;
  min-height: 90vh; /* Chiều cao tối thiểu bằng chiều cao màn hình */
}

h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

p {
    font-size: 16px;
    line-height: 1.5;
}

.button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.button:hover {
    background-color: #0056b3;
}
</style>
<body>
    <div class="container">
    <h1>404 Not Found</h1>
    <p>Trang bạn truy cập không được tìm thấy.</p>
    <p><a href="<?php echo BASE_URL ?>">Quay lại trang chủ</a></p>
    <p><button><a href="/search">Tìm kiếm</a></button></p>
</div>
</body>
</html>
