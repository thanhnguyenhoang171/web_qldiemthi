<link rel="stylesheet" href="../../assets/css/css/stylea.css">

<?php
session_start();
require "../../classes/lop.class.php";
$con = new lop();
$id = $_GET['id'];
if (!empty ($_POST['edit_mon'])) {
    // Lay data
    $data['Tenlophoc'] = isset ($_POST['name']) ? $_POST['name'] : '';
    $data['KhoiHoc'] = isset ($_POST['tiet']) ? $_POST['tiet'] : '';
    $data['MaLopHoc'] = isset ($_POST['id']) ? $_POST['id'] : '';
    $errors = array();
    if (empty ($data['Tenlophoc'])) {
        $errors['Tenlonhoc'] = 'Chưa nhập tên môn học';
    }

    if (empty ($data['KhoiHoc'])) {
        $errors['KhoiHocs'] = 'Chưa nhập số tiết';
    }

    // Neu ko co loi thi insert
    if (!$errors) {
        $lop = $con->sualop($data['MaLopHoc'], $data['Tenlophoc'], $data['KhoiHoc']);
        ?>
        <script type="text/javascript">
            alert("Bạn Đã Sửa Lớp Thành Công.Nhấn OK Để Tiếp Tục !");
            window.location = "../index.php?mod=lop";
        </script>
        <?php
        exit();

    }
}
?>
<?php
$data = $con->selectlop($id);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Môn Học</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<center><img src="../../assets/img/Ban.png" width="100%" height="360px"></center>
<center>

    <body bgcolor="#a3cbff">
        <h1>Sửa Môn Học </h1>
        <a href="../index.php?mod=lop"><button class = "view-button">Trở về</button></a> <br /> <br />
        <form method="post" action="sualop.php?id=<?php echo $data['MaLopHoc']; ?>">
            <table width="50%" border="1" cellspacing="0" cellpadding="10" style =" background: #f1f1f1">
                <tr>
                    <td class = "ToT" >Tên Lớp Học</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $data['Tenlophoc']; ?>" />
                        <?php if (!empty ($errors['Tenlophoc']))
                            echo $errors['tenlophoc']; ?>
                    </td>
                </tr>

                <tr>
                    <td  class = "ToT">Khối</td>
                    <td>
                        <input type="text" name="tiet" value="<?php echo $data['KhoiHoc']; ?>" />
                        <?php if (!empty ($errors['KhoiHoc']))
                            echo $errors['KhoiHoc']; ?>
                    </td>
                </tr>
            </table>
            <h1 style = ""text-align: center>
                <input type="hidden" name="id" value="<?php echo $data['MaLopHoc']; ?>" />
                <input type="submit" class = "add-button" name="edit_mon" value="Lưu" />
            </h1>
        </form>
    </body>
</center>

</html>