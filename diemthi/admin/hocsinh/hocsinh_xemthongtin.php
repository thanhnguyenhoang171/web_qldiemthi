<div class="banner">
    <center><img src="../../assets/img/Ban.png" width="100%" height="160px"></center>
</div>
<br />
<div id="info" style="text-align:right;margin-right:186px;font-weight: bold">
    <?php
    require '../../includes/config.php';
    session_start(); // Corrected typo here
    $mahs = $_SESSION['ses_MaHS'];
    $query = "select * from hocsinh where MaHS= $mahs";
    $results = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_assoc($results)) {
        echo "Chào Bạn,  " . $data["TenHS"] . ' - ';
        echo "MSSV: " . $mahs;
    }
    ?>
</div>
<style type="text/css">
    #menu ul {
        margin-left: 15%;
    }

    #menu ul li {
        display: inline;

    }

    #menu ul a {
        text-decoration: none;
        width: 245px;
        float: left;
        background: #336699;
        color: #FFFFFF;
        text-align: center;
        line-height: 27px;
        font-weight: bold;
        border-left: 1px solid #FFFFFF;
    }

    #menu ul a:hover {
        background: #000000;
    }
</style>
<link rel="stylesheet" type="text/css" href="style.css">
<div id="menu">

    <ul>

        <li><a href="xemdiem_hs.php">Xem Điểm</a></li>
        <li><a href="hocsinh_xemthongtin.php">Thông Tin Sinh Viên</a></li>
        <li><a href="../repass2.php">Thay Đổi Mật Khẩu</a></li>
        <li><a href="../logout.php">Đăng Xuất</a></li>

    </ul>
</div>
<?php
require "../../classes/hocsinh.class.php";
$connect = new hocsinh();
$students = $connect->allhs();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Danh sách sinh viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body bgcolor="#CAFFFF">
    <br />
    <h1 style="font-family:Tahoma;text-align: center;">THÔNG TIN SINH VIÊN</h1>
    <table id="student-info" width="74%" border="1" cellspacing="0" cellpadding="10" style="margin-left:180px">
        <tr style="font-weight: bold;color: #0A246A">
            <td>Mã Sinh Viên</td>
            <td>Lớp</td>
            <td>Tên Sinh Viên</td>
            <td>Giới Tính</td>
            <td>Ngày Sinh</td>
            <td>Nơi Sinh</td>
            <td>Dân Tộc</td>
            <td>Họ Tên Cha</td>
            <td>Họ Tên Mẹ</td>
        </tr>

        <?php
        foreach ($students as $item) {
            if ($_SESSION['ses_MaHS'] == $item['MaHS']) {
                ?>
                <tr>
                    <td>
                        <div id=MHS> <?php echo $item['MaHS']; ?> </div>
                    </td>
                    <td>
                        <?php echo $item['TenHS']; ?>
                    </td>
                    <td>
                        <?php echo $item['MaLopHoc']; ?>
                    </td>
                    <td>
                        <?php echo $item['GioiTinh']; ?>
                    </td>
                    <td>
                        <?php echo $item['NgaySinh']; ?>
                    </td>
                    <td>
                        <?php echo $item['noisinh']; ?>
                    </td>
                    <td>
                        <?php echo $item['dantoc']; ?>
                    </td>
                    <td>
                        <?php echo $item['hotencha']; ?>
                    </td>
                    <td>
                        <?php echo $item['hotenme']; ?>
                    </td>
                <?php }

            ?>
            </tr>
        <?php }
        ?>
    </table>
    <table border=0 cellpadding=5 cellspacing=0 align="center" width="983">
        <TR>
            <TD>
        <tr>
            <td colspan="2" bgcolor="#336699" align="center" style="color:white; font-style: italic;">
                dev&designed by hthanh and mkhue Open University <br>
            </td>
        </tr>
        </td>
        </TR>
    </table>
</body>

</html>