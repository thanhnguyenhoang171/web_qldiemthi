<link rel="stylesheet" href="../../assets/css/css/stylea.css">

<?php
session_start();
require "../../classes/hocki.class.php";
$connect = new hocki();
$ten = $hk = $nh = "";
$mahk = $_GET['cmahk'];

if (isset($_POST['ok'])) {
	$errors = array();
	if ($_POST['txtten'] == null) {
		$errors['txtten'] = 'Bạn chưa nhập tên học kỳ';
	} else {
		$ten = $_POST['txtten'];
	}
	if ($_POST['txthocky'] == null) {
		$errors['txthocky'] = 'Bạn chưa nhập hệ số học kỳ';
	} else {
		$hk = $_POST['txthocky'];
	}
	if ($_POST['txtnamhoc'] == null) {
		$errors['txtnamhoc'] = "Bạn Chưa Nhập Năm Học.";
	} else {
		$nh = $_POST['txtnamhoc'];
	}

	if ($ten && $hk && $nh && empty($errors)) {

		$con = $connect->edit($mahk, $ten, $hk, $nh);
		?>
		<script type="text/javascript">
			alert("Bạn Đã Sửa Học Kỳ Thành Công.Nhấn OK Để Tiếp Tục !");
			window.location = "../index.php?mod=hk";
		</script>
		<?php
		exit();

	}
	//$dis = $connect->dis();
}
?>
<?php
$conn = $connect->selectquery($mahk);
?>
<center><img width="100%" src="../../assets/img/Ban.png"></center>
<style>
	.error {
		color: red;
		font-size: 12px;
	}
</style>

<body bgcolor="#a3cbff">
	<h1 align="center">Trang Sửa Học Kỳ</h1>
	<form action="sua_hk.php?cmahk=<?php echo $conn['MaHocKy']; ?>" method="post">
		<table align="center" border="1" cellspacing="0" cellpadding="10" style="background: #f1f1f1">

			<tr>
				<td class="ToT">Tên Học Kỳ:</td>
				<td><input type="text" name="txtten" size="25" value="<?php echo $conn['TenHocKy']; ?>" /><?php if (!empty($errors['txtten']))
					   echo '<span class="error">' . $errors['txtten'] . '</span>'; ?></td>
			</tr>
			<tr>
				<td class="ToT">Hệ Số Học Kỳ:</td>
				<td><input type="text" name="txthocky" size="25" value="<?php echo $conn['HeSoHK']; ?>" /><?php if (!empty($errors['txthocky']))
					   echo '<span class="error">' . $errors['txthocky'] . '</span>'; ?></td>
			</tr>
			<tr>
				<td class="ToT">Năm Học:</td>
				<td><input type="text" name="txtnamhoc" size="25" value="<?php echo $conn['NamHoc']; ?>" /><?php if (!empty($errors['txtnamhoc']))
					   echo '<span class="error">' . $errors['txtnamhoc'] . '</span>'; ?></td>
			</tr>
		</table>
		<h1 style="text-align: center"> <input type="submit" class="add-button" name="ok" value="Sửa Năm Học" /><br />
		</h1>
	</form>
	<form action="../index.php?mod=hk" method="post">
		<div style="text-align:center; margin-top: 6%;">
			<input type="submit" name="back" value="Trở Về" style="width:100px;height: 25px" />
		</div>
	</form>
</body>