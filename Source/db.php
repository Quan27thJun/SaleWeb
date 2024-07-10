<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "projectphp";

// Tạo kết nối
$connection = mysqli_connect($servername, $username, $password, $database);

// Kiểm tra kết nối
if (!$connection) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}

// Thiết lập charset để sử dụng UTF-8
mysqli_set_charset($connection, "utf8");

// Nếu kết nối thành công
// echo "Kết nối thành công";

// Đoạn mã của bạn ở đây
?>
