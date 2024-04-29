<?php
require_once __DIR__ . '/../classes/DB.class.php';

session_start();

function login($u, $p, $connection)
{
    $error = '';
    if (empty($u) || empty($p)) {
        $error = 'Vui lòng nhập đầy đủ tên tài khoản và mật khẩu';
    } else {
        $query = "SELECT * FROM user WHERE username='$u'";
        $result = $connection->query($query);

        if ($result === false) {
            throw new Exception('Lỗi truy vấn cơ sở dữ liệu: ' . $connection->error);
        } else {

            $data = $result->fetch_assoc();
            if ($data != null) {
                $hashed_password = $data['password'];
                if (md5($p) === $hashed_password) {
                    $_SESSION['ses_username'] = $u;
                    $_SESSION['ses_level'] = $data['level'];
                    $_SESSION['ses_userid'] = $data['userid'];
                    $_SESSION['password'] = $hashed_password;


                    ?>
                    <script type="text/javascript">
                        alert("Đăng nhập thành công!");
                        window.location = "index.php";
                    </script>
                    <?php
                } else {
                    $error = 'Mật khẩu không đúng. Vui lòng kiểm tra lại!';
                }
            } else {
                $error = 'Tên đăng nhập không chính xác';
            }
        }
    }

    return ['error' => $error,];
}



if (isset($_POST['ok'])) {
    $connect = new DB();
    $con = $connect->connect();

    $u = isset($_POST['txtuser']) ? $_POST['txtuser'] : '';
    $p = isset($_POST['txtpass']) ? $_POST['txtpass'] : '';

    $login_result = login($u, $p, $con);

    if (!empty($login_result['error'])) {
        echo "<div id='errors' style='color: red; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>" . $login_result['error'] . "</div>";
    } elseif (!empty($login_result['pass'])) {
        echo "<div id='errors' style='color: green; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>" . $login_result['pass'] . "</div>";
        exit();
    }

    $con->close();
}

