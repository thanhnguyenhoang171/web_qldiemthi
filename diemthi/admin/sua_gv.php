<?php
session_start();
require "../classes/giaovien.class.php";
$con = new giaovien();
$ma = $_GET['cma'];
$mamon = $t = $dc = $dt = $p = "";
if (isset($_POST['ok'])) {
	if ($_POST['txtmamon'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập Mã Môn Học");
			window.location = "sua_gv.php?cma=<?php echo $_GET['cma']; ?>";
		</script>
		<?php
		exit();
	} else {
		$mamon = $_POST['txtmamon'];
	}
	if ($_POST['txtten'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập Vào Tên Giảng Viên");
			window.location = "sua_gv.php?cma=<?php echo $_GET['cma']; ?>";
		</script>
		<?php
		exit();

	} else {
		$t = $_POST['txtten'];
	}
	if ($_POST['txtdiachi'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập Vào Tên Giảng Viên");
			window.location = "sua_gv.php?cma=<?php echo $_GET['cma']; ?>";
		</script>
		<?php
		exit();

	} else {
		$dc = $_POST['txtdiachi'];
	}
	if ($_POST['txtdienthoai'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập Vào Tên Giảng Viên");
			window.location = "sua_gv.php?cma=<?php echo $_GET['cma']; ?>";
		</script>
		<?php
		exit();

	} else {
		$dt = $_POST['txtdienthoai'];
	}
	if ($_POST['txtpass'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập Vào Mật Khẩu Giảng Viên");
			window.location = "sua_gv.php?cma=<?php echo $_GET['cma']; ?>";
		</script>
		<?php
		exit();
	} else {
		$p = $_POST['txtpass'];
	}
	// Kiểm tra nếu không có lỗi thì tiến hành sửa giáo viên
	if ($mamon && $t && $dc && $dt && $p) {
		try {
			$encryptedPassword = md5($p);
			$giaovien = $con->edit($ma, $mamon, $t, $dc, $dt, $encryptedPassword);
			?>
			<script type="text/javascript">
				alert("Bạn Sửa Giảng Viên thành công!");
				window.location = "index.php?mod=gv";
			</script>
			<?php
			exit();
		} catch (Exception $e) {
			?>
			<script type="text/javascript">
				alert("Sửa giảng viên bị lỗi: <?php echo $e->getMessage(); ?>");
				window.location = "sua_gv.php?cma=<?php echo $ma; ?>";
			</script>
			<?php
			exit();
		}
	}

	//$dis=$con->dis();
}
?>
<?php
$row = $con->selectgv($ma);

?>
<link rel="stylesheet" href="../assets/css/css/stylea.css">
<center><img width="100%" src="../assets/img/Ban.png"></center>

<body bgcolor="#a3cbff">
	<h1 align="center">Trang Sửa Giảng Viên</h1>
	<form action="sua_gv.php?cma=<?php echo $row['Magv']; ?>" method="post">
		<table align="center" border="1" cellspacing="0" cellpadding="10">
			<tr style="background: #f1f1f1">
				<td class="ToT">Mã Môn Học</td>
				<td><input type="text" name="txtmamon" size="25" value="<?php echo $row['MaMonHoc']; ?>" /></td>
			</tr>
			<tr style="background: #f1f1f1">
				<td class="ToT">Tên giảng viên:</td>
				<td><input type="text" name="txtten" size="25" value="<?php echo $row['Tengv']; ?>" /></td>
			</tr>
			<tr style="background: #f1f1f1">
				<td class="ToT">Địa Chỉ: </td>
				<td><textarea type="text" name="txtdiachi"><?php echo $row['DiaChi']; ?> </textarea></td>
			</tr>
			<tr style="background: #f1f1f1">
				<td class="ToT">Điện Thoại:</td>
				<td><input type="text" name="txtdienthoai" size="25" value="<?php echo $row['SDT']; ?>" /> </td>
			</tr>
			<tr style="background: #f1f1f1">
				<td class="ToT">Password giảng viên:</td>
				<td><input type="password" name="txtpass" size="25" value="<?php echo $row['passwordgv']; ?>" /></td>
		</table>
		<h1 style="text-align: center"> <input type="submit" class="add-button" name="ok" value="Sửa" /><br />
		</h1>
	</form>
	<form action="index.php?mod=gv" method="post">
		<div style="text-align:center; margin-top: 2%;">
			<input type="submit" name="back" value="Trở Về" style="width:100px;height: 25px" />
		</div>
	</form>
</body>