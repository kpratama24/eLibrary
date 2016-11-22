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
$sql = "SELECT b.id AS id, b.code AS code, b.name AS name, b.author AS author, l.loan_date AS loan_date,l.return_date AS return_date, l.max_day AS max_day FROM book AS b JOIN loan AS l ON b.id = l.book_id WHERE l.user_id = :user_id";
$sth = $dbh->prepare($sql);
$sth->execute(array(':user_id' => $_SESSION['id']));

$loans = $sth->fetchAll(PDO::FETCH_ASSOC);

include '../../templates/header.php';
?>
<div class="w3-card-2 w3-white">
	<div class="w3-container w3-black">
		<h2>Borrowing History</h2>
	</div>
	<table class="w3-table w3-bordered">
		<tr>
			<th>Book Code</th>
			<th>Book Title</th>
			<th>Author</th>
			<th>Borrow Date</th>
			<th>Return Date</th>
			<th>Overdue</th>
			<th>Fine</th>
		</tr>
<?php
foreach ($loans as $loan) {
?>
		<tr>
			<td><?php echo $loan['code']; ?></td>
			<td><?php echo $loan['name']; ?></td>
			<td><?php echo $loan['author']; ?></td>
			<td><?php echo $loan['loan_date']; ?></td>
			<td><?php echo $loan['return_date']; ?></td>
			<td></td>
			<td></td>
		</tr>
<?php
}
?>
	</table>
</div>
<?php
include '../../templates/footer.php';
?>