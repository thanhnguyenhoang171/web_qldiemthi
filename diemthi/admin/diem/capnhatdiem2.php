<?php
require "../../classes/DB.class.php";
$connect = new db();
$conn = $connect->connect();
session_start();
if (isset ($_POST['themdiem'])) {
    // Hàm kiểm tra điểm hợp lệ
    function isValidDiem($diem)
    {
        return is_numeric($diem) && $diem >= 0 && $diem <= 10 && intval($diem) == $diem;
    }

    // Duyệt qua tất cả các sinh viên trong danh sách và lưu điểm của từng sinh viên
    $error = false; // Biến để kiểm tra xem có lỗi nhập sai hay không
    foreach ($_POST['ma'] as $i => $ma) {
        $mieng = $_POST["diemmieng"][$i];
        $p1 = $_POST["diem15phut1"][$i];
        $p2 = $_POST["diem15phut2"][$i];
        $t1 = $_POST["diem1tiet1"][$i];
        $t2 = $_POST["diem1tiet2"][$i];
        $d = $_POST["diemthi"][$i];

        // Kiểm tra điểm hợp lệ
        if (!isValidDiem($mieng) || !isValidDiem($p1) || !isValidDiem($p2) || !isValidDiem($t1) || !isValidDiem($t2) || !isValidDiem($d)) {
            $error = true; // Đánh dấu có lỗi
            break; // Thoát khỏi vòng lặp ngay khi gặp lỗi
        }

        $tb = ($mieng + ($p1 + $p2) * 2 + $t1 + $t2 + $d * 3) / 10;

        // Thực hiện truy vấn SQL để cập nhật điểm của sinh viên vào cơ sở dữ liệu
        $sql = "UPDATE diem 
                SET DiemMieng='$mieng', Diem15Phut1='$p1', Diem15Phut2='$p2', Diem1Tiet1='$t1', Diem1Tiet2='$t2', DiemThi='$d', DiemTB='$tb' 
                WHERE MaHS='$ma'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            $error = true; // Đánh dấu có lỗi
            break; // Thoát khỏi vòng lặp ngay khi gặp lỗi
        }
    }

    if ($error) {
        echo "<script type='text/javascript'>alert('Có lỗi xảy ra khi sửa điểm');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Sửa điểm thành công');</script>";
    }

    echo "<script type='text/javascript'>window.location.href='../qlgv.php?mod=hs';</script>";
    exit(); // Dừng script ngay sau khi thực hiện xong thêm điểm
}

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Trang Nhập Điểm</title>
    <div class="banner">
        <center><img src="../../assets/img/Ban.png" width="100%" height="160px"></center>
    </div>
</head>

<body bgcolor="#f0ffff">

    <!-- Mới cắt 1 cái ở đây -->
    <br />
    <center>
        <h1>Trang Cập Nhập Điểm</h1>
    </center>
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

        <!-- -------------------------- -->
        <form action="capnhatdiem2.php" method="post">
            <!-- Phần 1 -->
            <hr>
            <div style="text-align:center;margin-left: 400px;border: 2px solid;width:500px;font-weight: bold">
                <div>Danh Sách Lớp:
                    <?php echo $_POST['day'] ?>
                </div>
                <div> Mã Môn Học:
                    <?php echo $_POST['mon'] ?>
                </div>
                <div> Mã Học Kỳ:
                    <?php echo $_POST['hk'] ?>
                </div>
                <div> Mã Giáo Viên Nhập Điểm:
                    <?php echo $_SESSION['ses_Magv'] ?>
                </div>
            </div>
            <hr>
            <!-- Phần 1 -->
            <!-- Phần 2 -->
            <div>
                <div style="text-align: right;float: left">
                    <a href="../qlgv.php"><button type='button'>Trở Về</button></a>
                </div>
                <div style="text-align: right">
                    <input type="submit" name="themdiem" value="Thêm Điểm" />
                </div>
            </div>
            <!-- Phần 2 -->
            <!-- Phần 3 -->
            <hr>
            <?php
            // Lấy thông tin lớp học, môn học, học kỳ và giáo viên từ POST
            $malop = isset ($_POST['day']) ? $_POST['day'] : ''; // 10A7
            $mamon = isset ($_POST['mon']) ? $_POST['mon'] : ''; // Môn Toán , Mã Môn: T
            $mahk = isset ($_POST['hk']) ? $_POST['hk'] : '';
            $magv = isset ($_SESSION['ses_Magv']) ? $_SESSION['ses_Magv'] : '';
            $query = "SELECT d.*, hs.*, gv.*
          FROM diem AS d
          JOIN hocsinh AS hs ON d.MaHS = hs.MaHS
          JOIN day AS dy ON d.MaLopHoc = dy.MaLopHoc AND d.MaMonHoc = dy.MaMonHoc AND d.MaHocKy = dy.MaHocKy
          JOIN giaovien AS gv ON dy.Magv = gv.Magv
          WHERE dy.MaLopHoc = '$malop' AND dy.MaMonHoc = '$mamon' AND dy.MaHocKy = '$mahk'";




            $results = mysqli_query($conn, $query);
            $i = -1;
            while ($row = mysqli_fetch_assoc($results)) {
                $i++;
                ?>
                <tr>
                    <td><input style="width:90px" type="text" name="ma[]" value="<?php echo $row['MaHS']; ?>"
                            readonly="readonly" />
                    </td>
                    <td><input style="width:200px" type="text" name="ten[]" value="<?php echo $row['TenHS']; ?>"
                            readonly="readonly" />
                    </td>
                    <td><input style="width:70px" type="text" name="lop[]" value="<?php echo $row['MaLopHoc']; ?>"
                            readonly="readonly" /></td>
                    <td><input style="width:90px" type="text" name="mon[]" value="<?php echo $row['MaMonHoc']; ?>"
                            readonly="readonly" /></td>
                    <td><input style="width:100px" type="text" name="hk[]"
                            value="<?php echo isset ($_POST['hk']) ? $_POST['hk'] : ''; ?>" readonly="readonly" /></td>
                    <td><input style="width:100px" type="text" name="diemmieng[<?php echo $i; ?>]"
                            value="<?php echo $row['DiemMieng']; ?>" /></td>
                    <td><input style="width:100px" type="text" name="diem15phut1[<?php echo $i; ?>]"
                            value="<?php echo $row['Diem15Phut1']; ?>" /></td>
                    <td><input style="width:100px" type="text" name="diem15phut2[<?php echo $i; ?>]"
                            value="<?php echo $row['Diem15Phut2']; ?>" /></td>
                    <td><input style="width:100px" type="text" name="diem1tiet1[<?php echo $i; ?>]"
                            value="<?php echo $row['Diem1Tiet1']; ?>" /></td>
                    <td><input style="width:100px" type="text" name="diem1tiet2[<?php echo $i; ?>]"
                            value="<?php echo $row['Diem1Tiet2']; ?>" /></td>
                    <td><input style="width:100px" type="text" name="diemthi[<?php echo $i; ?>]"
                            value="<?php echo $row['DiemThi']; ?>" /></td>
                    <td><input style="width:100px" type="text" name="diemtb[<?php echo $i; ?>]" readonly="readonly" /></td>
                </tr>
                <?php
            }
            ?>
        </form>
        <!-- ----------------------------- -->
    </table>
    <hr>
</body>

</html>