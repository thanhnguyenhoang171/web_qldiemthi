<?php
session_start();
$u = $_SESSION['ses_Magv'];
require '../classes/DB.class.php';
$pgv = $_SESSION['ses_passwordgv'];
?>
<?php
$connect = new DB();
$con = $connect->connect();
$old = $new = $pre = " ";
if (isset ($_POST['gv'])) {
	if ($_POST['txtpassgv'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn chưa nhập Mật Khẩu");
			window.location = "repass1.php";
		</script>
		<?php
		exit();
	} else {
		$old_password_md5 = md5($_POST['txtpassgv']);

		if ($old_password_md5 != $pgv) {
			?>
			<script type="text/javascript">
				alert("Mật Khẩu Cũ không chính xác");
				window.location = "repass1.php";
			</script>
			<?php
			exit();
		} else {
			$old = $_POST['txtpassgv'];
		}
	}
	if ($_POST['txtpassgv2'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn chưa nhập Mật Khẩu Mới");
			window.location = "repass1.php";
		</script>
		<?php
		exit();
	} else {
		if ($_POST['txtpassgv2'] != $_POST['txtpassgv3']) {

			?>
			<script type="text/javascript">
				alert("Mật Khẩu Mới không trùng khớp");
				window.location = "repass1.php";
			</script>
			<?php
			exit();
		} else {
			$mk = "/^[a-zA-Z0-9]{6,}$/";
			if (preg_match($mk, $_POST["txtpassgv2"])) {
				$new = md5($_POST['txtpassgv2']);
			} else {
				?>
				<script type="text/javascript">
					alert("Mật Khẩu nhập vào không hợp lệ!.");
					window.location = "repass1.php";
				</script>
				<?php
				exit();
			}
		}
	}
	if ($u && $pgv && $old && $new && $pre) {
		$query = "UPDATE giaovien SET passwordgv='$new' WHERE Magv=$u";
		$results = mysqli_query($con, $query);
		if ($results) {
			?>
			<script type="text/javascript">
				alert("Đã thay đổi mật khẩu thành công!");
				window.location = "qlgv.php";
			</script>
			<?php
			exit();
		} else {
			?>
			<script type="text/javascript">
				alert("Có lỗi xảy ra khi cập nhật mật khẩu.");
			</script>
			<?php
			exit();
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
			<img src="../assets/img/images/teacher.png">
		</div>
		<form action="repass1.php" method="post" novalidate>
			<input type="password" name="txtpassgv" placeholder="old password" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="txtpassgv2" placeholder="new password" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="txtpassgv3" placeholder="re-enter new password" required>
			<a href="" class="forgot_link">refresh?</a>
			<button><input type="submit" name="gv" value="Thay đổi" /></button>
		</form>
	</div>

	<form action="qlgv.php" method="post">
		<div style="text-align:center; margin-top: 20%;">
			<input type="submit" name="back" value="Trở Về" style="width:100px;height: 25px" />
		</div>
	</form>

	<script src="js/index.js"></script>

</body>

</html>