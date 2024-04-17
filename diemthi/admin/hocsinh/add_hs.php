<?php
session_start();
$m = $malop = $t = $gt = $ns = $nois = $dt = $cha = $me = $p = "";
require "../../classes/hocsinh.class.php";
$con = new hocsinh();
if (isset($_POST['ok'])) {
	$errors = array();
	if ($_POST['txtmahs'] == null) {
		$errors['txtmahs'] = 'Chưa nhập mã học sinh';
	} else {
		$rule = "/^\d{10}$/";
		if (preg_match($rule, $_POST['txtmahs'])) {
			$m = $_POST['txtmahs'];
		} else {
			$errors['txtmahs'] = 'Mã học sinh không hợp lệ';
		}
	}
	if ($_POST['malophoc'] != null) {
		$malop = $_POST['malophoc'];
	}
	if ($_POST['txtten'] == null) {
		$errors['txtten'] = 'Chưa nhập tên học sinh';
	} else {
		$hoten = "/^[\p{L}0-9\s\p{P}]{1,50}$/u";
		if (preg_match($hoten, $_POST['txtten'])) {
			$t = $_POST['txtten'];
		} else {
			$errors['txtten'] = 'Tên học sinh không hợp lệ';
		}
	}
	if ($_POST['txtgt'] == 1) {
		$gt = "Nam";
	} else {
		$gt = "Nữ";
	}
	if ($_POST['txtngs'] == null) {
		$errors['txtngs'] = 'Bạn chưa nhập ngày sinh';
	} else {
		$ns = $_POST['txtngs'];
	}
	if ($_POST['txtns'] == null) {
		$errors['txtns'] = 'Bạn chưa nhập nơi sinh';
	} else {
		$nois = $_POST['txtns'];
	}
	if ($_POST['txtdantoc'] == null) {
		$errors['txtdantoc'] = 'Bạn chưa nhập dân tộc';
	} else {
		$dt = $_POST['txtdantoc'];
	}
	if ($_POST['txtcha'] == null) {
		$errors['txtcha'] = 'Bạn chưa nhập tên cha';
	} else {
		$cha = $_POST['txtcha'];
	}
	if ($_POST['txtme'] == null) {
		$errors['txtme'] = 'Bạn chưa nhập tên mẹ';
	} else {
		$me = $_POST['txtme'];
	}
	if ($_POST['txtpasshs'] == null) {
		$errors['txtpasshs'] = 'Bạn chưa nhập password';
	} else {
		$pass = "/^[a-zA-Z0-9]{6,}$/";
		if (preg_match($pass, $_POST['txtpasshs'])) {
			$p = md5($_POST['txtpasshs']);
		} else {
			$errors['txtpasshs'] = 'Password không hợp lệ';
		}
	}

	try {
		if ($m && $malop && $t && $gt && $ns && $nois && $dt && $cha && $me && $p && empty($errors)) {
			$hocsinh = $con->add($m, $malop, $t, $gt, $ns, $nois, $dt, $cha, $me, $p);
			?>
			<script type="text/javascript">
				alert("Bạn Đã Thêm Sinh Viên Thành Công. Nhấn OK Để Tiếp Tục Thêm Sinh Viên!");
				window.location = "add_hs.php";
			</script>
			<?php
			exit();
		}
	} catch (Exception $e) {
		?>
		<script type="text/javascript">
			alert("Thêm sinh viên bị lỗi: <?php echo $e->getMessage(); ?>");
			window.location = "add_hs.php";
		</script>
		<?php
		exit();
	}
}
?>


<link rel="stylesheet" href="../../assets/css/css/stylea.css">
<style type="text/css">
	#menu table td {
		font-weight: bold;
	}
</style>
<style>
	.error {
		color: red;
		font-size: 12px;
	}
</style>

