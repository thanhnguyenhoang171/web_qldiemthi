<?php
require '../classes/DB.class.php';
session_start();
$u = $_SESSION['ses_MaHS'];
$phs = $_SESSION['ses_passwordhs'];
?>
<?php
$connect = new DB();
$con = $connect->connect();
$old = $new = $pre = " ";
if (isset ($_POST['hs'])) {
	if ($_POST['txtpasshs'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn chưa nhập Mật Khẩu");
			window.location = "repass2.php";
		</script>
		<?php
		exit();
	} else {
		$old_password_md5 = md5($_POST['txtpasshs']);

		if ($old_password_md5 != $phs) {
			?>
			<script type="text/javascript">
				alert("Mật Khẩu Cũ không chính xác");
				window.location = "repass2.php";
			</script>
			<?php
			exit();
		} else {
			$old = $_POST['txtpasshs'];
		}
	}
	if ($_POST['txtpasshs2'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn chưa nhập Mật Khẩu Mới");
			window.location = "repass2.php";
		</script>
		<?php
		exit();
	} else {
		if ($_POST['txtpasshs2'] != $_POST['txtpasshs3']) {
			?>
			<script type="text/javascript">
				alert("Mật Khẩu Mới không trùng khớp");
				window.location = "repass2.php";
			</script>
			<?php
			exit();
		} else {
			$mk = "/^[a-zA-Z0-9]{6,}$/";
			if (preg_match($mk, $_POST["txtpasshs2"])) {
				$new = md5($_POST['txtpasshs2']);
			} else {
				?>
				<script type="text/javascript">
					alert("Mật Khẩu nhập vào không hợp lệ!.");
					window.location = "repass2.php";
				</script>
				<?php
				exit();
			}
		}
	}
	if ($u && $phs && $old && $new && $pre) {
		$query = "UPDATE hocsinh SET passwordhs='$new' WHERE MaHS=$u";
		$results = mysqli_query($con, $query);
		if ($results) {
			?>
			<script type="text/javascript">
				alert("Đã thay đổi mật khẩu thành công!");
				window.location = "qlhs.php";
			</script>
			<?php
			exit();
		} else {
			echo "Có lỗi xảy ra khi cập nhật mật khẩu.";
		}


	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Thay Đổi Mât Khẩu</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">


	<link rel="stylesheet" href="../assets/css/css/style.css">


</head>

<body>
	<div class="wrap">
		<div class="avatar">
			<img src="../assets/img/images/hs.png">
		</div>
		<form action="repass2.php" method="post">
			<input type="password" name="txtpasshs" placeholder="old password" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="txtpasshs2" placeholder="new password" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="txtpasshs3" placeholder="re-enter new password" required>
			<a href="" class="forgot_link">forgot ?</a>
			<button><input type="submit" name="hs" value="Thay đổi" /></button>
		</form>
	</div>

	<script src="js/index.js"></script>

</body>

</html>