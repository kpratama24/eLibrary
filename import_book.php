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

$dbh = include 'modules/dbh.php';
$sql = "INSERT INTO category(category_name) VALUES (:categoryName)";

$params = array(':categoryName' => 'Novel');
$dbh->prepare($sql)->execute($params);

$params = array(':categoryName' => 'Science');
$dbh->prepare($sql)->execute($params);

$params = array(':categoryName' => 'Romance');
$dbh->prepare($sql)->execute($params);

$params = array(':categoryName' => 'Classic');
$dbh->prepare($sql)->execute($params);

$params = array(':categoryName' => 'Mystery');
$dbh->prepare($sql)->execute($params);

$sql = "INSERT INTO book(code, name, author, publisher, year, category_id) VALUES (:code, :name, :author, :publisher, :year, :categoryId)";
for ($i=0; $i < 100; $i++) { 
	$code = generateString(4);
	$name = generateStringCaps(mt_rand(16, 32));
	$author = generateStringCaps(mt_rand(16, 32));
	$publisher = generateStringCaps(mt_rand(8, 16));
	$year = mt_rand(1800, 2016);
	$categoryId = mt_rand(1, 5);
	$params = array(
		':code' => $code,
		':name' => $name,
		':author' => $author,
		':publisher' => $publisher,
		':year' => $year,
		':categoryId' => $categoryId
	);
	$dbh->prepare($sql)->execute($params);
}
?>