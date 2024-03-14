<?php
session_start();
require '../classes/DB.class.php';
$connect = new DB();
$con = $connect->connect();
$ugv = $pgv = "";
if (isset($_POST['gv'])) {

	if (empty($_POST['txtusergv']) && empty($_POST['txtpassgv'])) {
		?>
		<script type="text/javascript">
			alert("Vui lòng nhập đầy đủ tên tài khoản và mật khẩu!");
			window.location = "logingv.php";
		</script>
		<?php
		exit();
	} else {
		$u = $_POST['txtusergv'];
		$p = $_POST['txtpassgv'];
	}

	// 
	if ($_POST['txtusergv'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập Tên Tài Khoản.");
			window.location = "logingv.php";
		</script>
		<?php
		exit();
	} else {
		$ugv = $_POST['txtusergv'];
	}
	if ($_POST['txtpassgv'] == null) {
		?>
		<script type="text/javascript">
			alert("Bạn Chưa Nhập mật khẩu Tài Khoản.");
			window.location = "logingv.php";
		</script>
		<?php
		exit();
	} else {
		$pgv = $_POST['txtpassgv'];
	}
	if ($ugv && $pgv) {
		$query = "select * from giaovien where Magv='$ugv' and passwordgv='$pgv'";
		$results = mysqli_query($con, $query);

		if ($rowscount = mysqli_num_rows($results) == 0) {
			?>
			<script type="text/javascript">
				alert("Tên tài khoản hoặc mật khẩu chưa chính xác.Vui lòng nhập lại!!");
				window.location = "logingv.php";
			</script>
			<?php
			exit();
		} else {

			$data = mysqli_fetch_assoc($results);
			$_SESSION['ses_Magv'] = $data['Magv'];
			$_SESSION['ses_passwordgv'] = $data['passwordgv'];
			?>
			<script type="text/javascript">
				alert("Đăng nhập thành công!");
				window.location = "qlgv.php";
			</script>
			<?php
			//header("location:qlgv.php");
			exit();
		}

	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>TRANG ĐĂNG NHẬP GIẢNG VIÊN</title>


	<link rel="stylesheet" href="../assets/css/css/style.css">


</head>

<body>
	<div
		style="margin-top:60px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma;color:#f1f1f1 ">
		TRƯỜNG ĐẠI HỌC MỞ THÀNH PHỐ HỒ CHÍ MINH</div>
	<div style="margin-top:20px;text-align: center; font-size: 25px;font-family: Tahoma;color:#f1f1f1;  ">TÀI KHOẢN
		GIẢNG VIÊN</div>
	<div class="wrap" style="margin-top: 40px">
		<div class="avatar">
			<img src="../assets/img/images/gv.jpg">
		</div>
		<form action="logingv.php" method="post" novalidate>
			<input type="text" name="txtusergv" placeholder="username" required>
			<div class="bar">
				<i></i>
			</div>
			<input type="password" name="txtpassgv" placeholder="password" required>
			<a href="" class="forgot_link">refresh?</a>
			<button><input type="submit" name="gv" value="Đăng Nhập" /></button>
		</form>
	</div>

	<script src="js/index.js"></script>

</body>

</html>