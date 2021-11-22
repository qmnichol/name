<?php include('server.php');
if(isset($_SESSION["Username"])){ 
	$username=$_SESSION["Username"];
}
else{
	$username="";
	//header("location: index.php");
}
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
	if ($_SESSION["Usertype"]==1) {
		$linkPro="employeeProfile.php";
		$linkEditPro="editFreelancer.php";
		$linkBtn="applyJob.php";
		$textBtn="Apply for this job";
	}
	else{
		$linkPro="employerProfile.php";
		$linkEditPro="editEmployer.php";
		$linkBtn="editJob.php";
		$textBtn="Edit the job offer";
	}
}
else{
    $username="";
	//header("location: index.php");
}

$sql = "SELECT * FROM employe WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // $username=$row["username"];
        // $password=$row["password"];
        $profilepic=$row["profilepic"];
        $fname=$row["fname"];
        $mname=$row["mname"];
        $lname=$row["lname"];
        $Email=$row["Email"];
        //$Gender=$row["Gender"];
        $Age=$row["Age"];
        $Bdate=$row["Bdate"];
        $mnumber=$row["mnumber"];
        $address=$row["address"];
        $zipcode=$row["zipcode"];
        $city=$row["city"];
        $province=$row["province"];
        // $validID=$row["validID"];
        // //=====
        // $NC=$row["NC"];
        // $skill=$row["skill"];
        // $education=$row["education"];
        // $experience=$row["experience"];
        // $proTitle=$row["proTitle"];

	    }
} else {
    echo "0 results";
}


if(isset($_POST["SaveChanges"])){
    // $username=test_input($_POST["username"]);
    // $password=test_input($_POST["password"]);
    //$profilepic=test_input($_POST["profilepic"]);
	$fname=test_input($_POST["fname"]);
    $mname=test_input($_POST["mname"]);
    $lname=test_input($_POST["lname"]);
	$Email=test_input($_POST["Email"]);
    //$Gender=test_input($_POST["Gender"]);
    //$Age=test_input($_POST["Age"]);
    $Bdate=test_input($_POST["Bdate"]);
	$mnumber=test_input($_POST["mnumber"]);
	$address=test_input($_POST["address"]);
    $zipcode=test_input($_POST["zipcode"]);
    $city=test_input($_POST["city"]);
    $province=test_input($_POST["province"]);
	// $validID=test_input($_POST["validID"]);
	//  //=====
    //  $NC=test_input($_POST["NC"]);
    //  $skill=test_input($_POST["skill"]);
    //  $education=test_input($_POST["education"]);
    //  $experience=test_input($_POST["experience"]);
    //  $proTitle=test_input($_POST["proTitle"]);
     


	$sql = "UPDATE employe SET fname='$fname', mname='$mname', lname='$lname', Email='$Email', Bdate='$Bdate', mnumber='$mnumber', address='$address', zipcode='$zipcode', city='$city', province='$province' WHERE username='$username'";
    //fname='$_fname', mname='$_mname', lname='$_lname', Email='$_Email', Gender='$_Gender', Bdate='$_Bdate', mnumber='$_mnumber', address='$_address', zipcode='$_zipcode', city='$_city', province='$_province'
	
	$result = $conn->query($sql);
	if($result==true){
		header("location: employeeProfile.php");
	}
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Employer profile</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
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
        padding-top: 10%;
        margin: 0;
        font-family: 'Kanit', sans-serif;
    }
    .card-white {
      position: relative;
    display: flex;
    flex-direction: row;
    align-content: center;
    flex-wrap: nowrap;
    justify-content: center;
    }
    /* .white-card {
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
 
} */
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
  form.search {
  padding-top: 25px;
}
form.search input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid #2d3436;
  float: left;
  width: 80%;
  background: #ffffff;
  color: #ADADAD;
}  
form.search button {
  float: left;
    width: 15%;
    padding: 10px;
    background: #2d3436;
    color: white;
    font-size: 17px;
    border: 1px solid #2d3436;
    border-left: none;
}
.page-content {
  width: 50%;
}
.page-content h2, .page-content .btn {
  display: flex;
    flex-wrap: nowrap;
    justify-content: center;
}
.form-group img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.form-group a{
  height: 30px;
  background: rgb(116, 156, 143);
  color:#fff;
}
.save-changes .btn {
  background: rgb(116, 156, 143);
  color:#fff;
}
/* notification */
#count{
  border-radius: 50%;
  position: relative;
  top: -10px;
  left: -10px;

}
</style>

</head>
<body class="body bg-dark">

<!--Navbar menu-->
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-light portfolio-navbar gradient py-0" id="nav">
        <div class="container"><a class="navbar-brand logo" href="<?php echo $linkPro ?>"><img src="image/logo.png" height="75" alt="Logo"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                	<form class="search" action="allJob.php" method="post">
				            <div class="form-group search">
				              <input type="text" name="s_title" placeholder="Search">
				              <button type="submit" class="search-icon"><i class="fa fa-search"></i></button>
				            </div>
	                </form>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="allJob.php">Offer Services</a></li>
                  <?php 
