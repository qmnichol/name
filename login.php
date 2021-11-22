<?php include('server.php');

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">   
</head>
<style>
   body {
    font-family: 'Kanit', sans-serif;
  }
  p {
    color: 	#505050;
  }
  .card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: white;
    background-clip: border-box;
    border-radius: .25rem;
    box-shadow:
    0 2.8px 2.2px rgba(0, 0, 0, 0.034),
    0 6.7px 5.3px rgba(0, 0, 0, 0.048),
    0 12.5px 10px rgba(0, 0, 0, 0.06),
    0 22.3px 17.9px rgba(0, 0, 0, 0.072),
    0 31.8px 33.4px rgba(0, 0, 0, 0.086),
    0 15px 15px rgba(0, 0, 0, 0.12)
}
.card-header {
  padding: .75rem 1.25rem;
  margin-bottom: 0;
  background-color: white;   
}
.card-header h3 {
  color:  #404040;
	font-weight: 400;
  font-size: 25px;
}
.card-body {
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  min-height: 1px;
  padding: 1.25rem;
  background-color: white;
}
</style>
<body class="body bg-dark">
  <div class="login-box" style="width: 30%;margin-left: 35%;margin-top: 100px;margin-bottom: 20px;">
    <div class="card card-outline card-success">
      <div class="X" >
        <li class="nav" style="float: right; padding-right:10px"><a href="index.php"><span class="fa fa-times" style="color: black;"></span></a></li>
      </div>
      <!-- logo -->
      <div class="card-header text-center">
        <a href="index.php" class="brand-link">
          <img src="image/logo.png" alt="Service Finder Logo" height="75">
        </a>
        <h3>Login</h3>
      </div>
      <!-- end logo -->
      <!-- card-body Login Form -->
      <div class="card-body">
        <form id="loginForm" method="post" class="form-horizontal">
          <div style="color:red;">
            <p><?php echo $errorMsg; ?></p>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="username" name="username" required="require">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>          
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="password" name="password" required="require">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-lock"></span>
              </div>
            </div>
          </div>
          <div class="form-group" style="display: none;">
            <h1></h1>
            <label class=" control-label" style="font-size:30px">Usertype</label>
            <div class="col-sm-5"  required="require">
              <div class="radio">
                <label>
                  <input type="radio" name="usertype" value="employee" required="Please select one"  /> Employee
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="usertype" value="employer" required="require" checked/> Employer
                </label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6 offset-4">
              <button type="submit" name="login" class="btn ml-auto rounded-pill btn-font-size px-4" style="background: rgb(116, 156, 143);color:#fff;">Login</button>
            </div>
            <p>Don't have an account? <a href="register.php">Register here</a>.</p>
          </div>
        </form>
      </div>
      <!-- end card-body Login Form -->
    </div>
  </div> 
<script>
$(document).ready(function() { 
  $('#loginForm').bootstrapValidator({
    feedbackIcons: {
      valid: 'glyphicon glyphicon-ok',
      invalid: 'glyphicon glyphicon-remove',
      validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      username: {
        message: 'The username is not valid',
        validators: {
          notEmpty: {
            message: 'The username is required and cannot be empty'
          }
        }
      },
      password: {
        validators: {
          notEmpty: {
            message: 'The password is required and cannot be empty'
          }
        }
      },
      usertype: {
        validators: {
          notEmpty: {
            message: 'The usertype is required'
          }
        }
      }
    }
  });
});
</script>
<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>
</body>
</html>