<?php

if ($_SESSION['ses_level'] != 1) {
	header("location:login.php");
	exit();
}

require "../classes/hocsinh.class.php"; // Include necessary class file

?>

<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
	function XacNhan() {
		return window.confirm('Bạn Có Chắc Muốn Xóa Sinh Viên Này Không!!!');
	}
</script>

<h1 align="center" style="font-family: Tahoma">Quản Lý Sinh Viên</h1>
<h2 align="center"><a href="hocsinh/add_hs.php"><button type='button'>Thêm Sinh Viên</button></a></h2>

<form method="post">
	<select name="malophoc">
		<?php
		$con = new hocsinh();
		$data = $con->alllop();
		foreach ($data as $row) {
			echo "<option value='$row[MaLopHoc]'>$row[MaLopHoc]</option>";
		}
		?>
	</select>
	<input type="submit" value="Xem" name="submit">
</form>

<table align='center' width='90%' border='1' cellspacing="0" cellpadding="10">
	<tr style="font-family: Tahoma;color: #0000bf;font-weight: bold">
		<td>STT</td>
		<td>Mã Sinh Viên</td>
		<td>Mã Lớp Học</td>
		<td>Tên Sinh Viên</td>
		<td>Giới tính</td>
		<td>Ngày Sinh</td>
		<td>Nơi Sinh</td>
		<td>Dân Tộc</td>
		<td>Họ Tên Cha</td>
		<td>Họ Tên Mẹ</td>
		<td>Sửa</td>
		<td>Xóa</td>
	</tr>
	<?php
	if (isset ($_POST['submit'])) {
		// Process form submission
		$con = new hocsinh();
		$hocsinh = $con->getHocSinhByMaLop($_POST['malophoc']);
		$stt = 0;
		foreach ($hocsinh as $row) {
			$stt++;
			echo "<tr>";
			echo "<td>$stt</td>";
			echo "<td>$row[MaHS]</td>";
			echo "<td>$row[MaLopHoc]</td>";
			echo "<td>$row[TenHS]</td>";
			echo "<td>$row[GioiTinh]</td>";
			echo "<td>$row[NgaySinh]</td>";
			echo "<td>$row[noisinh]</td>";
			echo "<td>$row[dantoc]</td>";
			echo "<td>$row[hotencha]</td>";
			echo "<td>$row[hotenme]</td>";
			echo "<td><a href='hocsinh/sua_hs.php?cmahs=$row[MaHS]'><button type='button'>Sửa</button></a></td>";
			echo "<td><a href='hocsinh/xoa_hs.php?cmahs=$row[MaHS]' onclick='return XacNhan();'><button type='button'>Xóa</button></a></td>";
			echo "</tr>";
		}
	}
	?>
</table>