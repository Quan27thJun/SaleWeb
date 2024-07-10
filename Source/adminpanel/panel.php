<?php
$username = $_SESSION['username'];
$sql = "SELECT * FROM taikhoan WHERE TenDangNhap='$username'";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($query);
if ($row['Quyen'] == 1) {
    ?>
    <div id="vien"><div class="center"><div id="ban">
    <a id="ba" href="/Sales-Website-PHP-main/Source/index.php">Trang chủ</a> > 
    <font color="#008744">Admin Panel</font></div></div></div>  
    <div class="list"><a id="ba" href="/Sales-Website-PHP-main/Source/qlySanPham">> Quản lý sản phẩm</a></div>
    <div class="list"><a id="ba" href="/Sales-Website-PHP-main/Source/qlyLoaiSP">> Quản lý loại sản phẩm</a></div>
    <div class="list"><a id="ba" href="/Sales-Website-PHP-main/Source/qlyHangSX">> Quản lý thương hiệu</a></div>
    <div class="list"><a id="ba" href="/Sales-Website-PHP-main/Source/qlyDonhang">> Quản lý đơn đặt hàng</a></div>
    <div class="list"><a id="ba" href="/Sales-Website-PHP-main/Source/qlyTaiKhoan">> Quản lý người dùng</a></div>

<?php

} else {
    header("Location: http://localhost//Sales-Website-PHP-main/Source/dangnhap.php");
}
?>