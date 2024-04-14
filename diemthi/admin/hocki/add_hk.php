<link rel="stylesheet" href="../../assets/css/css/stylea.css">

<?php
session_start();
$n = $ten = $h = $nam = "";
$error = '';
require "../../classes/hocki.class.php";
if (isset($_POST['ok'])) {

    $connect = new hocki();
    $d = $connect->allquery();

    if ($_POST['txthk'] == null) {
        $error = 'Bạn chưa nhập mã học kỳ';
    } else {
        $hocky = "/^[a-zA-Z0-9]{1,20}$/";
        if (preg_match($hocky, $_POST['txthk'])) {
            $n = $_POST['txthk'];
        } else {
            $error = 'Mã học kỳ không hợp lệ';
        }
    }
    if ($_POST['txtten'] == null) {
        $errors['txtten'] = 'Bạn chưa nhập tên học kỳ';
    } else {
        $tenhk = "/^(?=.*\d)(?=.*[a-zA-Z0-9]).{6,}$/";
        if (preg_match($tenhk, $_POST['txtten'])) {
            $ten = $_POST['txtten'];
        } else {
            $error = 'Tên học kỳ không hợp lệ';
        }
    }
    if ($_POST['txtheso'] == null) {
        $errors['txtheso'] = 'Bạn chưa nhập hệ số học kỳ';
    } else {
        $heso = "/^[1-2]{1}$/";
        if (preg_match($heso, $_POST['txtheso'])) {
            $h = $_POST['txtheso'];
        } else {
            $error = 'Hệ số học kỳ không hợp lệ';
        }
    }
    if ($_POST['txtnam'] == null) {
        $error = 'Bạn chưa nhập năm học';
    } else {
        $nh = "/^[0-9_-]{9,}$/";
        if (preg_match($nh, $_POST['txtnam'])) {
            $nam = $_POST['txtnam'];
        } else {
            $error = 'Năm học không hợp lệ';
        }
    }
    if ($_POST['txthk'] == null && $_POST['txtten'] == null && $_POST['txtheso'] == null && $_POST['txtnam'] == null) {
        $error = "Bạn chưa nhập dữ liệu";
    }
    if ($error == '') {
        if ($n && $ten && $h && $nam) {
            try {
                $con = $connect->add($n, $ten, $h, $nam);
                ?>
                <script type="text/javascript">
                    alert("Bạn Đã Thêm Học Kỳ Thành Công.Nhấn OK Để Tiếp Tục !");
                    window.location = "../index.php?mod=hk";
                </script>
                <?php
                exit();
            } catch (Exception $e) {
                $error = "Mã số học kỳ đã tồn tại";
            }
        }
    }
}
if (!empty($error)) {
    echo "<div id='errors' style='color: red; position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);'>$error</div>";
}
?>
<center><img src="../../assets/img/Ban.png" width="100%" height="260px"></center>

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
        <div style="text-align:center; margin-top: 6%;">
            <input type="submit" name="back" value="Trở Về" style="width:100px;height: 25px" />
        </div>
    </form>
</body>