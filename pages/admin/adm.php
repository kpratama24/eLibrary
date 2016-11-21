<?php
session_start();
if (!isset($_SESSION['roleId'])) {
	header("Location: ../");
	die("Redirected");
} else if ($_SESSION['roleId'] != 1) {
	header("Location: ../");
	die("Redirected");
}

include '../../templates/header.php';
?>
<?php
include '../../templates/footer.php';
?>