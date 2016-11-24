<?php
session_start();
if (isset($_SESSION['id'])) {
	header("Location: ../");
	die("Redirected");
}

include '../../templates/header.php';
?>
<form action="action_signup.php" method="post" class="w3-card-2 w3-content" style="max-width: 400px;">
	<div class="w3-container w3-black">
		<h2>Creating New Account</h2>
	</div>
<?php
$errorMessage = array(
	'username' => "Username field doesn't meet criteria",
	'usernametaken' => "Username is already used",
	'password' => "Password field doesn't meet criteria",
	'name' => "Name field doesn't meet criteria",
	'phone' => "Phone field doesn't meet criteria",
	'address' => "Address field doesn't meet criteria"
);
if (isset($_GET['error']) && array_key_exists($_GET['error'], $errorMessage)) {
?>
	<div class="w3-container w3-red">
<?php
		echo $errorMessage[$_GET['error']];
?>
	</div>
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
			<input type="text" name="name" pattern="^[ ]*[a-zA-Z]+([ ][a-zA-Z]+)*[ ]*$" id="name-field" class="w3-input" required>
			<label for="name-field" class="w3-label w3-validate">Name</label>
		</p>
		<p>
			<input type="text" name="phone" pattern="^[ ]*[+]?[0-9]{4,}[ ]*$" id="phone-field" class="w3-input" required>
			<label for="phone-field" class="w3-label w3-validate">Phone</label>
		</p>
		<p>
			<textarea name="address" id="address-field" class="w3-input" required></textarea>
			<label for="address-field" class="w3-label w3-validate">Address</label>
		</p>
		<p>
			<input type="submit" value="REGISTER" class="w3-btn">
			<a href="../" class="w3-btn">CANCEL</a>
		</p>
	</div>
</form>
<?php
include '../../templates/footer.php';
?>