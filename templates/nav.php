<?php
if (isset($_SESSION['id'])) {
	if ($_SESSION['roleId'] == 2) {
?>
<nav class="w3-white">
	<div class="container w3-navbar">
		<li><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/user/book.php"; ?>">Book List</a></li>
		<li><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/user/borrow.php"; ?>">Borrowing History</a></li>
		<li><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/general/journals.php"; ?>">Download Journals</a></li>
	</div>
</nav>
<?php
	} else {
?>
<nav class="w3-white">
	<div class="container w3-navbar">
		<li><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/admin/books.php"; ?>">Book List</a></li>
		<li><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/admin/member.php"; ?>">Member List</a></li>
		<li><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/admin/admList.php"; ?>">Administrator List</a></li>
		<li><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/general/journals.php"; ?>">Download Journals</a></li>
	</div>
</nav>
<?php
	}
}
?>