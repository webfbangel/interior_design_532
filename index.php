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
  <title>Interior design</title>
  <link rel="stylesheet" href="css/global.css" />

  <!--Fontawesome -->
  <script src="https://kit.fontawesome.com/86a91fcfba.js"></script>

  <!-- Slider css -->
  <link rel="stylesheet" type="text/css" href="packages/slick-master/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="packages/slick-master/slick/slick-theme.css" />
  <script src="components/global/navbar.js"></script>
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
        <a href="#home" class="navbarLink">Home</a>
      </div>
      <div class="navbarItem" onclick="handleHamburgerMenu()">
        <a href="#about" class="navbarLink">About us</a>
      </div>
      <div class="navbarItem" onclick="handleHamburgerMenu()">
        <a href="#services" class="navbarLink">Services</a>
      </div>
      <div class="navbarItem" onclick="handleHamburgerMenu()">
        <a href="/contact.html" class="navbarLink">Contact</a>
      </div>
    </div>
  </nav>
  <!-- Navbar section end -->

  <!-- Hero section start -->
  <div id="home" class="hero">
    <div class="slider">
      <div class="slide slideOne"></div>
      <div class="slide slideTwo"></div>
      <div class="slide slideThree"></div>
    </div>

    <div class="heroMessage">
      <div class="companyName">Ebaluz</div>
      <div class="location">INTERIOR DESIGN</div>
      <div class="message">A dream that began and continues</div>
    </div>
  </div>
  <!-- Hero section end -->

  <!-- About section start-->
  <div id="about" class="aboutApproachSection">
    <div class="sectionWrapper">
      <div class="cards">
        <div class="card about">
          <div class="title">About us</div>
          <div class="message">
            Ebaluz was created 6 years ago out of passion and love for design.
            A dream that began and continues with the conviction and
            motivation of wanting to connect with people, offer them solutions
            for their spaces that are: creative, aware of their well-being,
            healthy and according to the particular purpose of the client.
          </div>
          <div class="imageWrapper">
            <div class="image"></div>
          </div>
        </div>
        <div class="card approach">
          <div class="title">Our Vision</div>
          <div class="message">
            Working from a horizontal management, being transparency,
            self-responsibility, trust and solidarity the pillars that
            underpin this company, we want to be a reference in terms of
            ethical and responsible communication. cooperation.
          </div>
          <div class="imageWrapper">
            <div class="image"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About section end -->

  <!-- News section start -->
  <div id="news" class="newsSection">
    <div class="sectionWrapper">
      <p class="title">Last news</p>
      <div class="cards">
        <div class="card newsOne">
          <div class="image"></div>
          <div class="message">
            Models to personalize: Casa Cor's proposal and the dream of the
            <span>mobile home</span>.
          </div>
          <a href="/contact.html" class="button">Learn more</a>
        </div>
        <div class="card newsTwo">
          <div class="image"></div>
          <div class="message">
            Tom Dixon: "I am <span>always dissatisfied</span> with my previous
            designs"
          </div>
          <a href="/contact.html" class="button">Learn more</a>
        </div>
        <div class="card newsThree">
          <div class="image"></div>
          <div class="message">
            Danish style or the design route in Copenhagen
          </div>
          <a href="/contact.html" class="button">Learn more</a>
        </div>
      </div>
    </div>
  </div>
  <!-- News section end -->

  <!-- Services section start -->
  <div id="services" class="serviceSection">
    <div class="sectionWrapper">
      <div class="services">
        <div class="service serviceOne">
          <div class="image"></div>
          <div class="information">
            <div class="type">HOUSES INTERIORS</div>
            <div class="description">
              Each design has a story and Einteriorismo builds yours. With
              each interior design we turn houses into homes because we
              believe that a home is not only made to live, but also to enjoy
              it and, ultimately, to make us happy. Its scenography is an
              extension of each one of us.
            </div>
          </div>
        </div>

        <div class="service serviceTwo">
          <div class="information">
            <div class="type">CORPORATE IDENTITY</div>
            <div class="description">
              It is about the design that the brand will represent and all
              that it entails. For this, it is essential to communicate and
              transmit the values ​​and objectives, properly synthesizing the
              elements that will define and identify the brand.
            </div>
          </div>
          <div class="image"></div>
        </div>

        <div class="service serviceThree">
          <div class="image"></div>
          <div class="information">
            <div class="type">ADAPTATIONS</div>
            <div class="description">
              The next step is to accompany the identity of different visual
              elements that help to publicize the brand: business cards,
              letters, cloth bags ... all must follow the same rules in order
              to contribute to the creation, definition and dissemination of
              the brand.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Services section end -->

  <!-- Contact section end -->
  <div id="contact" class="contactSection">
    <div class="sectionWrapper">
      <div class="title">Contact us</div>
      <div class="message">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem labore
        iure qui nihil in!
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
        <a href="#home">Home</a>
        <a href="#services">Our services</a>
        <a href="#about">About us</a>
        <a href="/contact.html">Contact us</a>
        <a href="/terms_conditions.html">Terms and conditions</a>
        <a href="/privacy_policy.html">Privacy policy</a>
      </div>
      <div class="extraLinks"></div>
    </div>
  </footer>

  <!-- Footer section end -->

  <!-- Jquery -->
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="./packages/slick-master/slick/slick.min.js"></script>
  <script src="./js/app.js"></script>
  <script>
    $(document).ready(function() {
      $(".slider").slick({
        dots: false,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: "linear",
        autoplay: true,
        autoplaySpeed: 5000,
      });
    });
  </script>
</body>

</html>