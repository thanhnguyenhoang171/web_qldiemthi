<?php
session_start();
require "../classes/giaovien.class.php";
//require "diemthi/classes/giaovien.class.php"; // for testing
function validateInput($data)
{
	$errors = array();
	if ($data['txtmamon'] == null) {
		$errors['txtmamon'] = 'Bạn Chưa Nhập Mã Môn học';
	}
	if ($data['txtten'] == null) {
		$errors['txtten'] = 'Bạn Chưa Nhập Vào Tên Giảng Viên';
	}
	if ($data['txtdiachi'] == null) {
		$errors['txtdiachi'] = 'Bạn Chưa Nhập Vào Địa Chỉ';
	}
	if ($data['txtdienthoai'] == null) {
		$errors['txtdienthoai'] = 'Bạn Chưa Nhập Vào Số Điện Thoại';
	}
	if ($data['txtpass'] == null) {
		$errors['txtpass'] = 'Bạn chưa nhập mật khẩu khẩu';
	}
	return $errors;
}

function updateGiaoVien($con, $ma, $data)
{
	$mamon = $data['txtmamon'];
	$t = $data['txtten'];
	$dc = $data['txtdiachi'];
	$dt = $data['txtdienthoai'];
	$p = $data['txtpass'];
	$encryptedPassword = md5($p);
	return $con->edit($ma, $mamon, $t, $dc, $dt, $encryptedPassword);
}

function handleFormSubmission($con, $ma)
{
	$errors = validateInput($_POST);
	if (empty($errors)) {
		try {
			updateGiaoVien($con, $ma, $_POST);
			echo "<script type='text/javascript'>
                    alert('Bạn Sửa Giảng Viên thành công!');
                    window.location = 'index.php?mod=gv';
                  </script>";
			exit();
		} catch (Exception $e) {
			$errors['txtmamon'] = 'Mã môn học không tồn tại';
		}
	}
	return $errors;
}

function getGiaoVien($con, $ma)
{
	return $con->selectgv($ma);
}

$con = new giaovien();
$ma = $_GET['cma'];
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ok'])) {
	$errors = handleFormSubmission($con, $ma);
}

$row = getGiaoVien($con, $ma);

?>

<link rel="stylesheet" href="../assets/css/css/stylea.css">
<center><img width="100%" height="160px" src="../assets/img/Ban.png"></center>
<style>
	.error {
		color: red;
		font-size: 12px;
	}
</style>

<body bgcolor="#a3cbff">
	<h1 align="center">Trang Sửa giáo viên</h1>
	<form action="sua_gv.php?cma=<?php echo $row['Magv']; ?>" method="post">
		<table align="center" border="1" cellspacing="0" cellpadding="10">
			<tr style="background: #f1f1f1">
				<td class="ToT">Mã Môn Học</td>
				<td><input type="text" name="txtmamon" size="25" value="<?php echo $row['MaMonHoc']; ?>" /><?php if (!empty($errors['txtmamon']))
					   echo '<span class="error">' . $errors['txtmamon'] . '</span>'; ?></td>
			</tr>
			<tr style="background: #f1f1f1">
				<td class="ToT">Tên giáo viên:</td>
				<td><input type="text" name="txtten" size="25" value="<?php echo $row['Tengv']; ?>" /><?php if (!empty($errors['txtten']))
					   echo '<span class="error">' . $errors['txtten'] . '</span>'; ?></td>
			</tr>
			<tr style="background: #f1f1f1">
				<td class="ToT">Địa Chỉ: </td>
				<td><textarea type="text" name="txtdiachi"><?php echo $row['DiaChi']; ?> </textarea><?php if (!empty($errors['txtdiachi']))
					   echo '<span class="error">' . $errors['txtdiachi'] . '</span>'; ?></td>
			</tr>
			<tr style="background: #f1f1f1">
				<td class="ToT">Điện Thoại:</td>
				<td><input type="text" name="txtdienthoai" size="25" value="<?php echo $row['SDT']; ?>" /> <?php if (!empty($errors['txtdienthoai']))
					   echo '<span class="error">' . $errors['txtdienthoai'] . '</span>'; ?></td>
			</tr>
			<tr style="background: #f1f1f1">
				<td class="ToT">Password giáo viên:</td>
				<td><input type="password" name="txtpass" size="25" value="<?php echo $row['passwordgv']; ?>" /><?php if (!empty($errors['txtpass']))
					   echo '<span class="error">' . $errors['txtpass'] . '</span>'; ?></td>
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