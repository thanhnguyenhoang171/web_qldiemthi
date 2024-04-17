<?php
session_start();
require "../../classes/monhoc.class.php";
$con = new monhoc();
$id = $_GET['id'];
if (!empty($_POST['edit_mon'])) {
    // Lay data
    $data['TenMonHoc'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['SoTiet'] = isset($_POST['tiet']) ? $_POST['tiet'] : '';
    $data['HeSoMonHoc'] = isset($_POST['heso']) ? $_POST['heso'] : '';
    $data['MaMonHoc'] = isset($_POST['id']) ? $_POST['id'] : '';
    $errors = array();
    if (empty($data['TenMonHoc'])) {
        $errors['TenMonHoc'] = 'Chưa nhập tên môn học';
    }

    if (empty($data['SoTiet'])) {
        $errors['SoTiet'] = 'Chưa nhâp số tiết';
    }
    if (empty($data['HeSoMonHoc'])) {
        $errors['HeSoMonHoc'] = 'Nhập hệ số môn học';
    }

    if (empty($errors)) {
        ?>
        <script type="text/javascript">
            var result = confirm("Bạn có chắc chắn muốn môn học?");
            if (result == true) {
                <?php
                $mon = $con->edit($data['MaMonHoc'], $data['TenMonHoc'], $data['SoTiet'], $data['HeSoMonHoc']);
                ?>
                window.location.href = "../index.php?mod=mh";
                // header("location:../index.php?mod=mh");

            } else {
                window.location.href = "../index.php?mod=mh";
                //   header("location:../index.php?mod=mh");
            }
        </script>
        <?php
        exit();
    }
}
?>
<?php
$data = $con->selectmon($id);
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
<center><img width="100%" src="../../assets/img/Ban.png"></center>
<center>

    <body bgcolor="#a3cbff">
        <h1>Sửa Môn Học </h1>
        <a href="../index.php?mod=mh"><button>Trở về</button></a> <br /> <br />
        <form method="post" action="suamon.php?id=<?php echo $data['MaMonHoc']; ?>">
            <table style="background: #f1f1f1" width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td class="ToT">Tên Môn Học</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $data['TenMonHoc']; ?>" />
                        <?php if (!empty($errors['TenMonHoc']))
                            echo '<span class="error">' . $errors['TenMonHoc'] . '</span>'; ?>
                    </td>
                </tr>
                <tr>
                    <td class="ToT">Số Tiết</td>
                    <td>
                        <input type="text" name="tiet" value="<?php echo $data['SoTiet']; ?>" />
                        <?php if (!empty($errors['SoTiet']))
                            echo '<span class="error">' . $errors['SoTiet'] . '</span>'; ?>
                    </td>
                </tr>
                <tr>
                    <td class="ToT">Hệ Số Môn Học</td>
                    <td>
                        <input type="text" name="heso" value="<?php echo $data['HeSoMonHoc']; ?>" />
                        <?php if (!empty($errors['HeSoMonHoc']))
                            echo '<span class="error">' . $errors['HeSoMonHoc'] . '</span>'; ?>
                    </td>
                </tr>
            </table>
            <h1 style=" text-align: center; ">
                <input type="hidden" name="id" value="<?php echo $data['MaMonHoc']; ?>" />
                <input type="submit" class="add-button" name="edit_mon" value="Lưu" />
            </h1>
        </form>
    </body>
</center>

</html>