<link rel="stylesheet" href="../../assets/css/css/stylea.css">

<?php
session_start();
require "../../classes/hocki.class.php";
$connect=new hocki();
$ten=$hk=$nh="";
$mahk=$_GET['cmahk'];
if(isset($_POST['ok'])){
	if($_POST['txtten'] == null){
		echo "Bạn Chưa Nhập Tên Học Kỳ.";
	}else{
		$ten=$_POST['txtten'];
	}
	if($_POST['txthocky'] == null){
		echo "Bạn Chưa Nhập Hệ Số Học Kỳ.";
	}else{
		$hk=$_POST['txthocky'];
	}
	if($_POST['txtnamhoc'] == null){
		echo "Bạn Chưa Nhập Năm Học.";
	}else{
		$nh=$_POST['txtnamhoc'];
	}
	if( $ten && $hk && $nh){
	    $con=$connect->edit($mahk,$ten,$hk,$nh);
		header("location:../index.php?mod=hk");
		exit();
	}
	$dis = $connect->dis();
}
?>
<?php
$conn=$connect->selectquery($mahk);
?>
<center><img width="100%" src="../../assets/img/Ban.png"></center>
<body bgcolor="#a3cbff">
<h1 align="center">Trang Sửa Học Kỳ</h1>
<form action="sua_hk.php?cmahk=<?php echo $conn['MaHocKy'];?>" method="post">
<table align="center" border="1" cellspacing="0" cellpadding="10" style = "background: #f1f1f1">
	
<tr>
			<td class = "ToT" >Tên Học Kỳ:</td>
			<td><input type="text" name="txtten" size="25" value="<?php echo $conn['TenHocKy']; ?>"/></td>
		</tr>
<tr>
			<td class = "ToT">Hệ Số Học Kỳ:</td>
			<td><input type="text" name="txthocky" size="25" value="<?php echo $conn['HeSoHK']; ?>"/></td>
		</tr>
		<tr>
			<td class = "ToT">Năm Học:</td>
			<td><input type="text" name="txtnamhoc" size="25" value="<?php echo $conn['NamHoc']; ?>"/></td>
		</tr>
</table>
			<h1 style = "text-align: center">  <input type="submit" class = "add-button" name="ok" value="Sửa Năm Học" /><br/>
			</h1>
</form>
</body>