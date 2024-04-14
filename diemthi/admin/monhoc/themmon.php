<?php
session_start();
require "../../classes/monhoc.class.php";
$con = new monhoc();
$error = '';
if (!empty($_POST['add_mon'])) {

    $mamon = "/^[A-Za-z0-9]{6,15}$/";

    if (preg_match($mamon, isset($_POST['ma']) ? $_POST['ma'] : '')) {
        $data['MaMonHoc'] = isset($_POST['ma']) ? $_POST['ma'] : '';
    } else {
        $error = 'Mã Môn học không hợp lệ';
    }
    $ten = "/^[\p{L}0-9\s\p{P}]{1,50}$/u";
    if (preg_match($ten, isset($_POST['name']) ? $_POST['name'] : '')) {
        $data['TenMonHoc'] = isset($_POST['name']) ? $_POST['name'] : '';
    } else {
        $error = 'Tên môn học không hợp lệ';
    }
    $sotiethoc = "/^[0-9]{1,}$/";
    if (preg_match($sotiethoc, isset($_POST['tiet']) ? $_POST['tiet'] : '')) {
        $data['SoTiet'] = isset($_POST['tiet']) ? $_POST['tiet'] : '';
    } else {
        $error = 'Số tiết học không hợp lệ';
    }
    $heso = "/^[1-2]{1}$/";
    if (preg_match($heso, isset($_POST['so']) ? $_POST['so'] : '')) {
        $data['HeSoMonHoc'] = isset($_POST['so']) ? $_POST['so'] : '';
    } else {
        $error = 'Hệ số môn học không hợp lệ';
    }

    // Neu ko co loi thi insert
    if ($error == '') {
        $mon = $con->add($data['MaMonHoc'], $data['TenMonHoc'], $data['SoTiet'], $data['HeSoMonHoc']);
        // Trở về trang danh sách
        ?>
        <script type="text/javascript">alert("Đã Thêm Môn Học Thành Công");</script>
        <?php
        header("location:../index.php?mod=mh");
    }
}
if (!empty($error)) {
    echo "<div id='errors' style='color: red; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>$error</div>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Thêm Môn Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/css/stylea.css">
</head>
<center><img width="100%" src="../../assets/img/Ban.png"></center>

<body bgcolor="#a3cbff">
    <center>
        <h1>Thêm Môn Học </h1>
        <a href="../index.php?mod=mh"><button class="add-button">Trở về</button></a> <br /> <br />
        <form method="post" action="themmon.php">
            <table style="background: #f1f1f1" width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td class="ToT">Mã Môn Học</td>

                    <td>
                        <input type="text" name="ma"
                            value="<?php echo !empty($data['MaMonHoc']) ? $data['MaMonHoc'] : ''; ?>"
                            placeholder="Ít nhất 6 ký tự" />
                        <?php if (!empty($errors['MaMonHoc']))
                            echo $errors['MaMonHoc']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="ToT">Tên Môn Học</td>

                    <td>
                        <input type="text" name="name"
                            value="<?php echo !empty($data['TenMonHoc']) ? $data['TenMonHoc'] : ''; ?>" />
                        <?php if (!empty($errors['TenMonHoc']))
                            echo $errors['TenMonHoc']; ?>
                    </td>
                </tr>
                <tr>

                    <td class="ToT">Số Tiết</td>

                    <td>
                        <input type="text" name="tiet"
                            value="<?php echo !empty($data['SoTiet']) ? $data['SoTiet'] : ''; ?>"
                            placeholder="Số tiết là số nguyên" />
                        <?php if (!empty($errors['SoTiet']))
                            echo $errors['SoTiet']; ?>
                    </td>
                </tr>
                <tr>

                    <td class="ToT">Hệ Số Môn Học</td>

                    <td>
                        <input type="text" name="so"
                            value="<?php echo !empty($data['HeSoMonHoc']) ? $data['HeSoMonHoc'] : ''; ?>"
                            placeholder="Hệ số 1 hoặc 2" />
                        <?php if (!empty($errors['HeSoMonHoc']))
                            echo $errors['HeSoMonHoc']; ?>
                    </td>
                </tr>

            </table>

            <h1 style="text-align: center;">
                <input type="submit" class="add-button" name="add_mon" value="Lưu" />
            </h1>

        </form>
    </center>
</body>

</html>