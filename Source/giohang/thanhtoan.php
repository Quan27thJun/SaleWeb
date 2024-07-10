<?php

if (isset($_POST['ThanhToan'])) {
    
    if (isset($_SESSION['username'])) {
        $user = $_SESSION['username'];
        $nguoidung = "SELECT * FROM taikhoan WHERE TenDangNhap = '$user'";
        $ngdung = mysqli_query($connection, $nguoidung);
        $ngd = mysqli_fetch_array($ngdung);
        $users = $ngd['MaTaiKhoan'];
    } else {
        // Handle the case where user is not logged in
        echo "Please log in to continue.";
        exit; // or redirect to login page
    }

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $sql = "SELECT * FROM sanpham WHERE MaSanPham IN (";
        foreach ($_SESSION['cart'] as $id => $value) {
            $sql .= "$id,";
        }
        $sql = rtrim($sql, ",") . ") ORDER BY MaSanPham ASC";
        
        $query = mysqli_query($connection, $sql);
        if (!$query) {
            echo "Error: " . mysqli_error($connection);
            exit;
        }

        $tongtien = 0.0;
        while ($row = mysqli_fetch_array($query)) {
            $soluong = $_SESSION['cart'][$row['MaSanPham']]['soluong'];
            $thanhtien = $soluong * $row['GiaSanPham'];
            $tongtien += $thanhtien;
        }

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $ngaylap = date("Y-m-d H:i:s");

        // Tao don hang
        $them = "INSERT INTO dondathang (NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang) 
                 VALUES ('$ngaylap','$tongtien','$users', 1)";
        $them2 = mysqli_query($connection, $them);

        // Chi tiet don hang
        $ddh = "SELECT * FROM dondathang ORDER BY MaDonDatHang DESC LIMIT 1";
        $tvddh = mysqli_query($connection, $ddh);
        $dondathang = mysqli_fetch_array($tvddh);
        $maddh = $dondathang['MaDonDatHang'];

        $tvsp = "SELECT * FROM sanpham WHERE MaSanPham IN (";
        foreach ($_SESSION['cart'] as $id => $value) {
            $tvsp .= "$id,";
        }
        $tvsp = rtrim($tvsp, ",") . ") ORDER BY MaSanPham ASC";
        
        $sp = mysqli_query($connection, $tvsp);
        if (!$sp) {
            echo "Error: " . mysqli_error($connection);
            exit;
        }

        while ($r = mysqli_fetch_array($sp)) {
            $sl = $_SESSION['cart'][$r['MaSanPham']]['soluong'];
            $giasp = $r['GiaSanPham'];
            $masp = $r['MaSanPham'];
            $add = "INSERT INTO chitietdondathang (SoLuong, GiaBan, MaDonDatHang, MaSanPham)
                    VALUES ('$sl', '$giasp', '$maddh', '$masp')";
            $themct = mysqli_query($connection, $add);
            if (!$themct) {
                echo "Error: " . mysqli_error($connection);
                exit;
            }
        }

        if ($them2) {
            echo '<div class="list">Đã đặt hàng thành công. <a href="/Sales-Website-PHP-main/Source/donhang/index.php?mod=chitiet&id='.$maddh.'">Đến chi tiết đơn hàng </a></div>';
            unset($_SESSION['cart']);
        } else {
            echo "Error creating order.";
        }
    } else {
        echo "Your cart is empty or invalid.";
    }
}
?>
