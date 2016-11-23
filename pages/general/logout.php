<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['roleId']);
session_destroy();

include '../../templates/header.php';
?>
<meta http-equiv="refresh" content="5; url=../">
<div class="w3-card-2 w3-white">
	<div class="w3-container w3-black">
		<h2>You have successfully logged out</h2>
	</div>
	<div class="w3-container">	
		<p>You will be redirected in 5 seconds</p>
	</div>
</div>
<?php
include '../../templates/footer.php';
?>