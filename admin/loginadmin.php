<?php
session_start();
error_reporting(0);
include("includes/config.php");

if (isset($_POST['submit'])) {
    $email = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM admin_tbl 
              JOIN adminpass ON admin_tbl.admin_id = adminpass.id
              WHERE admin_tbl.email = ? AND adminpass.password = ?";

    $stmt = mysqli_prepare($bd, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $num = mysqli_fetch_array($result);

    if ($num > 0) {
        $_SESSION['login'] = $email;
        $_SESSION['id'] = $num['admin_id'];
        $status = 1;
        $log = mysqli_query($bd, "INSERT INTO login_tbl(`admin_id`,`email`,`account_type`) 
                                   VALUES('" . $_SESSION['id'] . "','" . $_SESSION['login'] . "','$status')");
        $extra = "dashboard.php";
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $_SESSION['login'] = $email;
        $status = 0;
        mysqli_query($bd, "INSERT INTO login(email,status) 
                           VALUES('" . $_SESSION['login'] . "','$status')");
        $errormsg = "Invalid username or password";
        $extra = "dashboard.php";
        header("location:$extra");
        exit();
    }
}

if (isset($_POST['change'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM admin_tbl WHERE email = ?";
    $stmt = mysqli_prepare($bd, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $num = mysqli_fetch_array($result);

    if ($num > 0) {
        mysqli_query($bd, "UPDATE adminpass 
                           SET password = '$password' 
                           WHERE id = '" . $num['admin_id'] . "'");
        $msg = "Password Changed Successfully";
    } else {
        $errormsg = "Invalid Email ID";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Dashboard">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

	<title>LOGIN | Grievance System</title>


	<!-- Bootstrap core CSS -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<!--external css-->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

	<!-- Custom styles for this template -->
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/style-responsive.css" rel="stylesheet">
	<script type="text/javascript">
		function valid() {
			if (document.forgot.password.value != document.forgot.confirmpassword.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.forgot.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>
</head>

<body>

	<!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	<div id="login-page">
		<div class="container">
			<form class="form-login" name="login" method="post">
				<h2 class="form-login-heading">ADMIN LOGIN</h2>
				<p style="padding-left:4%; padding-top:2%;  color:red">
					<?php if ($errormsg) {
						echo htmlentities($errormsg);
					} ?></p>

				<p style="padding-left:4%; padding-top:2%;  color:green">
					<?php if ($msg) {
						echo htmlentities($msg);
					} ?></p>
				<div class="login-wrap">
					<input type="text" class="form-control" name="username" placeholder="Email" required autofocus>
					<br>
					<input type="password" class="form-control" name="password" required placeholder="Password">
					<label class="checkbox">
						<span class="pull-right">
							<a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>

						</span>
					</label>
					<button class="btn btn-danger btn-block" name="submit" type="submit"><i class="fa fa-lock"></i> LOGIN</button>
					<hr>
			</form>


		</div>

		<!-- Modal -->
		<form class="form-login" name="forgot" method="post">
			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Forgot Password ?</h4>
						</div>
						<div class="modal-body">
							<p>Enter your details below to reset your password.</p>
							<input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control" required><br>
							<input type="text" name="contact" placeholder="Contact No" autocomplete="off" class="form-control" required><br>
							<input type="password" class="form-control" placeholder="New Password" id="password" name="password" required><br />
							<input type="password" class="form-control unicase-form-control text-input" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" required>
						</div>
						<div class="modal-footer">
							<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
							<button class="btn btn-theme" type="submit" name="change" onclick="return valid();">Submit</button>
						</div>
					</div>
				</div>
			</div>
			<!-- modal -->
		</form>



	</div>
	</div>

	<!-- js placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!--BACKSTRETCH-->
	<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
	<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
	<script>
		$.backstretch("assets/img/admin1.jpg", {
			speed: 500
		});
	</script>


</body>

</html>