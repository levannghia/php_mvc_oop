<?php
include("../classes/adminLogin.php");
$adminLogin = new AdminLogin();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
	$user_name = $_POST['username'];
	$password = md5($_POST['password']);

	$login_check = $adminLogin->loginAdmin($user_name, $password);
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span>
				<?php
				if(isset($login_check)){
					echo $login_check;
				}
				?>
			</span>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" name="login" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>