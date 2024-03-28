<link rel="stylesheet" href="../../assets/css/css/stylea.css">

<?php
session_start();
$n = $ten = $h = $nam = "";
require "../../classes/hocki.class.php";
if (isset ($_POST['ok'])) {
    $connect = new hocki();
    $d = $connect->allquery();
    if ($_POST['txthk'] == null) {
        ?>
        <script type="text/javascript">
            alert("Bạn Chưa Nhập Mã Học Kỳ!");
            window.location = "add_hk.php";
        </script>
        <?php
        exit();
    } else {
        $hocky = "/^[a-zA-Z0-9]{1,5}$/";
        if (preg_match($hocky, $_POST['txthk'])) {
            $n = $_POST['txthk'];
        } else {
            ?>
            <script type="text/javascript">
                alert("Mã Học Kỳ không hợp lệ.!");
                window.location = "add_hk.php";
            </script>
            <?php
            exit();
        }
    }
    if ($_POST['txtten'] == null) {
        ?>
        <script type="text/javascript">
            alert("Bạn Chưa Nhập Tên Học Kỳ!");
            window.location = "add_hk.php";
        </script>
        <?php
        exit();
    } else {
        $tenhk = "/^(?=.*\d)(?=.*[a-zA-Z0-9]).{6,}$/";
        if (preg_match($tenhk, $_POST['txtten'])) {
            $ten = $_POST['txtten'];
        } else {
            ?>
            <script type="text/javascript">
                alert("Tên Học Kỳ không hợp lệ.!");
                window.location = "add_hk.php";
            </script>
            <?php
            exit();
        }
    }
    if ($_POST['txtheso'] == null) {
        ?>
        <script type="text/javascript">
            alert("</br> Bạn Chưa Nhập Hệ Số Học Kỳ!");
            window.location = "add_hk.php";
        </script>
        <?php
        exit();
    } else {
        $heso = "/^[1-2]{1}$/";
        if (preg_match($heso, $_POST['txtheso'])) {
            $h = $_POST['txtheso'];
        } else {
            ?>
            <script type="text/javascript">
                alert("Hệ Số Học Kỳ không hợp lệ!");
                window.location = "add_hk.php";
            </script>
            <?php
            exit();
        }
    }
    if ($_POST['txtnam'] == null) {
        ?>
        <script type="text/javascript">
            alert(" Bạn Chưa Nhập Năm Học!");
            window.location = "add_hk.php";
        </script>
        <?php
        exit();
    } else {
        $nh = "/^[0-9_-]{9,}$/";
        if (preg_match($nh, $_POST['txtnam'])) {
            $nam = $_POST['txtnam'];
        } else {
            ?>
            <script type="text/javascript">
                alert("Năm Học không hợp lệ!");
                window.location = "add_hk.php";
            </script>
            <?php
            exit();
        }
    }

    if ($n && $ten && $h && $nam) {
        $con = $connect->add($n, $ten, $h, $nam);
        ?>
        <script type="text/javascript">
            alert("Bạn Đã Thêm Học Kỳ Thành Công.Nhấn OK Để Tiếp Tục !");
            window.location = "../index.php?mod=hk";
        </script>
        <?php
        exit();
    }
}
?>
<center><img src="../../assets/img/Ban.png" width="100%" height="360px"></center>

<body bgcolor="#a3cbff">
    <h1 align="center">Trang Thêm Học Kỳ</h1>
    <form action="add_hk.php" method="post">
        <table align="center" border="1" cellspacing="0" cellpadding="10" style="background: #f1f1f1">
            <tr>
                <td class="ToT">Mã Số Học Kỳ:</td>
                <td> <input type="text" name="txthk" size="25" placeholder="Mẫu:12016" /><br />
                </td>
            </tr>
            <tr>
                <td class="ToT">Tên Học Kỳ:</td>
                <td><input type="text" name="txtten" size="25" placeholder="Là chữ tiếng Việt" /></td>
            </tr>
            <tr>
                <td class="ToT">Hệ Số HK:</td>
                <td><input type="text" name="txtheso" size="25" placeholder="Nhập 1 hoặc 2" /></td>
            </tr>
            <tr>
                <td class="ToT">Năm Học:</td>
                <td><input type="text" name="txtnam" size="25" placeholder="Mẫu: 2016-2017" /></td>
            </tr>
        </table>
        <h1 style="text-align: center">
            <input type="submit" class="add-button" name="ok" value="Thêm Học Kỳ" />
        </h1>
    </form>
    <form action="../index.php?mod=hk" method="post">
        <div style="text-align:center; margin-top: 15%;">
            <input type="submit" name="back" value="Trở Về" style="width:100px;height: 25px" />
        </div>
    </form>
</body>