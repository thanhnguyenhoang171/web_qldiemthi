<?php
session_start();
//require "../../classes/DB.class.php";
require "add_chon2.php";
$connect = new db();
$conn = $connect->connect();

if (isset ($_POST['themdiem'])) {
    $dayhoc = $_POST['day'];
    $monhoc = $_POST['mon'];
    $hk = $_POST['hk'];

    // Lặp qua các học sinh và lưu điểm vào cơ sở dữ liệu
    for ($i = 1; isset ($_POST["ma$i"]); $i++) {
        $ma = $_POST["ma$i"];
        $lop = $_POST["lop$i"];
        $mieng = $_POST["diem$i"];
        $p1 = $_POST["diem1$i"];
        $p2 = $_POST["diem2$i"];
        $t1 = $_POST["diem3$i"];
        $t2 = $_POST["diem4$i"];
        $d = $_POST["diem5$i"];
        $tb = 0;

        // Thực hiện truy vấn SQL để chèn điểm vào cơ sở dữ liệu
        $sql = "INSERT INTO diem (MaHocKy, MaMonHoc, MaHS, MaLopHoc, DiemMieng, Diem15Phut1, Diem15Phut2, Diem1Tiet1, Diem1Tiet2, DiemThi, DiemTB)
                VALUES ('$hk', '$monhoc', '$ma', '$lop', '$mieng', '$p1', '$p2', '$t1', '$t2', '$d', '$tb')";
        $result = mysqli_query($conn, $sql);

        // Kiểm tra và xử lý lỗi nếu có
        if (!$result) {
            echo "Lỗi: " . mysqli_error($conn);
            // Xử lý lỗi tại đây (ví dụ: thông báo lỗi cho người dùng, ghi log, v.v.)
        }
    }

    // Chuyển hướng người dùng sau khi thêm điểm
    header('Location: add_chon2.php');
    exit(); // Chắc chắn rằng không có mã HTML hoặc mã PHP nào được thực hiện sau chuyển hướng
}
?>