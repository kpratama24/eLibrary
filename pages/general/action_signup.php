<?php
if (isset($_POST['username']) && preg_match('/^[ ]*[a-zA-Z0-9_]{6,32}[ ]*$/', $_POST['username'])) {
	$username = strtolower(trim($_POST['username']));
} else {
	die("Username field doesn't meet criteria");
}

$dbh = include '../../dbh.php';
$sql = "SELECT id FROM user WHERE username = :username";
$params = array(':username' => $username);
$sth = $dbh->prepare($sql);
$sth->execute($params);

if($sth->rowCount()) {
	die("Username is already used");
}
if (isset($_POST['password']) && $_POST['password']) {
	$password = $_POST['password'];
} else {
	die("Password field doesn't meet criteria");
}
if (isset($_POST['name']) && preg_match('/^[ ]*[a-zA-Z]+([ ][a-zA-Z]+)*[ ]*$/', $_POST['name'])) {
	$name = trim($_POST['name']);
} else {
	die("Name field doesn't meet criteria");
}
if (isset($_POST['phone']) && preg_match('/^[ ]*[+]?[0-9]{4,}[ ]*$/', $_POST['phone'])) {
	$phone = trim($_POST['phone']);
} else {
	die("Phone field doesn't meet criteria");
}
if (isset($_POST['address']) && $_POST['address']) {
	$address = trim($_POST['address']);
} else {
	die("Address field doesn't meet criteria");
}

$cost = 10;
$password = password_hash($password, PASSWORD_BCRYPT, ['cost' => $cost]);

$roleId = 2;

$sql = "INSERT INTO user(username, password, name, phone, address, role_id) VALUES (:username, :password, :name, :phone, :address, :roleId)";
$params = array(':username' => $username, ':password' => $password, ':name' => $name, ':phone' => $phone, ':address' => $address, ':roleId' => $roleId);
$sth = $dbh->prepare($sql);
$result = $sth->execute($params);
?>