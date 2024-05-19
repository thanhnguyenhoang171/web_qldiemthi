<?php
function handleLogin($con, $username, $password)
{
    $query = "SELECT * FROM hocsinh WHERE MaHS='$username'";
    $results = mysqli_query($con, $query);

    if (!$results) {
        return 'Lỗi truy vấn cơ sở dữ liệu.';
    }

    if (mysqli_num_rows($results) == 0) {
        return 'Username không hợp lệ!';
    } else {
        $data = mysqli_fetch_assoc($results);
        $hashed_password = $data['passwordhs'];

        if (md5($password) == $hashed_password) {
            $_SESSION['ses_MaHS'] = $data['MaHS'];
            $_SESSION['ses_passwordhs'] = $hashed_password;
            header("Location: qlhs.php");
            exit();
        } else {
            return 'Password không đúng!';
        }
    }
}
