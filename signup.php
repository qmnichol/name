<?php include('server1.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">   
<style>
   body {
    font-family: 'Kanit', sans-serif;
  }
  p {
    color: 	#505050;
  }
   .img-placeholder {
  width: 55%;
  color: white;
  background: black;
  opacity: .7;
  height:150px;
  border-radius: 50%;
  z-index: 2;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  display: none;
  
}
.img-placeholder h4 {
  margin-top: 40%;
  color: white;
	font-size: small;
}
.img-div:hover .img-placeholder {
  display: block;
  cursor: pointer;
}
.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-clip: border-box;
    border-radius: .25rem;
		padding-bottom: 30px;
		box-shadow:
  0 2.8px 2.2px rgba(0, 0, 0, 0.034),
  0 6.7px 5.3px rgba(0, 0, 0, 0.048),
  0 12.5px 10px rgba(0, 0, 0, 0.06),
  0 22.3px 17.9px rgba(0, 0, 0, 0.072),
  0 41.8px 33.4px rgba(0, 0, 0, 0.086),
  0 100px 80px rgba(0, 0, 0, 0.12)
 
}
.signup-register {
	margin-top: 50px;
}
.signup-register h2 {
	color: #2d3436;
	justify-content: center;
	font-weight: 400;
}
.card-header label {
	color: #2d3436;
	font-weight: 600;
}
.card-header span {
	color: #2d3436;
	font-weight: 600;
}
p {
  color: #2d3436;
}
</style>
</head>
<body class="body bg-dark">
<!-- Registration card -->
<div class="login-box signup-register">
  <section class="content">
    <div class="container">
      <!-- card -->
      <div class="card white-box">
        <div class="X" >
          <li class="nav" style="float: right; padding-right:10px"><a href="index.php"><span class="fa fa-times" style="color: black;"></span></a></li>
        </div>
        <h2><center>Employer Sign Up Form</center></h2>
        <form action="" method="post" class="form-horizontal">
        <div style="color:red;">
          <p><?php echo $errorMsg; ?></p>
        </div>
        <div class="col-md-12">
          <div class="row">
            <!-- Profile Picture -->
              <div class="col-md-3">
                <div class="form-group text-center">
                  <span class="img-div">
                  <div class="text-center img-placeholder"  onClick="triggerClick()">
                    <h4>Upload image</h4>
                  </div>
                  <img src="asset/img/Picture1.png" onClick="triggerClick()" id="profileDisplay" style="width: 150px; height: 150px" class="img rounded-circle" alt="profile"></span>
                  <input type="file" name="profilepic" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" required accept='image/*' value="<?php echo $profilepic; ?>">
                  <p>Please Attach 2x2 Picture</p>
                </div>
              </div>
              <!-- End Profile Picture -->
              <!-- Registraion Form -->
              <div class="col-md-9">
								<div class="card-header">
                  <label for="">Personal Information</label>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">First Name</label>
                      <input type="text" class="form-control" name="fname" placeholder="first name" required="require" value="<?php echo $fname; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Middle Name</label>
                      <input type="text" class="form-control" name="mname" placeholder="middle name" required="require" value="<?php echo $mname; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="">Last Name</label>
                      <input type="text" class="form-control" name="lname" placeholder="last name" required="require" value="<?php echo $lname; ?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Gender</label>
                      <div class="form-control">
                        <input type="radio" name="Gender" value="Male" /> Male                                                                                     
                      	<input type="radio" name="Gender" value="Female"/> Female
                    	</div>
                    </div>
                  </div>
									
									<div class="col-md-3">
                    <div class="form-group">
                      <label for="">Birthday</label>
                      <input type="date" class="form-control" name="Bdate" required="require" value="<?php echo $Bdate; ?>">
                    </div>
                  </div>
									<div class="col-md-12">
                    <div class="card-header">
                      <label for="">Contact Information</label>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="">Contact</label>
                        <input type="text" class="form-control" name="mnumber" placeholder="contact" required="require" value="<?php echo $mnumber; ?>">
                      </div>
                    </div>
										<div class="col-md-6">
                      <div class="form-group">
                      	<label for="">Email</label>
                        <input type="email" class="form-control" name="Email" placeholder="Email" required="require" value="<?php echo $Email; ?>">
                      </div>
                    </div>
									</div>
                  <div class="col-md-12">
                    <div class="card-header">
                      <label for="">Address</label>
                    </div>
                  	<div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" name="address" placeholder="Barangay" required="require" value="<?php echo $address; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" name="city" placeholder="Municipality" required="require" value="<?php echo $city; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" name="zipcode" placeholder="Zip Code" required="require" value="<?php echo $zipcode; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" name="province" placeholder="Province" required="require" value="<?php echo $province; ?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="card-header">
                      <span class="fa fa-key"> Valid ID <small>(National ID, Brgy ID, Student ID)</small></span>
                    </div>
                  	<div class="form-group">
                    	<div class="input-group">
                      	<div class="custom-file">
                        	<input type="file" class="custom-file-input" name="validID" id="exampleInputFile" value="<?php echo $validID; ?>">
                        	<label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      	</div>
                    	</div>
                  	</div>
                	</div>
									<!-- Hide -->
                  <div class="from-group" style="display: none">
                    <label>
                      <input type="radio" name="education" value="Please add infromation" checked /> Please add infromation
                      <input type="radio" name="Age" value="Please add infromation" checked /> 
                    </label>
                    <label>
                      <input type="radio" name="skill" value="Please add infromation" checked /> Please add infromation
                    </label>
                    <label>
                      <input type="radio" name="experience" value="Please add infromation" checked /> Please add infromation
                    </label>
                    <label>
                      <input type="radio" name="proTitle" value="Please add infromation" checked /> Please add infromation
                    </label>
                    <label>
                      <input type="radio" name="NC" value="Please add infromation" checked /> Please add infromation
                    </label>
                  </div>
									<!-- end hide -->
									<div class="col-md-12">
                    <div class="card-header">
                      <span>Account</span>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="username" value="<?php echo $username; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password" value="<?php echo $password; ?>">
                      </div>
                    </div>
                  </div>
									<!-- Hide the radio button-->
                  <div class="form-group " style="display: none">
                    <label class="col-sm-4 control-label">Usertype</label>
                    <div class="col-sm-5">
                      <div class="radio">
                        <label>
                          <input type="radio" name="usertype" value="employee" checked/> Employee
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="usertype" value="employer"  /> Employer
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                    	<!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                      <button type="submit" name="register" class="btn ml-auto rounded-pill btn-font-size px-4" style="background: rgb(116, 156, 143);color:#fff;">Register</button>
                    </div>
										<p>Already have an account? <a href="elogin.php">Login here</a>.</p>
                  </div>
									<!--End Hide radio button-->
                </div>
              </div>
              <!-- End Registraion Form -->
            </div>
          </div>
        </form>
      </div>
      <!-- end card -->
    </div>
  </section>
</div>
<!-- End Registration card -->
<script>
  function triggerClick(e) {
  	document.querySelector('#profileImage').click();
  }
  function displayImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();
      	reader.onload = function(e){
      	document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
    	}
      reader.readAsDataURL(e.files[0]);
  	}
  }
</script>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>