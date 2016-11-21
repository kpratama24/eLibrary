<?php
session_start();
session_destroy();
session_start();

include '../../templates/header.php';
?>
<meta http-equiv="refresh" content="5; url=../">
<h1>You have successfully logged out</h1>
<p>You will be redirected in 5 seconds</p>
<?php
include '../../templates/footer.php';
?>