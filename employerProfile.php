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
if(isset($_POST["jid"])){
	$_SESSION["job_id"]=$_POST["jid"];
	header("location: jobDetails.php");
}

if(isset($_POST["f_user"])){
	$_SESSION["f_user"]=$_POST["f_user"];
	header("location: viewEmployee.php");
}


$sql = "SELECT * FROM employer WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $username=$row["username"];
        $password=$row["password"];
        $profilepic=$row["profilepic"];
        $fname=$row["fname"];
        $mname=$row["mname"];
        $lname=$row["lname"];
        $Email=$row["Email"];
        $Gender=$row["Gender"];
        $Age=$row["Age"];
        $Bdate=$row["Bdate"];
        $mnumber=$row["mnumber"];
		    $address=$row["address"];
        $zipcode=$row["zipcode"];
        $city=$row["city"];
        $province=$row["province"];
        $validID=$row["validID"];
        $NC=$row["NC"];
        $skill=$row["skill"];
        $education=$row["education"];
        $experience=$row["experience"];
        $priTitle=$row["proTitle"];
        $date = date("M d, Y",strtotime($Bdate));
        }
} else {
    echo "0 results";
}



$sql = "SELECT * FROM job_offer WHERE e_username='$username' and valid=1 ";
$result = $conn->query($sql);







