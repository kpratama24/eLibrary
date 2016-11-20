<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php include '../../modules/dependencies.php'; ?>
</head>
<body>
<form action="action_login.php" method="post">
	<input type="text" name="username" placeholder="username">
	<br>
	<input type="password" name="password" placeholder="password">
	<br>
	<input type="submit" value="Login">
</form>
<div class="w3-card-4">

<header class="w3-container w3-light-grey">
  <h3>John Doe</h3>
</header>

<div class="w3-container">
  <p>1 new friend request</p>
  <hr>
  <img src="img_avatar3.png" alt="Avatar" class="w3-left w3-circle">
  <p>President/CEO at Mighty Schools...</p>
</div>

<button class="w3-btn-block w3-dark-grey">+ Connect</button>

</div>
</body>
</html>
