<?php

if($_SERVER['HTTP_HOST'] == 'localhost') {
	$con = new mysqli("localhost","root","","vicsports");
} else {
	$con = new mysqli("localhost"," "," "," ");
}

$con->set_charset("utf8mb4");

$club= $_POST['clubname'];

$filsql= $con->query("SELECT * FROM availablejerseys where clubname like '%$club%';");

if ($filsql->num_rows > 0) {
    while ($row = $filsql->fetch_assoc()) {
        $jerseys[] = $row;
    }
} else {
    $no_jerseys = true;
}
?>

<html>

<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Victor Sports Center</title>

  
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <div class="hero_bg_box">
      <img src="images/hero-bg.jpg" alt="" loading="lazy">
    </div>

    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="">
            <span>
              Victor Sports Center
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item ">
                  <a class="nav-link" href="index.html">Home </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html#about"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html#testimony">Testimonial</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item" style="margin-left: 90%;">
                <a href="admin.php" class="nav-link" style="background-color: white; border-radius: 50px;"><img loading="lazy" src="images/person-fill.svg"></img> </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    
  </div>

  
  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          You Searched For
        </h2>
      </div>
      <div class="product_container">
        <div class="row">
        <?php if (isset($no_jerseys) && $no_jerseys): ?>
            
          <div class="col-sm-6 col-lg-4 ">
            <div class="box">
             <?php echo"<script>alert('No Jerseys match your description. Try again');
             window.location.href='shop.html';</script>";?>
            </div>
          </div>
          <?php else: ?>
            <?php foreach ($jerseys as $jersey): ?>
          <div class="col-sm-6 col-lg-4 ">
            <div class="box">
              <div class="img-box">
                <?php echo  '<img src="' . $jersey["image_path"] . '" alt="Image" loading="lazy">';?>
              </div>
              <div class="detail-box">
              Club: <?php echo $jersey["clubname"]; ?> <br>
              Venue: <?php echo $jersey["venue"]; ?><br>
              Price: <?php echo $jersey["price"]; ?><br>
              <button id="openFormBtn-.<?php echo $jersey["venue"]; ?>">Add To Cart</button>
              <div class="form-popup" id="popupForm-.<?php echo $jersey["venue"]; ?>">
              <form action="cart.php" method="post" class="form-cointainer">
                <label>Club Name</label><br>
                <input type="text" name="clubname" value="<?php echo $jersey["clubname"]; ?>"> <br>
                <label>Venue</label><br> 
                <input type="text" name="venue" value="<?php echo $jersey['venue']; ?>"><br><br>
                <label>Size</label>
                <select name="size">
                  <option value="S">S</option>
                  <option value="M">M</option>
                  <option value="L">L</option>
                  <option value="XL">XL</option>
                <select><br>
                <label>Quantity</label><br>
                <input type="number" name="qty"><br>

                <label>Price</label><br>
                <select name="price">
                  <option value="">--SELECT--</option>
                  <option value="20000">20,000(Fans)</option>
                  <option value="60000">60,0000(Players)</option>
                </select>
                <label>Your Contact</label><br>
                <input type="tel" name="phone" placeholder="070"><br><br>
                <button type="submit" style="color: white; padding: 5px 7px; border: none; cursor: pointer; background-color: green; border-radius: 10px;" name='cart'>SUBMIT</button> <br>
                <img loading="lazy" src="images/x-circle-fill.svg" id="closeFormBtn-.<?php echo $jersey['jersey']; ?>">
                </form>
              </div>
            </div>
            </div>
          </div>
          <?php endforeach; ?>
        <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>


  

  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 mx-auto">

          <h4>
            Contact Us
          </h4>
          <div class="contact_items">
            <a href="">
              <div class="img-box">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
              </div>       
              <h6>
                Location
              </h6>
            </a>
            <a href="">
              <div class="img-box">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </div>
              <h6>
                
              </h6>
            </a>
            <a href="">
              <div class="img-box">
                <i class="fa fa-phone" aria-hidden="true"></i>
              </div>
              <h6>
                +256 759013228
              </h6>
            </a>
          </div>
        </div>
      </div>

      <div class="box">
        <div class="info_social">
          <div>
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
          </div>
          <div>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
          </div>
          <div>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <footer class="footer_section">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      Victor Sports Center
    </p>
  </footer>


  <script>
    document.addEventListener("DOMContentLoaded", function() {
    //all open form buttons
    const openFormButtons = document.querySelectorAll("[id^='openFormBtn-']");
    
    //click event for each button
    openFormButtons.forEach(button => {
        button.addEventListener('click', function() {
            const recordId = this.id.split('-')[1];
            document.getElementById('popupForm-' + recordId).style.display = 'flex';
        });
    });

    const closeFormButtons = document.querySelectorAll("[id^='closeFormBtn-']");

    //click event to each close button
    closeFormButtons.forEach(button => {
        button.addEventListener('click', function() {
            const recordId = this.id.split('-')[1];
            document.getElementById('popupForm-' + recordId).style.display = 'none';
        });
    });
});
  </script>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>