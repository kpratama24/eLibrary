<?php
session_start();
if (!isset($_SESSION['roleId'])) {
	header("Location: ../");
	die("Redirected");
}

include '../../templates/header.php';
?>
	<div class="w3-row">
		<div class="w3-col s4">
			<h1></h1>
		</div>
		<div class="w3-col s4">
			<div class="w3-card-2 w3-dark-grey">
				<div class="w3-container w3-center w3-padding">
					<h3>Profile Card</h3>
					<img src="http://placehold.it/320X240" alt="" style="width:80%"/>
					<h5><?php echo $_SESSION['name'] ?></h5>
					<a href="#"><button onclick="document.getElementById('updateModal').style.display='block'" class="w3-btn w3-green">UPDATE USER INFO</button></a>
				</div>
			</div>
		</div>
		<div class="w3-col s4">
			<h1></h1>
		</div>
	</div>

	<!-- Update User Modal -->
	<div id="updateModal" class="w3-modal w3-animate-zoom">
		<div class="w3-modal-content">
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
