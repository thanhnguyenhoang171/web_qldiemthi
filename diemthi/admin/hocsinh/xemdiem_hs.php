<div class="banner">
    <center><img src="../../assets/img/Ban.png" width="100%" height="160px"></center>
</div>
<br />
<div style="text-align:right;margin-right:186px;font-weight: bold ">

    <?php
    require '../../includes/config.php';
    session_start(); // Corrected typo here
    $mahs = $_SESSION['ses_MaHS'];
    $query = "select * from hocsinh where MaHS= $mahs";
    $results = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_assoc($results)) {
        echo "Chào Bạn,  " . $data["TenHS"] . " - ";
        echo "MSSV: " . $mahs;
    }
    ?>
</div>
<style type="text/css">
    #menu ul {
        margin-left: 145px;
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

        <li><a href="xemdiem_hs.php">Tra Cứu Điểm</a></li>
        <li><a href="hocsinh_xemthongtin.php">Thông Tin Sinh Viên</a></li>
        <li><a href="../repass2.php">Thay Đổi Mật Khẩu</a></li>
        <li><a href="../logout.php">Đăng Xuất</a></li>

    </ul>
</div>
<?php
require "../../classes/diem.class.php";
$connect = new diem();
$students = $connect->alldiem();
$dis = $connect->dong();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sinh Viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body bgcolor="#CAFFFF">
    <br />
    <h1 class="h1" style="font-family:Tahoma;text-align: center;">Điểm Sinh Viên</h1>
    <center>
        <form action="xemdiem_hs.php" method="post">
            <select name="hk" style="width:100px;height: 25px ">
                <?php
                require '../../includes/config.php';
                $query = "select * from hocky";
                $results = mysqli_query($conn, $query);
                while ($data = mysqli_fetch_assoc($results)) {
                    echo "<option value='$data[TenHocKy]'>$data[TenHocKy]</option>";
                }
                /*require "../../classes/hocki.class.php";
                $hk=new hocki();
                $hocky=$hk->allquery();
                foreach($hocky as $data)
                {
                    echo "<option value='$data[TenHocKy]'>$data[TenHocKy]</option>";
                }*/
                ?>
            </select>
            <input type="submit" name="ok" value="XEM" />
        </form>
    </center>
    <?php
    if (isset($_POST['ok'])) {
        $datafound = false; //flag check empty
        ?>
        <table width="73%" border="1" cellspacing="0" cellpadding="10" style="margin-left:180px">
            <tr class="diem" style="font-weight: bold;color: #0A246A">
                <td>Học Kỳ</td>
                <td>Môn Học</td>
                <td>Điểm Miệng</td>
                <td>Điểm 15 phút</td>
                <td>Điểm 15 phút</td>
                <td>Điểm 1 tiết</td>
                <td>Điểm 1 tiết</td>
                <td>Điểm Thi</td>
                <td>Điểm TB môn</td>
            </tr>
            <?php
            foreach ($students as $item) {
                if ($_SESSION['ses_MaHS'] == $item['MaHS']) {
                    if ($_POST['hk'] == $item['TenHocKy']) {
                        $datafound = true; // non-empty list std
                        ?>
                        <tr>
                            <td>
                                <?php echo $item['TenHocKy']; ?>
                            </td>
                            <td>
                                <?php echo $item['TenMonHoc']; ?>
                            </td>
                            <td>
                                <?php echo $item['DiemMieng']; ?>
                            </td>
                            <td>
                                <?php echo $item['Diem15Phut1']; ?>
                            </td>
                            <td>
                                <?php echo $item['Diem15Phut2']; ?>
                            </td>
                            <td>
                                <?php echo $item['Diem1Tiet1']; ?>
                            </td>
                            <td>
                                <?php echo $item['Diem1Tiet2']; ?>
                            </td>
                            <td>
                                <?php echo $item['DiemThi']; ?>
                            </td>
                            <?php
                            $tinh = 0;
                            $tinh = ($item['DiemMieng'] + $item['Diem15Phut1'] + $item['Diem15Phut2'] + ($item['Diem1Tiet1'] + $item['Diem1Tiet2']) * 2 + $item['DiemThi'] * 3) / 10;
                            $item['DiemTB'] = $tinh;
                            ?>
                            <?php if (
                                $item['DiemMieng'] != null || $item['Diem15Phut1'] != null || $item['Diem15Phut2'] != null || $item['Diem1Tiet1'] != null ||
                                $item['Diem1Tiet2'] != null
                            ) {
                                ?>
                                <td>
                                    <?php echo round($item['DiemTB'], 1); ?>
                                </td>
                            </tr>
                            <?php
                            }
                    }
                }
            }
            if (!$datafound) { // If no data found, display alert
                echo "<div id='errors' style='color: red; position: absolute; top: 42%; left: 50%; transform: translate(-50%, -50%);'>Không tìm thấy dữ liệu cho học kỳ này!</div>";
            }
            else
            {
                echo "<div id='errors' style='color: red; position: absolute; top: 42%; left: 50%; transform: translate(-50%, -50%);'>Đã tìm thấy dữ liệu cho học kỳ này!</div>";
            }
    }
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