<?php
$dbh = include '../../modules/dbh.php';

$sql = "SELECT password FROM user WHERE username = :username";
$params = array(
	':username' => $_POST['username']
);
$sth = $dbh->prepare($sql);
$sth->execute($params);

$user = $sth->fetch(PDO::FETCH_ASSOC);
if (password_verify($_POST['oldpassword'], $user['password'])) {
	$sql = "UPDATE user SET password = :password WHERE username = :username";
	$params = array(
		':username' => $_POST['username'],
		':password' => password_hash($_POST['newpassword'], PASSWORD_BCRYPT, ['cost' => 10])
	);
	$sth = $dbh->prepare($sql);
	$sth->execute($params);

	header("Location: profile.php?passwordchangesuccess");
} else {
	header("Location: profile.php?passwordchangefailed");
}
?>