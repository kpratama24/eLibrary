<?php
$request_uri = basename($_SERVER["REQUEST_URI"], ".php") ;
if (isset($_SESSION['id'])) {
	if ($_SESSION['roleId'] == 2) {
?>
<nav class="w3-white">
	<div class="container w3-navbar">
		<li><a <?php if ($request_uri=="book") {echo "class=\"w3-brown\" ";}?> href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/user/book.php"; ?>">Book List</a></li>
		<li><a <?php if ($request_uri=="borrow") {echo "class=\"w3-brown\" ";}?> href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/user/borrow.php"; ?>">Borrowing History</a></li>
		<li><a <?php if ($request_uri=="journals") {echo "class=\"w3-brown\" ";}?> href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/general/journals.php"; ?>">Download Journals</a></li>
	</div>
</nav>
<?php
	} else {
?>
<nav class="w3-white">
	<div class="container w3-navbar">
		<li><a <?php if ($request_uri=="books") {echo "class=\"w3-brown\" ";}?> href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/admin/books.php"; ?>">Book List</a></li>
		<li><a <?php if ($request_uri=="member") {echo "class=\"w3-brown\" ";}?> href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/admin/member.php"; ?>">Member List</a></li>
		<li><a <?php if ($request_uri=="admList") {echo "class=\"w3-brown\" ";}?> href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/admin/admList.php"; ?>">Administrator List</a></li>
		<li><a <?php if ($request_uri=="journals") {echo "class=\"w3-brown\" ";}?> href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/pages/general/journals.php"; ?>">Download Journals</a></li>
	</div>
</nav>
<?php
	}
}
?>
