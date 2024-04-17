<link rel="stylesheet" href="../../assets/css/css/stylea.css">

<?php
session_start();
$n = $ten = $h = $nam = "";

require "../../classes/hocki.class.php";
if (isset($_POST['ok'])) {
    $errors = array();
    $connect = new hocki();
    $d = $connect->allquery();

    if ($_POST['txthk'] == null) {
        $errors['txthk'] = 'Chưa nhập mã học kỳ';
    } else {
        $hocky = "/^[a-zA-Z0-9]{1,20}$/";
        if (preg_match($hocky, $_POST['txthk'])) {
            $n = $_POST['txthk'];
        } else {
            $errors['txthk'] = 'Mã học kỳ không hợp lệ';
        }
    }
    if ($_POST['txtten'] == null) {
        $errors['txtten'] = 'Bạn chưa nhập tên học kỳ';
    } else {
        $tenhk = "/^(?=.*\d)(?=.*[a-zA-Z0-9]).{6,}$/";
        if (preg_match($tenhk, $_POST['txtten'])) {
            $ten = $_POST['txtten'];
        } else {
            $errors['txtten'] = 'Tên học kỳ không hợp lệ';
        }
    }
    if ($_POST['txtheso'] == null) {
        $errors['txtheso'] = 'Bạn chưa nhập hệ số học kỳ';
    } else {
        $heso = "/^[1-2]{1}$/";
        if (preg_match($heso, $_POST['txtheso'])) {
            $h = $_POST['txtheso'];
        } else {
            $errors['txtheso'] = 'Hệ số học kỳ không hợp lệ';
        }
    }
    if ($_POST['txtnam'] == null) {
        $errors['txtnam'] = 'Bạn chưa nhập năm học';
    } else {
        $nh = "/^[0-9_-]{9,}$/";
        if (preg_match($nh, $_POST['txtnam'])) {
            $nam = $_POST['txtnam'];
        } else {
            $errors['txtnam'] = 'Năm học không hợp lệ';
        }
    }
    if ($_POST['txthk'] == null && $_POST['txtten'] == null && $_POST['txtheso'] == null && $_POST['txtnam'] == null) {
        $errors['txthk'] = "Bạn chưa nhập dữ liệu";
    }
    if (empty($errors)) {
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
                $errors['txthk'] = "Mã số học kỳ đã tồn tại";
            }
        }
    }
}
// if (!empty($error)) {
//     echo "<div id='errors' style='color: red; position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);'>$error</div>";
// }
?>
<center><img src="../../assets/img/Ban.png" width="100%" height="260px"></center>
<style>
    .error {
        color: red;
        font-size: 12px;
    }
</style>
<body bgcolor="#a3cbff">
    <h1 align="center">Trang Thêm Học Kỳ</h1>
    <form action="add_hk.php" method="post">
        <table align="center" border="1" cellspacing="0" cellpadding="10" style="background: #f1f1f1">
            <tr>
                <td class="ToT">Mã Số Học Kỳ:</td>
                <td> <input type="text" name="txthk" size="25" placeholder="Mẫu:12016" /><br />
                <?php if (!empty($errors['txthk']))
                    echo '<span class="error">' . $errors['txthk'] . '</span>'; ?></td>
            </tr>
            <tr>
                <td class="ToT">Tên Học Kỳ:</td>
                <td><input type="text" name="txtten" size="25" placeholder="Là chữ tiếng Việt" /><?php if (!empty($errors['txtten']))
                    echo '<span class="error">' . $errors['txtten'] . '</span>'; ?></td>
            </tr>
            <tr>
                <td class="ToT">Hệ Số HK:</td>
                <td><input type="text" name="txtheso" size="25" placeholder="Nhập 1 hoặc 2" /><?php if (!empty($errors['txtheso']))
                    echo '<span class="error">' . $errors['txtheso'] . '</span>'; ?></td>
            </tr>
            <tr>
                <td class="ToT">Năm Học:</td>
                <td><input type="text" name="txtnam" size="25" placeholder="Mẫu: 2016-2017" /><?php if (!empty($errors['txtnam']))
                    echo '<span class="error">' . $errors['txtnam'] . '</span>'; ?></td>
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