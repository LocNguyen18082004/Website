<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 0;
    margin: 0;
}

.container {
    width: 500px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;

}

.container h1 {
    text-align: center;
    margin-bottom: 25px;
    color: #4CAF50;
}

.container label {
    display: block;
    margin-bottom: 5px;
    font-size: 25px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
    margin-bottom: 15px;
    font-size: 20px;
}

button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 15px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}
</style>


<div class="container">
    <h1>ADMIN CPANEL</h1>
    <form  autocomplete="off" action="<?php echo BASE_URL?>/login/authentication_login" method="POST">

        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Đăng nhập</button>

    </form>

</div>