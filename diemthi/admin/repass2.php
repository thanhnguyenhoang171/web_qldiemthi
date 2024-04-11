<?php
require '../classes/DB.class.php';
session_start();
$u = $_SESSION['ses_MaHS'];
$phs = $_SESSION['ses_passwordhs'];
?>
<?php
$connect = new DB();
$con = $connect->connect();
$old = $new = $pre = " ";
$error = '';
if (isset($_POST['hs'])) {
	if ($_POST['txtpasshs'] == null && $_POST['txtpasshs2'] == null && $_POST['txtpasshs3'] == null) {
		$error = 'Bạn chưa nhập thông tin!';
	} else {
		if ($_POST['txtpasshs'] == null && $_POST['txtpasshs2'] != null) {
			$error = 'Bạn chưa nhập Mật Khẩu';

		} else {
			$old_password_md5 = md5($_POST['txtpasshs']);

			if ($old_password_md5 != $phs) {
				$error = 'Mật Khẩu Cũ không chính xác';
			} else {
				$old = $_POST['txtpasshs'];
			}
		}
		if ($_POST['txtpasshs2'] == null && $_POST['txtpasshs'] != null) {
			$error = 'Bạn chưa nhập Mật Khẩu Mới';
		} else {
			if ($_POST['txtpasshs3'] == null) {
				$error = 'Bạn chưa nhập lại mật khẩu mới';
			} else if ($_POST['txtpasshs2'] != $_POST['txtpasshs3']) {
				$error = 'Mật Khẩu Mới không trùng khớp';
			} else {
				$mk = "/^[a-zA-Z0-9]{6,}$/";
				if (preg_match($mk, $_POST["txtpasshs2"])) {
					$new = md5($_POST['txtpasshs2']);
				} else {
					$error = 'Mật Khẩu nhập vào không hợp lệ!';
				}
			}
			if ($u && $phs && $old && $new && $pre && $error == '') {
				$query = "UPDATE hocsinh SET passwordhs='$new' WHERE MaHS=$u";
				$results = mysqli_query($con, $query);
				if ($results) {
					$error = 'Đã thay đổi mật khẩu thành công!';
				} else {
					$error = "Có lỗi xảy ra khi cập nhật mật khẩu.";
				}
			}
		}
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
	<title>Thay Đổi Mât Khẩu</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">


	<link rel="stylesheet" href="../assets/css/css/style.css">


</head>

<body>
	<div class="wrap">
		<div class="avatar">
			<img src="../assets/img/images/student.png">
		</div>
		<form action="repass2.php" method="post" novalidate>
			<input type="password" name="txtpasshs" placeholder="old password" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="txtpasshs2" placeholder="new password (at least 6 character)" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="txtpasshs3" placeholder="re-enter new password" required>
			<a href="" class="forgot_link">refresh</a>
			<button><input type="submit" name="hs" value="Thay đổi" /></button>
		</form>

		<form action="hocsinh/hocsinh_xemthongtin.php" method="post">
			<div style="text-align:center; margin-top: 20%;">
				<input type="submit" name="back" value="Trở Về" style="width:100px;height: 25px" />
			</div>
		</form>


	</div>

	<script src="js/index.js"></script>

</body>

</html>