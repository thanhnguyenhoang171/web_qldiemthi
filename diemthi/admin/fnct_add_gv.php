<?php
session_start();
//require_once ("..\classes\DB.class.php"); // bỏ cx đc
require_once ("..\classes\giaovien.class.php");
//require "diemthi\classes\giaovien.class.php"; // for testing
function validateInput($post)
{
    $errors = [];
    $data = [];

    // Mã Giảng Viên
    if (empty($post['txtmagv'])) {
        $errors['txtmagv'] = 'Bạn Chưa Nhập Mã Giảng Viên';
    } else {
        if (preg_match("/^[0-9]{10}$/", $post['txtmagv'])) {
            $data['magv'] = $post['txtmagv'];
        } else {
            $errors['txtmagv'] = 'Mã Giảng Viên không hợp lệ';
        }
    }

    // Tên Giảng Viên
    if (empty($post['txtten'])) {
        $errors['txtten'] = 'Bạn Chưa Nhập Vào Tên Giảng Viên';
    } else {
        $data['ten'] = $post['txtten'];
    }

    // Địa Chỉ
    if (empty($post['txtdiachi'])) {
        $errors['txtdiachi'] = 'Bạn Chưa Nhập Vào Địa Chỉ';
    } else {
        $data['diachi'] = $post['txtdiachi'];
    }

    // Điện Thoại
    if (empty($post['txtdienthoai'])) {
        $errors['txtdienthoai'] = 'Bạn Chưa Nhập Vào Số Điện Thoại';
    } else {
        if (preg_match("/^[0-9]{10,11}$/", $post['txtdienthoai'])) {
            $data['dienthoai'] = $post['txtdienthoai'];
        } else {
            $errors['txtdienthoai'] = 'Số điện thoại không hợp lệ';
        }
    }

    // Password
    if (empty($post['txtpass'])) {
        $errors['txtpass'] = 'Bạn chưa nhập mật khẩu khẩu';
    } else {
        if (preg_match("/^[a-zA-Z0-9]{6,}$/", $post['txtpass'])) {
            $data['pass'] = md5($post['txtpass']);
        } else {
            $errors['txtpass'] = 'Password nhập vào không hợp lệ';
        }
    }

    // Mã Môn Học
    $data['mamonhoc'] = $post['mamonhoc'] ?? '';

    return [$data, $errors];
}

function addGiaoVien($data)
{
    $con = new giaovien();
    return $con->add($data['magv'], $data['mamonhoc'], $data['ten'], $data['diachi'], $data['dienthoai'], $data['pass']);
}

function getMonHocOptions()
{
    $db = new DB();
    $conn = $db->connect();
    $query = "SELECT * FROM monhoc";
    $results = mysqli_query($conn, $query);
    $options = [];

    while ($data = mysqli_fetch_assoc($results)) {
        $options[] = $data['MaMonHoc'];
    }

    return $options;
}
