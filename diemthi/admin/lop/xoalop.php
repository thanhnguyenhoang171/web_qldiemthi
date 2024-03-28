<?php
session_start();
$ma = $_GET['cmahk'];
require "../../classes/DB.class.php";
$connect = new db();
$conn = $connect->connect();

// Xóa tất cả các dòng từ bảng 'diem' có 'MaLopHoc' tương ứng với giá trị '$ma'
$query_delete_diem = "DELETE FROM diem WHERE MaLopHoc = '$ma'";
$result_delete_diem = mysqli_query($conn, $query_delete_diem);

// Xóa tất cả các dòng từ bảng 'hocsinh' có 'MaLopHoc' tương ứng với giá trị '$ma'
$query_delete_hocsinh = "DELETE FROM hocsinh WHERE MaLopHoc = '$ma'";
$result_delete_hocsinh = mysqli_query($conn, $query_delete_hocsinh);
// Xóa các dòng từ bảng 'day' có 'MaLopHoc' tương ứng với giá trị '$ma'
$query_delete_day = "DELETE FROM day WHERE MaLopHoc = '$ma'";
$result_delete_day = mysqli_query($conn, $query_delete_day);
// Xóa dòng từ bảng 'lophoc' có 'MaLopHoc' bằng '$ma'
$query_delete_lophoc = "DELETE FROM lophoc WHERE MaLopHoc = '$ma'";
$result_delete_lophoc = mysqli_query($conn, $query_delete_lophoc);



// Kiểm tra kết quả của các truy vấn xóa dữ liệu
if ($result_delete_diem && $result_delete_hocsinh && $result_delete_lophoc && $query_delete_day) {
    // Nếu xóa dữ liệu từ tất cả các bảng thành công, chuyển hướng người dùng đến trang index.php?mod=lop
    header("location:../index.php?mod=lop");
    exit();
} else {
    // Nếu có lỗi xảy ra, thông báo lỗi
    echo "Lỗi khi xóa dữ liệu";
}

// Đóng kết nối
$connect->disconnect();
?>