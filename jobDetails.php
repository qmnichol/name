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
    $sql = "UPDATE job_offer SET valid=1 WHERE job_id='$job_id'";
    $result = $conn->query($sql);
    if($result==true){
      header("location: jobDetails.php");
    }
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
        $Cert=$row["Cert"];

        $jobid=$row["job_id"];
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
    


    $sql = "INSERT INTO apply (f_username, job_id, bid, cover_letter, fuser) VALUES ('$username', '$job_id', '$bid','$cover','$e_username')";

    
    $result = $conn->query($sql);
    if($result==true){
        header("location: allJob.php");
    }
}


//====================================================================== End Apply===================================================
//====================================================================== End Apply===================================================

$sql = "SELECT * FROM review_table WHERE rjob_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	
        $rjob_id=$row["rjob_id"];
        $rjobs = $rjob_id;
        }
} else {
    echo "0 results";
}

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
			  <div class="panel-heading">Job Title</div>
			  <div class="panel-body"><h4><?php echo $title; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Job Type</div>
			  <div class="panel-body"><h4><?php echo $type; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Job Description</div>
			  <div class="panel-body"><h4><?php echo $description; ?></h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Minimum Wage</div>
			  <div class="panel-body"><h4><?php echo $budget; ?></h4></div>
			</div>
      <div class="panel panel-success">
			  <div class="panel-heading">Certificate</div>
			  <div class="panel-body"><h4><?php echo $Cert; ?></h4></div>
			</div>
      
			
			<a href="<?php echo $linkBtn; ?>" id="BTTN" name="" type="submit" class="btn btn-warning btn-lg"><?php echo $textBtn; ?></a>
				
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

                <!--=============== Apply Button ================================-->
					<center><div class="form-group" style="float:center">
                    <div class="col-sm-11 col-sm-offset-3">
                        <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
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
                            <td><input type="submit" class="btn btn-link btn-lg" value="Approve"></td>
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
	        <center><a href="sendMessage.php" class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span>  Send Message</a></center>
	        <p></p>
	    </div>
<!--End Main profile card-->


<!--Contact Information-->
		<!-- <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
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
		</div> -->
<!--End Contact Information-->
	</div>
<!--End Column 2-->


</div>
</div>
<!--End main body-->



<!--End Footer-->




<!-- Ratings -->
<div class="container " id="ratings">
    	<!-- <h1 class="mt-5 mb-5">Review & Rating System in PHP & Mysql using Ajax</h1> -->
    	<div class="card">
    		<!-- <div class="card-header">Sample Product [<?php echo $rjobs; ?>]==[<?php echo $job_id; ?>] </div> -->
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
    				</div>
    				<div class="col-sm-4 text-center" id="RevieW">
    					<h3 class="mt-4 mb-3">Write Review Here</h3>
    					<button type="button"  name="add_review" id="add_review" class="btn btn-primary" >Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>

<?php
$sql = "SELECT * FROM selected WHERE f_username='$username' and valid=0 and job_id='$job_id' ";
$valid=$row["valid"];
$job_id=$row["job_id"];
$f_username=$row["f_username"];


$JobID = $job_id;
$VStatus = $valid;

if($f_username!=$username && $VStatus!=0)
{
    echo "<script>
    $('#RevieW').hide();
    </script>";
    if ($jobid!=$JobID)
    {
    echo "<script>
            $('#RevieW').hide();
    </script>";
    }
}

?>

<div id="review_modal" class="modal animated rubberBand delete-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Submit Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                  <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                <div class="form-group">
                  <input type="text" name="user_name" id="user_name" class="form-control" placeholder="<?php echo $username; ?>" value="<?php echo $username; ?>" />
                  <input type="text" name="rjob_id" id="rjob_id" class="form-control" value="<?php echo $jobid; ?>" style="" />

                </div>
                <div class="form-group">
                  <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                  <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                </div>
              </div>
          </div>
        </div>
  </div>

</div>
<!--End rating -->









<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

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
  if($e_username==$username){
  	echo "<script>
  		        $('#HIRE').hide();
  		</script>";
  } 

