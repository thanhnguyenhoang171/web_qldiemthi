<?php
session_start();
require "../../classes/day.class.php";

$con = new day();

if (isset ($_GET['id'])) {
    $id = $_GET['id'];

    if (!empty ($_POST['edit_day'])) {
        $data['MaMonHoc'] = isset ($_POST['mamonhoc']) ? $_POST['mamonhoc'] : '';
        $data['Magv'] = isset ($_POST['magiangvien']) ? $_POST['magiangvien'] : '';
        $data['MaLopHoc'] = isset ($_POST['malophoc']) ? $_POST['malophoc'] : '';
        $data['MaHocKy'] = isset ($_POST['mahocky']) ? $_POST['mahocky'] : '';
        $data['MoTaPhanCong'] = isset ($_POST['motaphancong']) ? $_POST['motaphancong'] : '';

        $errors = array();

        if (empty ($data['MaMonHoc'])) {
            $errors['MaMonHoc'] = 'Chưa nhập mã môn học';
        }
        if (empty ($data['Magv'])) {
            $errors['Magv'] = 'Chưa nhập mã giảng viên';
        }
        if (empty ($data['MaLopHoc'])) {
            $errors['MaLopHoc'] = 'Chưa nhập mã lớp học';
        }
        if (empty ($data['MaHocKy'])) {
            $errors['MaHocKy'] = 'Chưa nhập mã học kỳ';
        }
        if (empty ($data['MoTaPhanCong'])) {
            $errors['MoTaPhanCong'] = 'Chưa nhập mô tả phân công';
        }

        if (empty ($errors)) {
            $dayhoc = $con->edit($id, $data['MaMonHoc'], $data['Magv'], $data['MaLopHoc'], $data['MaHocKy'], $data['MoTaPhanCong']);
            header("Location: ../index.php?mod=day");
            exit();
        }
    }

    $data = $con->selectday($id);
} else {
    header("Location: ../index.php?mod=day");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sửa Lịch Dạy</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body bgcolor="#CAFFFF">
    <h1 align="center">Sửa Lịch Dạy</h1>
    <div align="center">
        <a href="../index.php?mod=day"><button>Trở về</button></a> <br /><br />

        <form method="post" action="suaday.php?id=<?php echo $data['MaDayHoc']; ?>">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Mã Môn Học</td>
                    <td>
                        <input type="text" name="mamonhoc" value="<?php echo $data['MaMonHoc']; ?>" />
                        <?php if (!empty ($errors['MaMonHoc']))
                            echo $errors['MaMonHoc']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Mã Giảng Viên</td>
                    <td>
                        <input type="text" name="magiangvien" value="<?php echo $data['Magv']; ?>" />
                        <?php if (!empty ($errors['Magv']))
                            echo $errors['Magv']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Mã Lớp Học</td>
                    <td>
                        <input type="text" name="malophoc" value="<?php echo $data['MaLopHoc']; ?>" />
                        <?php if (!empty ($errors['MaLopHoc']))
                            echo $errors['MaLopHoc']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Mã Học Kỳ</td>
                    <td>
                        <input type="text" name="mahocky" value="<?php echo $data['MaHocKy']; ?>" />
                        <?php if (!empty ($errors['MaHocKy']))
                            echo $errors['MaHocKy']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Mô Tả Phân Công</td>
                    <td>
                        <input type="text" name="motaphancong" value="<?php echo $data['MoTaPhanCong']; ?>" />
                        <?php if (!empty ($errors['MoTaPhanCong']))
                            echo $errors['MoTaPhanCong']; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $data['MaDayHoc']; ?>" />
                        <input type="submit" name="edit_day" value="Lưu" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>