<?php
function randomDate($start_date, $end_date) {
	$min = strtotime($start_date);
	$max = strtotime($end_date);
	$val = mt_rand($min, $max);
	return date('Y-m-d', $val);
}

$dbh = include 'modules/dbh.php';
$sql = "INSERT INTO loan(user_id, book_id, loan_date, max_day, return_date) VALUES (:userId, :bookId, :loanDate, :maxDay, :returnDate)";
for ($i=0; $i < 100; $i++) { 
	$userId = mt_rand(1, 100);
	$bookId = mt_rand(1, 100);
	$loanDate = randomDate('2016-06-00', '2016-11-25');
	$maxDay = 14;
	$returnDate = mt_rand(1, 100) < 50 ? randomDate($loanDate, '2016-11-28') : null;
	$params = array(
		':userId' => $userId,
		':bookId' => $bookId,
		':loanDate' => $loanDate,
		':maxDay' => $maxDay,
		':returnDate' => $returnDate
	);
	$dbh->prepare($sql)->execute($params);
}
?>