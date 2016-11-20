<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php include '../../modules/dependencies.php'; ?>
</head>
<body>
<form action="action_login.php" method="post">
	<input type="text" name="username" placeholder="username">
	<br>
	<input type="password" name="password" placeholder="password">
	<br>
	<input type="submit" value="Login">
</form>
</body>
</html>
