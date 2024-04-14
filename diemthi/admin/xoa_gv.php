<?php
session_start();
$ma = $_GET['Ma'];
require "../classes/DB.class.php";
$connect = new db();
$conn = $connect->connect();
$query1 = "DELETE FROM day WHERE Magv ='$ma' ";
$result1 = mysqli_query($conn, $query1);
$error = '';
$query2 = "delete from giaovien where Magv='$ma'";
$result2 = mysqli_query($conn, $query2);
if ($result1 && $result2) {
    header("location:index.php?mod=gv");
    exit();
} else {
    $error = "Lỗi khi xoá dữ liệu";
    echo "<div id='errors' style='color: red; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>$error</div>";
}
exit();
?>