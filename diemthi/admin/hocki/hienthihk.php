
   <link rel="stylesheet" href="../../assets/css/css/stylea.css">
<script type="text/javascript">
    function XacNhan(){
        if(!window.confirm('Bạn Có Chắc Muốn Xóa Học Kỳ Này Không!!!')){
            return false;
        }
    }
</script>
<H1 align="center" style="font-family: Tahoma;font-weight: bold">QUẢN LÝ HỌC KỲ</H1>
<h2 align="center"><a href="hocki/add_hk.php"><button type='button' class = "add-button">Thêm Học Kỳ</button> </a></h2>
<table align='center' width='1000' border='1' cellspacing="0" cellpadding="10" >
    <tr class  = "ToT">
        <td>STT</td>
        <td>Mã Học Kỳ</td>
        <td>Tên Học Kỳ</td>
        <td>Hệ Số Học Kỳ</td>
        <td>Năm Học</td>
        <td>Sửa</td>
        <td>Xóa</td>
    </tr>
<?php
REQUIRE "../classes/hocki.class.php";
$connection= new hocki();
$con=$connection->allquery();
$stt=0;
foreach($con as $row)
{
    $stt++;
    $row_color = ($stt % 2 == 0) ? "#ffffff" : "#f2f2f2";
    echo "<tr style='background-color: $row_color;'>";
    echo "<td>$stt</td>";
    echo "<td>$row[MaHocKy]</td>";
    echo "<td>$row[TenHocKy]</td>";
    echo "<td>$row[HeSoHK]</td>";
    echo "<td>$row[NamHoc]</td>";
    echo "<td>
        <a href='hocki/sua_hk.php?cmahk=$row[MaHocKy]'>
    <button type='button' class = 'fix-button'>Sửa</button>
        </a>
    </td>";
    echo "<td>
        <a href='hocki/xoa_hk.php?cmahk=$row[MaHocKy]' onclick='return XacNhan();'>
    <button type='button' class = 'fix-button'>Xóa</button>
        </a>
    </td>";
    echo "</tr>";
}
?>
