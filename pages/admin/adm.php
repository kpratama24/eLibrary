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
<nav class="w3-sidenav w3-light-grey" style="width:20%">
	<a href="#">Link 1</a> 
	<a href="#">Link 2</a> 
	<a href="#">Link 3</a> 
	<a href="#">Link 4</a> 
</nav>
<?php
include '../../templates/footer.php';
?>