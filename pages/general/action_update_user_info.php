<?php
$dbh = include '../../modules/dbh.php';
$sql = "UPDATE user SET name = :name, phone = :phone, address = :address WHERE username = :username";
$params = array(
	':name' => $_POST['name'],
	':phone' => $_POST['phone'],
	':address' => $_POST['address'],
	':username' => $_POST['username']
);
$sth = $dbh->prepare($sql);
$sth->execute($params);

header("Location: profile.php?profileupdated");
?>