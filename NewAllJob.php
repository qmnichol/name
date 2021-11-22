<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
    if ($_SESSION["Usertype"]==1) {
      $linkPro="employeeProfile.php";
      $linkEditPro="editEmployee1.php";
      $linkBtn="applyJob.php";
      $textBtn="Apply for this job";
    }
    else{
      $linkPro="employerProfile.php";
      $linkEditPro="editEmployer1.php";
      $linkBtn="editJob.php";
      $textBtn="Edit the job offer";
    }
  }
  else{
      $username="";
    //header("location: index.php");
  }

if(isset($_SESSION["job_id"])){
    $job_id=$_SESSION["job_id"];
}
else{
    $job_id="";
    //header("location: index.php");
}

if(isset($_POST["f_user"])){
	$_SESSION["f_user"]=$_POST["f_user"];
	header("location: viewFreelancer.php");
}

if(isset($_POST["c_letter"])){
	$_SESSION["c_letter"]=$_POST["c_letter"];
	header("location: coverLetter.php");
}


if(isset($_POST["f_hire"])){
	$f_hire=$_POST["f_hire"];
	$f_price=$_POST["f_price"];
	$sql = "INSERT INTO selected (f_username, job_id, e_username, price, valid) VALUES ('$f_hire', '$job_id', '$username','$f_price',1)";
    
    $result = $conn->query($sql);
    if($result==true){
    	$sql = "DELETE FROM apply WHERE job_id='$job_id'";
		$result = $conn->query($sql);
		if($result==true){
			$sql = "UPDATE job_offer SET valid=0 WHERE job_id='$job_id'";
			$result = $conn->query($sql);
			if($result==true){
				header("location: jobDetails.php");
			}
		}
    }
}


if(isset($_POST["f_done"])){
	$f_done=$_POST["f_done"];
	$sql = "UPDATE selected SET valid=0 WHERE job_id='$job_id'";
	$result = $conn->query($sql);
    if($result==true){
    	header("location: jobDetails.php");
    }
}


$sql = "SELECT * FROM job_offer WHERE job_id='$job_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$e_username=$row["e_username"];
        $title=$row["title"];
        $type=$row["type"];
        $description=$row["description"];
        $budget=$row["budget"];
        $jv=$row["valid"];
        $deadline=$row["deadline"];
        }
} else {
    echo "0 results";
}

$_SESSION["msgRcv"]=$e_username;
//====================================================================== Apply===================================================
$sql = "SELECT * FROM apply WHERE job_id='$job_id' and f_username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $msg="You have already applied for this job. You cannot apply again.";
} else {
    $msg="";
}


if(isset($_POST["apply"]) && $msg==""){
    $cover=test_input($_POST["cover"]);
    $bid=test_input($_POST["bid"]);


    $sql = "INSERT INTO apply (f_username, job_id, bid, cover_letter) VALUES ('$username', '$job_id', '$bid','$cover')";

    
    $result = $conn->query($sql);
    if($result==true){
        header("location: allJob.php");
    }
}


