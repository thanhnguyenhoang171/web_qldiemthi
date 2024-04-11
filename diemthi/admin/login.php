<?php
require '../classes/DB.class.php';
session_start();
$connect = new DB();
$con = $connect->connect();
$u = $p = "";
$error = '';
if (isset($_POST['ok'])) {
	if (empty($_POST['txtuser']) && empty($_POST['txtpass'])) {
		$error = 'Vui lòng nhập đầy đủ tên tài khoản và mật khẩu';
	} else {


		if ($_POST['txtuser'] == null) {
			$error = 'Bạn Chưa Nhập Tên Tài Khoản!';

		} else {
			$u = $_POST['txtuser'];
		}
		if ($_POST['txtpass'] == null) {
			$error = 'Bạn Chưa Nhập mật khẩu Tài Khoản!';
		} else {
			$p = $_POST['txtpass'];
		}
		if ($u && $p) {

			require '../includes/config.php';

			$query = "SELECT * FROM user WHERE username='$u'";
			$results = mysqli_query($con, $query);
			if ($numrows = mysqli_num_rows($results) == 0) {
				$error = 'Tên truy cập chưa chính xác.Vui lòng nhập lại!';
			} else {
				$data = mysqli_fetch_assoc($results);
				$hashed_password = $data['password']; // Lấy mật khẩu đã được mã hóa từ cơ sở dữ liệu
				if (md5($p) == $hashed_password) { // So sánh mật khẩu đã mã hóa với mật khẩu đã nhập và mã hóa
					$_SESSION['ses_username'] = $data['username'];
					$_SESSION['ses_level'] = $data['level'];
					$_SESSION['ses_userid'] = $data['userid'];
					$_SESSION['password'] = $hashed_password;
					header("location:index.php");
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
	echo "<div id='errors' style='color: red; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>$error</div>";
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ADMINSTRATION-OU</title>


	<link rel="stylesheet" href="../assets/css/css/style.css">


</head>

<body>
	<div
		style="margin-top:60px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ; color:#f1f1f1;">
		TRƯỜNG ĐẠI
		HỌC MỞ TP. HỒ CHÍ MINH</div>
	<div style="margin-top:20px;text-align: center;font-size: 25px;font-family: Tahoma;color:#f1f1f1; ">
		TÀI KHOẢN QUẢN TRỊ VIÊN</div>
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