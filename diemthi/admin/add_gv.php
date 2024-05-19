<?php
require_once ("fnct_add_gv.php");

$m = $t = $dc = $dt = $p = "";

if (isset($_POST['ok'])) {
	list($data, $errors) = validateInput($_POST);

	if (empty($errors)) {
		if (addGiaoVien($data)) {
			echo '<script type="text/javascript">
                alert("Bạn thêm Giảng Viên thành công!");
                window.location = "index.php?mod=gv";
                </script>';
			exit();
		} else {
			$errors['general'] = 'Có lỗi xảy ra khi thêm giảng viên';
		}
	}
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
<style>
	.error {
		color: red;
		font-size: 12px;
	}
</style>

<body bgcolor="#a3cbff">
	<h1 align="center">Trang Thêm Giảng Viên</h1>
	<form action="add_gv.php" method="post">
		<table style="background: #f1f1f1" align="center" border="1" cellspacing="0" cellpadding="10">
			<tr>
				<td class="ToT">Mã Giảng Viên:</td>
				<td> <input type="text" name="txtmagv" size="25" placeholder="Mã Giảng Viên là số 10 ký tự" /><br />
					<?php if (!empty($errors['txtmagv']))
						echo '<span class="error">' . $errors['txtmagv'] . '</span>'; ?>
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
				<td><input type="text" name="txtten" size="25" /><?php if (!empty($errors['txtten']))
					echo '<span class="error">' . $errors['txtten'] . '</span>'; ?></td>
			</tr>
			<tr>
				<td class="ToT">Địa Chỉ: </td>
				<td><textarea type="text" name="txtdiachi"></textarea><?php if (!empty($errors['txtdiachi']))
					echo '<span class="error">' . $errors['txtdiachi'] . '</span>'; ?></td>
			</tr>
			<tr>
				<td class="ToT">Điện Thoại:</td>
				<td><input type="text" name="txtdienthoai" size="25" placeholder="Số từ 9 đến 11 số không âm" /><?php if (!empty($errors['txtdienthoai']))
					echo '<span class="error">' . $errors['txtdienthoai'] . '</span>'; ?></< /td>
			</tr>
			<tr>
				<td class="ToT">Password Giảng Viên:</td>
				<td><input type="password" name="txtpass" size="25"
						placeholder="Đặt mặt định là Mã Giảng Viên ít nhất 6 ký tự" /><?php if (!empty($errors['txtpass']))
							echo '<span class="error">' . $errors['txtpass'] . '</span>'; ?></td>
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