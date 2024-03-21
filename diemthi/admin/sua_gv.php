<?php
session_start();
require "../classes/giaovien.class.php";
$con=new giaovien();
$ma=$_GET['cma'];
$mamon=$t=$dc=$dt=$p="";
if(isset($_POST['ok'])){
	if($_POST['txtmamon'] == null){
		echo "Bạn Chưa Nhập Mã Môn Học";
	}else{
		$mamon=$_POST['txtmamon'];
	}
	if($_POST['txtten'] == null){
		echo "Bạn Chưa Nhập Vào Ten Giao Vien";
	}else{
		$t=$_POST['txtten'];
	}
	if($_POST['txtdiachi'] == null){
		echo "Bạn Chưa Nhập Vào Ten Giao Vien";
	}else{
		$dc=$_POST['txtdiachi'];
	}
	if($_POST['txtdienthoai'] == null){
		echo "Bạn Chưa Nhập Vào Ten Giao Vien";
	}else{
		$dt=$_POST['txtdienthoai'];
	}
	if($_POST['txtpass'] == null){
		echo "Bạn Chưa Nhập Vào Ten Giao Vien";
	}else{
		$p=$_POST['txtpass'];
	}
	if($mamon && $t && $dc && $dt && $p){
		$giaovien=$con->edit($ma,$mamon,$t,$dc,$dt,$p);
		header("location:index.php?mod=gv");
		$dis=$con->dis();
		exit();
	}
	$dis=$con->dis();
}
?>
<?php
$row=$con->selectgv($ma);

?>
<link rel="stylesheet" href="../assets/css/css/stylea.css">
<center><img width="100%" src="../assets/img/Ban.png"></center>
<body bgcolor="#a3cbff">
	<h1 align="center">Trang Sửa giáo viên</h1>
<form action="sua_gv.php?cma=<?php echo $row['Magv'];?>" method="post">
<table align="center" border="1" cellspacing="0" cellpadding="10">
		<tr style = "background: #f1f1f1">
		<td class = "ToT">Mã Môn Học</td>
			<td><input type="text" name="txtmamon" size="25" value="<?php echo $row['MaMonHoc']; ?>" /></td>
		</tr>
		<tr style = "background: #f1f1f1">
			<td class = "ToT">Tên giáo viên:</td>
			<td><input type="text" name="txtten" size="25" value="<?php echo $row['Tengv']; ?>" /></td>
		</tr>
		<tr style = "background: #f1f1f1">
			<td class = "ToT">Địa Chỉ: </td>
			<td><textarea type="text" name="txtdiachi"><?php echo $row['DiaChi']; ?> </textarea></td>
		</tr>
		<tr style = "background: #f1f1f1">
			<td class = "ToT">Điện Thoại:</td>
			<td><input type="text" name="txtdienthoai" size="25" value="<?php echo $row['SDT']; ?>" /> </td>
		</tr>
		<tr style = "background: #f1f1f1">
			<td class = "ToT">Password giáo viên:</td>
			<td><input type="password" name="txtpass" size="25" value="<?php echo $row['passwordgv']; ?>"/></td>
</table>
			<h1 style = "text-align: center">  <input type="submit" class = "add-button" name="ok" value="Sửa" /><br/>
			</h1>
</form>
</body>
