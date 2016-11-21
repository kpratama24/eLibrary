<?php
session_start();
if (!isset($_SESSION['roleId'])) {
	header("Location: ../");
	die("Redirected");
} else if ($_SESSION['roleId'] != 2) {
	header("Location: ../");
	die("Redirected");
}

include '../../templates/header.php';
?>
<ul class="w3-navbar w3-light-grey">
	<li class="w3-right"><a href="../general/logout.php"><i class="fa fa-sign-out"></i></a></li>
	<li class="w3-right"><a href="../general/profile.php"><i class="fa fa-user"></i></a></li>
	<li class="w3-right"><a href="#"><i class="fa fa-envelope"></i></a></li>
	<li class="w3-right"><a href="../general/news.php"><i class="fa fa-newspaper-o"></i></a></li>
	<li class="w3-right"><a href="../"><i class="fa fa-home"></i></a></li>
</ul>
<nav class="w3-sidenav w3-white w3-center" style="width:20%">
	<a href="#">Link 1</a> 
	<a href="#">Link 2</a> 
	<a href="#">Link 3</a> 
	<a href="#">Link 4</a> 
</nav>
<?php
include '../../templates/footer.php';
?>