<?php
session_start();
$m = $malop = $t = $gt = $ns = $nois = $dt = $cha = $me = $p = "";
require "../../classes/hocsinh.class.php";

$con = new hocsinh();
if (isset($_POST['ok'])) {
    $errors = array();
    if ($_POST['txtmahs'] == null) {
        $errors['txtmahs'] = 'Chưa nhập mã học sinh';
    } else {
        $rule = "/^\d{10}$/";
        if (preg_match($rule, $_POST['txtmahs'])) {
            $m = $_POST['txtmahs'];
        } else {
            $errors['txtmahs'] = 'Mã học sinh không hợp lệ';
        }
    }
    if ($_POST['malophoc'] != null) {
        $malop = $_POST['malophoc'];
    }
    if ($_POST['txtten'] == null) {
        $errors['txtten'] = 'Chưa nhập tên học sinh';
    } else {
        $hoten = "/^[\p{L}0-9\s\p{P}]{1,50}$/u";
        if (preg_match($hoten, $_POST['txtten'])) {
            $t = $_POST['txtten'];
        } else {
            $errors['txtten'] = 'Tên học sinh không hợp lệ';
        }
    }
    if ($_POST['txtgt'] == 1) {
        $gt = "Nam";
    } else {
        $gt = "Nữ";
    }
    if ($_POST['txtngs'] == null) {
        $errors['txtngs'] = 'Bạn chưa nhập ngày sinh';
    } else {
        $ns = $_POST['txtngs'];
    }
    if ($_POST['txtns'] == null) {
        $errors['txtns'] = 'Bạn chưa nhập nơi sinh';
    } else {
        $nois = $_POST['txtns'];
    }
    if ($_POST['txtdantoc'] == null) {
        $errors['txtdantoc'] = 'Bạn chưa nhập dân tộc';
    } else {
        $dt = $_POST['txtdantoc'];
    }
    if ($_POST['txtcha'] == null) {
        $errors['txtcha'] = 'Bạn chưa nhập tên cha';
    } else {
        $cha = $_POST['txtcha'];
    }
    if ($_POST['txtme'] == null) {
        $errors['txtme'] = 'Bạn chưa nhập tên mẹ';
    } else {
        $me = $_POST['txtme'];
    }
    if ($_POST['txtpasshs'] == null) {
        $errors['txtpasshs'] = 'Bạn chưa nhập password';
    } else {
        $pass = "/^[a-zA-Z0-9]{6,}$/";
        if (preg_match($pass, $_POST['txtpasshs'])) {
            $p = md5($_POST['txtpasshs']);
        } else {
            $errors['txtpasshs'] = 'Password không hợp lệ';
        }
    }

    try {
        if ($m && $malop && $t && $gt && $ns && $nois && $dt && $cha && $me && $p && empty($errors)) {
            $hocsinh = $con->add($m, $malop, $t, $gt, $ns, $nois, $dt, $cha, $me, $p);

                ?>
            <script type="text/javascript">
                alert("Bạn Đã Thêm Sinh Viên Thành Công. Nhấn OK Để Tiếp Tục Thêm Sinh Viên!");
                window.location = "add_hs.php";
            </script>
            <?php
            exit();
        }
    } catch (Exception $e) {
        $errors[''] = "Mã sinh viên đã tồn tại";
        exit();
    }
}
?>