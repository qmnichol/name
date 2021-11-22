<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
	if ($_SESSION["Usertype"]==1) {
		header("location: employeeProfile.php");
	}
	else{
		header("location: employerProfile.php");
	}
}
else{
    $username="";
	//header("location: index.php");
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Service Finder</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="asset/css/mystyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
      body {
        font-family: 'Kanit', sans-serif;
      }
      .banner {
        text-align:center;
        background: url(image/banner.jpg) no-repeat;
        background-size: cover; 
        height: 100vh;
        background-position: center;
      }
      .gradient {
        background: linear-gradient( 
        120deg,#343a40,#6299a4);
        color: #fff;
      }
      .portfolio-navbar .navbar-nav .nav-link {
        font-weight: 600;
        font-size: 20px;
        padding: 2rem .1rem;
    }
      h1.mb-5 {
        font-size: 50px;
        font-weight: bold;
        color: #f5f6f8;
      }
      .btn {
        display: inline-block;
        font-weight: bolder;
        color: #eff1f3;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 2px solid #495057;
        padding: 13px 25px;
        line-height: 1.5;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
      }
     
    </style>
</head>
<body>
<!--Navbar menu-->
	<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-light portfolio-navbar gradient py-0" id="nav">

    <div class="container">
      <a class="navbar-brand logo" href="index.php"><img src="image/logo.png" width="250" alt="Logo"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse nav-dropdown" id="navbarNav">
        <ul class="nav navbar-nav ml-auto">
                    <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="elogin.php">Login</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="signup.php">Sign up</a></li>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <a class="btn ml-auto rounded-pill btn-font-size px-4" role="button" href="register.php" style="background: rgb(116, 156, 143);color:#fff;">Register as an Employee</a>
                    </div> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Login
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="elogin.php">Login as an Employer</a></li>
              <li><a class="dropdown-item" href="login.php">Login as an Employee</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Register
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="signup.php">Register as an Employer</a></li>
              <li><a class="dropdown-item" href="register.php">Register as an Employee</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>    
<!--End Navbar menu-->

<!--slider-->
<header class="masthead text-white text-center banner">  
    <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto desc" style="margin-top:230px;">
                    <h1 class="mb-5">Find &amp; Explore best service provider near you.</h1>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form>
                        <div class="form-row justify-content-center">
                        <button type="button" class="btn btn-outline-dark rounded-pill"  onclick="document.location='elogin.php'">Get Started</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</header>   
  <main class="page landing-page">
    <section class="portfolio-block skills">
      <div class="container">
        <div class="heading">
          <h2>Services</h2>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card special-skill-item border-0">
              <div class="card-header bg-transparent border-0"><i class="icon ion-ios-star-outline"></i></div>
              <div class="card-body">
                <h3 class="card-title">Web Design</h3>
                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card special-skill-item border-0">
              <div class="card-header bg-transparent border-0"><i class="icon ion-ios-lightbulb-outline"></i></div>
              <div class="card-body">
                <h3 class="card-title">Interface Design</h3>
                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card special-skill-item border-0">
              <div class="card-header bg-transparent border-0"><i class="icon ion-ios-gear-outline"></i></div>
              <div class="card-body">
                <h3 class="card-title">Photography and Print</h3>
                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
    <footer class="page-footer">
        <div class="container">
            <div class="links"><a href="#">About me</a><a href="#">Contact me</a><a href="#">Projects</a></div>
            <div class="social-icons"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-instagram-outline"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a></div>
        </div>
    </footer>


<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="sassets/js/jquery.min.js"></script>
</body>
</html>