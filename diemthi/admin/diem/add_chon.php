<?php
session_start();
$a = $_SESSION['ses_Magv'];
require "../../includes/config.php";
require "../../classes/DB.class.php";
$connect = new db();
$conn = $connect->connect();

$dayhoc = $monhoc = $hocky = "";
if (isset($_POST['add'])) {
    $dayhoc = $_POST['day'];
    $monhoc = $_POST['mon'];
    $hocky = $_POST['hk'];
    if ($dayhoc && $monhoc && $hocky) { // Use $_SESSION['mahk'] instead of $hk
        header('location:add_chon2.php');
        exit(); // Make sure to exit after redirecting
    }
}
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <link rel="stylesheet" href="../../assets/css/css/stylea.css">

    <div class="banner">
        <center><img src="../../assets/img/Ban.png" width="100%" height="160px"></center>

<body bgcolor="#a3cbff">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Trang Nhập Điểm</title>

    </head>

    <body>
        <?php

        ?>
        <center>
            <h1>Trang Nhập Điểm</h1>
        </center>
        <form action="add_chon2.php" method="post">
            <div style="text-align:center; margin: 0 auto; width: 50%;">
                <table style="background: #f1f1f1">
                    <tr>
                        <td class="ToT" style="width: 200px">Mã Lớp Học</td>
                        <td>
                            <select name="day" style="width:100px;height: 20px ">
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


                        <td class="ToT" style="width: 200px">Mã Môn Học</td>
                        <td>
                            <select name="mon" style="width:100px;height: 25px">
                                <?php
                                $query2 = "select * from giaovien where Magv=$a";
                                $results2 = mysqli_query($conn, $query2);
                                while ($data2 = mysqli_fetch_assoc($results2)) {
                                    echo "<option value='$data2[MaMonHoc]'>$data2[MaMonHoc]</option>";
                                    $_SESSION['mamon'] = $data2['MaMonHoc'];
                                }
                                ?>

                            </select>
                        </td>

                        <td class="ToT" style="width: 200px">Mã Học Kỳ</td>
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
                        <!-- <p> <input type="submit" name="add" class = 'select-style' value="Chọn" style="width:100px;height: 25px" /></p> -->

                    </tr>
                </table>
                <p> <input type="submit" name="add" class="select-style" value="Chọn"
                        style="width:100px;height: 25px" /></p>
            </div>
        </form>
        <form action="../qlgv.php" method="post">
            <div style="text-align:center; margin-top: 20%;">
                <input type="submit" name="back" value="Trở Về" class="view-button" style="width:100px;height: 25px" />
            </div>
        </form>
    </body>