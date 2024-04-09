<?php
session_start();
require ("../classes/giaovien.class.php");
$m = $t = $dc = $dt = $p = "";

if (isset($_POST['ok'])) {
	$con = new giaovien();
	if ($_POST['txtmagv'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập Mã Giảng Viên!!!<br/>");
			window.location = "add_gv.php";
		</script>
		<?php
		exit();
	} else {
		$rule = "/^[0-9]{10}$/";
		if (preg_match($rule, $_POST['txtmagv'])) {
			$m = $_POST['txtmagv'];
		} else {
			?>
			<script type="text/javascript">
				alert("Mã Giảng Viên không hợp lệ!");
				window.location = "add_gv.php";
			</script>
			<?php
			exit();

		}
	}
	// done 

	if ($_POST['txtten'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập Vào Tên Giảng Viên");
			window.location = "add_gv.php";
		</script>
		<?php
		exit();
	} else {
		$t = $_POST['txtten'];
	}
	if ($_POST['txtdiachi'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập Vào Địa Chỉ");
			window.location = "add_gv.php";
		</script>
		<?php
		exit();
	} else {
		$dc = $_POST['txtdiachi'];
	}
	if ($_POST['txtdienthoai'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập Vào Số Điện Thoại");
			window.location = "add_gv.php";
		</script>
		<?php
		exit();
	} else {
		$dienthoai = "/^[0-9]{10,11}$/";
		if (preg_match($dienthoai, $_POST['txtdienthoai'])) {
			$dt = $_POST['txtdienthoai'];
		} else {
			?>
			<script type="text/javascript">
				alert("Số Điện Thoại Không Hợp Lệ!");
				window.location = "add_gv.php";
			</script>
			<?php
			exit();
		}
	}
	// 

	if ($_POST['txtpass'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập Mật Khẩu");
			window.location = "add_gv.php";
		</script>
		<?php
		exit();
	} else {
		$pass = "/^[a-zA-Z0-9]{6,}$/";
		if (preg_match($pass, $_POST['txtpass'])) {
			$p = md5($_POST['txtpass']);
		} else {
			?>
			<script type="text/javascript">
				alert("Password nhập vào không hợp lệ.!");
				window.location = "add_gv.php";
			</script>
			<?php
			exit();
		}
	}

	$mamon = $_POST['mamonhoc'];


	if ($m && $mamon && $t && $dc && $dt && $p) {
		$giaovien = $con->add($m, $mamon, $t, $dc, $dt, $p);
		?>
		<script type="text/javascript">
			alert("Bạn Đã Thêm Giảng Viên Thành Công!");
			window.location = "index.php?mod=gv";
		</script>
		<?php
		exit();
		//require ("../classes/DB.class.php");
	}
}
//$con->close();
?>

<link rel="stylesheet" href="../assets/css/css/stylea.css">

<center><img width="100%" src="../assets/img/Ban.png"></center>



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
		<h1 style="text-align: center;"><input type="submit" class="add-button" name="ok" value="Thêm Giảng Viên" />
		</h1>
	</form>


	<form action="index.php?mod=gv" method="post">
		<div style="text-align:center; margin-top: 5%;">
			<input type="submit" name="back" value="Trở Về" style="width:100px;height: 25px" />
		</div>
	</form>
</body>

</html>