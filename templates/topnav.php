<?php
if (isset($_SESSION['roleId'])) {
?>
<div class="w3-brown">
	<ul class="container w3-navbar">
		<li><a href=<?php echo "'" . "http://" . $_SERVER['SERVER_NAME'] . "/elibrary/pages/general/profile.php" . "'"; ?>>Welcome <b><?php echo $_SESSION['name']; ?></b>, you are logged in as <b><?php echo $_SESSION['roleName']; ?></b></a></li>
		<li class="w3-right"><a href=<?php echo "'" . "http://" . $_SERVER['SERVER_NAME'] . "/elibrary/pages/general/logout.php" . "'"; ?>><i class="fa fa-sign-out"></i></a></li>
		<li class="w3-right"><a href=<?php echo "'" . "http://" . $_SERVER['SERVER_NAME'] . "/elibrary/pages/general/profile.php" . "'"; ?>><i class="fa fa-user"></i></a></li>
		<li class="w3-right"><a href="#"><i class="fa fa-envelope"></i></a></li>
		<li class="w3-right"><a href=<?php echo "'" . "http://" . $_SERVER['SERVER_NAME'] . "/elibrary/pages/general/news.php" . "'"; ?>><i class="fa fa-newspaper-o"></i></a></li>
		<li class="w3-right"><a href=<?php echo "'" . "http://" . $_SERVER['SERVER_NAME'] . "/elibrary/pages/" . "'"; ?>><i class="fa fa-home"></i></a></li>
	</ul>
</div>
<?php
}
?>