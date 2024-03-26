<?php
session_start();
$a = $_SESSION['ses_Magv'];
require "../../classes/DB.class.php";
$connect = new db();
$conn = $connect->connect();
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <div class="banner">
        <center><img src="../../assets/img/Ban.png" height="160px" width="100%"></center>
    </div>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TRANG CẬP NHẬT ĐIỂM</title>

</head>

<body bgcolor="#CAFFFF">
    <?php

    ?>
    <center>
        <h1>TRANG CẬP NHẬT ĐIỂM</h1>
    </center>
    <form action="capnhatdiem2.php" method="post">
        <div style="text-align:center; margin: 0 auto; width: 50%;">
            <table>
                <tr>
                    <td>Mã Lớp Học</td>
                    <td>
                        <select name="day" style="width:100px;height: 25px ">
                            <?php
                            $query = "select * from day where Magv=$a";
                            $results = mysqli_query($conn, $query);
                            while ($data = mysqli_fetch_assoc($results)) {
                                echo "<option value='$data[MaLopHoc]'>$data[MaLopHoc]</option>";
                                $_SESSION['malop'] = $data['MaLopHoc'];
                            }
                            ?>
                        </select>
                    </td>


                    <td>Tên Môn Học</td>
                    <td>
                        <select name="mon" style="width:100px;height: 25px">
                            <?php
                            $query2 = "select * from giaovien,monhoc where Magv=$a";
                            $results2 = mysqli_query($conn, $query2);
                            while ($data2 = mysqli_fetch_assoc($results2)) {
                                echo "<option value='$data2[MaMonHoc]'>$data2[TenMonHoc]</option>";
                                $_SESSION['mamon'] = $data2['MaMonHoc'];
                            }
                            ?>

                        </select>
                    </td>
                    <td>Mã Học Kỳ</td>
                    <td>
                        <select name="hk" style="width:100px;height: 25px">
                            <?php
                            $query3 = "select * from hocky";
                            $results3 = mysqli_query($conn, $query3);
                            while ($data3 = mysqli_fetch_assoc($results3)) {
                                echo "<option value='$data3[MaHocKy]'>$data3[MaHocKy]</option>";
                                $_SESSION['mahk'] = $data3['MaHocKy'];
                            }
                            ?>

                        </select>
                    </td>
                    <td>
                        <p> <input type="submit" name="add" value="Chọn" style="width:100px;height: 25px" /></p>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>