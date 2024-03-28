<?php
session_start();
$ma = $_GET['Ma'];
require "../classes/DB.class.php";
$connect = new db();
$conn = $connect->connect();
$query1 = "DELETE FROM day WHERE Magv ='$ma' ";
$result1 = mysqli_query($conn, $query1);

$query2 = "delete from giaovien where Magv='$ma'";
$result2 = mysqli_query($conn, $query2);
if ($result1 && $result2) {
    header("location:index.php?mod=gv");
    exit();
} else {
    echo "Lỗi khi xoá dữ liệu";
}
exit();
?>