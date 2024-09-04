<?php
  
   $con= mysqli_connect('localhost','root','','vicsports');
   $jerseys= $con->query("SELECT * FROM availableorders order by orderday desc");
?>

<!DOCTYPE html>
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

  
  <link href="css/style.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">
  <div class="hero_area">
    <div class="hero_bg_box">
      <img src="images/hero-bg.jpg" alt="">
    </div>

    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="" loading="lazy">
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
                  <a class="nav-link" href="orders.php"> Orders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="upload.html">Jerseys</a>
                </li>
                <li class="nav-item" style="margin-left: 90%;">
                <a href="admin.php" class="nav-link" style="background-color: white; border-radius: 50px;"><img src="images/person-fill.svg"></img> </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
<body>
<div class="col-lg-10 col-md-10" style="margin-left: 10%;">
        <table class="table table-striped">
            <thead class="bg-purple text-white">
                <td style="width: 15%;">Date</td>
                <td style="width: 15%;">Client Number</td>
                <td style="width: 15%;">Club Name</td>
                <td style="width: 15%;">Venue</td>
                <td style="width: 15%;">Size</td>
                <td style="width: 15%;">Quantity</td>
                <td style="width: 15%;">Amount</td>
            </thead>
            <tbody style="background-color:white;">
                <?php foreach($jerseys as $order):?>
                <tr>
                    <td style="width: 15%;"><?php echo $order['orderday'];?></td>
                    <td style="width: 15%;"><?php echo $order['clientnumber'];?></td>
                    <td style="width: 15%;"><?php echo $order['clubname'];?></td>
                    <td style="width: 15%;"><?php echo $order['venue'];?></td>
                    <td style="width: 15%;"><?php echo $order['size'];?></td>
                    <td style="width: 15%;"><?php echo $order['quantity'];?></td>
                    <td style="width: 15%;"><?php echo $order['amount'];?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <footer style="margin-bottom: 0; margin-top: 95%; text-align:center;" class="text-monospace">
    <p class="text-purple">
      &copy; <span id="displayYear"></span> All Rights Reserved By
      Victor Sports Center
    </p>    
    
</footer>
</body>