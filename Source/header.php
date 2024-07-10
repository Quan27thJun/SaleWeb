<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require("db.php");
    include("func.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/Sales-Website-PHP-main/Source/giaodien/mystyle.css">
    <title>Sale Shop</title>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="topbar">
            <div class="center">
                <span>HELLO ^_^, Welcome to our store</span>
                <ul class="listtopbar">
                    <li><a href="/"><i style='font-size:12px' class='fas'>&#xf007;</i> 
                    <?php
                        if(isset($_SESSION['username']) && $_SESSION['username']) {
                            $username = $_SESSION['username'];
                            $sql = "SELECT * FROM taikhoan WHERE TenDangNhap='$username'";
                            $query = mysqli_query($connection, $sql);
                            $row = mysqli_fetch_array($query);
                            if ($row['Quyen'] == 1) {
                                echo '<font color="red">'.$username.'</font>';
                            } else {
                                echo $username;
                            }
                        } else {
                            ?> 
                            Tài khoản
                            <?php
                        }
                        ?>
                    </a>
                    <ul id="loginout">
                    <?php
                    if(isset($_SESSION['username']) && $_SESSION['username']) {
                        if ($row['Quyen'] == 1) {
                            echo'<li id="adm"><a href="/Sales-Website-PHP-main/Source/AdminPanel">Admin Panel</a></li>';
                        }    
                        echo'
                        <li id="login"><a href="/Sales-Website-PHP-main/Source/taikhoan/index.php?&id='.$row['MaTaiKhoan'].'">Trang tài khoản</a></li>
                        <li id="reg"><a href="/Sales-Website-PHP-main/Source/dangxuat.php">Đăng xuất</a></li>';
                    } else {
                        echo'<li id="login"><a href="/Sales-Website-PHP-main/Source/dangnhap.php">Đăng nhập</a></li>
                        <li id="reg"><a href="/Sales-Website-PHP-main/Source/dangky.php">Đăng kí</a></li>';
                    }
                        ?>
                    </ul>
                    </li>
                    <li><a href="/Sales-Website-PHP-main/Source/index.php"><i style='font-size:12px' class='fas'>&#xf005;</i> Khuyến mãi hot</a></li>
                </ul>
            </div>
        </div> 
        <div class="cenbar">
            <div class="center">
                <!-- <a class="logo" href="/"><img src="logo2.png"></a> -->
                <div class="search">
                    <form action="timkiem.php" method="get" class="search-form">
                        <input type="text" size="50" name="search" class="search-input" placeholder="Tìm kiếm sản phẩm...">
                        <button type="submit" name="ok" class="search-button"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="lienlac">
                    <div id="phone">
                    <a href="../giohang/index.php" style="text-decoration: none; color: #fff;">
                        <i class="fas fa-shopping-basket"></i>
                    </a>
                    </div>
                    <div id="number">
                    <?php
                        if(isset($_SESSION['cart'])) {
                            
                            echo'<a href="/Sales-Website-PHP-main/Source/giohang/index.php" style="text-decoration: none;">
                            <span id="sdt">('.count($_SESSION['cart']).') sản phẩm</span></a><br/>';
                        } else { 
                            echo'<a href="/Sales-Website-PHP-main/Source/giohang/index.php" style="text-decoration: none;">
                            <span id="sdt">(0) sản phẩm</span></a><br/>';
                        }
                    ?>
                        <a href="/Sales-Website-PHP-main/Source/giohang/index.php" style="text-decoration: none;"><span id="dd"><font color="#ffdada">Giỏ hàng</font> </span>
                        </a>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="thanhmenu">
            <div class="center">
                <ul class="menu">
                <li id="danhmucsp">
                    <i style='font-size:24px' class='fas'>&#xf0c9;</i> <b>Danh sách sản phẩm</b>
                    <ul class="dssp">
                        <?php
                        $loai = "SELECT * FROM loaisanpham WHERE BiXoa = 0";
                        $loaisp = mysqli_query($connection, $loai);
                        while($row = mysqli_fetch_array($loaisp)) {                           
                            $id = $row['MaLoaiSanPham'];
                            echo '<li id="n">
                            <a href="/Sales-Website-PHP-main/Source/SanPham/index.php?mod=dssp&id='.$id.'">
                            <i class="far fa-star"></i>&nbsp;&nbsp;&nbsp;'.$row['TenLoaiSanPham'].'</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                    <li id="m"><a href="/Sales-Website-PHP-main/Source/index.php">TRANG CHỦ</a></li>
                    <!-- <li id="m"><a href="/">KHUYẾN MÃI</a></li id="m">
                    <li id="m"><a href="/">LIÊN HỆ</a></li id="m"> -->
                </ul>
            </div>
        </div>
