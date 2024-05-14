<?php
require '../../classes/DB.class.php';
session_start();
$u = $_SESSION['ses_userid'];
$pad = $_SESSION['password'];
?>
<?php
$connect = new DB();
$con = $connect->connect();
$old = $new = $pre = " ";
$error = '';



//code cũ
/*
if (isset ($_POST['ad'])) {
    if ($_POST['txtpassad'] == null) {
        ?>
        <script type="text/javascript">
            alert("Bạn chưa nhập Mật Khẩu");
            window.location = "doimatkhau.php";
        </script>
        <?php
        exit();
    } else {
        $old_password_md5 = md5($_POST['txtpassad']);

        if ($old_password_md5 != $pad) {
            ?>
            <script type="text/javascript">
                alert("Mật Khẩu Cũ không chính xác");
                window.location = "doimatkhau.php";
            </script>
            <?php
            exit();
        } else {
            $old = $_POST['txtpassad'];
        }
    }
    if ($_POST['txtpassad2'] == null) {
        ?>
        <script type="text/javascript">
            alert("Bạn chưa nhập Mật Khẩu Mới");
            window.location = "doimatkhau.php";
        </script>
        <?php
        exit();
    } else {
        if ($_POST['txtpassad2'] != $_POST['txtpassad3']) {
            ?>
            <script type="text/javascript">
                alert("Mật Khẩu Mới không trùng khớp");
                window.location = "doimatkhau.php";
            </script>
            <?php
            exit();
        } else {
            $mk = "/^[a-zA-Z0-9]{6,}$/";
            if (preg_match($mk, $_POST["txtpassad2"])) {
                $new = md5($_POST['txtpassad2']);
            } else {
                ?>
                <script type="text/javascript">
                    alert("Mật Khẩu nhập vào không hợp lệ!.");
                    window.location = "doimatkhau.php";
                </script>
                <?php
                exit();
            }
        }
    }
    if ($u && $pad && $old && $new && $pre) {
        $query = "UPDATE user SET password ='$new' WHERE userid =$u";
        $results = mysqli_query($con, $query);
        if ($results) {
            ?>
            <script type="text/javascript">
                alert("Đã thay đổi mật khẩu thành công!");
                window.location = "../index.php";

            </script>
            <?php
            exit();
        } else {
            ?>
            <script type="text/javascript">
                alert("Có lỗi xảy ra khi cập nhật mật khẩu.");
                window.location = "../index.php";

            </script>
            <?php
            exit();
        }


    }
}*/

if (isset($_POST['ad'])) {
    if ($_POST['txtpassad'] == null && $_POST['txtpassad2'] == null && $_POST['txtpassad3'] == null) {
        $error = 'Vui lòng không bỏ trống thông tin!';
    } else {
        if ($_POST['txtpassad'] == null && $_POST['txtpassad2'] != null) {
            $error = 'Bạn chưa nhập mật khẩu cũ!';

        } else {
            $old_password_md5 = md5($_POST['txtpassad']);

            if ($old_password_md5 != $pad) {
                $error = 'Mật khẩu cũ không chính xác!';
            } else {
                $old = $_POST['txtpassad'];
            }
        }
        if ($_POST['txtpassad2'] == null && $_POST['txtpassad'] != null) {
            $error = 'Bạn chưa nhập mật khẩu mới!';
        } else {
            if ($_POST['txtpassad3'] == null) {
                $error = 'Bạn chưa nhập lại mật khẩu mới!';
            } else if ($_POST['txtpassad2'] != $_POST['txtpassad3']) {
                $error = 'Mật khẩu mới không trùng khớp!';
            } else {
                $mk = "/^[a-zA-Z0-9]{6,}$/";
                if (preg_match($mk, $_POST["txtpassad2"])) {
                    $new = md5($_POST['txtpassad2']);
                } else {
                    $error = 'Mật khẩu nhập vào không hợp lệ!';
                }
            }
            if ($u && $pad && $old && $new && $pre && $error == '') {
                $query = "UPDATE user SET passwordad='$new' WHERE userid=$u";
                $results = mysqli_query($con, $query);
                if ($results) {
                    $error = 'Đã thay đổi mật khẩu thành công!';
                } else {
                    $error = "Có lỗi xảy ra khi cập nhật mật khẩu.";
                }
            }
        }
    }
}
// Hiển thị thông báo lỗi nếu có
if (!empty($error)) {
    echo "<div id='errors' style='color: red; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>$error</div>";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Thay Đổi Mât Khẩu</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">


    <link rel="stylesheet" href="../../assets/css/css/style.css">


</head>

<body>
    <div class="wrap">
        <div class="avatar">
            <img src="../../assets/img/images/admin.png">
        </div>
        <form action="doimatkhau.php" method="post" novalidate>
            <input type="password" name="txtpassad" placeholder="old password" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="password" name="txtpassad2" placeholder="new password" required>
            <div class="bar">
                <i></i>
            </div>
            <input type="password" name="txtpassad3" placeholder="re-enter new password" required>
            <a href="" class="forgot_link">forgot ?</a>
            <button><input type="submit" name="ad" value="Thay đổi" /></button>
        </form>
    </div>
    <form action="../index.php?mod=capnhat" method="post">
        <div style="text-align:center; margin-top: 20%;">
            <input type="submit" name="back" value="Trở Về" style="width:100px;height: 25px" />
        </div>
    </form>
    <script src="js/index.js"></script>

</body>

</html>