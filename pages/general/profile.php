<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ../");
	die("Redirected");
}

include '../../templates/header.php';

$dbh = include '../../modules/dbh.php';
$sql = "SELECT username, name, phone, address FROM user WHERE id = :id";
$params = array(':id' => $_SESSION['id']);
$sth = $dbh->prepare($sql);
$sth->execute($params);

$row = $sth->fetch(PDO::FETCH_ASSOC);
?>
<div class="w3-card-2 w3-white w3-content" style="max-width: 300px;">
	<div class="w3-container w3-black">
		<h2>Profile Card</h2>
	</div>
<?php
if (isset($_GET['profileupdated'])) {
?>
	<div class="w3-container w3-green">Profile updated</div>
<?php
} else if (isset($_GET['passwordchangesuccess'])) {
?>
	<div class="w3-container w3-green">Password changed</div>
<?php
} else if (isset($_GET['passwordchangefailed'])) {
?>
	<div class="w3-container w3-red">Old password doesn't match</div>
<?php
}
?>
	<img src="../../img/profile.jpg" class="full-width">
	<div class="w3-container">
		<h3 class="w3-center"><?php echo $row['name'] ?></h3>
		<p>
			<a href="#"><button onclick="document.getElementById('updateModal').style.display='block'" class="w3-btn-block w3-black">UPDATE USER INFO</button></a>
		</p>
		<p>
			<a href="#"><button onclick="document.getElementById('changePasswordModal').style.display='block'" class="w3-btn-block w3-black">CHANGE PASSWORD</button></a>
		</p>
	</div>
</div>
<!-- Update User Modal -->
<div id="updateModal" class="w3-modal">
	<div class="w3-modal-content w3-animate-opacity">
		<header class="w3-container w3-brown">
			<span onclick="document.getElementById('updateModal').style.display='none'" class="w3-closebtn">&times;</span>
			<h2>Update User Info</h2>
		</header>
		<div class="w3-container">
			<form action="action_update_user_info.php" method="post">
				<p class="w3-hide">
					<input type="text" name="username" value="<?php echo "$row[username]"; ?>" id="username-field" class="w3-input">
					<label for="username-field" class="w3-label w3-validate">Username</label>
				</p>
				<p>
					<input type="text" name="name" pattern="^[ ]*[a-zA-Z]+([ ][a-zA-Z]+)*[ ]*$" value="<?php echo "$row[name]"; ?>" id="name-field" class="w3-input" required>
					<label for="name-field" class="w3-label w3-validate">Name</label>
				</p>
				<p>
					<input type="text" name="phone" pattern="^[ ]*[+]?[0-9]{4,}[ ]*$" value="<?php echo "$row[phone]"; ?>" id="phone-field" class="w3-input" required>
					<label for="phone-field" class="w3-label w3-validate">Phone</label>
				</p>
				<p>
					<textarea name="address" id="address-field" class="w3-input" required><?php echo "$row[address]"; ?></textarea>
					<label for="address-field" class="w3-label w3-validate">Address</label>
				</p>
				<p>
					<input type="submit" value="UPDATE USER INFO" class="w3-btn">
				</p>
			</form>
		</div>
	</div>
</div>
<!-- End Modal -->
<!-- Change Password Modal -->
<div id="changePasswordModal" class="w3-modal">
	<div class="w3-modal-content w3-animate-opacity">
		<header class="w3-container w3-brown">
			<span onclick="document.getElementById('changePasswordModal').style.display='none'" class="w3-closebtn">&times;</span>
			<h2>Change Password</h2>
		</header>
		<div class="w3-container">
			<form action="action_change_password.php" method="post">
				<p class="w3-hide">
					<input type="text" name="username" value="<?php echo "$row[username]"; ?>" id="username-field" class="w3-input">
					<label for="username-field" class="w3-label w3-validate">Username</label>
				</p>
				<p>
					<input type="password" name="oldpassword" id="oldpassword-field" class="w3-input" required>
					<label for="oldpassword-field" class="w3-label w3-validate">Old Password</label>
				</p>
				<p>
					<input type="password" name="newpassword" id="newpassword-field" class="w3-input" required>
					<label for="newpassword-field" class="w3-label w3-validate">New Password</label>
				</p>
				<p>
					<input type="submit" value="CHANGE PASSWORD" class="w3-btn">
				</p>
			</form>
		</div>
	</div>
</div>
<!-- End Modal -->
<?php
include '../../templates/footer.php';
?>
