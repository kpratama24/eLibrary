<?php
session_start();
if (!isset($_SESSION['roleId'])) {
	header("Location: ../");
	die("Redirected");
}

include '../../templates/header.php';
?>
<div class="w3-card-2 w3-white w3-content" style="max-width: 400px;">
	<div class="w3-container w3-black">
		<h2>Profile Card</h2>
	</div>
	<img src="../../img/profile.jpg" class="full-width">
	<div class="w3-container">
		<p>
			<h3 class="w3-center"><?php echo $_SESSION['name'] ?></h3>
			<a href="#"><button onclick="document.getElementById('updateModal').style.display='block'" class="w3-btn-block w3-black">UPDATE USER INFO</button></a>
		</p>
	</div>
</div>
<!-- Update User Modal -->
<div id="updateModal" class="w3-modal">
	<div class="w3-modal-content w3-animate-zoom">
		<header class="w3-container w3-brown">
			<span onclick="document.getElementById('updateModal').style.display='none'" class="w3-closebtn">&times;</span>
			<h2>Update User Info</h2>
		</header>
		<div class="w3-container">
			<form action="action_update_user_info.php" method="post">
				<p>
					<label for="name-field" class="w3-label">Name</label>
					<input type="text" name="name" value="<?php echo $_SESSION['name'] ?>" id="name-field" class="w3-input" disabled>
				</p>
				<p>
					<label for="password-field" class="w3-label w3-validate">Password</label>
					<input type="password" name="password" id="password-field" class="w3-input" required>
				</p>
				<p>
					<label for="confirm-password-field" class="w3-label w3-validate">Confirm Password</label>
					<input type="password" name="password" id="confirm-password-field" class="w3-input" required>
				</p>
				<p>
					<label for="phone-field" class="w3-label w3-validate">Phone</label>
					<input type="text" name="phone" pattern="^[ ]*[+]?[0-9]{4,}[ ]*$" id="phone-field" class="w3-input" required>
				</p>
				<p>
					<label for="address-field" class="w3-label w3-validate">Address</label>
					<textarea name="address" id="address-field" class="w3-input" required></textarea>
				</p>
				<p>
					<input type="submit" value="UPDATE USER INFO" class="w3-btn">
				</p>
			</form>
		</div>
	</div>
</div>
<!-- End Modal -->
<?php
include '../../templates/footer.php';
?>
