<?php
session_start();
require_once __DIR__ . '/../classes/DB.class.php';

function processLogin($post, $con)
{
    $error = '';

    if (empty($post['txtusergv']) || empty($post['txtpassgv'])) {
        $error = 'Vui lòng nhập đầy đủ tên tài khoản và mật khẩu!';
    } else {
        $ugv = $post['txtusergv'];
        $pgv = $post['txtpassgv'];

        $query = "SELECT * FROM giaovien WHERE Magv='$ugv'";
        $results = mysqli_query($con, $query);

        if (mysqli_num_rows($results) == 0) {
            $error = 'Tên tài khoản chưa chính xác. Vui lòng nhập lại!';
        } else {
            $data = mysqli_fetch_assoc($results);
            $hashed_password = $data['passwordgv'];

            if (md5($pgv) == $hashed_password) {
                $_SESSION['ses_Magv'] = $data['Magv'];
                $_SESSION['ses_passwordgv'] = $hashed_password;
                header("location: qlgv.php");
                exit();
            } else {
                $error = 'Mật khẩu không đúng. Vui lòng kiểm tra lại!';
            }
        }
    }

    return $error;
}

function displayError($error)
{
    if (!empty($error)) {
        echo "<div id='errors' style='color: red; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>$error</div>";
    }
}



