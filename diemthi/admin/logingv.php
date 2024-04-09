<?php
session_start();
require '../classes/DB.class.php';
$connect = new DB();
$con = $connect->connect();
$ugv = $pgv = "";
$error = '';
if (isset($_POST['gv'])) {

	if (empty($_POST['txtusergv']) && empty($_POST['txtpassgv'])) {
		$error = 'Vui lòng nhập đầy đủ tên tài khoản và mật khẩu!';

	} else {
		// 
		if ($_POST['txtusergv'] == null) {
			$error = 'Bạn Chưa Nhập Tên Tài Khoản!';
		} else {
			$ugv = $_POST['txtusergv'];
		}

		if ($_POST['txtpassgv'] == null) {
			$error = 'Bạn Chưa Nhập mật khẩu Tài Khoản!';
		} else {
			$pgv = $_POST['txtpassgv'];
		}

		if ($ugv && $pgv) {
			$query = "select * from giaovien where Magv='$ugv'";
			$results = mysqli_query($con, $query);

			if (mysqli_num_rows($results) == 0) {

				$error = 'Tên tài khoản chưa chính xác.Vui lòng nhập lại!';


			} else {
				$data = mysqli_fetch_assoc($results);
				$hashed_password = $data['passwordgv']; // Lấy mật khẩu đã được mã hóa từ cơ sở dữ liệu
				if (md5($pgv) == $hashed_password) { // So sánh mật khẩu đã mã hóa với mật khẩu đã nhập và mã hóa
					$_SESSION['ses_Magv'] = $data['Magv'];
					$_SESSION['ses_passwordgv'] = $hashed_password;
					header("location: qlgv.php");
					exit();
				} else {
					$error = 'Mật khẩu không đúng. Vui lòng kiểm tra lại!';
				}
			}
		}
		$dis = $con->close();
	}
}
// Hiển thị thông báo lỗi nếu có
if (!empty($error)) {
	echo "<div id='errors' style='color: red; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>
	$error</div>";
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>TRANG ĐĂNG NHẬP GIẢNG VIÊN</title>


	<link rel="stylesheet" href="../assets/css/css/style.css">


</head>

<body>
	<div
		style="margin-top:60px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma;color:#f1f1f1 ">
		TRƯỜNG ĐẠI HỌC MỞ THÀNH PHỐ HỒ CHÍ MINH</div>
	<div style="margin-top:20px;text-align: center; font-size: 25px;font-family: Tahoma;color:#f1f1f1;  ">TÀI KHOẢN
		GIẢNG VIÊN</div>
	<div class="wrap" style="margin-top: 40px">
		<div class="avatar">
			<img src="../assets/img/images/teacher.png">
		</div>
		<form action="logingv.php" method="post" novalidate>
			<input type="text" name="txtusergv" placeholder="username" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="txtpassgv" placeholder="password" required>
			<a href="" class="forgot_link">refresh?</a>
			<button><input type="submit" name="gv" value="Đăng Nhập" /></button>
		</form>
	</div>

	<script src="js/index.js"></script>

	<script>
		// Bắt sự kiện khi nhấn Enter trên trường input và gọi hàm xử lý
		document.addEventListener("DOMContentLoaded", function () {
			document.querySelector("input[name='txtusergv']").addEventListener("keypress", function (event) {
				if (event.keyCode === 13) { // 13 là mã ASCII của phím Enter
					event.preventDefault();
					document.querySelector("[name='gv']").click(); // Tự động kích hoạt sự kiện click cho nút "Đăng Nhập"
				}
			});

			document.querySelector("input[name='txtpassgv']").addEventListener("keypress", function (event) {
				if (event.keyCode === 13) {
					event.preventDefault();
					document.querySelector("[name='gv']").click();
				}
			});
		});
	</script>

</body>

</html>