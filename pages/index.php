<?php
session_start();
if (isset($_SESSION['id'])) {
	if ($_SESSION['roleId'] == 1) {
		header("Location: admin/adm.php");
	} else if ($_SESSION['roleId'] == 2) {
		header("Location: user/usr.php");
	}
	die("Redirected");
}

include '../templates/header.php';
?>
<div class="w3-section w3-center">
	<a href="general/signup.php" class="w3-btn w3-brown">SIGN UP</a>
	<a href="general/login.php" class="w3-btn w3-brown">LOG IN</a>
</div>
<?php
include '../templates/footer.php';
?>