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

  <style>
    .upload{
  text-align: center;
}
.upload form input{
  margin-bottom: 10px;
  width: 50%
}
  </style>
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
                  <a class="nav-link" href="shop.html">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html#testimony">Testimonial</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cart.php">Cart</a>
                </li>
                <li class="nav-item">
                  <a href="admin.php" class="nav-link" style="background-color: white; border-radius: 50px;"><img loading="lazy" src="images/person-fill.svg"></img> </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
<body>
<div class="container-fluid">
        <div class="row px-xl-5 text-align-center">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30 ">
                    <span>Admin Login</span>
                </nav>
            </div>
    </div>

    <div class="col-lg-8 col-md-8 col-sd-12 text-align-center" style="margin-left:35%;">
        <form action="admin.php" method="post">
        <div class="col-md-6 form-group">
            <label>Email Address</label>
            <input class="form-control" type="email" placeholder="Jdoe@mail.io" name="email">
        </div>
        <div class="col-md-6 form-group">
            <label>Password</label>
            <input class="form-control" type="password" placeholder="PASSWORD" name="password">
        </div>
        <div class="col-md-6 form-group">
            <button class="btn btn-block btn-purple font-weight-bold py-3" type="submit" name="valid">VALID</button>
        </div>    
    </form>
    </div> 

    <?php 
    if($_SERVER['HTTP_HOST'] == 'localhost') {
        $con = new mysqli("localhost","root","","vicsports");
    } else {
        $con = new mysqli("localhost"," "," "," ");
    }
    $con->set_charset("utf8mb4");
    if(isset($_POST['valid'])){
        $email= $_POST['email'];
        $password= $_POST['password'];

        $det= $con->query("SELECT * FROM manager where Email like '%$email%' and Manpassword like '%$password%'");
        if(mysqli_num_rows($det) == 1){
            header('Location: orders.php');
        }
        else{
            echo "<script>alert('Access Denied'); window.location.href='admin.php';</script>";
        }
    }
?>


<footer style="margin-bottom: 0; margin-top: 95%; text-align:center;" class="text-monospace">
    <p class="text-purple">
      &copy; <span id="displayYear"></span> All Rights Reserved By
      Victor Sports Center
    </p>    
    
</footer>
</body>