if($e_username!=$username)
{
	echo "<script>
		        $('#applicant').hide();
		</script>";
}
// if($rjobs!=$job_id)
// {
// 	echo "<script>
// 		        $('#nichol').hide();
// 		</script>";
// }
?>
<tr>
                            <th>Profile</th>
                            
                            
                          </tr>
                        </thead>
                        <?php
                          $sql = "SELECT * FROM selected WHERE valid = 0 and f_username='$username' and job_id='$jobid'";
                          $connection = mysqli_connect("localhost", "root", "", "service_finder");
                          $result = mysqli_query($connection, $sql);
                        ?>
                        <?php 
                          if ($result->num_rows > 0) {
                            // output data of each row
                          while ($row = $result->fetch_assoc()) {
                            $job_id=$row["job_id"];
                            $f_username=$row["f_username"];

                            $IDjob = $job_id;
                            ?>         
                        <tbody>
                          <tr>
                            <td><?php echo $row['f_username'] ?>+ <?php echo $row['job_id'] ?> +  <?php echo $row['valid'] ?></td>
                            
                          </tr>
                        </tbody>
                        <?php }
                          } else {
                          echo "<tr><td></td><td>Nothing to show</td></tr>";
                          ?>
                            <script>
                                $('#RevieW').hide();
                            </script>
                          <?php
                          }
     ?>


<!-- ===================================================================== -->
<script>

var rating_data = 0;

$('#add_review').click(function(){

    $('#review_modal').modal('show');

});

$(document).on('mouseenter', '.submit_star', function(){

    var rating = $(this).data('rating');

    reset_background();

    for(var count = 1; count <= rating; count++)
    {

        $('#submit_star_'+count).addClass('text-warning');

    }

});

function reset_background()
{
    for(var count = 1; count <= 5; count++)
    {

        $('#submit_star_'+count).addClass('star-light');

        $('#submit_star_'+count).removeClass('text-warning');

    }
}

$(document).on('mouseleave', '.submit_star', function(){

    reset_background();

    for(var count = 1; count <= rating_data; count++)
    {

        $('#submit_star_'+count).removeClass('star-light');

        $('#submit_star_'+count).addClass('text-warning');
    }

});

$(document).on('click', '.submit_star', function(){

    rating_data = $(this).data('rating');

});




$('#save_review').click(function(){

    var user_name = $('#user_name').val();

    var user_review = $('#user_review').val();

    var rjob_id = $('#rjob_id').val();
    if(user_name == '' || user_review == '')
    {
        alert("Please Fill Both Field");
        return false;
    }
    else
    {
        $.ajax({
            url:"<?php echo "submit_rating.php?job_id=" . $job_id; ?>",
            method:"POST",
            data:{rating_data:rating_data, user_name:user_name, user_review:user_review, rjob_id:rjob_id},
            success:function(data)
            {
                $('#review_modal').modal('hide');

                load_rating_data();

                alert(data);
            }
        })
    }

});

load_rating_data();

function load_rating_data()
{
    $.ajax({
        url:"<?php echo "submit_rating.php?job_id=" . $job_id; ?>",
        method:"POST",
        data:{action:'load_data'},
        dataType:"JSON",
        success:function(data)
        {
            $('#average_rating').text(data.average_rating);
            $('#total_review').text(data.total_review);

            var count_star = 0;

            $('.main_star').each(function(){
                count_star++;
                if(Math.ceil(data.average_rating) >= count_star)
                {
                    $(this).addClass('text-warning');
                    $(this).addClass('star-light');
                }
            });

            $('#total_five_star_review').text(data.five_star_review);

            $('#total_four_star_review').text(data.four_star_review);

            $('#total_three_star_review').text(data.three_star_review);

            $('#total_two_star_review').text(data.two_star_review);

            $('#total_one_star_review').text(data.one_star_review);

            $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

            $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

            $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

            $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

            $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

            if(data.review_data.length > 0)
            {
                var html = '';

                for(var count = 0; count < data.review_data.length; count++)
                {
                    html += '<div class="row mb-3">';

                    html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                    html += '<div class="col-sm-11">';

                    html += '<div class="card">';

                    html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                    html += '<div class="card-body">';

                    for(var star = 1; star <= 5; star++)
                    {
                        var class_name = '';

                        if(data.review_data[count].rating >= star)
                        {
                            class_name = 'text-warning';
                        }
                        else
                        {
                            class_name = 'star-light';
                        }

                        html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                    }

                    html += '<br />';

                    html += data.review_data[count].user_review;

                    html += '</div>';

                    html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                    html += '</div>';

                    html += '</div>';

                    html += '</div>';
                }

                $('#review_content').html(html);
            }
        }
    })
}


</script>


</body>
</html>