<?php
if ($_SESSION['ses_level'] != 1) {
	header("location:login.php");
}
?>
<script type="text/javascript">
	function XacNhan() {
		if (!window.confirm('Bạn Có Chắc Muốn Xóa Giảng Viên Này Không!!!')) {
			return false;
		}
	}
</script>
<H1 align="center" style="font-family: Tahoma">Quản Lý Giảng Viên</H1>
<h2 align="center">
	<a href="add_gv.php">
		<button type='button' class = "add-button" >Thêm giảng viên</button> 
	</a>
</h2>
<table align='center' width='1000' border='1' cellspacing="0" cellpadding="10">
	<tr class = "ToT">
		<td>STT</td>
		<td>Mã giảng viên</td>
		<td>Mã Môn Học</td>
		<td>Tên giảng viên </td>
		<td>Địa Chỉ</td>
		<td>Số Điên Thoại</td>
		<td>Sửa</td>
		<td>Xóa</td>

	</tr>
	<?php
	//REQUIRE "../includes/config.php";
//$query="select * from giaovien";
//$results = mysqli_query($conn,$query);
//if($rowcount=mysqli_num_rows($results) == 0){
	//echo "<tr>";
	//echo "<td>empty data</td>";
	//echo "</tr>";
//}else{
	require '../classes/giaovien.class.php';
	$con = new giaovien();
	$giaovien = $con->allgv();
	$stt = 0;
	foreach ($giaovien as $row) {
		$stt++;
		$row_color = ($stt % 2 == 0) ? "#ffffff" : "#f2f2f2";
		echo "<tr style='background-color: $row_color;'>";
		echo "<td>$stt</td>";
		echo "<td>$row[Magv]</td>";
		echo "<td>$row[MaMonHoc]</td>";
		echo "<td>$row[Tengv]</td>";
		echo "<td>$row[DiaChi]</td>";
		echo "<td>$row[SDT]</td>";
		echo "<td>
		<a href='sua_gv.php?cma=$row[Magv]'>
		<button type='button' class = 'fix-button'>Sửa
		</button>
		</a>
		</td>";
		echo "<td>
		<a href='xoa_gv.php?Ma=$row[Magv]' onclick='return XacNhan();'>
		<button type='button' class = 'fix-button' >Xóa</button>
		</a>
		</td>";
		echo "</tr>";
	}
	//$dis = $con->close();
	?>