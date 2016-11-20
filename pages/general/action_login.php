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

$dbh = include '../../dbh.php';
$sql = "SELECT u.id AS id, u.username AS username, u.password AS password, u.name AS name, u.role_id AS role_id, r.role_name AS role_name FROM user AS u JOIN role AS r WHERE u.username = :username AND u.role_id = r.id";
$params = array(':username' => $username);
$sth = $dbh->prepare($sql);
$sth->execute($params);

if ($sth->rowCount()) {
	$row = $sth->fetch(PDO::FETCH_ASSOC);
	if (password_verify($password, $row['password'])) {

		session_destroy();
		session_start(); 
		$_SESSION['username'] = $row[username];
		$_SESSION['name'] = $row[name];
		$_SESSION['roleId'] = $row[role_id];
		$_SESSION['roleName'] = $row[role_name];
		$_SESSION['loggedIn'] = true;

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