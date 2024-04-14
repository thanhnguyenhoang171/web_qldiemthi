<?php
$errors = '';
if ($_SESSION['ses_level'] != 1) {
	header("location:login.php");
	exit();
}

require "../classes/hocsinh.class.php"; // Include necessary class file


?>

<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="../assets/css/css/stylea.css">

<script type="text/javascript">
	function XacNhan() {
		return window.confirm('Bạn Có Chắc Muốn Xóa Sinh Viên Này Không!!!');
	}
</script>

<h1 align="center" style="font-family: Tahoma">Quản Lý Sinh Viên</h1>
<h2 align="center">
	<a href="hocsinh/add_hs.php">
		<button type='button' class="add-button">Thêm Sinh Viên
		</button>
	</a>
</h2>

<?php

?>

<form method="post">
	<select name="malophoc" class="select-style">

		<?php
		$con = new hocsinh();
		$data = $con->alllop();
		foreach ($data as $row) {
			echo "<option value='$row[MaLopHoc]'>$row[MaLopHoc]</option>";
		}

		?>
	</select>
	<input type="submit" class="view-button" value="Xem" name="submit">
</form>

<table align='center' width='90%' border='1' cellspacing="0" cellpadding="10">
	<tr class="ToT">
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
	if (isset($_POST['submit'])) {
		// Process form submission
		$con = new hocsinh();
		$hocsinh = $con->getHocSinhByMaLop($_POST['malophoc']);
		if (empty($hocsinh)) {
			$errors = "Không tìm thấy dữ liệu cho lớp học đã chọn.";
		} else {
			$stt = 0;
			foreach ($hocsinh as $row) {
				$stt++;
				$row_color = ($stt % 2 == 0) ? "#ffffff" : "#f2f2f2";
				echo "<tr style='background-color: $row_color;'>";
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
				echo "<td>
				<a href='hocsinh/sua_hs.php?cmahs=$row[MaHS]'>
				<button type='button' class = 'fix-button' > Sửa </button>
				</a>
				</td>";

				echo "<td>
				<a href='hocsinh/xoa_hs.php?cmahs=$row[MaHS]' onclick='return XacNhan();'>
				<button type='button' class = 'fix-button'> Xóa </button>
				</a>
				</td>";

				echo "</tr>";

			}
		}
	}
	if (!empty($errors)) {
		echo "<div id='errors' style='color: red; position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);'>$errors</div>";
	}
	?>
</table>