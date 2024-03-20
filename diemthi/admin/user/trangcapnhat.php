<?php
if($_SESSION['ses_level']!=1) {
    header("location:login.php");
}
?>
<
<H1 align="center" style="font-family: Tahoma">Quản Lý Admin</H1>
<h2 align="center">
    <a href="user/themuser.php">
        <button type='button' class = "add-button">Thêm Admin</button> 
    </a>
</h2>

<h2 align="center">
    <a href="user/hienthiuser.php">
        <button type='button' class = "add-button">Xem thông tin</button> 
    </a>
</h2>

<h2 align="center">
    <a href="user/doimatkhau.php">
        <button type='button' class = "add-button">Đổi Mật Khẩu</button> 
    </a>
</h2>



