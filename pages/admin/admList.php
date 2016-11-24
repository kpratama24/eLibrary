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

$searchCriteria = array(
	'username' => "AND username LIKE :query",
	'name' => "AND name LIKE :query",
	'phone' => "AND phone LIKE :query",
	'address' => "AND address LIKE :query"
);

$dbh = include '../../modules/dbh.php';
$sql = "SELECT username, name, phone, address FROM user WHERE role_id = :role_id";
if (isset($_GET['option']) && array_key_exists($_GET['option'], $searchCriteria)) {
	$sql = $sql . " " . $searchCriteria[$_GET['option']];
	$sth = $dbh->prepare($sql);
	$sth->execute(array(':role_id' => 1, ':query' => "%" . $_GET['query'] . "%"));
} else {
	$sth = $dbh->prepare($sql);
	$sth->execute(array(':role_id' => 1));
}

$users = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="w3-card-2 w3-white">
	<div class="w3-container w3-black">
		<h2>Member List</h2>
	</div>
	<form class="w3-row-padding" action="admList.php" method="get">
		<div class="w3-col s4 m3 l2 w3-section w3-row-padding">
			<div class="w3-col" style="width: 50px;">
				<label for="option-field"><i class="w3-xxlarge fa fa-filter"></i></label>
			</div>
			<div class="w3-rest">
				<select class="w3-select w3-border w3-light-grey" name="option" id="option-field">
					<option value="username" <?php echo (isset($_GET['option']) && $_GET['option'] == 'username') ? 'selected' : ''; ?>>Username</option>
					<option value="name" <?php echo (isset($_GET['option']) && $_GET['option'] == 'name') ? 'selected' : ''; ?>>Name</option>
					<option value="phone" <?php echo (isset($_GET['option']) && $_GET['option'] == 'phone') ? 'selected' : ''; ?>>Phone</option>
					<option value="address" <?php echo (isset($_GET['option']) && $_GET['option'] == 'address') ? 'selected' : ''; ?>>Address</option>
				</select>
			</div>
		</div>
		<div class="w3-col s5 m7 l8 w3-section">
			<input type="text" name="query" placeholder="Search Term" class="w3-input w3-light-grey" value=<?php echo isset($_GET['query']) ? $_GET['query'] : ''; ?>>
		</div>
		<div class="w3-col s3 m2 l2 w3-section">
			<input type="submit" value="Search" class="w3-btn-block">
		</div>
	</form>
	<table class="w3-table w3-bordered">
		<tr>
			<th>Username</th>
			<th>Name</th>
			<th>Phone</th>
			<th>Address</th>
		</tr>
<?php
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