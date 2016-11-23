<?php
if (isset($_SESSION['roleId'])) {
?>
<nav class="w3-white">
	<div class="container w3-navbar">
		<li><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/user/book.php"; ?>">Book List</a></li>
		<li><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/user/borrow.php"; ?>">Borrowing History</a></li>
		<li><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/general/journals.php"; ?>">Download Journals</a></li>
	</div>
</nav>
<?php
}
?>