<?php
if (isset($_POST['username']) && preg_match('/^[ ]*[a-zA-Z0-9_]{6,32}[ ]*$/', $_POST['username'])) {
	$username = strtolower(trim($_POST['username']));
} else {
	die("Username field doesn't meet criteria");
}
if (isset($_POST['password']) && $_POST['password']) {
	$password = $_POST['password'];
} else {
	die("Password field doesn't meet criteria");
}

$dbh = include '../../dbh.php';
$sql = "SELECT password FROM user WHERE username = :username";
$params = array(':username' => $username);
$sth = $dbh->prepare($sql);
$sth->execute($params);

if ($sth->rowCount()) {
	if (password_verify($password, $sth->fetch(PDO::FETCH_ASSOC)['password'])) {
		echo "Valid password";
	} else {
		die("Invalid username or password");
	}
} else {
	die("Invalid username or password");
}
?>