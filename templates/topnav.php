<?php
if (isset($_SESSION['id'])) {

	if ($_SESSION['roleId'] == 2) {
		$roleName = 'Librarian';
	} else if ($_SESSION['roleId'] == 1) {
		$roleName = 'Administrator';
	} else {
		$roleName = 'Alien';
	}

	$dbh = include '../../modules/dbh.php';
	$sql = "SELECT name FROM user WHERE id = :id";
	$params = array(':id' => $_SESSION['id']);
	$sth = $dbh->prepare($sql);
	$sth->execute($params);

	$row = $sth->fetch(PDO::FETCH_ASSOC);
?>
<div class="w3-brown">
	<ul class="container w3-navbar">
		<li><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/general/profile.php"; ?>">Welcome <b><?php echo $row['name']; ?></b>, you are logged in as <b><?php echo $roleName; ?></b></a></li>
		<li class="w3-right"><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/general/logout.php"; ?>"><i class="fa fa-sign-out"></i></a></li>
		<li class="w3-right"><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/general/profile.php"; ?>"><i class="fa fa-user"></i></a></li>
		<li class="w3-right"><a href="#"><i class="fa fa-envelope"></i></a></li>
		<li class="w3-right"><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/general/news.php"; ?>"><i class="fa fa-newspaper-o"></i></a></li>
		<li class="w3-right"><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/"; ?>"><i class="fa fa-home"></i></a></li>
	</ul>
</div>
<?php
}
?>