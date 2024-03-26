<?php
session_start();
require "../../classes/diem.class.php";
require "../../includes/config.php";
$con = new diem();
$madiem = $_GET['cma'];
if (!empty ($_POST['edit_diem'])) {
    // Lay data
    $data['DiemMieng'] = isset ($_POST['diemmieng']) ? $_POST['diemmieng'] : '';
    $data['Diem15Phut1'] = isset ($_POST['diem15phut1']) ? $_POST['diem15phut1'] : '';
    $data['Diem15Phut2'] = isset ($_POST['diem15phut2']) ? $_POST['diem15phut2'] : '';
    $data['Diem1Tiet1'] = isset ($_POST['diem1tiet1']) ? $_POST['diem1tiet1'] : '';
    $data['Diem1Tiet2'] = isset ($_POST['diem1tiet2']) ? $_POST['diem1tiet2'] : '';
    $data['DiemThi'] = isset ($_POST['diemthi']) ? $_POST['diemthi'] : '';
    $errors = array();
    if (empty ($data['DiemMieng'])) {
        $errors['DiemMieng'] = 'Chưa nhập điểm miệng';
    }

    if (empty ($data['Diem15Phut1'])) {
        $errors['Diem15Phut1'] = 'Chưa nhập điểm 15 phút';
    }
    if (empty ($data['Diem15Phut2'])) {
        $errors['Diem15Phut2'] = 'Chưa nhập điểm 15 phút';
    }
    if (empty ($data['Diem1Tiet1'])) {
        $errors['Diem1Tiet1'] = 'Chưa nhập điểm 1 tiết';
    }
    if (empty ($data['Diem1Tiet2'])) {
        $errors['Diem1Tiet2'] = 'Chưa nhập điểm 1 tiết';
    }
    if (empty ($data['DiemThi'])) {
        $errors['DiemThi'] = 'Chưa nhập điểm thi';
    }

    if (!$errors) {
        $diemmieng = floatval($_POST['diemmieng']); // Chuyển giá trị thành số thực
        $diem15phut1 = floatval($_POST['diem15phut1']);
        $diem15phut2 = floatval($_POST['diem15phut2']);
        $diem1tiet1 = floatval($_POST['diem1tiet1']);
        $diem1tiet2 = floatval($_POST['diem1tiet2']);
        $diemthi = floatval($_POST['diemthi']);

        $diemtrungbinh = ($diemmieng + $diem15phut1 + $diem15phut2 + ($diem1tiet1 + $diem1tiet2) * 2 + $diemthi * 3) / 10; // Tính điểm trung bình
        ?>
        <script type="text/javascript">
            var result = confirm("Bạn có chắc chắn muốn lưu điểm?");
            if (result == true) {
                // Nếu người dùng chọn Yes, tiến hành lưu điểm
                <?php
                $diem = $con->edit($madiem, $data['DiemMieng'], $data['Diem15Phut1'], $data['Diem15Phut2'], $data['Diem1Tiet1'], $data['Diem1Tiet2'], $data['DiemThi'], $diemtrungbinh);
                ?>
                // Trở về trang danh sách
                window.location.href = "../index.php?mod=diem";
            } else {
                // Trở về trang danh sách
                window.location.href = "../index.php?mod=diem";
            }
        </script>
        <?php
        exit();
    }
}
?>
<?php
$data = $con->selectdiem($madiem);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Môn Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/css/stylea.css">

</head>
<center><img src="../../assets/img/Ban.png" width="100%" height="360px"></center>
<center>

    <body bgcolor="#a3cbff">
        <h1>Sửa Điểm </h1>
        <a href="../index.php?mod=diem">
            <button>Trở về</button>
        </a> <br /> <br />
        <form method="post" action="suadiem.php?cma=<?php echo $data['MaDiem']; ?>">
            <table style = "background: #f1f1f1" width="50%" border="1" cellspacing="0" cellpadding="10" style="border: 1px solid transparent;">

                <tr>
                    <td class = "ToT">Điểm Miệng</td>
                    <td>
                        <input type="text" name="diemmieng" value="<?php echo $data['DiemMieng']; ?>" />
                        <?php if (!empty ($errors['DiemMieng']))
                            echo $errors['DiemMieng']; ?>
                    </td>
                </tr>

                <tr>
                    <td class = "ToT">Điểm 15 phút</td>
                    <td>
                        <input type="text" name="diem15phut1" value="<?php echo $data['Diem15Phut1']; ?>" />
                        <?php if (!empty ($errors['Diem15Phut1']))
                            echo $errors['Diem15Phut1']; ?>
                    </td>
                </tr>

                <tr>
                    <td class = "ToT">Điểm 15 phút</td>
                    <td>
                        <input type="text" name="diem15phut2" value="<?php echo $data['Diem15Phut2']; ?>" />
                        <?php if (!empty ($errors['Diem15Phut2']))
                            echo $errors['Diem15Phut2']; ?>
                    </td>
                </tr>

                <tr>
                    <td class = "ToT">Điểm 1 tiết</td>
                    <td>
                        <input type="text" name="diem1tiet1" value="<?php echo $data['Diem1Tiet1']; ?>" />
                        <?php if (!empty ($errors['Diem1Tiet1']))
                            echo $errors['Diem1Tiet1']; ?>
                    </td>
                </tr>

                <tr>
                    <td class = "ToT">Điểm 1 tiết</td>
                    <td>
                        <input type="text" name="diem1tiet2" value="<?php echo $data['Diem1Tiet2']; ?>" />
                        <?php if (!empty ($errors['Diem1Tiet2']))
                            echo $errors['Diem1Tiet2']; ?>
                    </td>
                </tr>

                <tr>
                    <td class = "ToT">Điểm thi</td>
                    <td>
                        <input type="text" name="diemthi" value="<?php echo $data['DiemThi']; ?>" />
                        <?php if (!empty ($errors['DiemThi']))
                            echo $errors['DiemThi']; ?>
                    </td>
                </tr>
                <tr>
                    <td class = "ToT">Điểm trung bình</td>
                    <td>
                        <input type="text" name="diemtrungbinh" value="<?php echo $data['DiemTB']; ?>"
                            readonly="readonly" />
                        <?php if (!empty ($errors['DiemTB']))
                            echo $errors['DiemTB']; ?>
                    </td>
                </tr>
            </table>

            <a style ="text-align: center">
                <input type="hidden" name="id" value="<?php echo $data['MaDiem']; ?>" />
                <input type="submit" class = "add-button" name="edit_diem" value="Lưu" />
            </a>
        </form>
    </body>
</center>

</html>