<?php
if (isset($_POST['username']) && $_POST['username']) {
	$username = $_POST['username'];
} else {
	header("Location: admList.php?addadmfailed");
	die("Username is unspecified");
}

$dbh = include '../../modules/dbh.php';
$sql = "SELECT id FROM user WHERE username = :username";
$params = array(':username' => $username);
$sth = $dbh->prepare($sql);
$sth->execute($params);

if($sth->rowCount()) {
	header("Location: admList.php?usernametaken");
	die("Username is already used");
}

if (isset($_POST['name']) && $_POST['name']) {
	$name = $_POST['name'];
} else {
	header("Location: admList.php?addadmfailed");
	die("Name is unspecified");
}
if (isset($_POST['phone']) && $_POST['phone']) {
	$phone = $_POST['phone'];
} else {
	header("Location: admList.php?addadmfailed");
	die("Phone is unspecified");
}
if (isset($_POST['address']) && $_POST['address']) {
	$address = $_POST['address'];
} else {
	header("Location: admList.php?addadmfailed");
	die("Address is unspecified");
}

function generateCode($length = 8) {
	$characters = '1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength -1)];
	}
	return $randomString;
}

$plainPassword = generateCode();
$password = password_hash($plainPassword, PASSWORD_BCRYPT, ['cost' => 10]);

$dbh = include '../../modules/dbh.php';
$sql = "INSERT INTO user (username, password, name, phone, address, role_id) VALUES (:username, :password, :name, :phone, :address, :role_id)";
$params = array(
	':username' => $username,
	':password' => $password,
	':name' => $name,
	':phone' => $phone,
	':address' => $address,
	':role_id' => 1
);
$sth = $dbh->prepare($sql);
$sth->execute($params);

header("Location: admList.php?addadmsuccess&username=$username&password=$plainPassword");
?>