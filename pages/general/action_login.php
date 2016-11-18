<?php
if (isset($_POST['username']) && preg_match('/^[a-zA-Z0-9_]{6,32}$/', $_POST['username'])) {
	$username = strtolower($_POST['username']);
} else {
	die("Invalid username");
}
if (isset($_POST['password']) && $_POST['password']) {
	$password = $_POST['password'];
} else {
	die("No password provided");
}

$dbh = include '../../dbh.php';
$sql = "SELECT username, password FROM user WHERE username = :username";
$params = array(':username' => $username);
$sth = $dbh->prepare($sql);
$sth->execute($params);

if ($sth->rowCount() == 1) {
	if (password_verify($password, $sth->fetch(PDO::FETCH_ASSOC)['password'])) {
		echo "Valid password";
	} else {
		die("Invalid username or password");
	}
} else {
	die("Invalid username or password");
}
?>