<?php
session_start();
require "../../classes/day.class.php";

$ma = $gv = $mon = $lop = $hk = $pc = "";

if (isset ($_POST['ok'])) {
    $connect = new day();

    if ($_POST['txtid'] == null) {
        echo "</br>Bạn Chưa Nhập Mã Học Dạy";
    } else {
        $ma = $_POST['txtid'];
    }

    if ($_POST['txtgv'] == null) {
        echo "</br> Bạn Chưa Nhập Mã Giảng Viên";
    } else {
        $gv = $_POST['txtgv'];
    }

    if ($_POST['txtmh'] == null) {
        echo "</br> Bạn Chưa Nhập Mã Môn Học";
    } else {
        $mon = $_POST['txtmh'];
    }

    if ($_POST['txtlop'] == null) {
        echo "</br> Bạn Chưa Nhập Lớp Học";
    } else {
        $lop = $_POST['txtlop'];
    }

    if ($_POST['txthk'] == null) {
        echo "</br> Bạn Chưa Nhập Học Kỳ";
    } else {
        $hk = $_POST['txthk'];
    }

    if ($_POST['txtmota'] == null) {
        echo "</br> Bạn chưa nhập Mô tả";
    } else {
        $pc = $_POST['txtmota'];
    }

    if ($ma && $gv && $hk && $lop && $pc && $mon) {
        $con = $connect->add($ma, $gv, $lop, $hk, $mon, $pc);
        if ($con) {
            ?>
            <script type="text/javascript">
                alert("Bạn Đã Thêm Lịch Dạy Thành Công. Nhấn OK Để Tiếp Tục !");
                window.location = "../index.php?mod=hk";
            </script>
            <?php
            exit();
        } else {
            echo "Có lỗi xảy ra khi thêm lịch dạy!";
        }
    }
}
?>
<center><img src="../../assets/img/Ban.png" width="100%" height="160px" alt=""></center>

<body bgcolor="#CAFFFF">
    <h1 align="center">Thêm Lịch Dạy</h1>
    <form action="themday.php" method="post">
        <table align="center" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>Mã Số Dạy:</td>
                <td> <input type="text" name="txtid" size="25" /><br />
                </td>
            </tr>
            <tr>
                <td>Mã Số Giáo Viên:</td>
                <td>
                    <select name="txtgv">
                        <?php
                        $connectGV = new DB();
                        $connGV = $connectGV->connect();
                        $queryGV = "SELECT * FROM giaovien";
                        $resultGV = mysqli_query($connGV, $queryGV);
                        while ($dataGV = mysqli_fetch_assoc($resultGV)) {
                            echo "<option value='{$dataGV['Magv']}'>{$dataGV['Magv']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mã Số Môn Học:</td>
                <td>
                    <select name="txtmh">
                        <?php
                        $connectMH = new DB();
                        $connMH = $connectMH->connect();
                        $queryMH = "SELECT * FROM monhoc";
                        $resultMH = mysqli_query($connMH, $queryMH);
                        while ($dataMH = mysqli_fetch_assoc($resultMH)) {
                            echo "<option value='{$dataMH['MaMonHoc']}'>{$dataMH['MaMonHoc']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mã Số Học Kỳ:</td>
                <td>
                    <select name="txthk">
                        <?php
                        $connectHK = new DB();
                        $connHK = $connectHK->connect();
                        $queryHK = "SELECT * FROM hocky";
                        $resultHK = mysqli_query($connHK, $queryHK);
                        while ($dataHK = mysqli_fetch_assoc($resultHK)) {
                            echo "<option value='{$dataHK['MaHocKy']}'>{$dataHK['MaHocKy']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mã Số Lớp:</td>
                <td>
                    <select name="txtlop">
                        <?php
                        $connectLop = new DB();
                        $connLop = $connectLop->connect();
                        $queryLop = "SELECT * FROM lophoc";
                        $resultLop = mysqli_query($connLop, $queryLop);
                        while ($dataLop = mysqli_fetch_assoc($resultLop)) {
                            echo "<option value='{$dataLop['MaLopHoc']}'>{$dataLop['MaLopHoc']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mô Tả:</td>
                <td><input type="text" name="txtmota" size="25" /></td>
            </tr>
            <tr>
                <td> </td>
                <td> <input type="submit" name="ok" value="Thêm Học Kỳ" /><br />
                </td>
            </tr>
        </table>
    </form>
</body>