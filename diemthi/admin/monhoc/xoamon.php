<?php
require "../../classes/DB.class.php";
$connect = new db();
// require "../../classes/monhoc.class.php";
// require 'DB.class.php';
$conn = $connect->connect();
$id = $_GET['id'];
// $xoa=$con->xoa($id);

// Xóa dữ liệu từ bảng diem
$query1 = "DELETE FROM giaovien WHERE MaMonHoc='$id'";
$result1 = mysqli_query($conn, $query1);

// Xóa dữ liệu từ bảng hocsinh
$query2 = "DELETE FROM monhoc WHERE MaMonHoc='$id'";
$result2 = mysqli_query($conn, $query2);

// Kiểm tra kết quả của cả hai truy vấn
if ($result1 && $result2) {
    ?>
    <script type="text/javascript">
        alert("Xoá môn học thành công!");
        window.location = "../index.php?mod=mh";
    </script>
    <?php
    exit();

} else {
    echo "Lỗi khi xóa dữ liệu";
}
header("location: ../index.php?mod=mh");
?>