if(isset($_POST["addC"])){
    $title=test_input($_POST["title"]);
    $Certificate=test_input($_POST["Certificate"]);
    

    $sql = "INSERT INTO addcertificate (user, Certificate, title) VALUES ('$username', '$Certificate', '$title')";
                                                                                                                       
    $result = $conn->query($sql);
    if($result==true){
        $_SESSION["id"] = $conn->insert_id;
        header("location: employerProfile.php");
    }
}









 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
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
  /* fonts */
  .current-jobfferings h3 {
    font-weight: 600;
  }
  .current-jobfferings th {
    font-weight: 400;
    font-size: 25px;
  }
  .current-jobfferings td {
    font-weight: normal;
    font-size: 20px;
  }
    .employee-details h3 {
        font-weight: 700;
    }
    .employee-details h4 {
      font-weight: 600;
    }
    .employee-details h5 {
      font-weight: 500;
    }
    .employee-details p {
      font-weight: 400;
    }
    body {
        padding-top: 3%;
        margin: 0;
        font-family: 'Kanit', sans-serif;
    }
	.card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
        background:#fff;
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
    .logout {
      padding-left: 10px;
    }
    .rounded-pill {
      margin-right: 20px;
    }
    .id-certificate {
      background: rgb(116, 156, 143);
    color: #fff;
    margin-left: 20px;
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
<body>
<a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-ok"></span>  Logout</a>
<!--Navbar menu-->
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-light portfolio-navbar gradient py-0" id="nav">
  <div class="container">
    <a class="navbar-brand logo" href="<?php echo $linkPro ?>"> <img src="image/logo.png" height="75" alt="Logo"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav ml-auto">
      
      <li class="nav-item" role="presentation"><a class="nav-link" href="allJob.php">Offer Services</a></li>
      <div class="collapse navbar-collapse" id="navcol-1">
        <a class="btn ml-auto rounded-pill" role="button" href="postJob.php" style="background: rgb(116, 156, 143);color:#fff;">Post a Job</a>      
      </div>

<?php 
$sql_get = mysqli_query($conn,"SELECT * FROM message WHERE receiver='$username' and status=0");
$count = mysqli_num_rows($sql_get);

?>
      <li class="nav-item" role="presentation"><a class="nav-link" href="message.php"><i class="fas fa-comments fa-lg"> </i> <span class="badge bg-primary" id="count"><?php echo $count; ?></span></a> </li>
      <?php 
        $sql_get = mysqli_query($conn,"SELECT * FROM apply WHERE fuser='$username'");
        $count1 = mysqli_num_rows($sql_get);

      ?>
      <li class="nav-item" role="presentation"><a class="nav-link" href="notif.php"><i class="fas fa-bell"></i> <span class="badge bg-primary" id="count1"><?php echo $count1; ?></span></a> </li>
      


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

<div style="padding:1% 3% 1% 3%;">
  <div class="row">

    <!--Column 1-->
    <div class="col-lg-3">

      <!--Main profile card-->
		  <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			  <p></p>
			  <img src="asset/img/<?php echo $profilepic; ?>">
			  <h2><?php echo $fname; ?>, <?php echo $lname; ?></h2>
			  <p><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?></p>
	    </div>
      <!--End Main profile card-->

      <!--Contact Information-->
		    <!-- <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
            <ul class="nav navbar-nav">
                <li><a class="" href="editEmployer.php">Edit Profile</a></li>
                <li><hr class=""></li>
                <li><a class="" href="message.php">Message</a></li>
            </ul>
		      </div> -->
        <!--End Contact Information-->
	  </div>
    <!--End Column 1-->

    <!--Column 2-->
    <div class="col-lg-9">
      <!--Employer Profile Details-->	
      <div class="card employee-details" style="padding:20px 20px 5px 20px;margin-top:20px">
        <div class="panel panel-primary">
          <div class="panel-heading">
          <h3>Employee Profile Details</h3>
        </div>
      </div>
      <div class="row">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4>Personal Information</h4>
          </div>
          <div class="col">
            <div class="panel-body">
              <h5>Full name: </h5><p><?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?></p>
              <h5>Gender: </h5><p><?php echo $Gender; ?> </p>
              <!-- <h5>Age: </h5><p><?php echo $Age; ?></p> -->
              <h5>Date of Birth: </h5><p><?php echo $date; ?></p>
            </div>
          </div> 
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4>Contact Information</h4>
            </div>
            <div class="col">
              <div class="panel-body">
                <h5>Email: </h5><p><?php echo $Email; ?> </p>
                <h5>Mobile number: </h5><p><?php echo $mnumber; ?></p>  
              </div>
            </div>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4>Address</h4>
              </div>
              <div class="col">
              <div class="panel-body">
                <h5>Email: </h5><p><?php echo $Email; ?> </p>
                <h5>Mobile number: </h5><p><?php echo $mnumber; ?></p>  
              </div>
            </div>
            <div class="panel panel-primary">
              <div class="panel-body">
                <h5>Valid ID:<a class="btn btn-sm id-certificate" href="#" data-toggle="modal" data-target="#show">
                <i class="far fa-id-card"></i> Show Valid ID</a></h5>
                <h5>NC Certificate: <a class="btn btn-sm id-certificate" href="#" data-toggle="modal" data-target="#edit">
                <i class="far fa-id-card"></i> Show Certificate</a></h5>
                
              </div>
            </div> 
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4>Add Certificate</h4>
              </div>
              <div class="col">
                <div class="panel-body">
                  <h5>NC Certificate: <a class="btn btn-sm id-certificate" href="#" data-toggle="modal" data-target="#add">
                  <i class="far fa-id-card"></i> Add Certificate</a></h5>
                </div>
              </div>
            </div>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h4>Account</h4>
              </div>
              <div class="col">
                <div class="panel-body">
                  <h5>Username: </h5><p><?php echo $username; ?></p>
                </div>
              </div>
              <!-- <div class="panel-body"><h5>Password: <?php echo $password; ?></h5></div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End Employer Profile Details-->
  </div>
  <div class="col">
    <!--  Enployer Profile Details 12312 -->
    <div class="card current-jobfferings" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3>My Posted Jobs</h3></div>
			</div>
			<div class="panel panel-primary">
			  <!-- <div class="panel-heading">Current Job Offerings</div> -->
			  <div class="panel-body">
                  <table style="width:100%">
                      <tr>
                          <th>Job Id</th>
                          <th>Title</th>
                      </tr>
                      <?php 
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                               

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Nothing to show</td></tr>";
                        }

                       ?>
                  </table>
              </h4></div>
			</div>
			<!-- <div class="panel panel-primary">
			  <div class="panel-heading"><h3>Previous Job Offerings</h3></div>
			  <div class="panel-body">
                  <table style="width:100%">
                      <tr>
                          <th>Job Id</th>
                          <th>Title</th>
                          
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer WHERE e_username='$username' and valid=0 ORDER BY deadline DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                               

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Nothing to show</td></tr>";
                        }

                       ?>
                  </table>
              </h4></div>
			</div> -->


			<div class="panel panel-primary">
			  <div class="panel-heading"><h3>Current Work</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <th>Job Id</th>
                         <th>Title</th>
                          <th>Employer</th>
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.e_username='$username' AND selected.valid=1 ORDER BY job_offer.deadline DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $f_username=$row["f_username"];
                               

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    </form>
                                    <form action="employerProfile.php" method="post">
                                    <input type="hidden" name="f_user" value="'.$f_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                                    
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Nothing to show</td></tr>";
                        }

                       ?>
                  </table>
              </h4></div>
			</div>

      <div class="panel panel-primary">
			  <div class="panel-heading"><h3>Current Hired</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <th>Job Id</th>
                          <th>Title</th>
                          <th>Employer</th>
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.f_username='$username' AND selected.valid=1 ORDER BY job_offer.deadline DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $e_username=$row["e_username"];
                               

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    </form>
                                    <form action="viewEmployer.php" method="post">
                                    <input type="hidden" name="e_user" value="'.$e_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$e_username.'"></td>
                                   
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Nothing to show</td></tr>";
                        }

                       ?>
                  </table>
              </h4></div>
      
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3>Previous Works</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                        <th>Job Id</th>
                        <th>Title</th>
                        <th>Employer</th>
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.e_username='$username' AND selected.valid=0 ORDER BY job_offer.deadline DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $f_username=$row["f_username"];
                                

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    </form>
                                    <form action="employerProfile.php" method="post">
                                    <input type="hidden" name="f_user" value="'.$f_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                                    
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Nothing to show</td></tr>";
                        }

                       ?>
                  </table>
            </div>
			</div>
		</div>
            <!-- End  Enployer Profile Details 12312 -->
