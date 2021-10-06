<?php
// Message vars
$msg = "";
$msgClass = "";

if (filter_has_var(INPUT_POST, "submit")) {
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $message = htmlspecialchars($_POST["message"]);


  if (!empty($name) && !empty($email) && !empty($message)) {

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      $msg = "Please use a valid email";
      $msgClass = "error";
    } else {
      $toEmail = "julio@fbangel.com";
      $subject = "Contact request From " . $name;
      $body = "
          <h2>Contact request</h2>
          <h4>Name</h4><p>" . $name . "</p>
          <h4>Name</h4><p>" . $email . "</p>
          <h4>Name</h4><p>" . $message . "</p>
        ";

      // Email headers
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\r";

      // Aditional headers
      $headers .= "From " . $name . "<" . $email . ">" . "\r\n";

      if (mail($toEmail, $subject, $body, $headers)) {
        $msg = "Your email has been sent";
        $mesgClass = "success";
      } else {
        $msg = "Your email was not sent";
        $msgClass = "error";
      }
    }
  } else {
    $msg = "Please fill in all fields";
    $msgClass = "error";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Photography services</title>

  <!--Fontawesome -->
  <script src="https://kit.fontawesome.com/86a91fcfba.js"></script>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="./css/global.css" />
  <link rel="stylesheet" href="./css/contact.css" />
</head>

<body>
  <!-- Navbar section start -->
  <nav class="navbar">
    <div class="logo">
      <p class="big">Ebaluz</p>
      <p class="small">Interior design</p>
    </div>
    <div class="hamburgerMenu" onclick="handleHamburgerMenu()">
      <i class="fas fa-bars menuOpen"></i>
      <i class="fas fa-times menuClose"></i>
    </div>
    <div class="navbarItems">
      <div class="navbarItem" onclick="handleHamburgerMenu()">
        <a href="./#home" class="navbarLink">Home</a>
      </div>
      <div class="navbarItem" onclick="handleHamburgerMenu()">
        <a href="./#about" class="navbarLink">About us</a>
      </div>
      <div class="navbarItem" onclick="handleHamburgerMenu()">
        <a href="./#services" class="navbarLink">Services</a>
      </div>
      <div class="navbarItem" onclick="handleHamburgerMenu()">
        <a href="./contact.php" class="navbarLink">Contact</a>
      </div>
    </div>
  </nav>
  <!-- Navbar section end -->

  <!-- Contact section end -->
  <div id="contact" class="contactSection">
    <div class="sectionWrapper">
      <div class="title">Contact us</div>
      <div class="message">
        We are here to serve you. Let's get it touch.
      </div>
      <div class="contactInformation">
        <div class="item">
          <i class="fas fa-at icon"></i>
          <div class="type">Email</div>
          <div class="description">info@ebaluz.com</div>
        </div>

        <div class="item">
          <i class="fas fa-phone icon"></i>
          <div class="type">Phone</div>
          <div class="description">630-583-6105</div>
        </div>

        <div class="item">
          <i class="fas fa-map-marker-alt icon"></i>
          <div class="type">Address</div>
          <div class="description">
            <p>4047 Kembery Drive</p>
            <p>NORTH SMITHFIELD</p>
            <p>Rhode Island</p>
          </div>
        </div>
      </div>
      <form class="contactForm" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <div class="item">
          <p class="label">Your name:</p>
          <input type="text" name="name" placeholder="name" required value="<?php echo isset($_POST["name"]) ? $name : "" ?>" />
        </div>

        <div class="item">
          <p class="label">Your email:</p>
          <input type="text" name="email" placeholder="email" required value="<?php echo isset($_POST["email"]) ? $email : "" ?>" />
        </div>

        <div class="item">
          <p class="label">Your message:</p>
          <textarea name="message" id="" cols="30" rows="10" placeholder="message" required>
            <?php echo isset($_POST["message"]) ? $message : "" ?>
          </textarea>
        </div>
        <?php if ($msg != "") : ?>
          <div class="submitMessage">
            <p class="<?php echo $msgClass; ?>">
              <?php echo $msg; ?>
            </p>
          </div>
        <?php endif; ?>
        <button type="submit">Send</button>
      </form>
    </div>
  </div>
  <!-- Contact section end -->

  <!-- Footer section start -->
  <footer>
    <div class="sectionWrapper">
      <div class="pageLinks">
        <p>Page links</p>
        <a href="./#home">Home</a>
        <a href="./#services">Our services</a>
        <a href="./#about">About us</a>
        <a href="./contact.php">Contact us</a>
        <a href="./terms_conditions.php">Terms and conditions</a>
        <a href="./privacy_policy.php">Privacy policy</a>
      </div>
      <div class="extraLinks"></div>
    </div>
  </footer>
  <!-- Footer section end -->
  <script src="./js/app.js"></script>
</body>

</html>