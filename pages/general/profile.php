<?php
session_start();
if (!isset($_SESSION['roleId'])) {
	header("Location: ../");
	die("Redirected");
}

include '../../templates/header.php';
?>

<?php
include '../../templates/footer.php';
?>