<?php
if (isset($_POST['username']) && preg_match('/^[ ]*[a-zA-Z0-9_]{4,32}[ ]*$/', $_POST['username'])) {
	$username = strtolower(trim($_POST['username']));
} else {
	header("Location: login.php?error=username");
	die("Username field doesn't meet criteria");
}
if (isset($_POST['password']) && $_POST['password']) {
	$password = $_POST['password'];
} else {
	header("Location: login.php?error=password");
	die("Password field doesn't meet criteria");
}

$dbh = include '../../modules/dbh.php';
$sql = "SELECT id, password, role_id FROM user WHERE username = :username";
$params = array(':username' => $username);
$sth = $dbh->prepare($sql);
$sth->execute($params);

if ($sth->rowCount()) {
	$row = $sth->fetch(PDO::FETCH_ASSOC);
	if (password_verify($password, $row['password'])) {

		session_start();
		$_SESSION['id'] = $row['id'];
		$_SESSION['roleId'] = $row['role_id'];

		header("Location: ../../index.php");
		die("Login success");
	} else {
		header("Location: login.php?error=invalid");
		die("Invalid username or password");
	}
} else {
	header("Location: login.php?error=invalid");
	die("Invalid username or password");
}
?>
