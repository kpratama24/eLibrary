<?php
session_start();
if (isset($_SESSION['roleId'])) {
	header("Location: ../");
	die("Redirected");
}

include '../../templates/header.php';
?>
<form action="action_login.php" method="post" class="w3-card-2 w3-content" style="max-width: 400px;">
	<div class="w3-container w3-black">
		<h2>Login</h2>
	</div>
<?php
$errorMessage = array(
	'username' => "Username field doesn't meet criteria",
	'password' => "Password field doesn't meet criteria",
	'invalid' => "Invalid username or password"
);
if (isset($_GET['error']) && array_key_exists($_GET['error'], $errorMessage)) {
?>
	<div class="w3-container w3-red">
<?php
		echo $errorMessage[$_GET['error']];
?>
	</div>
<?php
} else if (isset($_GET['signupsuccess'])) {
?>
	<div class="w3-container w3-green">Account created</div>
<?php
}
?>
	<div class="w3-container w3-white">
		<p>
			<input type="text" name="username" pattern="^[ ]*[a-zA-Z0-9_]{4,32}[ ]*$" id="username-field" class="w3-input" required>
			<label for="username-field" class="w3-label w3-validate">Username</label>
		</p>
		<p>
			<input type="password" name="password" id="password-field" class="w3-input" required>
			<label for="password-field" class="w3-label w3-validate">Password</label>
		</p>
		<p>
			<input type="submit" value="LOGIN" class="w3-btn">
			<a href="../" class="w3-btn">CANCEL</a>
		</p>
	</div>
</form>
<?php
include '../../templates/footer.php';
?>