<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ../");
	die("Redirected");
} else if ($_SESSION['roleId'] != 1) {
	header("Location: ../");
	die("Redirected");
}

include '../../templates/header.php';
?>
<div class="w3-card-2 w3-white">
	<div class="w3-container w3-black">
		<h2>Member List</h2>
	</div>
	<table class="w3-table w3-bordered">
		<tr>
			<th>Username</th>
			<th>Name</th>
			<th>Phone</th>
			<th>Address</th>
		</tr>
<?php
$dbh = include '../../modules/dbh.php';
$sql = "SELECT username, name, phone, address FROM user WHERE role_id = :role_id";
$sth = $dbh->prepare($sql);
$sth->execute(array(':role_id' => 2));

$users = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
?>
		<tr>
			<td><?php echo $user['username'] ?></td>
			<td><?php echo $user['name'] ?></td>
			<td><?php echo $user['phone'] ?></td>
			<td><?php echo $user['address'] ?></td>
		</tr>
<?php
}
?>
	</table>
</div>
<?php
include '../../templates/footer.php';
?>