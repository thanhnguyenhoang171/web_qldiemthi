<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../../assets/css/css/stylea.css">
    <title>Thêm Thành Viên</title>
</head>

<body>
    <?php
    session_start();
    require_once ("../../classes/DB.class.php");
    $connect = new DB();
    $conn = $connect->connect();
    $name = $password = "";
    if (isset ($_POST["btn_submit"])) {
        //lấy thông tin từ các form bằng phương thức POST
        $ten = "/^[a-zA-Z0-9]{6,}$/";
        if (preg_match($ten, $_POST["username"])) {
            $name = $_POST["username"];
        } else {
            ?>
            <script type="text/javascript">
                alert("Username không hợp lệ!");
                window.location = "themuser.php";
            </script>
            <?php
            exit();
        }
        $pass = "/^(?=.*\d)(?=.*[a-zA-Z0-9]).{6,}$/";
        if (preg_match($pass, $_POST['pass'])) {
            $password = md5($_POST["pass"]);
        } else {
            ?>
            <script type="text/javascript">
                alert("Password không hợp lệ!");
                window.location = "themuser.php";
            </script>
            <?php
            exit();
        }
        $level = 1;
        //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
        if ($name == "" || $password == "") {
            ?>
            <script type="text/javascript">
                alert("Bạn vui lòng nhập đầy đủ thông tin");
                window.location = "themuser.php";
            </script>
            <?php
            exit();
        } else {
            //thực hiện việc lưu trữ dữ liệu vào db
            $sql = "INSERT INTO user(
    					username,
    					password,
					    level
    					) VALUES (
					    '$name',
					    '$password',
    					'$level'
    					)";
            mysqli_query($conn, $sql);
            ?>
            <script type="text/javascript">
                alert("Đã thêm Admin Thành Công")
                window.location = "../index.php?mod=capnhat"
            </script>
            <?php

        }
    }
    ?>
    <center><img src="../../assets/img/Ban.png" width="100%" height="360px"></center>
    <center>

        <body bgcolor="#a3cbff">
            <h1>THÊM ADMIN</h1>
            <a href="../index.php?mod=capnhat"><button class = "view-button">Trở Về</button></a>
            <form action="themuser.php" method="post">
                <table width="50%" border="1" cellspacing="0" cellpadding="10" style = "background: #f1f1f1">
                    <tr>
                        <td class = "ToT">Tên Đăng Nhập </td>
                        <td><input type="text" id="username" name="username" placeholder="Ít nhất 6 ký tự"></td>
                    </tr>
                    <tr>
                        <td  class = "ToT">Mật Khẩu </td>
                        <td><input type="password" id="pass" name="pass" placeholder="Ít nhất 6 ký tự"></td>
                    </tr>
                    <!-- <tr>
                        <td>Level </td>
                        <td><select id="level" name="level">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select> </td>
                    </tr> -->
                </table>
                <h1 style = "text-align: center">
                    <td><input type="submit" class = "add-button" name="btn_submit" value="Thêm Admin"></td>
                </h1>
            </form>
        </body>

</html>