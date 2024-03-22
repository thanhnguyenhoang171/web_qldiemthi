<?php
require "../../classes/DB.class.php";
$connect = new db();
$conn = $connect->connect();
session_start();

if (isset ($_POST['themdiem'])) {
    // Duyệt qua tất cả các sinh viên trong danh sách và lưu điểm của từng sinh viên
    foreach ($_POST['ma'] as $i => $ma) {
        $lop = $_SESSION['malop'];
        $mon = $_SESSION['mamon'];
        $hk = $_SESSION['mahk'];
        $mieng = $_POST["diemmieng"][$i];
        $p1 = $_POST["diem1tiet1"][$i];
        $p2 = $_POST["diem1tiet2"][$i];
        $t1 = $_POST["diem15phut1"][$i];
        $t2 = $_POST["diem15phut2"][$i];
        $d = $_POST["diemthi"][$i];
        $tb = ($_POST["diemmieng"][$i] + ($_POST["diem1tiet1"][$i] + $_POST["diem1tiet2"][$i]) * 2 + $_POST["diem15phut1"][$i] + $_POST["diem15phut2"][$i] + ($_POST["diemthi"][$i]) * 3) / 10;

        // Thực hiện truy vấn SQL để chèn điểm của sinh viên vào cơ sở dữ liệu
        $sql = "INSERT INTO diem (MaHocKy, MaMonHoc, MaHS, MaLopHoc, DiemMieng, Diem15Phut1, Diem15Phut2, Diem1Tiet1, Diem1Tiet2, DiemThi, DiemTB)
                VALUES ('$hk', '$mon', '$ma', '$lop', '$mieng', '$t1', '$t2', '$p1', '$p2', '$d', '$tb')";
        $result = mysqli_query($conn, $sql);
    }

    if ($result) {
        echo "<script type='text/javascript'>alert('Thêm điểm thành công');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Có lỗi xảy ra khi thêm điểm');</script>";
    }

    echo "<script type='text/javascript'>window.location.href='../qlgv.php?mod=hs';</script>";
    exit(); // Dừng script ngay sau khi thực hiện xong thêm điểm
}

// Nếu không có yêu cầu thêm điểm hoặc có lỗi, tiếp tục hiển thị form
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Trang Nhập Điểm</title>
    <div class="banner">
        <center><img src="../../assets/img/Ban.gif"></center>
    </div>
</head>

<body bgcolor="#f0ffff">
    <br />
    <center>
        <h1>Trang Nhập Điểm</h1>
    </center>
    <form action="add_diemhs.php" method="post">
        <table border="1" cellspacing="0" cellpadding="1">
            <tr style="font-weight: bold">
                <td>Mã Học Sinh</td>
                <td>Tên Học Sinh</td>
                <td>Lớp</td>
                <td>Môn Học</td>
                <td>Học Kỳ</td>
                <td>Điểm Miệng</td>
                <td>Điểm 15 phút</td>
                <td>Điểm 15 phút</td>
                <td>Điểm 1 Tiết</td>
                <td>Điểm 1 Tiết</td>
                <td>Điểm Thi</td>
                <td>Điểm TB</td>
            </tr>
            <?php
            $query = "SELECT * FROM hocsinh WHERE MaLopHoc = '{$_SESSION['malop']}'";
            $results = mysqli_query($conn, $query);
            $i = -1;
            while ($row = mysqli_fetch_assoc($results)) {
                $i++;
                ?>
                <tr>
                    <td><input style="width:90px" type="text" name="ma[]" value="<?php echo $row['MaHS']; ?>"
                            readonly="readonly" /></td>
                    <td><input style="width:200px" type="text" name="ten[]" value="<?php echo $row['TenHS']; ?>"
                            readonly="readonly" /></td>
                    <td><input style="width:70px" type="text" name="lop[]" value="<?php echo $_SESSION['malop']; ?>"
                            readonly="readonly" /></td>
                    <td><input style="width:90px" type="text" name="mon[]" value="<?php echo $_SESSION['mamon']; ?>"
                            readonly="readonly" /></td>
                    <td><input style="width:100px" type="text" name="hk[]" value="<?php echo $_SESSION['mahk']; ?>"
                            readonly="readonly" /></td>
                    <td><input style="width:100px" type="text" name="diemmieng[<?php echo $i; ?>]" /></td>
                    <td><input style="width:100px" type="text" name="diem15phut1[<?php echo $i; ?>]" /></td>
                    <td><input style="width:100px" type="text" name="diem15phut2[<?php echo $i; ?>]" /></td>
                    <td><input style="width:100px" type="text" name="diem1tiet1[<?php echo $i; ?>]" /></td>
                    <td><input style="width:100px" type="text" name="diem1tiet2[<?php echo $i; ?>]" /></td>
                    <td><input style="width:100px" type="text" name="diemthi[<?php echo $i; ?>]" /></td>
                    <td><input style="width:100px" type="text" name="diemtb[<?php echo $i; ?>]" readonly="readonly" /></td>
                </tr>
            <?php } ?>
        </table>
        <div style="margin-top: 10px; text-align: center;">
            <input type="submit" name="themdiem" value="Thêm Điểm" />
        </div>
    </form>
</body>

</html>