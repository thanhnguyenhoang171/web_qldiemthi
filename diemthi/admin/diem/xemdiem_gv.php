<?php
require "../../includes/config.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>
    <title>Danh sách sinh viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="../../assets/css/css/stylea.css">
</head>

<body bgcolor="#a3cbff">
    <br />
    <h1 class="h1" style="font-family:Tahoma;text-align: center;">Điểm Sinh Viên</h1>
    <h2 align="center">

        <form action="xemdiem_gv.php" method="post">

            <div style="text-align:center">
                <tr>
                    <td>Mã Học Kỳ</td>
                    <td> <select name="hk" class = "select-style" style="width:100px;height: 25px ">
                            <?php
                            $query = "select MaHocKy from hocky";
                            $results = mysqli_query($conn, $query);
                            while ($data = mysqli_fetch_assoc($results)) {
                                echo "<option value='$data[MaHocKy]'>$data[MaHocKy]</option>";
                            }
                            ?>
                        </select></td>
                    <td>Mã Lớp Học</td>
                    <td>
                        <select name="lop" class = "select-style" style="width:100px;height: 25px">
                            <?php
                            $query2 = "select * from lophoc";
                            $results2 = mysqli_query($conn, $query2);
                            while ($data2 = mysqli_fetch_assoc($results2)) {
                                echo "<option value='$data2[MaLopHoc]'>$data2[MaLopHoc]</option>";
                            }
                            ?>

                        </select>
                    </td>
                    <td>Mã Môn Học</td>
                    <td>
                        <select name="mon" class = "select-style" style="width:100px;height: 25px">
                            <?php
                            $query3 = "select * from monhoc";
                            $results3 = mysqli_query($conn, $query3);
                            while ($data3 = mysqli_fetch_assoc($results3)) {
                                echo "<option value='$data3[MaMonHoc]'>$data3[MaMonHoc]</option>";
                            }
                            ?>

                        </select>
                    </td>
                    <p> <input type="submit" name="add" class = "view-button" value="Chọn" style="width:100px;height: 25px" /></p>
                </tr>
            </div>

        </form>
        <form action="../qlgv.php" method="post">
            <div style="text-align:center">
                <input type="submit" class = "view-button" name="back" value="Trở Về" style="width:100px;height: 25px" />
            </div>
        </form>
        <form action="xemdiem_gv.php" method="post">
    </h2>
    <table width="73%" border="1" cellspacing="0" cellpadding="10" style="margin: 0 auto; width: 100%;">
        <tr class="diem" style="color: #f1f1f1;
        background-color: #336699;
        text-align: center;
        font-weight: bold;">
            <td>Mã Sinh Viên</td>
            <td>Tên Sinh Viên</td>
            <td>Mã Lớp</td>
            <td>Mã Học Kỳ</td>
            <td>Mã Môn Học</td>
            <td>Điểm Miệng</td>
            <td>Điểm 15 phút</td>
            <td>Điểm 15 phút</td>
            <td>Điểm 1 tiết</td>
            <td>Điểm 1 tiết</td>
            <td>Điểm Thi</td>
            <td>Điểm TB môn</td>
        </tr>
        <?php
        ?>
        <?php
        require "../../classes/diem.class.php";
        $connect = new diem();
        $students = $connect->alldiem();
        if (isset ($_POST['add'])) {
            foreach ($students as $item) {
                if ($_POST['hk'] == $item['MaHocKy'] && $_POST['lop'] == $item['MaLopHoc'] && $_POST['mon'] == $item['MaMonHoc']) {

                    ?>
                    <tr style = " background: #f1f1f1">
                        <td>
                            <?php echo $item['MaHS']; ?>
                        </td>
                        <td>
                            <?php echo $item['TenHS']; ?>
                        </td>
                        <td>
                            <?php echo $item['MaLopHoc']; ?>
                        </td>
                        <td>
                            <?php echo $item['MaHocKy']; ?>
                        </td>
                        <td>
                            <?php echo $item['MaMonHoc']; ?>
                        </td>
                        <td>
                            <?php echo $item['DiemMieng']; ?>
                        </td>
                        <td>
                            <?php echo $item['Diem15Phut1']; ?>
                        </td>
                        <td>
                            <?php echo $item['Diem15Phut2']; ?>
                        </td>
                        <td>
                            <?php echo $item['Diem1Tiet1']; ?>
                        </td>
                        <td>
                            <?php echo $item['Diem1Tiet2']; ?>
                        </td>
                        <td>
                            <?php echo $item['DiemThi']; ?>
                        </td>
                        <?php
                        $tinh = 0;
                        $tinh = ($item['DiemMieng'] + $item['Diem15Phut1'] + $item['Diem15Phut2'] + ($item['Diem1Tiet1'] + $item['Diem1Tiet2']) * 2 + $item['DiemThi'] * 3) / 10;
                        $item['DiemTB'] = $tinh;
                        ?>
                        <td>
                            <?php echo round($item['DiemTB'], 1); ?>
                        </td>
                    </tr>
                    <?php
                }
            }
        }
        ?>
    </table>
    </form>
</body>

</html>