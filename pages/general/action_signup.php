<?php
if (isset($_POST['username']) && preg_match('/^[ ]*[a-zA-Z0-9_]{4,32}[ ]*$/', $_POST['username'])) {
	$username = strtolower(trim($_POST['username']));
} else {
	header("Location: signup.php?error=username");
	die("Username field doesn't meet criteria");
}

$dbh = include '../../dbh.php';
$sql = "SELECT id FROM user WHERE username = :username";
$params = array(':username' => $username);
$sth = $dbh->prepare($sql);
$sth->execute($params);

if($sth->rowCount()) {
	header("Location: signup.php?error=usernametaken");
	die("Username is already used");
}
if (isset($_POST['password']) && $_POST['password']) {
	$password = $_POST['password'];
} else {
	header("Location: signup.php?error=password");
	die("Password field doesn't meet criteria");
}
if (isset($_POST['name']) && preg_match('/^[ ]*[a-zA-Z]+([ ][a-zA-Z]+)*[ ]*$/', $_POST['name'])) {
	$name = trim($_POST['name']);
} else {
	header("Location: signup.php?error=name");
	die("Name field doesn't meet criteria");
}
if (isset($_POST['phone']) && preg_match('/^[ ]*[+]?[0-9]{4,}[ ]*$/', $_POST['phone'])) {
	$phone = trim($_POST['phone']);
} else {
	header("Location: signup.php?error=phone");
	die("Phone field doesn't meet criteria");
}
if (isset($_POST['address']) && $_POST['address']) {
	$address = trim($_POST['address']);
} else {
	header("Location: signup.php?error=address");
	die("Address field doesn't meet criteria");
}

$cost = 10;
$password = password_hash($password, PASSWORD_BCRYPT, ['cost' => $cost]);

$roleId = 2;

$sql = "INSERT INTO user(username, password, name, phone, address, role_id) VALUES (:username, :password, :name, :phone, :address, :roleId)";
$params = array(':username' => $username, ':password' => $password, ':name' => $name, ':phone' => $phone, ':address' => $address, ':roleId' => $roleId);
$sth = $dbh->prepare($sql);
$result = $sth->execute($params);

header("Location: login.php?sigupsuccess=true");
die("Signup success");
?>