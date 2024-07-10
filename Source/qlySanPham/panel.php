<div id="vien"><div class="center"><div id="ban">
<a id="ba" href="/Sales-Website-PHP-main/Source/index.php">Trang chủ</a> > <a id="ba" href="/Sales-Website-PHP-main/Source/adminpanel">Admin Panel</a> > 
<font color="#008744">Quản lý sản phẩm</font></div></div></div>
<div class="list"><a href="/Sales-Website-PHP-main/Source/qlySanPham/index.php?mod=add"><button class="button">Thêm sản phẩm</button></a></div>
<?php
// 2. Tạo câu truy vấn (Query): SELECT, INSERT, DELETE, UPDATE
    $sql = "SELECT * FROM sanpham ORDER BY MaSanPham DESC";

    // 3. Thực thi câu truy vấn
    $result = mysqli_query($connection, $sql);

    // 4. Xử lý kết quả của câu truy vấn (SELECT)
    while($row = mysqli_fetch_array($result))
    {
        $mahsx = $row['MaHangSanXuat'];
        $malsp = $row['MaLoaiSanPham'];
        
        $sql1 = "SELECT * FROM hangsanxuat WHERE MaHangSanXuat = '$mahsx'";
        $hangsx = mysqli_query($connection, $sql1);
        $hsx = mysqli_fetch_array($hangsx);
        $sql2 = "SELECT * FROM loaisanpham WHERE MaLoaiSanPham = '$malsp'";
        $loaisp = mysqli_query($connection, $sql2);
        $lsp = mysqli_fetch_array($loaisp);
        if($row['BiXoa'] == 1) {
            echo'<div class="listdel">';
        } else {
            echo '<div class="list">';
        }
        echo ''.$row['MaSanPham'].'. '.$row['TenSanPham'].' - Giá: ';
        echo number_format($row['GiaSanPham'], 0).'₫<br>';
        echo 'Số lượng hàng: '.$row['SoLuong'].' - Ngày nhập: '.$row['NgayNhap'].'';
        echo '<br/>Thương hiệu: '.$hsx['TenHangSanXuat'].' - Loại: '.$lsp['TenLoaiSanPham'].'';
        echo '<br/><img width="100" height="100" src="/Sales-Website-PHP-main/Source/images/'.$row['HinhURL'].'"><br/>';
        echo '<div class="tool"><a href="/Sales-Website-PHP-main/Source/qlySanPham/index.php?mod=update&id='.$row['MaSanPham'].'"><i class="far fa-edit"></i>Update</a>  ';
        if($row['BiXoa'] == 1) {
            echo '<a href="/Sales-Website-PHP-main/Source/qlySanPham/index.php?mod=restore&id='.$row['MaSanPham'].'"><i class="fas fa-trash-restore-alt">Delete/Restore</i></a>';
        } else {
            echo '<a href="/Sales-Website-PHP-main/Source/qlySanPham/index.php?mod=del&id='.$row['MaSanPham'].'"><i class="far fa-trash-alt"></i>Delete/Restore</a>';
        }
        echo '</div></div>';
    }
?>