//====================================================================== End Apply===================================================


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Job Details</title>
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
        padding-top: 3%;
        margin: 0;
        font-family: 'Kanit', sans-serif;
    }
	.card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
        background:#fff;
    }
    .card h4 {
      font-weight: 600;
        font-size: 20px;
    }
    .card p {
      font-weight: 400;
        font-size: 18px;
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
 
</style>

</head>
<body>

<!--Navbar menu-->
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-light portfolio-navbar gradient py-0" id="nav">
  <div class="container">
    <a class="navbar-brand logo" href="<?php echo $linkPro ?>"> <img src="image/logo.png" height="75" alt="Logo"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav ml-auto">
      
      <li class="nav-item" role="presentation"><a class="nav-link" href="allJob.php">Offer Services</a></li>
      
      <li class="nav-item" role="presentation"><a class="nav-link" href="message.php"><i class="fas fa-comments fa-lg"></i></a></li>

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


<!--main body-->
<div style="padding:5% 3% 1% 3%;">
<div class="row">

<!--Column 1-->
	<div class="col-lg-5 text-center">
<!-- Heyyyy Box size ^^^ 9 ============-=-=-=-=-=-=-===-=-=-=-=-=-=-=-=-=-=-=-=-->
<!--Freelancer Profile Details-->	
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>Job Offer Details</h3></div>
			</div> 
			<div class="panel panel-success">
			  <div class="panel-heading"><h4>Job Title</h4></div>
			  <div class="panel-body"><p><?php echo $title; ?></p></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading"><h4>Job Type</h4></div>
			  <div class="panel-body"><p><?php echo $type; ?></p></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading"><h4>Job Description</h4></div>
			  <div class="panel-body"><p><?php echo $description; ?></p></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading"><h4>Minimum Wage</h4></div>
			  <div class="panel-body"><p><?php echo $budget; ?></p></div>
			</div>
                                                  <!--                       this is edit button -->
			<a href="<?php echo $linkBtn; ?>" id="BTTN" name="applybtn" type="submit" class="btn btn-warning btn-lg"><?php echo $textBtn; ?></a>
				
				<!-- Hire/apply -->
				<div class="container"><!-- Hire/apply -->
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="page-header">
                    <h2 style="display: none">Apply for Job</h2>
                </div>

                <form id="registrationForm" method="post" class="form-horizontal">
                <h5 style="color:red"><?php echo $msg; ?></h5>
                <div class="form-group">
                    <label class="col-sm-4 control-label" style="display: none">Write A Cover Letter</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="17" name="cover"  style="display: none"></textarea>
                    </div>
                </div>

                <div class="form-group" style="display: none">
                    <label class="col-sm-4 control-label">Place a bid</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="bid" value="" />
                    </div>
                </div>
					<center><div class="form-group" style="float:center">
                    <div class="col-sm-11 col-sm-offset-3">
                        <!-- Do NOT use name="submit" or id="submit" for the Submit button              HIre Button-->    
                        <button type="submit" name="apply" class="btn btn-info btn-lg" id="HIRE">Hire</button>
                    </div>
                </div></center>
                
            </form>
            </div>
        </div>
    </div>
	<!-- end Hire/apply -->


		</div>
		
	
<!--End Freelancer Profile Details-->

<!--Freelancer Profile Details-->	
		<div id="applicant" class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>Applicants for this job</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                  <tr>
                      <td>Applicant's username</td>
                      <td>Bid</td>
                  </tr>
                    <?php 
                    $sql = "SELECT * FROM apply WHERE job_id='$job_id' ORDER BY bid";
					$result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                        $f_username=$row["f_username"];
                        $bid=$row["bid"];
                        $cover_letter=$row["cover_letter"];

                        echo '
                        <form action="jobDetails.php" method="post">
                        <input type="hidden" name="f_user" value="'.$f_username.'">
                            <tr>
                            <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                            <td>'.$bid.'</td>
                            </form>
                            <form action="jobDetails.php" method="post">
                            <input type="hidden" name="c_letter" value="'.$cover_letter.'">
                            <td><input type="submit" class="btn btn-link btn-lg" value="cover letter"></td>
                            </form>
                            <form action="jobDetails.php" method="post">
                            <input type="hidden" name="f_hire" value="'.$f_username.'">
                            <input type="hidden" name="f_price" value="'.$bid.'">
                            <td><input type="submit" class="btn btn-link btn-lg" value="Accept"></td>
                            </tr>
                        </form>';

                        }
                    } else {
                      $sql = "SELECT * FROM selected WHERE job_id='$job_id'";
					  $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $f_username=$row["f_username"];
                                $bid=$row["price"];
                                $v=$row["valid"];

                                if ($v==0) {
                                	$tc="Job ended";
                                	$tv="";
                                }else{
                                	$tc="End Job";
                                	$tv="f_done";
                                }

                                echo '
                                <form action="jobDetails.php" method="post">
                                <input type="hidden" name="f_user" value="'.$f_username.'">
                                    <tr>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                                    <td>'.$bid.'</td>
                                    </form>
                                    <form action="jobDetails.php" method="post">
                                    <input type="hidden" name="'.$tv.'" value="'.$f_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$tc.'"></td>
                                    </tr>
                                </form>

                                                             
                                ';

                                }
                        } else {
                            echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
                        }
                        }

                       ?>
                     </table>
              </h4></div>
			</div>
			<p></p>
		</div>
<!--End Freelancer Profile Details--> 



	</div>
<!--End Column 1-->

<?php 
$sql = "SELECT * FROM employer WHERE username='$e_username' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	$e_Name=$row["fname"];
        $e_LName=$row["lname"];
        $Email=$row["Email"];
        $contact_no=$row["mnumber"];
        $address=$row["address"];
        $city=$row["city"];
        $province=$row["province"];
        $profilepic=$row["profilepic"];

        }
} else {
    echo "0 results";
}

?>

<!--Column 2-->
	<div class="col-lg-3">

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<img src="asset/img/<?php echo $profilepic; ?>">
			<h2><?php echo $e_Name; ?>, <?php echo $e_LName; ?></h2>
			<p><span class="glyphicon glyphicon-user"></span> <?php echo $e_username; ?></p>
      <p><?php echo $e_username; ?></p>
	        <center><a href="sendMessage.php" class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span>  Send Message</a></center>
	        <p></p>
	    </div>
<!--End Main profile card-->


<!--Contact Information-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h4>Contact Information</h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Email</div>
			  <div class="panel-body"><?php echo $Email; ?></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Mobile</div>
			  <div class="panel-body"><?php echo $contact_no; ?></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Address</div>
			  <div class="panel-body"><?php echo $address; ?>, <?php echo $city; ?>, <?php echo $province; ?></div>
			</div>
		</div>
<!--End Contact Information-->
	</div>
<!--End Column 2-->


</div>
</div>
<!--End main body-->



<!--End Footer-->




<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="sassets/js/jquery.min.js"></script> -->

<?php 

if($e_username!=$username && $_SESSION["Usertype"]!=1){
	echo "<script>
		        $('#applybtn').hide();
		</script>";
} 

if($_SESSION["Usertype"]==1 && $jv==0){
	echo "<script>
		        $('#applybtn').hide();
		</script>";
} 
//================================================
if($_SESSION["Usertype"] !=2){
	echo "<script>
		        $('#BTTN').hide();
		</script>";
} 
if($e_username!=$username){
	echo "<script>
		        $('#BTTN').hide();
		</script>";
} 
//======================================
 if($_SESSION["Usertype"] !=1){
 	echo "<script>
 		        $('#HIRE').hide();
 		</script>";
 }
 if($_SESSION["Usertype"] !=2){
  echo "<script>
            $('#HIRE').hide();
    </script>";
}



if($e_username!=$username){
	echo "<script>
		        $('#applicant').hide();
		</script>";
}


?>


</body>
</html>