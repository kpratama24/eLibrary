<?php
include '../templates/header.php';
?>
    <!-- Begin w3-display magic ! -->
    <div class="bgimg w3-display-container w3-text-white">
      <div class="w3-display-middle w3-jumbo w3-padding-jumbo">
        <p>eLibrary</p>
        <p class="w3-center"><span class="fa fa-arrow-down"></span></p>
      </div>
      <div class="w3-display-topleft w3-padding-jumbo w3-xlarge">
        <p><button onclick="document.getElementById('login').style.display='block'" class="w3-btn w3-hover-light-grey"> Login </button></p>
        <p><button onclick="document.getElementById('signup').style.display='block'" class="w3-btn w3-hover-light-grey"> Sign Up </button></p>
      </div>
      <div class="w3-display-topright w3-padding-jumbo w3-xlarge">
        <p><button class="w3-btn w3-hover-light-grey"> Welcome Kevin ! </button></p>
      </div>
    </div>
    <!-- End w3-display-magic -->
    <!-- Begin Body -->
      <div class="w3-container">
        Test
      </div>
    <!-- End Body -->
    <!-- Login Modal -->
    <div id="login" class="w3-modal">
      <div class="w3-modal-content w3-animate-zoom">
        <div class="w3-container w3-black">
          <span onclick="document.getElementById('login').style.display='none'" class="w3-closebtn w3-xxlarge w3-hover-text-grey">x</span>
          <h1>Login</h1>
        </div>
        <div class="w3-container">
          <p> Enter your credentials below </p>
          <form action="./pages/general/action_login.php" method="post">
          	<p><input class="
              w3-input w3-padding-16 w3-border" type="text" name="username" placeholder="Username"></p>
          	<p><input class="
              w3-input w3-padding-16 w3-border" type="password" name="password" placeholder="Password"></p>
          	<p><button class="w3-btn w3-light-grey w3-padding" type="submit">Login </button></p>
          </form>
        </div>
      </div>
    </div>
    <!-- End Login Modal -->

    <!-- Signup Modal -->
    <div id="signup" class="w3-modal">
      <div class="w3-modal-content w3-animate-zoom">
        <div class="w3-container w3-black">
          <span onclick="document.getElementById('signup').style.display='none'" class="w3-closebtn w3-xxlarge w3-hover-text-grey">x</span>
          <h1>Sign Up</h1>
        </div>
        <div class="w3-container">
          <p> Please fill in the form below </p>
          <form action="./pages/general/action_signup.php" method="post">
          	<p><input class="w3-input w3-padding-16 w3-border" type="text" name="username" placeholder="Username"></p>
          	<p><input class="w3-input w3-padding-16 w3-border" type="password" name="password" placeholder="Password"></p>
          	<p><input class="w3-input w3-padding-16 w3-border" type="text" name="name" placeholder="Name"></p>
          	<p><input class="w3-input w3-padding-16 w3-border" type="text" name="phone" placeholder="Phone"></p>
          	<p><input class="w3-input w3-padding-16 w3-border" type="text" name="address" placeholder="Address"></p>
          	<p><button class="w3-btn w3-light-grey w3-padding" type="submit">Sign Up</button></p>
          </form>
        </div>
      </div>
    </div>
<?php
include '../templates/footer.php';
?>