<body bgcolor="#a3cbff">
	<center><img src="../../assets/img/Ban.png" width="100%" height="160px"></center>
	<h1 align="center">Trang Thêm Sinh Viên</h1>
	<form action="add_hs.php" method="post">
		<div id="menu">
			<table align="center" border="1" cellspacing="0" cellpadding="10">
				<tr style="background-color: #f1f1f1;">
					<td class="ToT"> Mã Sinh Viên:</td>
					<td> <input type="text" name="txtmahs" size="25" placeholder="10 số nguyên từ 0-9" /><br />
						<?php if (!empty($errors['txtmahs']))
							echo '<span class="error">' . $errors['txtmahs'] . '</span>'; ?>
					</td>
				</tr>
				<tr style='background-color: #f1f1f1;'>
					<td class="ToT">Mã Lớp Học</td>
					<td><select name="malophoc">

							<?php
							$connect = new db();
							$conn = $connect->connect();
							$query = "select * from lophoc";
							$results = mysqli_query($conn, $query);
							while ($data = mysqli_fetch_assoc($results)) {
								echo "<option value='$data[MaLopHoc]'>$data[MaLopHoc]</option>";
							}
							?>

						</select></td>
				</tr>
				<tr style='background-color: #f1f1f1;'>
					<td class="ToT">Tên Học Sinh</td>
					<td><input type="text" name="txtten" size="25" />
						<?php if (!empty($errors['txtten']))
							echo '<span class="error">' . $errors['txtten'] . '</span>'; ?>
					</td>
				</tr>
				<tr style='background-color: #f1f1f1;'>
					<td class="ToT">Giới Tính</td>
					<td><input type="radio" name="txtgt" value="1">Nam
						<input type="radio" name="txtgt" value="2">Nữ
					</td>
				</tr>
				<tr style='background-color: #f1f1f1;'>
					<td class="ToT">Ngày Sinh:</td>
					<td><input type="date" name="txtngs" size="25" /><?php if (!empty($errors['txtngs']))
						echo '<span class="error">' . $errors['txtngs'] . '</span>'; ?> </td>
				</tr>
				<tr style='background-color: #f1f1f1;'>
					<td class="ToT">Nơi Sinh:</td>
					<td><input type="text" name="txtns" size="25" /> <?php if (!empty($errors['txtns']))
						echo '<span class="error">' . $errors['txtns'] . '</span>'; ?></td>
				</tr>
				<tr style='background-color: #f1f1f1;'>
					<td class="ToT">Dân Tộc:</td>
					<td><input type="text" name="txtdantoc" size="25" /> <?php if (!empty($errors['txtdantoc']))
						echo '<span class="error">' . $errors['txtdantoc'] . '</span>'; ?></td>
				</tr>
				<tr style='background-color: #f1f1f1;'>
					<td class="ToT">Họ Tên Cha:</td>
					<td><input type="text" name="txtcha" size="25" /><?php if (!empty($errors['txtcha']))
						echo '<span class="error">' . $errors['txtcha'] . '</span>'; ?> </td>
				</tr>
				<tr style='background-color: #f1f1f1;'>
					<td class="ToT">Họ Tên Mẹ:</td>
					<td><input type="text" name="txtme" size="25" /> <?php if (!empty($errors['txtme']))
						echo '<span class="error">' . $errors['txtme'] . '</span>'; ?></td>
				</tr style='background-color: #f1f1f1;'>
				<tr style='background-color: #f1f1f1;'>
					<td class="ToT">Password Sinh Viên:</td>
					<td><input type="password" name="txtpasshs" size="25" placeholder="đặt mặc định là mssv" /><?php if (!empty($errors['txtpasshs']))
						echo '<span class="error">' . $errors['txtpasshs'] . '</span>'; ?></td>
				</tr>
			</table>
			<h1 style="text-align: center;"> <input type="submit" name="ok" value="Thêm Sinh Viên" class='add-button'>
			</h1>
		</div>
	</form>
	<form action="../index.php?mod=hs" method="post">
		<div style="text-align:center; margin-top: 5%;">
			<input type="submit" name="back" value="Trở Về" style="width:100px;height: 25px" />
		</div>
	</form>
</body>