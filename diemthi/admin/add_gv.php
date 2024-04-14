<?php
session_start();
require ("../classes/giaovien.class.php");
$m = $t = $dc = $dt = $p = "";
$erorr = '';
if (isset($_POST['ok'])) {
	$con = new giaovien();
	if ($_POST['txtmagv'] == null) {
		$error = 'Bạn Chưa Nhập Mã Giảng Viên';
	} else {
		$rule = "/^[0-9]{10}$/";
		if (preg_match($rule, $_POST['txtmagv'])) {
			$m = $_POST['txtmagv'];
		} else {
			$error = 'Mã Giảng Viên không hợp lệ';
		}
	}
	// done 

	if ($_POST['txtten'] == null) {
		$error = 'Bạn Chưa Nhập Vào Tên Giảng Viên';
	} else {
		$t = $_POST['txtten'];
	}
	if ($_POST['txtdiachi'] == null) {
		$error = 'Bạn Chưa Nhập Vào Địa Chỉ';
	} else {
		$dc = $_POST['txtdiachi'];
	}
	if ($_POST['txtdienthoai'] == null) {
		$error = 'Bạn Chưa Nhập Vào Số Điện Thoại';
	} else {
		$dienthoai = "/^[0-9]{10,11}$/";
		if (preg_match($dienthoai, $_POST['txtdienthoai'])) {
			$dt = $_POST['txtdienthoai'];
		} else {
			$error = 'Số Điện Thoại Không Hợp Lệ';
		}
	}
	// 

	if ($_POST['txtpass'] == null) {
		$error = 'Bạn Chưa Nhập Mật Khẩu';
	} else {
		$pass = "/^[a-zA-Z0-9]{6,}$/";
		if (preg_match($pass, $_POST['txtpass'])) {
			$p = md5($_POST['txtpass']);
		} else {
			$error = 'Password nhập vào không hợp lệ';
		}
	}

	$mamon = $_POST['mamonhoc'];


	if ($m && $mamon && $t && $dc && $dt && $p) {
		$giaovien = $con->add($m, $mamon, $t, $dc, $dt, $p);
		$error = 'Bạn Đã Thêm Giảng Viên Thành Công';
		//require ("../classes/DB.class.php");
	}
}
//$con->close();
// Hiển thị thông báo lỗi nếu có
if (!empty($error)) {
	echo "<div id='errors' style='color: red; position: absolute; top: 32%; left: 50%; transform: translate(-50%, -50%);'>$error</div>";
}
?>

<link rel="stylesheet" href="../assets/css/css/stylea.css">

<center><img width="100%" height="160px" src="../assets/img/Ban.png"></center>



<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Trang Thêm Giảng Viên</title>
</head>

<body bgcolor="#a3cbff">
	<h1 align="center">Trang Thêm Giảng Viên</h1>
	<form action="add_gv.php" method="post">
		<table style="background: #f1f1f1" align="center" border="1" cellspacing="0" cellpadding="10">
			<tr>
				<td class="ToT">Mã Giảng Viên:</td>
				<td> <input type="text" name="txtmagv" size="25" placeholder="Mã Giảng Viên là số 10 ký tự" /><br />
				</td>
			</tr>
			<tr>
				<td class="ToT">Mã Môn Học</td>
				<td>
					<select name="mamonhoc">
						<?php

						$db = new DB();
						$conn = $db->connect();
						$query = "select * from monhoc";
						$results = mysqli_query($conn, $query);
						while ($data = mysqli_fetch_assoc($results)) {
							echo "<option value='$data[MaMonHoc]'>$data[MaMonHoc]</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>

				<td class="ToT">Tên Giảng Viên:</td>
				<td><input type="text" name="txtten" size="25" /></td>
			</tr>
			<tr>
				<td class="ToT">Địa Chỉ: </td>
				<td><textarea type="text" name="txtdiachi"></textarea></td>
			</tr>
			<tr>
				<td class="ToT">Điện Thoại:</td>
				<td><input type="text" name="txtdienthoai" size="25" placeholder="Số từ 9 đến 11 số không âm" /></td>
			</tr>
			<tr>
				<td class="ToT">Password Giảng Viên:</td>
				<td><input type="password" name="txtpass" size="25" placeholder="Đặt mặt định là Mã Giảng Viên" /></td>
			</tr>

		</table>
		<h1 style="text-align: center;"><input type="submit" class="add-button" name="ok" value="Thêm Giáo Viên" /></h1>
	</form>


	<form action="index.php?mod=gv" method="post">
		<div style="text-align:center; margin-top: 5%;">
			<input type="submit" name="back" value="Trở Về" style="width:100px;height: 25px" />
		</div>
	</form>
</body>

</html>