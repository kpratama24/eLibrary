<?php
function generateString($length) {
	$characters = 'qwertyuiopasdfghjklzxcvbnm';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[mt_rand(0, $charactersLength -1)];
	}
	return $randomString;
}

function generateStringCaps($length) {
	$characters = 'qwertyuiopasdfghjklzxcvbnm QWERTYUIOPASDFGHJKLZXCVBNM';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[mt_rand(0, $charactersLength -1)];
	}
	return $randomString;
}

function generateNumber($length) {
	$characters = '0123456789';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[mt_rand(0, $charactersLength -1)];
	}
	return $randomString;
}

function generateStringCapsNumber($length) {
	$characters = 'qwertyuiopasdfghjklzxcvbnm QWERTYUIOPASDFGHJKLZXCVBNM 0123456789';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[mt_rand(0, $charactersLength -1)];
	}
	return $randomString;
}

$dbh = include 'modules/dbh.php';
$sql = "INSERT INTO user(username, password, name, phone, address, role_id) VALUES (:username, :password, :name, :phone, :address, :roleId)";

$username = 'prayogo';
$password = password_hash($username, PASSWORD_BCRYPT, ['cost' => 10]);
$name = 'Prayogo Cendra';
$phone = '0123456789';
$address = 'Bandung';
$roleId = 1;
$params = array(
	':username' => $username,
	':password' => $password,
	':name' => $name,
	':phone' => $phone,
	':address' => $address,
	':roleId' => $roleId,
);
$dbh->prepare($sql)->execute($params);

$username = 'kevin';
$password = password_hash($username, PASSWORD_BCRYPT, ['cost' => 10]);
$name = 'Kevin Pratama';
$phone = '00000000';
$address = 'Bandung Coret';
$roleId = 2;
$params = array(
	':username' => $username,
	':password' => $password,
	':name' => $name,
	':phone' => $phone,
	':address' => $address,
	':roleId' => $roleId,
);
$dbh->prepare($sql)->execute($params);

for ($i=0; $i < 100; $i++) { 
	$username = generateString(mt_rand(8, 16));
	$password = password_hash($username, PASSWORD_BCRYPT, ['cost' => 10]);
	$name = generateStringCaps(mt_rand(16, 32));
	$phone = generateNumber(12);
	$address = generateStringCapsNumber(mt_rand(16, 32));
	$roleId = mt_rand(1, 100) < 5 ? 1 : 2;
	$params = array(
		':username' => $username,
		':password' => $password,
		':name' => $name,
		':phone' => $phone,
		':address' => $address,
		':roleId' => $roleId
	);
	$dbh->prepare($sql)->execute($params);
}
?>