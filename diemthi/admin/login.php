<?php
	require 'fnct_login.php';
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ADMINISTRATION-OU</title>

	<link rel="stylesheet" href="../assets/css/css/style.css">
</head>

<body>
	<div
		style="margin-top:60px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ; color:#f1f1f1;">
		TRƯỜNG ĐẠI HỌC MỞ TP. HỒ CHÍ MINH
	</div>
	<div style="margin-top:20px;text-align: center;font-size: 25px;font-family: Tahoma;color:#f1f1f1; ">
		TÀI KHOẢN QUẢN TRỊ VIÊN
	</div>
	<div class="wrap">
		<div class="avatar">
			<img src="../assets/img/images/admin.png">
		</div>
		<form action="login.php" method="post" novalidate>
			<input type="text" name="txtuser" placeholder="username" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="txtpass" placeholder="password" required>
			<a href="" class="forgot_link">refresh?</a>
			<button><input type="submit" name="ok" value="Đăng Nhập" /></button>
		</form>
	</div>

	<script src="js/index.js"></script>

	<script>
		// Bắt sự kiện khi nhấn Enter trên trường input và gọi hàm xử lý
		document.addEventListener("DOMContentLoaded", function () {
			document.querySelector("input[name='txtuser']").addEventListener("keypress", function (event) {
				if (event.keyCode === 13) { // 13 là mã ASCII của phím Enter
					event.preventDefault();
					document.querySelector("[name='ok']").click(); // Tự động kích hoạt sự kiện click cho nút "Đăng Nhập"
				}
			});

			document.querySelector("input[name='txtpass']").addEventListener("keypress", function (event) {
				if (event.keyCode === 13) {
					event.preventDefault();
					document.querySelector("[name='ok']").click();
				}
			});
		});
	</script>
</body>

</html>