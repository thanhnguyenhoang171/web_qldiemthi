<?php
require "../../classes/DB.class.php";
$connect = new db();
$conn = $connect->connect();
session_start();
if (isset($_POST['themdiem'])) {
    // Hàm kiểm tra điểm hợp lệ
    function isValidDiem($diem)
    {
        return is_numeric($diem) && $diem >= 0 && $diem <= 10 && intval($diem) == $diem;
    }

    // Duyệt qua tất cả các sinh viên trong danh sách và lưu điểm của từng sinh viên
    $error = false; // Biến để kiểm tra xem có lỗi nhập sai hay không
    foreach ($_POST['ma'] as $i => $ma) {
        $lop = $_SESSION['malop'];
        $mon = $_SESSION['mamon'];
        $hk = $_POST['hk'][$i];
        $mieng = $_POST["diemmieng"][$i];
        $p1 = $_POST["diem1tiet1"][$i];
        $p2 = $_POST["diem1tiet2"][$i];
        $t1 = $_POST["diem15phut1"][$i];
        $t2 = $_POST["diem15phut2"][$i];
        $d = $_POST["diemthi"][$i];

        // Kiểm tra điểm hợp lệ
        if (!isValidDiem($mieng) || !isValidDiem($p1) || !isValidDiem($p2) || !isValidDiem($t1) || !isValidDiem($t2) || !isValidDiem($d)) {
            $error = true; // Đánh dấu có lỗi
            break; // Thoát khỏi vòng lặp ngay khi gặp lỗi
        }

        $tb = ($mieng + ($p1 + $p2) * 2 + $t1 + $t2 + $d * 3) / 10;

        // Thực hiện truy vấn SQL để chèn điểm của sinh viên vào cơ sở dữ liệu
        $sql = "INSERT INTO diem (MaHocKy, MaMonHoc, MaHS, MaLopHoc, DiemMieng, Diem15Phut1, Diem15Phut2, Diem1Tiet1, Diem1Tiet2, DiemThi, DiemTB)
                VALUES ('$hk', '$mon', '$ma', '$lop', '$mieng', '$t1', '$t2', '$p1', '$p2', '$d', '$tb')";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            $error = true; // Đánh dấu có lỗi
            break; // Thoát khỏi vòng lặp ngay khi gặp lỗi
        }
    }

    if ($error) {
        echo "<script type='text/javascript'>alert('Có lỗi xảy ra khi thêm điểm');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Thêm điểm thành công');</script>";
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

    <link rel="stylesheet" href="../../assets/css/css/stylea.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Trang Nhập Điểm</title>
    <div class="banner">
        <center><img src="../../assets/img/Ban.png" width="100%" height="160px"></center>
    </div>
</head>

<body bgcolor="#a3cbff">
    <br />
    <center>
        <h1>Trang Nhập Điểm</h1>
    </center>
    <form action="add_chon2.php" method="post">

        <table border="1" cellspacing="0" cellpadding="1" style="background: #f1f1f1; margin: 0 auto">
            <tr class="ToT">

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
                    <td><input style="width:100px" type="text" name="hk[]"
                            value="<?php echo isset($_POST['hk']) ? $_POST['hk'] : ''; ?>" readonly="readonly" /></td>
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

            <input type="submit" class='add-button' name="themdiem" value="Thêm Điểm" />

        </div>
    </form>
    <form action="add_chon.php" method="post">
        <div style="text-align:center; margin-top: 20%;">

            <input type="submit" class='view-button' name="back" value="Trở Về" style="width:100px;height: 25px" />

        </div>
    </form>

</body>

</html>