<?php
session_start();
require "../../classes/diem.class.php";
require "../../includes/config.php";
// require "diemthi\classes\diem.class.php";
// require "diemthi\includes\config.php";
function validateData($data)
{
    $errors = array();
    if (empty($data['DiemMieng'])) {
        $errors['DiemMieng'] = 'Chưa nhập điểm miệng';
    }

    if (empty($data['Diem15Phut1'])) {
        $errors['Diem15Phut1'] = 'Chưa nhập điểm 15 phút';
    }
    if (empty($data['Diem15Phut2'])) {
        $errors['Diem15Phut2'] = 'Chưa nhập điểm 15 phút';
    }
    if (empty($data['Diem1Tiet1'])) {
        $errors['Diem1Tiet1'] = 'Chưa nhập điểm 1 tiết';
    }
    if (empty($data['Diem1Tiet2'])) {
        $errors['Diem1Tiet2'] = 'Chưa nhập điểm 1 tiết';
    }
    if (empty($data['DiemThi'])) {
        $errors['DiemThi'] = 'Chưa nhập điểm thi';
    }

    return $errors;
}
function calculateDiemTrungBinh($data)
{
    $diemmieng = floatval($data['DiemMieng']);
    $diem15phut1 = floatval($data['Diem15Phut1']);
    $diem15phut2 = floatval($data['Diem15Phut2']);
    $diem1tiet1 = floatval($data['Diem1Tiet1']);
    $diem1tiet2 = floatval($data['Diem1Tiet2']);
    $diemthi = floatval($data['DiemThi']);

    return ($diemmieng + $diem15phut1 + $diem15phut2 + ($diem1tiet1 + $diem1tiet2) * 2 + $diemthi * 3) / 10;
}
function handleFormSubmission($con, $madiem)
{
    if (!empty($_POST['edit_diem'])) {
        $data['DiemMieng'] = isset($_POST['diemmieng']) ? $_POST['diemmieng'] : '';
        $data['Diem15Phut1'] = isset($_POST['diem15phut1']) ? $_POST['diem15phut1'] : '';
        $data['Diem15Phut2'] = isset($_POST['diem15phut2']) ? $_POST['diem15phut2'] : '';
        $data['Diem1Tiet1'] = isset($_POST['diem1tiet1']) ? $_POST['diem1tiet1'] : '';
        $data['Diem1Tiet2'] = isset($_POST['diem1tiet2']) ? $_POST['diem1tiet2'] : '';
        $data['DiemThi'] = isset($_POST['diemthi']) ? $_POST['diemthi'] : '';

        $errors = validateData($data);

        if (empty($errors)) {
            $diemtrungbinh = calculateDiemTrungBinh($data);

            $result = $con->edit($madiem, $data['DiemMieng'], $data['Diem15Phut1'], $data['Diem15Phut2'], $data['Diem1Tiet1'], $data['Diem1Tiet2'], $data['DiemThi'], $diemtrungbinh);

            if ($result) {
                echo "<script type='text/javascript'>
                        var result = confirm('Bạn có chắc chắn muốn lưu điểm?');
                        if (result == true) {
                            window.location.href = '../index.php?mod=diem';
                        } else {
                            window.location.href = '../index.php?mod=diem';
                        }
                    </script>";
                exit();
            }
            //return $result; // for testing
        }
    }
}

// Main logic
$con = new diem();
$madiem = $_GET['cma'];

handleFormSubmission($con, $madiem);

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
<style>
    .error {
        color: red;
        font-size: 12px;
    }
</style>
<center><img src="../../assets/img/Ban.png" width="100%" height="160px"></center>
<center>

    <body bgcolor="#a3cbff">
        <h1>Sửa Điểm </h1>
        <a href="../index.php?mod=diem">
            <button>Trở về</button>
        </a> <br /> <br />
        <form method="post" action="suadiem.php?cma=<?php echo $data['MaDiem']; ?>">
            <table style="background: #f1f1f1" width="50%" border="1" cellspacing="0" cellpadding="10"
                style="border: 1px solid transparent;">

                <tr>
                    <td class="ToT">Điểm Miệng</td>
                    <td>
                        <input type="text" name="diemmieng" value="<?php echo $data['DiemMieng']; ?>" />
                        <?php if (!empty($errors['DiemMieng']))
                            echo '<span class="error">' . $errors['DiemMieng'] . '</span>'; ?>
                    </td>
                </tr>

                <tr>
                    <td class="ToT">Điểm 15 phút</td>
                    <td>
                        <input type="text" name="diem15phut1" value="<?php echo $data['Diem15Phut1']; ?>" />
                    <?php if (!empty($errors['Diem15Phut1']))
                        echo '<span class="error">' . $errors['Diem15Phut1'] . '</span>'; ?>
                    </td>
                </tr>

                <tr>
                    <td class="ToT">Điểm 15 phút</td>
                    <td>
                        <input type="text" name="diem15phut2" value="<?php echo $data['Diem15Phut2']; ?>" />
                        <?php if (!empty($errors['Diem15Phut2']))
                            echo '<span class="error">' . $errors['Diem15Phut2'] . '</span>'; ?>
                    </td>
                </tr>

                <tr>
                    <td class="ToT">Điểm 1 tiết</td>
                    <td>
                        <input type="text" name="diem1tiet1" value="<?php echo $data['Diem1Tiet1']; ?>" />
                    <?php if (!empty($errors['Diem1Tiet1']))
                        echo '<span class="error">' . $errors['Diem1Tiet1'] . '</span>'; ?>
                    </td>
                </tr>

                <tr>
                    <td class="ToT">Điểm 1 tiết</td>
                    <td>
                        <input type="text" name="diem1tiet2" value="<?php echo $data['Diem1Tiet2']; ?>" />
                    <?php if (!empty($errors['Diem1Tiet2']))
                        echo '<span class="error">' . $errors['Diem1Tiet2'] . '</span>'; ?>
                    </td>
                </tr>

                <tr>
                    <td class="ToT">Điểm thi</td>
                    <td>
                        <input type="text" name="diemthi" value="<?php echo $data['DiemThi']; ?>" />
                    <?php if (!empty($errors['DiemThi']))
                        echo '<span class="error">' . $errors['DiemThi'] . '</span>'; ?>
                    </td>
                </tr>
                <tr>
                    <td class="ToT">Điểm trung bình</td>
                    <td>
                        <input type="text" name="diemtrungbinh" value="<?php echo $data['DiemTB']; ?>"
                            readonly="readonly" />
                <?php if (!empty($errors['DiemTB']))
                    echo '<span class="error">' . $errors['DiemTB'] . '</span>'; ?>
                    </td>
                </tr>
            </table>

            <a style="text-align: center">
                <input type="hidden" name="id" value="<?php echo $data['MaDiem']; ?>" />
                <input type="submit" class="add-button" name="edit_diem" value="Lưu" />
            </a>
        </form>
    </body>
</center>

</html>