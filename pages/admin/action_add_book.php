<?php
if (isset($_POST['name']) && $_POST['name']) {
	$name = $_POST['name'];
} else {
	header("Location: books.php?addbookfailed");
	die("Book title is unspecified");
}
if (isset($_POST['author']) && $_POST['author']) {
	$author = $_POST['author'];
} else {
	header("Location: books.php?addbookfailed");
	die("Book author is unspecified");
}
if (isset($_POST['year']) && $_POST['year']) {
	$year = $_POST['year'];
} else {
	header("Location: books.php?addbookfailed");
	die("Book publication year is unspecified");
}
if (isset($_POST['publisher']) && $_POST['publisher']) {
	$publisher = $_POST['publisher'];
} else {
	header("Location: books.php?addbookfailed");
	die("Book publisher is unspecified");
}
if (isset($_POST['category_id']) && $_POST['category_id']) {
	$category_id = $_POST['category_id'];
} else {
	header("Location: books.php?addbookfailed");
	die("Book category is unspecified");
}

function generateCode($length = 4) {
	$characters = '1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength -1)];
	}
	return $randomString;
}

$dbh = include '../../modules/dbh.php';
$sql = "INSERT INTO book (code, name, author, publisher, year, category_id) VALUES (:code, :name, :author, :publisher, :year, :category_id)";
$params = array(
	':code' => generateCode(),
	':name' => $name,
	':author' => $author,
	':publisher' => $publisher,
	':year' => $year,
	':category_id' => $category_id
);
$sth = $dbh->prepare($sql);
$sth->execute($params);

header("Location: books.php?addbooksuccess");
?>