<?php
require "../classes/monhoc.class.php";
$con=new monhoc();
$mon=$con->allmon();
?>
<script type="text/javascript">
    function XacNhan(){
        if(!window.confirm('Bạn Có Chắc Muốn Xóa Môn Này Không?')){
            return false;
        }
    }
</script>
<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Môn Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1 align="center"style="font-family:Tahoma;font-weight: bold">Danh sách Môn Học</h1>
<h3 align="center">
    <a href="monhoc/themmon.php">
        <button type = "button" class = "add-button" >Thêm Môn Học</button>
    </a>
</h3>
<table align="center" border="1" cellspacing="0" cellpadding="10">
    <tr class = "ToT" >
        <td>Mã Môn Học</td>
        <td>Tên Môn Học</td>
        <td>Số Tiết</td>
        <td>Hệ Số Môn Học</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>
    <?php foreach ($mon as $item){ ?>
        <tr style="background-color: #f9f9f9;">
            <td><?php echo $item['MaMonHoc']; ?></td>
            <td><?php echo $item['TenMonHoc']; ?></td>
            <td><?php echo $item['SoTiet']; ?></td>
            <td><?php echo $item['HeSoMonHoc']; ?></td>
            <td><?php echo "<a href='monhoc/suamon.php?id=$item[MaMonHoc]'>
            <button type='button' class = 'fix-button'> Sửa </button>
            </a>"; ?></td>
                <td> <?php echo "<a href='monhoc/xoamon.php?id=$item[MaMonHoc]' onclick='return XacNhan();'>
                <button type='button' class = 'fix-button' >Xóa</button>
                </a>"; ?>
            </td>
        </tr>
    <?php } ?>
    <br/>
</table>
