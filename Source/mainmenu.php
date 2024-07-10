
<div class="mainmenu">
<div class="vienxanh"><div class="tit">NEW</div></div>
<?php
//10 san pham moi nhat 
    // 2. Tạo câu truy vấn (Query): SELECT, INSERT, DELETE, UPDATE
    $sql = "SELECT * FROM sanpham WHERE BiXoa = 0 ORDER BY NgayNhap DESC LIMIT 10";

    // 3. Thực thi câu truy vấn
    $result = mysqli_query($connection, $sql);
    echo'<div class="hang1">';

    // 4. Xử lý kết quả của câu truy vấn (SELECT)
    while($row = mysqli_fetch_array($result))
    {
        $id = $row['MaSanPham'];
        $name = $row['TenSanPham'];
        $price = $row['GiaSanPham'];
        $hinh = $row['HinhURL'];
        $image_path = "/Sales-Website-PHP-main/Source/images/" . $hinh;
                
        echo '<div class="list2">';
        echo '<a href="/Sales-Website-PHP-main/Source/SanPham/index.php?mod=sanpham&id=' . $id . '">';
        echo '<img src="' . $image_path . '" width="215px" height="200px" alt="' . $name . '"></a>';
        echo '<a id="tensp" href="/Sales-Website-PHP-main/Source/SanPham/index.php?mod=sanpham&id=' . $id . '"><p>' . $name . '</p></a>';
        echo '<span>';
        echo number_format($price, 0) . ' đ<br>';
        echo '</span></div>';
    }
    echo'</div><div class="list"></div>';
    echo'</div>';
    ?>
    
    <div class="mainmenu">
<div class="vienxanh"><div class="tit">HOT</div></div>

<?php
//10 san pham ban chay nhat
    // 2. Tạo câu truy vấn (Query): SELECT, INSERT, DELETE, UPDATE
    $sql = "SELECT * FROM sanpham WHERE BiXoa = 0 ORDER BY SoLuongDaBan DESC LIMIT 10";

    // 3. Thực thi câu truy vấn
    $result = mysqli_query($connection, $sql);
    echo'<div class="hang1">';

    // 4. Xử lý kết quả của câu truy vấn (SELECT)
    while($row = mysqli_fetch_array($result))
    {
        $id = $row['MaSanPham'];
        $name = $row['TenSanPham'];
        $price = $row['GiaSanPham'];
        $hinh = $row['HinhURL'];
        $image_path = "/Sales-Website-PHP-main/Source/images/" . $hinh;
        
        echo '<div class="list2">';
        echo '<a href="/Sales-Website-PHP-main/Source/SanPham/index.php?mod=sanpham&id=' . $id . '">';
        echo '<img src="' . $image_path . '" width="215px" height="200px" alt="' . $name . '"></a>';
        echo '<a id="tensp" href="/Sales-Website-PHP-main/Source/SanPham/index.php?mod=sanpham&id=' . $id . '"><p>' . $name . '</p></a>';
        echo '<span>';
        echo number_format($price, 0) . ' đ<br>';
        echo '</span></div>';
    }
    echo'</div>';
?>
</div>