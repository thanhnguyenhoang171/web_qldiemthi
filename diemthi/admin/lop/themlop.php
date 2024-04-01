<link rel="stylesheet" href="../../assets/css/css/stylea.css">

<?php

require '../../classes/lop.class.php';
$con = new lop();
$data = $con->alllop();

// Nếu người dùng submit form
if (!empty($_POST['themlop'])) {
    // Lay data
    // Lay data
    $malop = "/^[a-zA-Z0-9]{1,10}$/";
    if (preg_match($malop, isset($_POST['malop']) ? $_POST['malop'] : '')) {
        $data['MaLopHoc'] = isset($_POST['malop']) ? $_POST['malop'] : '';
    } else {
        ?>
        <script type="text/javascript">
            alert("Mã Lớp không hợp lệ.!");
            window.location = "themlop.php";
        </script>
        <?php
        exit();
    }
    $tenlop = "/^[\p{L}0-9\s\p{P}]{1,20}$/u";
    if (preg_match($tenlop, isset($_POST['tenlop']) ? $_POST['tenlop'] : '')) {
        $data['Tenlophoc'] = isset($_POST['tenlop']) ? $_POST['tenlop'] : '';
    } else {
        ?>
        <script type="text/javascript">
            alert("Tên Lớp không hợp lệ.!");
            window.location = "themlop.php";
        </script>
        <?php
        exit();
    }
    $khoi = "/^[a-zA-Z0-9]{2}$/";
    if (preg_match($khoi, isset($_POST['khoilop']) ? $_POST['khoilop'] : '')) {
        $data['KhoiHoc'] = isset($_POST['khoilop']) ? $_POST['khoilop'] : '';
    } else {
        ?>
        <script type="text/javascript">
            alert("Khoa không hợp lệ!");
            window.location = "themlop.php";
        </script>
        <?php
        exit();
    }

    // Validate thong tin
    $errors = array();
    if (empty($data['MaLopHoc'])) {
        $errors['MaLopHoc'] = 'Chưa nhập Mã Lớp Học';
    }

    if (empty($data['Tenlophoc'])) {
        $errors['Tenlophoc'] = 'Chưa nhập tên lớp học';
    }
    if (empty($data['KhoiHoc'])) {
        $errors['KhoiHoc'] = 'Chưa nhập khối học';
    }

    // Neu ko co loi thi insert
    if (!$errors) {
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
            ?>
            <script type="text/javascript">
                alert("Thêm lớp bị lỗi: <?php echo $e->getMessage(); ?>");
                window.location = "themlop.php";
            </script>
            <?php
            exit();
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("Thêm lớp bị lỗi");
            window.location = "themlop.php";
        </script>
        <?php
        exit();
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Thêm Lớp Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<center><img src="../../assets/img/Ban.png" width="100%" height="360px"></center>
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