<!DOCTYPE html>
<html>
<head>
	<title>eLibrary</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
include 'style.php';
?>
</head>
<body class="w3-light-grey">
<header class="w3-card-2">
<?php
include 'topnav.php';
?>
	<div class="w3-display-container">
		<img src="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/img/banner2.jpg"; ?>" class="full-width">
		<div class="w3-display-middle w3-text-white w3-text-shadow"><h1><b><a href="<?php echo "http://$_SERVER[HTTP_HOST]/elibrary/"; ?>">eLIBRARY</a></b></h1></div>
	</div>
<?php
include 'nav.php';
?>
</header>
<main class="container w3-margin-top before-footer">

<?php
// echo "'" . "http://" . $_SERVER['HTTP_HOST'] . "/" . "'";
?>