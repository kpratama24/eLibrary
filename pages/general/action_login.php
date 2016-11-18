<?php
if (isset($_GET['username']) && preg_match('/^[ ]*[a-zA-Z0-9_-]{4,32}[ ]*$/', $_GET['username'])) {
	$username = trim($_GET['username']);
} else {
	die("Invalid username format");
}
if (isset($_GET['password']) && $_GET['password']) {
	$password = $_GET['password'];
} else {
	die("No password provided");
}
$sdbh = include '../../dbh.php';
$sql = "SELECT COUNT(*) AS count FROM user WHERE username = :username AND password = :password";
$params = array(':username' => $username, ':password' => $password);
$sth = $sdbh->prepare($sql);
$sth->execute($params);
print_r($sth->fetchall(PDO::FETCH_ASSOC))
?>