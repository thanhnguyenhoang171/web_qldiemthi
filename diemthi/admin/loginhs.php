<?php
session_start();
//require '../classes/DB.class.php';
require '../classes/DB.class.php';
require 'fnct_loginhs.php';

$connect = new DB();
$con = $connect->connect();
$uhs = $phs = "";
$error = '';

if (isset($_POST['hs'])) {
	$uhs = $_POST['txtuserhs'] ?? '';
	$phs = $_POST['txtpasshs'] ?? '';

	if (empty($uhs) && empty($phs)) {
		$error = 'Bạn chưa nhập username và password!';
	} elseif (empty($uhs)) {
		$error = 'Bạn chưa nhập username!';
	} elseif (empty($phs)) {
		$error = 'Bạn chưa nhập password!';
	} else {
		$error = handleLogin($con, $uhs, $phs);
	}
	$con->close();
}

// Hiển thị thông báo lỗi nếu có
if (!empty($error)) {
	echo "<div id='errors' style='color: red; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>$error</div>";
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>TRANG ĐĂNG NHẬP HỌC SINH</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">


	<link rel="stylesheet" href="../assets/css/css/style.css">


</head>

<body>
	<div style="margin-top:60px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ">TRƯỜNG ĐẠI
		HỌC MỞ THÀNH PHỐ HỒ CHÍ MINH</div>
	<div style="margin-top:20px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ">TRA CỨU ĐIỂM
	</div>
	<div class="wrap" style="margin-top:30px">
		<div class="avatar">
			<img src="../assets/img/images/student.png">
		</div>
		<form action="loginhs.php" method="post" novalidate>
			<input type="text" name="txtuserhs" placeholder="username" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="txtpasshs" placeholder="password" required>
			<a href="" class="forgot_link">refresh?</a>
			<button><input type="submit" name="hs" value="Đăng Nhập" /></button>
		</form>
	</div>
	<br />
	<div
		style="border: 1px solid #CDCDCD;background-color: #e4e0d8;width: 500px;margin-left: 440px;font-family: Tahoma">
		<h6 style="font-weight: bold">Hướng dẫn :</h6>
		<li>Đối tượng sử dụng : Sinh viên Đại học Mở.</li>
		<li>Sinh viên đăng nhập vào hệ thống bằng mã số sinh viên.</li>
		<!-- <li>Mật khẩu mặc định là mã số học sinh.</li> -->
		<!-- <li>Khi truy cập lần thứ nhất, học sinh lưu ý :</li> -->
		<!-- <h6>&nbsp &nbsp &nbsp &nbsp &nbsp - Phải thay đổi mật khẩu.</h6> -->
		<h6>&nbsp &nbsp &nbsp &nbsp &nbsp - Trong quá trình truy cập, nếu có thắc mắc gì hay quên</h6>
		<h6>&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp&nbsp mật khẩu truy cập sinh viên liên hệ phòng quản lý đào tạo</h6>
		<h6>&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspđịa chỉ email: quanlydaotao@ou.edu.vn.</h6>
	</div>
	<script src="js/index.js"></script>
	<script>
		// Bắt sự kiện khi nhấn Enter trên trường input và gọi hàm xử lý
		document.addEventListener("DOMContentLoaded", function () {
			document.querySelector("input[name='txtuserhs']").addEventListener("keypress", function (event) {
				if (event.keyCode === 13) { // 13 là mã ASCII của phím Enter
					event.preventDefault();
					document.querySelector("[name='hs']").click(); // Tự động kích hoạt sự kiện click cho nút "Đăng Nhập"
				}
			});

			document.querySelector("input[name='txtpasshs']").addEventListener("keypress", function (event) {
				if (event.keyCode === 13) {
					event.preventDefault();
					document.querySelector("[name='hs']").click();
				}
			});
		});
	</script>
</body>&nbsp

</html>