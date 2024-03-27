<?php
$mahs = $_GET['cmahs'];
//require "../../includes/config.php";
require "../../classes/DB.class.php";
$connect = new db();
$conn = $connect->connect();

// Xóa dữ liệu từ bảng diem
$query1 = "DELETE FROM diem WHERE MaHS='$mahs'";
$result1 = mysqli_query($conn, $query1);

// Xóa dữ liệu từ bảng hocsinh
$query2 = "DELETE FROM hocsinh WHERE MaHS='$mahs'";
$result2 = mysqli_query($conn, $query2);

// Kiểm tra kết quả của cả hai truy vấn
if ($result1 && $result2) {
    header("location:../index.php?mod=hs");
    exit();
} else {
    echo "Lỗi khi xóa dữ liệu";
}
?>