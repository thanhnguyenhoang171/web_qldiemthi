<link rel="stylesheet" href="../../assets/css/css/stylea.css">

<?php
session_start();
require "../../classes/day.class.php";

$ma = $gv = $mon = $lop = $hk = $pc = "";
$error = '';

if (isset($_POST['ok'])) {
    $connect = new day();

    if ($_POST['txtid'] == null) {
        $error = "Bạn Chưa Nhập Mã Dạy Học";

    } else {
        $ma = $_POST['txtid'];
    }

    if ($_POST['txtgv'] == null) {
        $error = " Bạn Chưa Nhập Mã Giảng Viên";

    } else {
        $gv = $_POST['txtgv'];
    }

    if ($_POST['txtmh'] == null) {
        $error = "Bạn Chưa Nhập Mã Môn Học";
    } else {
        $mon = $_POST['txtmh'];
    }

    if ($_POST['txtlop'] == null) {
        $error = "Bạn Chưa Nhập Lớp Học";

    } else {
        $lop = $_POST['txtlop'];
    }

    if ($_POST['txthk'] == null) {
        $error = "Bạn Chưa Nhập Học Kỳ";

    } else {
        $hk = $_POST['txthk'];
    }

    if ($_POST['txtmota'] == null) {
        $error = "Bạn chưa nhập Mô tả";

    } else {
        $pc = $_POST['txtmota'];
    }
    if ($_POST['txtid'] == null && $_POST['txtmota'] == null) {
        $error = "Bạn chưa nhập dữ liệu";
    }
    if ($error == '') {
        if ($ma && $gv && $hk && $lop && $pc && $mon) {
            try {
                $con = $connect->add($ma, $gv, $lop, $hk, $mon, $pc);
                if ($con) {
                    ?>
                    <script type="text/javascript">
                        alert("Bạn Đã Thêm Lịch Dạy Thành Công. Nhấn OK Để Tiếp Tục !");
                        window.location = "themday.php";
                    </script>
                    <?php
                    exit();
                }
            } catch (Exception $e) {
                $error = 'Mã dạy đã tồn tại';
            }
        }
    }
}
if (!empty($error)) {
    echo "<div id='errors' style='color: red; position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);'>$error</div>";
}
?>
<center><img src="../../assets/img/Ban.png" width="100%" height="259px" alt=""></center>

<body bgcolor="#a3cbff">
    <h1 align="center">Thêm Lịch Dạy</h1>
    <form action="themday.php" method="post">
        <table align="center" border="1" cellspacing="0" cellpadding="10" style="background: #f1f1f1">
            <tr>
                <td class="ToT">Mã Số Dạy:</td>
                <td> <input type="text" name="txtid" size="25" /><br />
                </td>
            </tr>
            <tr>
                <td class="ToT">Mã Số Giảng Viên:</td>
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
                <td class="ToT">Mã Số Môn Học:</td>
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
                <td class="ToT">Mã Số Học Kỳ:</td>
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
                <td class="ToT">Mã Số Lớp:</td>
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
                <td class="ToT">Mô Tả:</td>
                <td><input type="text" name="txtmota" size="25" /></td>
            </tr>
        </table>
        <h1 style="text-align: center">
            <input type="submit" class="add-button" name="ok" value="Thêm lịch" /><br />
        </h1>
    </form>
    <form action="../index.php?mod=day" method="post">
        <div style="text-align:center; margin-top: 2%;">
            <input type="submit" name="back" value="Trở Về" style="width:100px;height: 25px" />
        </div>
    </form>
</body>