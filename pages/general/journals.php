<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ../");
	die("Redirected");
}

include '../../templates/header.php';
?>

<?php
include '../../templates/footer.php';
?>