<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$dbname = 'elibrary';
try {
	$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
} catch (PDOException $e) {
	die('Connection failed: ' . $e->getMessage());
}
?>