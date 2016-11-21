<?php
include '../../templates/header.php';
?>
<form action="action_login.php" method="post">
	<input type="text" name="username" placeholder="username">
	<br>
	<input type="password" name="password" placeholder="password">
	<br>
	<input type="submit" value="Login">
</form>
<?php
include '../../templates/footer.php';
?>