</div>
	</div>
<!--End Column 2-->
<!-- column job information -->

<!-- End column job information -->


</div>
</div>
<!--End main body-->



<div id="show" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <h5><i class="fa fa-user-lock"></i> Valid ID</h5>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left">Full Name</label>
                                       <img src="asset/img/<?php echo $validID; ?>" alt="Valid ID" style="width: 350px">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <h5><i class="fa fa-user-lock"></i> Certificate</h5>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label class="float-left"><?php echo $NC; ?>: </label>
                                       <img src="asset/img/<?php echo $NC; ?>" alt="Certificate" style="width: 350px">
                                       <?php 
                                      $sql = "SELECT * FROM addcertificate WHERE c_username='$username'";
                                      $result = mysqli_query($conn, $sql);
                                      while ($row = mysqli_fetch_array($result)) {
                                          $title=$row["title"];
                                          $Certificate=$row["Certificate"];?>
                                       <img src="asset/img/<?php echo $row["Certificate"]; ?>" alt="Certificate" style="width: 350px">
                                       <label class="float-left"><?php echo $row["title"]; ?>: </label>
                                       <?php } ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>




      <div id="add" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <h5><i class="fa fa-user-lock"></i> Valid ID</h5>
                              </div>
                                <div class="form-group text-center" >
                                    <span class="img-div">
                                       <div class="text-center img-placeholder"  onClick="triggerClick()">
                                             <h4>Upload image</h4>
                                       </div>
                                       <img src="asset/img/beard.png" onClick="triggerClick()" id="profileDisplay" style="width: 200px; height: 200px" class="img " alt="profile">
                                    </span>
                                    <input type="file" name="Certificate" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" required accept='image/*' value="" >
                                    <p>Click the photo to add</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="float-left">Add title of Certificate</label>
                                       <input type="text" name="title" class="form-control" placeholder="Add title">
                                    </div>
                                 </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                         <button type="submit" name="addC" style="border: none"><a href="" class="btn btn-danger">Add</a></button>
                     
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>






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
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="sassets/js/jquery.min.js"></script>
<script src="asset/jquery/jquery.min.js"></script>
      <script src="asset/js/bootstrap.bundle.min.js"></script>
      <script src="asset/js/adminlte.js"></script>
      <!-- DataTables  & Plugins -->
      <script src="asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
</body>
</html>