<div id="vien"><div class="center"><div id="ban">
<a id="ba" href="/Sales-Website-PHP-main/Source/index.php">Trang chủ</a> > <a id="ba" href="/Sales-Website-PHP-main/Source/adminpanel">Admin Panel</a> > 
<font color="#008744">Quản lý thương hiệu</font></div></div></div>
<div class="list"><a href="/Sales-Website-PHP-main/Source/qlyHangSX/index.php?mod=add"><button class="button">Thêm thương hiệu</button></a></div>
<?php
// 2. Tạo câu truy vấn (Query): SELECT, INSERT, DELETE, UPDATE
    $sql = "SELECT * FROM hangsanxuat";

    // 3. Thực thi câu truy vấn
    $result = mysqli_query($connection, $sql);

    // 4. Xử lý kết quả của câu truy vấn (SELECT)
    while($row = mysqli_fetch_array($result))
    {
        $id = $row['MaHangSanXuat'];
        $name = $row['TenHangSanXuat'];
        $xoa = $row['BiXoa'];
        if($row['BiXoa'] == 1) {
            echo'<div class="listdel">';
        } else {
            echo '<div class="list">';
        }
        echo''.$id.'. '.$name.'';
        echo '<div class="tool"><a href="/Sales-Website-PHP-main/Source/qlyHangSX/index.php?mod=update&id='.$id.'"><i class="far fa-edit">Update</i></a>  ';
        if($xoa == 1) {
            echo '<a href="/Sales-Website-PHP-main/Source/qlyHangSX/index.php?mod=restore&id='.$id.'"><i class="fas fa-trash-restore-alt">Delete/Restore</i></a>';
        } else {
            echo '<a href="/Sales-Website-PHP-main/Source/qlyHangSX/index.php?mod=del&id='.$id.'"><i class="far fa-trash-alt">Delete/Restore</i></a>';
        }
        echo '</div></div>';
    }
?>
