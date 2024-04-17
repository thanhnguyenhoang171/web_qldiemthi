<?php
require __DIR__ . '/../classes/DB.class.php';


session_start();

function login($u, $p, $connection)
{
	$error = '';
	$pass = '';

	if (empty($u) && empty($p)) {
		$error = 'Vui lòng nhập đầy đủ tên tài khoản và mật khẩu';
	} else {
		if ($u == null) {
			$error = 'Bạn Chưa Nhập Tên Tài Khoản!';
		}
		if ($p == null) {
			$error = 'Bạn Chưa Nhập mật khẩu Tài Khoản!';
		}

		if ($u && $p) {
			$query = "SELECT * FROM user WHERE username='$u'";
			$result = $connection->query($query);
			if ($result && $result->num_rows > 0) {
				$data = $result->fetch_assoc();
				$hashed_password = $data['password']; // Lấy mật khẩu đã được mã hóa từ cơ sở dữ liệu
				if (md5($p) == $hashed_password) {
					// So sánh mật khẩu đã mã hóa với mật khẩu đã nhập và mã hóa
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
					$pass = 'Đăng nhập thành công!';
					echo "<div id='errors' style='color: red; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>$pass</div>";
					exit();
				} else {
					$error = 'Mật khẩu không đúng. Vui lòng kiểm tra lại!';
				}
			} else {
				$error = 'Tên truy cập chưa chính xác.Vui lòng nhập lại!';
			}
		}
	}

	// Hiển thị thông báo lỗi nếu có
	if (!empty($error)) {
		echo "<div id='errors' style='color: red; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>$error</div>";
	}
}

if (isset($_POST['ok'])) {
	$connect = new DB();
	$con = $connect->connect();

	$u = isset($_POST['txtuser']) ? $_POST['txtuser'] : '';
	$p = isset($_POST['txtpass']) ? $_POST['txtpass'] : '';

	login($u, $p, $con);


	$con->close();
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>ADMINISTRATION-OU</title>

	<link rel="stylesheet" href="../assets/css/css/style.css">
</head>

<body>
	<div
		style="margin-top:60px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ; color:#f1f1f1;">
		TRƯỜNG ĐẠI HỌC MỞ TP. HỒ CHÍ MINH
	</div>
	<div style="margin-top:20px;text-align: center;font-size: 25px;font-family: Tahoma;color:#f1f1f1; ">
		TÀI KHOẢN QUẢN TRỊ VIÊN
	</div>
	<div class="wrap">
		<div class="avatar">
			<img src="../assets/img/images/admin.png">
		</div>
		<form action="login.php" method="post" novalidate>
			<input type="text" name="txtuser" placeholder="username" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="txtpass" placeholder="password" required>
			<a href="" class="forgot_link">refresh?</a>
			<button><input type="submit" name="ok" value="Đăng Nhập" /></button>
		</form>
	</div>

	<script src="js/index.js"></script>

	<script>
		// Bắt sự kiện khi nhấn Enter trên trường input và gọi hàm xử lý
		document.addEventListener("DOMContentLoaded", function () {
			document.querySelector("input[name='txtuser']").addEventListener("keypress", function (event) {
				if (event.keyCode === 13) { // 13 là mã ASCII của phím Enter
					event.preventDefault();
					document.querySelector("[name='ok']").click(); // Tự động kích hoạt sự kiện click cho nút "Đăng Nhập"
				}
			});

			document.querySelector("input[name='txtpass']").addEventListener("keypress", function (event) {
				if (event.keyCode === 13) {
					event.preventDefault();
					document.querySelector("[name='ok']").click();
				}
			});
		});
	</script>
</body>

</html>