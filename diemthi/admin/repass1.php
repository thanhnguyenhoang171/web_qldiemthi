
<?php
session_start();
$u=$_SESSION['ses_Magv'];
$pgv=$_SESSION['ses_passwordgv'];
require ("../classes/DB.class.php");
$connect=new db();
?>
<?php
$old=$new=$pre=" ";
if(isset($_POST['gv'])){
	if($_POST['txtpassgv'] == null){
		echo "Bạn chưa nhập mật khẩu!.";
	}else{
		if(md5($_POST['txtpassgv']) != $pgv){
			echo "Mật khẩu và mật khẩu cũ không trùng!.";
		}else{
			$old=$_POST['txtpassgv'];
		}
	}
	if($_POST['txtpassgv2'] == null){
		echo "Bạn chưa nhập mật khẩu mới!.";
	}else {
		if ($_POST['txtpassgv2'] != $_POST['txtpassgv3']) {
			echo "Nhập lại mật khẩu mới không trùng nhau!";
		} else {
			if ($_POST['txtpassgv2'] != $_POST['txtpassgv3']) {
				echo "Nhập lại mật khẩu mới không trùng nhau!";
			} else {
				$mk = "/^[a-zA-Z0-9]{6,}$/";
				if (preg_match($mk, $_POST["txtpassgv2"])) {
					$new = md5($_POST['txtpassgv2']);
				} else {
					?>
					<script type="text/javascript">
						alert("Password Nhap Vao Khong Hop Le.!");
						window.location = "repass1.php";
					</script>
					<?php
					exit();
				}
			}
		}
	}
	if($u && $pgv && $old && $new && $pre){

		$conn=$connect->connect();
		$query="update giaovien SET passwordgv='$new' where Magv=$u";
		$results = mysqli_query($conn,$query);
		?>
		<script type="text/javascript">
		alert("Đã thay đổi mật khẩu thành công!");
		window.location="qlgv.php";
		</script>
		<?php
		exit();

	}
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Thay Đổi Mât Khẩu</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="../assets/css/css/style.css">

  
</head>

<body>
  <div class="wrap">
		<div class="avatar">
      <img src="../assets/img/images/gv.jpg">
		</div>
		<form action="repass1.php" method="post">
		<input type="password" name="txtpassgv" placeholder="mật khẩu" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpassgv2" placeholder="mật khẩu mới" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpassgv3" placeholder="nhập lại mật khẩu mới" required>
		<a href="" class="forgot_link">forgot ?</a>
		<button><input type="submit" name="gv" value="Thay đổi" /></button>
	</form>
	</div>
  
    <script src="js/index.js"></script>

</body>
</html>