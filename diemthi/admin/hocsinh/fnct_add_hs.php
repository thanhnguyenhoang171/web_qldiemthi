<?php
session_start();

require "../../classes/hocsinh.class.php";
//require "diemthi\classes\hocsinh.class.php"; // for testing
function validateInput($data)
{
    $errors = array();
    $validatedData = array();

    // Validate MaHS
    if ($data['txtmahs'] == null) {
        $errors['txtmahs'] = 'Chưa nhập mã học sinh';
    } else {
        $rule = "/^\d{10}$/";
        if (preg_match($rule, $data['txtmahs'])) {
            $validatedData['txtmahs'] = $data['txtmahs'];
        } else {
            $errors['txtmahs'] = 'Mã học sinh không hợp lệ';
        }
    }

    // Validate MaLopHoc
    if ($data['malophoc'] != null) {
        $validatedData['malophoc'] = $data['malophoc'];
    }

    // Validate TenHS
    if ($data['txtten'] == null) {
        $errors['txtten'] = 'Chưa nhập tên học sinh';
    } else {
        $hoten = "/^[\p{L}0-9\s\p{P}]{1,50}$/u";
        if (preg_match($hoten, $data['txtten'])) {
            $validatedData['txtten'] = $data['txtten'];
        } else {
            $errors['txtten'] = 'Tên học sinh không hợp lệ';
        }
    }

    // Validate GioiTinh
    $validatedData['txtgt'] = $data['txtgt'] == 1 ? "Nam" : "Nữ";

    // Validate NgaySinh
    if ($data['txtngs'] == null) {
        $errors['txtngs'] = 'Bạn chưa nhập ngày sinh';
    } else {
        $validatedData['txtngs'] = $data['txtngs'];
    }

    // Validate NoiSinh
    if ($data['txtns'] == null) {
        $errors['txtns'] = 'Bạn chưa nhập nơi sinh';
    } else {
        $validatedData['txtns'] = $data['txtns'];
    }

    // Validate DanToc
    if ($data['txtdantoc'] == null) {
        $errors['txtdantoc'] = 'Bạn chưa nhập dân tộc';
    } else {
        $validatedData['txtdantoc'] = $data['txtdantoc'];
    }

    // Validate Cha
    if ($data['txtcha'] == null) {
        $errors['txtcha'] = 'Bạn chưa nhập tên cha';
    } else {
        $validatedData['txtcha'] = $data['txtcha'];
    }

    // Validate Me
    if ($data['txtme'] == null) {
        $errors['txtme'] = 'Bạn chưa nhập tên mẹ';
    } else {
        $validatedData['txtme'] = $data['txtme'];
    }

    // Validate Password
    if ($data['txtpasshs'] == null) {
        $errors['txtpasshs'] = 'Bạn chưa nhập password';
    } else {
        $pass = "/^[a-zA-Z0-9]{6,}$/";
        if (preg_match($pass, $data['txtpasshs'])) {
            $validatedData['txtpasshs'] = md5($data['txtpasshs']);
        } else {
            $errors['txtpasshs'] = 'Password không hợp lệ';
        }
    }

    return array($validatedData, $errors);
}

function addStudent($data)
{
    $con = new hocsinh();
    return $con->add(
        $data['txtmahs'],
        $data['malophoc'],
        $data['txtten'],
        $data['txtgt'],
        $data['txtngs'],
        $data['txtns'],
        $data['txtdantoc'],
        $data['txtcha'],
        $data['txtme'],
        $data['txtpasshs']
    );
}

if (isset($_POST['ok'])) {
    list($validatedData, $errors) = validateInput($_POST);

    if (empty($errors)) {
        try {
            $hocsinh = addStudent($validatedData);
            ?>
            <script type="text/javascript">
                alert("Bạn Đã Thêm Sinh Viên Thành Công. Nhấn OK Để Tiếp Tục Thêm Sinh Viên!");
                window.location = "add_hs.php";
            </script>
            <?php
            exit();
        } catch (Exception $e) {
            $errors[''] = "Mã sinh viên đã tồn tại";
        }
    }
}
?>