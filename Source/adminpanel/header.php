<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require "../db.php";
    require "../func.php";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/Sales-Website-PHP-main/Source/giaodien/mystyle.css">
    <link rel="stylesheet" type="text/css" href="/Sales-Website-PHP-main/Source/giaodien/fontawesome.min.css">
    <title>Trang quản lý của ADMIN</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="header">
        <div class="topbar">
            <div class="center"><a href="/Sales-Website-PHP-main/Source"><font color="#fff">Trang chủ chính</font></a> |
                <span><a href="/Sales-Website-PHP-main/Source/adminpanel"><font color="#fff">Trang quản lý của ADMIN</font></a></span>
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
                                echo'<li id="adm"><a>Admin Panel</a></li>';
                                // echo'<li id="adm"><a href="/Sales-Website-PHP-main/Source/AdminPanel.php">Admin Panel</a></li>';
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
                </ul>
            </div>
        </div> 

     
