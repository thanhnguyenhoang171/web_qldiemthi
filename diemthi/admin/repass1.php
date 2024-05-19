<?php
session_start();
require '../classes/DB.class.php';
//require 'diemthi/classes/DB.class.php'; // for testing
function validateOldPassword($inputPassword, $sessionPassword)
{
	if ($inputPassword == null) {
		return "Bạn chưa nhập Mật Khẩu";
	}
	if (md5($inputPassword) != $sessionPassword) {
		return "Mật Khẩu Cũ không chính xác";
	}
	return null;
}

function validateNewPassword($newPassword, $confirmPassword)
{
	if ($newPassword == null) {
		return "Bạn chưa nhập Mật Khẩu Mới";
	}
	if ($newPassword != $confirmPassword) {
		return "Mật Khẩu Mới không trùng khớp";
	}
	if (!preg_match("/^[a-zA-Z0-9]{6,}$/", $newPassword)) {
		return "Mật Khẩu nhập vào không hợp lệ!";
	}
	return null;
}

function updatePassword($con, $userId, $newPassword)
{
	$newPasswordMd5 = md5($newPassword);
	$query = "UPDATE giaovien SET passwordgv='$newPasswordMd5' WHERE Magv=$userId";
	return mysqli_query($con, $query);
}

function handlePasswordChange($con, $userId, $sessionPassword)
{
	$oldPasswordError = validateOldPassword($_POST['txtpassgv'], $sessionPassword);
	if ($oldPasswordError) {
		return $oldPasswordError;
	}

	$newPasswordError = validateNewPassword($_POST['txtpassgv2'], $_POST['txtpassgv3']);
	if ($newPasswordError) {
		return $newPasswordError;
	}

	if (updatePassword($con, $userId, $_POST['txtpassgv2'])) {
		echo "<script type='text/javascript'>
                alert('Đã thay đổi mật khẩu thành công!');
                window.location = 'qlgv.php';
              </script>";
		exit();
	} else {
		return "Có lỗi xảy ra khi cập nhật mật khẩu.";
	}
}

// Main script logic
$u = $_SESSION['ses_Magv'];
$pgv = $_SESSION['ses_passwordgv'];
$connect = new DB();
$con = $connect->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['gv'])) {
	$error = handlePasswordChange($con, $u, $pgv);
	if ($error) {
		echo "<script type='text/javascript'>
                alert('$error');
                window.location = 'repass1.php';
              </script>";
		exit();
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Thay Đổi Mât Khẩu</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="stylesheet" href="../assets/css/css/stylea.css">

	<link rel="stylesheet" href="../assets/css/css/style.css">


</head>

<body>
	<div class="wrap">
		<div class="avatar">
			<img src="../assets/img/images/teacher.png">
		</div>
		<form action="repass1.php" method="post" novalidate>
			<input type="password" name="txtpassgv" placeholder="old password" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="txtpassgv2" placeholder="new password" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="txtpassgv3" placeholder="re-enter new password" required>
			<a href="" class="forgot_link">refresh?</a>
			<button><input type="submit" name="gv" value="Thay đổi" /></button>
		</form>
	</div>

	<form action="qlgv.php" method="post">
		<div style="text-align:center; margin-top: 20%;">
			<input type="submit" class = "view-button" name="back" value="Trở Về" style="width:100px;height: 25px" />
		</div>
	</form>

	<script src="js/index.js"></script>


</body>

</html>