<?php
session_start();
require ("../classes/giaovien.class.php");
$m = $t = $dc = $dt = $p = "";

if (isset ($_POST['ok'])) {
	$con = new giaovien();
	if ($_POST['txtmagv'] == null) {
		echo "Bạn Chưa Nhập Mã Giảng Viên!!!<br/>";
	} else {
		$rule = "/^[0-9]{4}$/";
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
		echo "Bạn Chưa Nhập Vào Tên Giảng Viên";
	} else {
		$t = $_POST['txtten'];
	}
	if ($_POST['txtdiachi'] == null) {
		echo "Bạn Chưa Nhập Vào Địa Chỉ";
	} else {
		$dc = $_POST['txtdiachi'];
	}
	if ($_POST['txtdienthoai'] == null) {
		echo "Bạn Chưa Nhập Vào Số Điện Thoại";
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
		echo "Bạn Chưa Nhập Mật Khẩu";
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
<center><img src="../assets/img/Ban.png" width="100%" height="160px"></center>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Trang Thêm Giảng Viên</title>
</head>

<body bgcolor="#CAFFFF">
	<h1 align="center">Trang Thêm Giảng Viên</h1>
	<form action="add_gv.php" method="post">
		<table align="center" border="1" cellspacing="0" cellpadding="10">
			<tr>
				<td>Mã Giáo Viên:</td>
				<td> <input type="text" name="txtmagv" size="25" placeholder="Mã Giảng Viên là số 4 ký tự" /><br /></td>
			</tr>
			<tr>
				<td>Mã Môn Học</td>
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
				<td>Tên Giảng Viên:</td>
				<td><input type="text" name="txtten" size="25" /></td>
			</tr>
			<tr>
				<td>Địa Chỉ: </td>
				<td><textarea type="text" name="txtdiachi"></textarea></td>
			</tr>
			<tr>
				<td>Điện Thoại:</td>
				<td><input type="text" name="txtdienthoai" size="25" placeholder="Số từ 9 đến 11 số không âm" /></td>
			</tr>
			<tr>
				<td>Password Giảng Viên:</td>
				<td><input type="password" name="txtpass" size="25" placeholder="Mật khẩu trên 6 kí tự" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="ok" value="Thêm Giảng Viên" /><br /></td>
			</tr>
		</table>
	</form>
</body>

</html>