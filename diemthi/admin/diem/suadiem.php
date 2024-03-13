<?php
session_start();
require "../../includes/config.php";
$madiem=$_GET['cma'];
$malop=$t=$gt=$ns=$nois=$dt=$cha=$me="";
if(isset($_POST['ok'])){
    if($_POST['txtmalop'] == null){
        echo "ban chua nhap ma lop hoc";
    }else{
        $malop=$_POST['txtmalop'];
    }
    if($_POST['txtten'] == null){
        echo "ban chua nhap ten";
    }else{
        $t=$_POST['txtten'];
    }
    if($_POST['txtgt'] == null){
        echo "Bạn Chưa Nhập Vào giới tính";
    }else{
        $gt=$_POST['txtgt'];
    }
    if($_POST['txtns'] == null){
        echo "Bạn Chưa Nhập Vào Ngày Sinh";
    }else{
        $ns=$_POST['txtns'];
    }
    if($_POST['txtnois'] == null){
        echo "Bạn Chưa Nhập Vào Nơi Sinh";
    }else{
        $nois=$_POST['txtnois'];
    }
    if($_POST['txtdantoc'] == null){
        echo "Bạn Chưa Nhập Vào Dân Tộc";
    }else{
        $dt=$_POST['txtdantoc'];
    }
    if($_POST['txtcha'] == null){
        echo "Bạn Chưa Nhập Vào Họ Tên Cha";
    }else{
        $cha=$_POST['txtcha'];
    }
    if($_POST['txtme'] == null){
        echo "Bạn Chưa Nhập Vào Họ Tên Mẹ";
    }else{
        $me=$_POST['txtme'];
    }
    if($_POST['txtpasshs'] == null){
        echo "Bạn Chưa Nhập Vào Tên Học Sinh";
    }else{
        $p=$_POST['txtpasshs'];
    }
    if( $malop && $t && $gt&&$ns&&$nois&&$dt&&$cha&&$me&&$p ){
        $query="update hocsinh set MaLopHoc='$malop',TenHS='$t',GioiTinh='$gt',NgaySinh='$ns',noisinh='$nois',dantoc='$dt',hotencha='$cha',hotenme='$me',passwordhs='$p' where MaHS='$mahs'";
        $results = mysqli_query($conn,$query);
        header("location:../index.php?mod=diem");
        exit();



    }
}
$query="select * from diem where MaDiem='$madiem'";
$results = mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($results);
?>
<center><img src="../../assets/img/Ban.gif"></center>
<body bgcolor="#CAFFFF">
<h1 align="center">TRANG SỬA ĐIỂM</h1>
<table align="center" border="1" cellspacing="0" cellpadding="10">
    <form action="suadiem.php?cma=<?php echo $row['MaDiem']; ?>" method="post">
        <tr>
            <td>Mã Học Sinh</td>
            <td><input type="text" name="txtmalop" size="25" value="<?php echo $row['MaHS']; ?>" readonly="readonly"/></td>
        </tr>

        <tr>
            <td>Mã Lớp</td>
            <td><input type="text" name="txtten" size="25" value="<?php echo $row['MaLopHoc']; ?>" readonly="readonly"/></td>
        </tr>
        <tr>
            <td>Mã Môn</td>
            <td><input type="text" name="txtten" size="25" value="<?php echo $row['MaMonHoc']; ?>" readonly="readonly"/></td>
        </tr>
        <tr>
            <td>Mã Học Kỳ</td>
            <td><input type="text" name="txtns" size="25" value="<?php echo $row['MaHocKy']; ?>" readonly="readonly"/> </td>
        </tr>
        <tr>
            <td>Điểm Miệng</td>
            <td><input type="text" name="txtnois" size="25" value="<?php echo $row['DiemMieng']; ?>"/> </td>
        </tr>
        <tr>
            <td>Điểm 15 Phút</td>
            <td><input type="text" name="txtdantoc" size="25" value="<?php echo $row['Diem15Phut1']; ?>"/> </td>
        </tr>
        <tr>
            <td>Điểm 15 Phút</td>
            <td><input type="text" name="txtcha" size="25" value="<?php echo $row['Diem15Phut2']; ?>"/> </td>
        </tr>
        <tr>
            <td>Điểm 1 Tiết</td>
            <td><input type="text" name="txtme" size="25" value="<?php echo $row['Diem1Tiet1']; ?>"/> </td>
        </tr>
        <tr>
            <td>Điểm 1 Tiết</td>
            <td><input type="text" name="txtpasshs" size="25" value="<?php echo $row['Diem1Tiet2']; ?>" /></td>
        </tr>
        <td>Điểm Thi</td>
        <td><input type="text" name="txtten" size="25" value="<?php echo $row['DiemThi']; ?>" /></td>
        </tr>
        <tr>
            <td></td>
        <td>  <input type="submit" name="ok" value="Sửa" /><br/>
        </td>
        </tr>
    </form>
</TABLE>