$sql_get = mysqli_query($conn,"SELECT * FROM message WHERE receiver='$username' and status=0");
$count = mysqli_num_rows($sql_get);

?>
      <li class="nav-item" role="presentation"><a class="nav-link" href="message.php"><i class="fas fa-comments fa-lg"> </i> <span class="badge bg-primary" id="count"><?php echo $count; ?></span></a> </li>

                  
				  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user-circle fa-lg"></i>
                  </a>
                  <ul class="dropdown-menu dropdown" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo $linkPro ?>">Profile</a></li>
                    <li><a class="dropdown-item" href="<?php echo $linkEditPro ?>">Edit Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                  </li>
                </ul>
	</div>
	</div>
	</nav>     
<!--End Navbar menu-->
<div class="container">
  <div class="row">
    <div class="card card-white">
    
    <form class="page-content" id="registrationForm" method="post" >
        <div class="form-group">
        <h2>Edit Profile</h2>
        <img src="asset/img/<?php echo $profilepic; ?>" alt="" >
      <h5><a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#profile"><i
                                class="fas fa-camera-retro"> Edit profile picture</i></a></h5>
         

        </div>
        <div class="form-group">
            <label class="control-label">First name</label>
           
                <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>"  />
          
            <label class="colcontrol-label">Middle name</label>
          
                <input type="text" class="form-control" name="mname" value="<?php echo $mname; ?>" />
        
            <label class="colcontrol-label">Last name</label>
         
                <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>" />
       



      
            <label class="col control-label">Email address</label>

                <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>" />



            <label class="col control-label">Contact number</label>

                <input type="text" class="form-control" name="mnumber" value="<?php echo $mnumber; ?>" />
 


   


            <label class="col control-label">Date of birth</label>

                <input type="date" class="form-control" name="Bdate"  value="<?php echo $Bdate; ?>" />
     
            <label class="col control-label">Address</label>
  
                <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" />
      
            <label class="col control-label">City</label>
          
                <input type="text" class="form-control" name="city" value="<?php echo $city; ?>" />
         
            <label class="colcontrol-label">Province</label>
       
                <input type="text" class="form-control" name="province" value="<?php echo $province; ?>" />
           
            <label class="colcontrol-label">Zipcode</label>
            
                <input type="text" class="form-control" name="zipcode" value="<?php echo $zipcode; ?>" />
            
            <!-- ======== Hide this =========== -->
            
        </div>
        <div class="save-changes">
      
                <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                <button type="submit" name="SaveChanges" class="btn btn-lg">Save changes</button>

        </div>
        </form>
    </div>
  </div>
</div>

    <div id="profile" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form action="editEmployeeProfile.php" method="POST">
                    <div class="modal-body text-center">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header">
                                        <h5><i class="fa fa-user-lock"></i> Valid ID</h5>
                                    </div>
                                    <div class="form-group text-center">
                                        <span class="img-div">
                                            <div class="text-center img-placeholder"  onClick="triggerClick()">
                                                <h4>Upload image</h4>
                                            </div>
                                            <img src="asset/img/<?php echo $profilepic; ?>" onClick="triggerClick()" id="profileDisplay"  style="width: 200px; height: 200px" class="img " alt="profile" value="<?php echo $profilepic; ?>">
                                        </span>
                                        <input type="file" name="profilepic" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" required accept='image/*'  value="">
                                        <p>Please click photo to edit</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                            <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="UpdateProfile" style="border: none">Update</button>
                            <button type="button" style="border: none" data-dismiss="modal" >Cancel</button>
                            
                        </div>
                    </div>
                </form>
            </div>
         </div>
      </div>












      <script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="sassets/js/jquery.min.js"></script>





<!-- <script src="asset/jquery/jquery.min.js"></script>
      <script src="asset/js/bootstrap.bundle.min.js"></script>
      <script src="asset/js/adminlte.js"></script> -->
      <!-- DataTables  & Plugins -->
      <!-- <script src="asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script> -->

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

$(document).ready(function() {
    $('#registrationForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    }
                }
            },
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The username can only consist of alphabetical and number'
                    },
                    different: {
                        field: 'password',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    },
                    stringLength: {
                        min: 6,
                        message: 'The password must have at least 6 characters'
                    }
                }
            },
            repassword: {
                validators: {
                    notEmpty: {
                        message: 'The password confirmation is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password  is not matched'
                    }
                }
            },
            contactNo: {
                validators: {
                    notEmpty: {
                        message: 'The contact number is required'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The number is not valid'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            birthdate: {
                validators: {
                    notEmpty: {
                        message: 'The date of birth is required'
                    },
                    date: {
                        format: 'YYYY-MM-DD',
                        message: 'The date of birth is not valid'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address is required'
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

</body>
</html>