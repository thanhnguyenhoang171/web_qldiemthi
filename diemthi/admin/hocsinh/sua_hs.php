<?php
session_start();
require "../../classes/hocsinh.class.php";
$con = new hocsinh();
require "../../includes/config.php";
$mahs = $_GET['cmahs'];
$malop = $t = $gt = $ns = $nois = $dt = $cha = $me = $p = "";

if (isset($_POST['ok'])) {
	$errors = array();
	if ($_POST['txtmalop'] == null) {
		$errors['txtmalop'] = 'Chưa nhập mã lớp học';
	} else {
		$malop = $_POST['txtmalop'];
	}
	if ($_POST['txtten'] == null) {
		$errors['txtten'] = 'Chưa nhập tên lớp học';
	} else {
		$t = $_POST['txtten'];
	}
	if ($_POST['txtgt'] == null) {
		$errors['txtgt'] = 'Chưa chọn giới tính';
	} else {
		$gt = $_POST['txtgt'];
	}
	if ($_POST['txtns'] == null) {
		$errors['txtns'] = 'Chưa chọn ngày sinh';
	} else {
		$ns = $_POST['txtns'];
	}
	if ($_POST['txtnois'] == null) {
		$errors['txtnois'] = 'Chưa nhập nơi sinh';
	} else {
		$nois = $_POST['txtnois'];
	}
	if ($_POST['txtdantoc'] == null) {
		$errors['txtdantoc'] = 'Chưa nhập dân tộc';
	} else {
		$dt = $_POST['txtdantoc'];
	}
	if ($_POST['txtcha'] == null) {
		$errors['txtcha'] = 'Chưa nhập tên cha';

	} else {
		$cha = $_POST['txtcha'];
	}
	if ($_POST['txtme'] == null) {
		$errors['txtme'] = 'Chưa nhập tên mẹ';
	} else {
		$me = $_POST['txtme'];
	}
	if ($_POST['txtpasshs'] == null) {
		$errors['txtpasshs'] = 'Chưa nhập password';
	} else {
		$p = $_POST['txtpasshs'];
	}
	if ($mahs && $malop && $t && $gt && $ns && $nois && $dt && $cha && $me && $p && empty($errors)) {

		// Encrypt the password using MD5 hash
		$encryptedPassword = md5($p);

		//$hs=$con->edit($mahs,$malop,$t,$gt,$ns,$nois,$dt,$cha,$me,$p);
		$query = "update hocsinh set MaLopHoc='$malop',TenHS='$t',GioiTinh='$gt',NgaySinh='$ns',noisinh='$nois',dantoc='$dt',
		hotencha='$cha',hotenme='$me',passwordhs='$encryptedPassword' where MaHS='$mahs'";
		$results = mysqli_query($conn, $query);
		//header("location:../index.php?mod=hs");
		?>
		<script type="text/javascript">
			alert("Bạn Đã Sửa Sinh Viên Thành Công. Nhấn OK Để Tiếp Tục !");
			window.location = "../index.php?mod=hs";
		</script>
		<?php
		exit();
	}
}
$row = $con->selecths($mahs);

?>

<link rel="stylesheet" href="../../assets/css/css/stylea.css">

<center><img width="100%" height="160px" src="../../assets/img/Ban.png"></center>
<style>
	.error {
		color: red;
		font-size: 12px;
	}
</style>

<body bgcolor="#a3cbff">
	<h1 style="text-align: center">TRANG SỬA HỌC THÔNG TIN SINH VIÊN</h1>

	<table align="center" border="1" cellspacing="0" cellpadding="10" style="border: 1px solid transparent;">
		<form action="sua_hs.php?cmahs=<?php echo $row['MaHS']; ?>" method="post">

			<tr style='background: #f1f1f1'>
				<td class="ToT">Mã Lớp Học</td>
				<td><input type="text" name="txtmalop" size="25" value="<?php echo $row['MaLopHoc']; ?>" /><?php if (!empty($errors['txtmalop']))
					   echo '<span class="error">' . $errors['txtmalop'] . '</span>'; ?></td>
			</tr>

			<tr style='background: #f1f1f1'>
				<td class="ToT">Tên Sinh Viên</td>
				<td><input type="text" name="txtten" size="25" value="<?php echo $row['TenHS']; ?>" /><?php if (!empty($errors['txtten']))
					   echo '<span class="error">' . $errors['txtten'] . '</span>'; ?></td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Giới tính</td>

				<td><input type="radio" name="txtgt" value="Nam" value="<?php echo $row['GioiTinh']; ?>">Nam
					<input type="radio" name="txtgt" value="Nữ" value="<?php echo $row['GioiTinh']; ?>">Nữ
					<?php if (!empty($errors['txtgt']))
						echo '<span class="error">' . $errors['txtgt'] . '</span>'; ?>
				</td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Ngày Sinh:</td>
				<td><input type="date" name="txtns" size="25" value="<?php echo $row['NgaySinh']; ?>" />
					<?php if (!empty($errors['txtns']))
						echo '<span class="error">' . $errors['txtns'] . '</span>'; ?>
				</td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Nơi Sinh:</td>
				<td><input type="text" name="txtnois" size="25" value="<?php echo $row['noisinh']; ?>" />
					<?php if (!empty($errors['txtnois']))
						echo '<span class="error">' . $errors['txtnois'] . '</span>'; ?>
				</td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Dân Tộc:</td>
				<td><input type="text" name="txtdantoc" size="25" value="<?php echo $row['dantoc']; ?>" />
					<?php if (!empty($errors['txtdantoc']))
						echo '<span class="error">' . $errors['txtdantoc'] . '</span>'; ?>
				</td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Họ Tên Cha:</td>
				<td><input type="text" name="txtcha" size="25" value="<?php echo $row['hotencha']; ?>" />
					<?php if (!empty($errors['txtcha']))
						echo '<span class="error">' . $errors['txtcha'] . '</span>'; ?>
				</td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Họ Tên Mẹ:</td>
				<td><input type="text" name="txtme" size="25" value="<?php echo $row['hotenme']; ?>" />
					<?php if (!empty($errors['txtme']))
						echo '<span class="error">' . $errors['txtme'] . '</span>'; ?>
				</td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Password Sinh Viên:</td>
				<td><input type="password" name="txtpasshs" size="25" value="<?php echo $row['passwordhs']; ?>" />
					<?php if (!empty($errors['txtpasshs']))
						echo '<span class="error">' . $errors['txtpasshs'] . '</span>'; ?>
				</td>
			</tr>
			<tr style="text-align: center;">
				<td style="border: 1px solid transparent;"><input type="submit" class='add-button' name="ok"
						value="Sửa" /></td>

			</tr>




		</form>
	</table>
	<form action="../index.php?mod=hs" method="post">
		<div style="text-align:center; margin-top: 2%;">
			<input type="submit" name="back" value="Trở Về" style="width:100px;height: 25px" />
		</div>
	</form>
	<!-- <h1 style="text-align: center;">
	<input type="submit" class='add-button' name="ok" value="Sửa" />
	</h1> -->

	<?php
	if (!empty($error)) {
		echo "<div id='errors' style='color: red; position: absolute; top: 32%; left: 50%; transform: translate(-50%, -50%);'>$error</div>";
	}
	?>
</body>