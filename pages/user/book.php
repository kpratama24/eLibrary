<?php
session_start();
if (!isset($_SESSION['roleId'])) {
	header("Location: ../");
	die("Redirected");
} else if ($_SESSION['roleId'] != 2) {
	header("Location: ../");
	die("Redirected");
}

$dbh = include '../../modules/dbh.php';
$sql = "SELECT b.id AS id, b.code AS code, b.name AS name, b.author AS author, b.year AS year, c.category_name AS category_name FROM book AS b JOIN category AS c ON b.category_id = c.id";
$sth = $dbh->prepare($sql);
$sth->execute();

$books = $sth->fetchAll(PDO::FETCH_ASSOC);

include '../../templates/header.php';
?>
<div class="w3-card-2 w3-white">
	<div class="w3-container w3-black">
		<h2>Book List</h2>
	</div>
	<table class="w3-table w3-bordered">
		<tr>
			<th>Code</th>
			<th>Name</th>
			<th>Author</th>
			<th>Year</th>
			<th>Category</th>
		</tr>
<?php
foreach ($books as $book) {
?>
		<tr>
			<td><?php echo $book['code']; ?></td>
			<td><?php echo $book['name']; ?></td>
			<td><?php echo $book['author']; ?></td>
			<td><?php echo $book['year']; ?></td>
			<td><?php echo $book['category_name']; ?></td>
		</tr>
<?php
}
?>
	</table>
</div>
<?php
include '../../templates/footer.php';
?>