<?php
session_start();
require "../../classes/hocsinh.class.php";
$con = new hocsinh();
require "../../includes/config.php";
$mahs = $_GET['cmahs'];
$malop = $t = $gt = $ns = $nois = $dt = $cha = $me = $p = "";
if (isset ($_POST['ok'])) {
	if ($_POST['txtmalop'] == null) {
		echo "ban chua nhap ma lop hoc";
	} else {
		$malop = $_POST['txtmalop'];
	}
	if ($_POST['txtten'] == null) {
		echo "ban chua nhap ten";
	} else {
		$t = $_POST['txtten'];
	}
	if ($_POST['txtgt'] == null) {
		echo "Bạn Chưa Nhập Vào giới tính";
	} else {
		$gt = $_POST['txtgt'];
	}
	if ($_POST['txtns'] == null) {
		echo "Bạn Chưa Nhập Vào Ngày Sinh";
	} else {
		$ns = $_POST['txtns'];
	}
	if ($_POST['txtnois'] == null) {
		echo "Bạn Chưa Nhập Vào Nơi Sinh";
	} else {
		$nois = $_POST['txtnois'];
	}
	if ($_POST['txtdantoc'] == null) {
		echo "Bạn Chưa Nhập Vào Dân Tộc";
	} else {
		$dt = $_POST['txtdantoc'];
	}
	if ($_POST['txtcha'] == null) {
		echo "Bạn Chưa Nhập Vào Họ Tên Cha";
	} else {
		$cha = $_POST['txtcha'];
	}
	if ($_POST['txtme'] == null) {
		echo "Bạn Chưa Nhập Vào Họ Tên Mẹ";
	} else {
		$me = $_POST['txtme'];
	}
	if ($_POST['txtpasshs'] == null) {
		echo "Bạn Chưa Nhập Vào  Pass Học Sinh";
	} else {
		$p = $_POST['txtpasshs'];
	}
	if ($mahs && $malop && $t && $gt && $ns && $nois && $dt && $cha && $me && $p) {

		// Encrypt the password using MD5 hash
		$encryptedPassword = md5($p);

		//$hs=$con->edit($mahs,$malop,$t,$gt,$ns,$nois,$dt,$cha,$me,$p);
		$query = "update hocsinh set MaLopHoc='$malop',TenHS='$t',GioiTinh='$gt',NgaySinh='$ns',noisinh='$nois',dantoc='$dt',
		hotencha='$cha',hotenme='$me',passwordhs='$encryptedPassword' where MaHS='$mahs'";
		$results = mysqli_query($conn, $query);
		//header("location:../index.php?mod=hs");
		?>
		<script type="text/javascript">
			alert("Bạn Đã Sửa Học Sinh Thành Công.Nhấn OK Để Tiếp Tục !");
			window.location = "../index.php?mod=hs";
		</script>
		<?php
		exit();
	}



}
$row = $con->selecths($mahs);
?>

<link rel="stylesheet" href="../../assets/css/css/stylea.css">

<center><img width="100%" src="../../assets/img/Ban.png"></center>

<body bgcolor="#a3cbff">
	<h1 style="text-align: center">TRANG SỬA HỌC THÔNG TIN HỌC SINH</h1>

	<table align="center" border="1" cellspacing="0" cellpadding="10" style="border: 1px solid transparent;">
		<form action="sua_hs.php?cmahs=<?php echo $row['MaHS']; ?>" method="post">

			<tr style='background: #f1f1f1'>
				<td class="ToT">Mã Lớp Học</td>
				<td><input type="text" name="txtmalop" size="25" value="<?php echo $row['MaLopHoc']; ?>" /></td>
			</tr>

			<tr style='background: #f1f1f1'>
				<td class="ToT">Tên Học Sinh</td>
				<td><input type="text" name="txtten" size="25" value="<?php echo $row['TenHS']; ?>" /></td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Giới tính</td>

				<td><input type="radio" name="txtgt" value="Nam" value="<?php echo $row['GioiTinh']; ?>">Nam
					<input type="radio" name="txtgt" value="Nữ" value="<?php echo $row['GioiTinh']; ?>">Nữ
				</td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Ngày Sinh:</td>
				<td><input type="date" name="txtns" size="25" value="<?php echo $row['NgaySinh']; ?>" /> </td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Nơi Sinh:</td>
				<td><input type="text" name="txtnois" size="25" value="<?php echo $row['noisinh']; ?>" /> </td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Dân Tộc:</td>
				<td><input type="text" name="txtdantoc" size="25" value="<?php echo $row['dantoc']; ?>" /> </td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Họ Tên Cha:</td>
				<td><input type="text" name="txtcha" size="25" value="<?php echo $row['hotencha']; ?>" /> </td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Họ Tên Mẹ:</td>
				<td><input type="text" name="txtme" size="25" value="<?php echo $row['hotenme']; ?>" /> </td>
			</tr>
			<tr style='background: #f1f1f1'>
				<td class="ToT">Password Học Sinh:</td>
				<td><input type="password" name="txtpasshs" size="25" value="<?php echo $row['passwordhs']; ?>" /></td>
			</tr>
			<tr style="text-align: center;">
				<td style="border: 1px solid transparent;"><input type="submit" class='add-button' name="ok"
						value="Sửa" /></td>

			</tr>




		</form>
	</table>
	<!-- <h1 style="text-align: center;">
	<input type="submit" class='add-button' name="ok" value="Sửa" />
	</h1> -->


</body>