<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ../");
	die("Redirected");
} else if ($_SESSION['roleId'] != 1) {
	header("Location: ../");
	die("Redirected");
}

include '../../templates/header.php';
?>
<div class="w3-card-2 w3-white">
	<div class="w3-container w3-black">
		<h2>Welcome to eLibrary</h2>
	</div>
	<div class="w3-container">	
		<h3>About Us</h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
</div>
<?php
include '../../templates/footer.php';
?>