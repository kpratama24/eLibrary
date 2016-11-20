<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>eLibrary</title>
    <link rel="stylesheet" href="./lib/w3.css" media="screen" title="no title">
    <link rel="stylesheet" href="./lib/font-awesome.min.css" media="screen" title="no title">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  </head>
  <style media="screen">
    body,h1,h5 {font-family: "Raleway", sans-serif}
    body, html {height: 100%}
    .bgimg {
    background-image: url('./img/library.jpg');
    min-height: 100%;
    background-position: center;
    background-size: cover;
  }
  </style>
  <body>
    <!-- Begin w3-display magic ! -->
    <div class="bgimg w3-display-container w3-text-white">
      <div class="w3-display-middle w3-jumbo w3-padding-jumbo">
        <p>eLibrary</p>
      </div>
      <div class="w3-display-topleft w3-padding-jumbo w3-xlarge">
        <p><button onclick="document.getElementById('login').style.display='block'" class="w3-btn w3-hover-light-grey"> Login </button></p>
        <p><button onclick="document.getElementById('signup').style.display='block'" class="w3-btn w3-hover-light-grey"> Sign Up </button></p>
      </div>
      <div class="w3-display-bottomleft w3-padding-jumbo">
        <p class="w3-xlarge w3-text-black"> Parahyangan Catholic University</p>
        <p class="w3-large w3-text-black"> Creative Developers </p>
        <p class="w3-large w3-text-black"> &copy; Prayogo Cendra and Kevin Pratama </p>
      </div>
    </div>
    <!-- End w3-display-magic -->

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
  </body>
</html>
