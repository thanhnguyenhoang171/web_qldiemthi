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
<h2 align="center">
    <a href="hocsinh/add_hs.php">
        <button type='button' style='background-color: #336699;
            border: none;
            color: white;
            padding: 15px 32px;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
            border-bottom: 3px solid #f1f1f1;
            transition: background-color 0.3s;' 
			onmouseover="this.style.backgroundColor='#2c4a6a';"
        	onmouseout="this.style.backgroundColor='#336699';">Thêm Sinh Viên
        </button>
    </a>
</h2>


<form method="post">
	<select name="malophoc" style="padding: 3px; 
	border: 1px solid #ccc; 
	text-align: center;
	border-radius: 5px; 
	font-size: 16px; 
	width: 100px;">

		<?php
		$con = new hocsinh();
		$data = $con->alllop();
		foreach ($data as $row) {
			echo "<option value='$row[MaLopHoc]'>$row[MaLopHoc]</option>";
		}
		?>
	</select>
	<input type="submit" style='background-color: #f1f1f1;
    border: none;
    color: #336699;
    padding: 5px 15px;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 10px;
    transition: background-color 0.3s;' 
    value="Xem" 
    name="submit"
    onmouseover="this.style.backgroundColor='#ddd'; this.style.color='#000';"
    onmouseout="this.style.backgroundColor='#f1f1f1'; this.style.color='#336699';">
</form>

<table align='center' width='90%' border='1' cellspacing="0" cellpadding="10">
	<tr style="font-family: Tahoma;
	color: #f1f1f1;
	font-weight: bold; 
	text-align: center;
	background-color: #336699;">
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
			echo "<td><a href='hocsinh/sua_hs.php?cmahs=$row[MaHS]'><button type='button' style='background-color: #336699;
			border: none;
			color: white;
			padding: 5px 10px;
			font-size: 14px;
			margin: 2px;
			cursor: pointer;
			border-radius: 5px;
			transition: background-color 0.3s;' onmouseover=\"this.style.backgroundColor='#2c4a6a';\" onmouseout=\"this.style.backgroundColor='#336699';\">Sửa</button></a></td>";

			echo "<td><a href='hocsinh/xoa_hs.php?cmahs=$row[MaHS]' onclick='return XacNhan();'><button type='button' style='background-color: #336699;
			border: none;
			color: white;
			padding: 5px 10px;
			font-size: 14px;
			margin: 2px;
			cursor: pointer;
			border-radius: 5px;
			transition: background-color 0.3s;' onmouseover=\"this.style.backgroundColor='#2c4a6a';\" onmouseout=\"this.style.backgroundColor='#336699';\">Xóa</button></a></td>";

			echo "</tr>";
		}
	}
	?>
</table>