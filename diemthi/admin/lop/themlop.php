<link rel="stylesheet" href="../../assets/css/css/stylea.css">

<?php
require '../../classes/lop.class.php';
$con = new lop();
$data = $con->alllop();
$error = '';
// Nếu người dùng submit form
if (!empty($_POST['themlop'])) {
    if (empty($_POST['malop'])) {
        $error = 'Chưa nhập Mã Lớp Học';
    } else {
        $malop = "/^[a-zA-Z0-9]{1,10}$/";
        if (!preg_match($malop, $_POST['malop'])) {
            $error = "Mã lớp học không hợp lệ";
        } else {
            $data['MaLopHoc'] = $_POST['malop'];
        }
    }

    if (empty($_POST['tenlop'])) {
        $error = 'Chưa nhập tên lớp học';
    } else {
        $tenlop = "/^[\p{L}0-9\s\p{P}]{1,20}$/u";
        if (!preg_match($tenlop, $_POST['tenlop'])) {
            $error = 'Tên lớp học không hợp lệ';
        } else {
            $data['Tenlophoc'] = $_POST['tenlop'];
        }
    }

    if (empty($_POST['khoilop'])) {
        $error = 'Chưa nhập khối lớp';
    } else {
        $khoi = "/^[a-zA-Z0-9]{2}$/";
        if (!preg_match($khoi, $_POST['khoilop'])) {
            $error = "Khoa không hợp lệ";
        } else {
            $data['KhoiHoc'] = $_POST['khoilop'];
        }
    }

    if (empty($_POST['malop']) && empty($_POST['tenlop']) && empty($_POST['khoilop'])) {
        $error = 'Bạn chưa nhập dữ liệu';
    }

    // Neu ko co loi thi insert
    if ($error == '') {
        try {
            $lop = $con->add($data['MaLopHoc'], $data['Tenlophoc'], $data['KhoiHoc']);
            ?>
            <script type="text/javascript">
                alert("Thêm lớp thành công");
                window.location = "../index.php?mod=lop";
            </script>
            <?php
            exit();
        } catch (Exception $e) {
            $error = 'Mã lớp học đã tồn tại';
        }
    }
}

if (!empty($error)) {
    echo "<div id='errors' style='color: red; position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);'>$error</div>";
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Thêm Lớp Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<center><img src="../../assets/img/Ban.png" width="100%" height="260px"></center>
<center>

    <body bgcolor="#a3cbff">
        <div>
            <h1>THÊM LỚP HỌC </h1>
            <a href="../index.php?mod=lop"><button class="view-button">Trở về</button></a> <br /> <br />
            <form method="post" action="themlop.php">
                <table width="50%" border="1" cellspacing="0" cellpadding="10" style="background: #f1f1f1">
                    <tr>
                        <td class="ToT">Mã Lớp</td>
                        <td>
                            <input type="text" name="malop"
                                value="<?php echo !empty($data['MaLopHoc']) ? $data['MaLopHoc'] : ''; ?>"
                                placeholder="Mẫu:IT01 " />
                            <?php if (!empty($errors['MaLopHoc']))
                                echo $errors['MaLopHoc']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ToT">Tên Lớp</td>
                        <td>
                            <input type="text" name="tenlop"
                                value="<?php echo !empty($data['Tenlophoc']) ? $data['Tenlophoc'] : ''; ?>" />
                            <?php if (!empty($errors['Tenlophoc']))
                                echo $errors['Tenlophoc']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="ToT">Khoa</td>
                        <td>
                            <input type="text" name="khoilop"
                                value="<?php echo !empty($data['KhoiHoc']) ? $data['KhoiHoc'] : ''; ?>"
                                placeholder="vd: IT, ML,..," />
                            <?php if (!empty($errors['KhoiHoc']))
                                echo $errors['KhoiHoc']; ?>
                        </td>
                    </tr>

                </table>
                <h1 style="text-align: center">
                    <input type="submit" class="add-button" name="themlop" value="Lưu" />
                </h1>
            </form>
        </div>
    </body>
</center>

</html>