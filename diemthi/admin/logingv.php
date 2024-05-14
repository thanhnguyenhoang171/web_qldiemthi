<?php
require 'fnct_logingv.php';

if (isset($_POST['gv'])) {
	$connect = new DB();
	$con = $connect->connect();
	$error = processLogin($_POST, $con);
	displayError($error);
	$connect->close();
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