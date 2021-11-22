<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
	$username="";
	//header("location: index.php");
}

if(isset($_POST["jid"])){
	$_SESSION["id"]=$_POST["jid"];
	header("location: jobDetails.php");
}

if(isset($_POST["e_user"])){
	$_SESSION["e_user"]=$_POST["e_user"];
	header("location: viewEmployer.php");
}


$sql = "SELECT * FROM employe WHERE username='$username' ";
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


if (isset($_POST["chckbx"])) {
  $status=test_input($_POST["statss"]);

  $sql = "UPDATE selected SET statss = 0 WHERE id = $id AND f_username='$username' ";

  $result = $conn->query($sql);
if($result==true){
  header("location: amployeeProfile.php");
}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee profile</title>
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
	.card-employeedetails {
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
.card-employeedetails h5 {
  position: relative;
}
.current-jobworks h3 {
    font-weight: 600;
  }
  .current-jobworks th {
    font-weight: 400;
    font-size: 25px;
  }
  .current-jobworks td {
    font-weight: normal;
    font-size: 20px;
  }
    .employer-details h3 {
        font-weight: 700;
    }
    .employer-details h4 {
      font-weight: 600;
    }
    .employer-details h5 {
      font-weight: 500;
    }
    .employer-details p {
      font-weight: 400;
    }
    .valid-id {
      background: rgb(116, 156, 143);
    color: #fff;
    margin-left: 20px;
    }
    #count{
  border-radius: 50%;
  position: relative;
  top: -10px;
  left: -10px;

}
#count1{
  border-radius: 50%;
  position: relative;
  top: -10px;
  left: -10px;

}
</style>

</head>
<body>
<!--Navbar menu-->
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-light portfolio-navbar gradient py-0" id="nav">
  <div class="container">
    <a class="navbar-brand logo" href="employeeProfile.php"> <img src="image/logo.png" height="75" alt="Logo"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav ml-auto">
      <form class="search" action="NewAllJob.php" method="post">
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

      <?php 
        $sql_get = mysqli_query($conn,"SELECT * FROM selected WHERE f_username='$username' AND valid=1 AND statss=1");
        $count1 = mysqli_num_rows($sql_get);

      ?>
      <li class="nav-item" role="presentation"><a class="nav-link" href="#" data-toggle="modal" data-target="#notification"><i class="fas fa-bell"></i> <span class="badge bg-primary" id="count1"><?php echo $count1; ?></span></a> </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-user-circle fa-lg"></i>
      </a>
      <ul class="dropdown-menu dropdown" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="employeeProfile.php">Profile</a></li>
        <li><a class="dropdown-item" href="editEmployee1.php">Edit Profile</a></li>
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
<div style="padding:3% 3% 2% 3%; ">
	<div class="row" >
	  <!--Column 1-->
	  <div class="col-lg-3" >
	    <!--Main profile card-->
		  <div class="card employer-details" style="padding:20px 20px 5px 20px;margin-top:20px">
			  <p></p>
			  <img src="asset/img/<?php echo $profilepic ?>">
			  <h3><?php echo $fname ?>, <?php echo $lname; ?></h3>
			  <p><span class="fas fa-user"></span> <?php echo $username; ?></p>
	    </div>
		    <!--End Main profile card-->
	      <!--Contact Information-->
		      <!-- <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
            <ul class="nav navbar-nav">
                <li><a class="" href="editEmployee.php">Edit Profile</a></li>
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
		  <div class="card-employeedetails" style="padding:20px 20px 5px 20px;margin-top:20px">
			  <div class="panel panel-primary">
			    <div class="panel-heading"><h3>Employer Profile Details</h3></div>
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
                <!-- <h5>Age: </h5><p><?php echo $Age; ?> </p> -->
                <h5>Date of Birth: </h5><p><?php echo $date; ?> </p>
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
            </div>
            <div class="panel panel-primary">
			        <div class="panel-heading">
                <h4>Address</h4>
              </div>
			        <div class="col">
                <div class="panel-body">
                  <h5>Address: </h5><p><?php echo $address; ?>, <?php echo $city; ?>, <?php echo $province; ?> </p>
                  <h5>Zip Code: </h5><p><?php echo $zipcode; ?></p>
                </div>
              </div>
            </div>
            <div class="panel panel-primary">
			        <div class="panel-heading">
                <h4>Account</h4>
              </div>
			        <div class="col">
                <div class="panel-body">
                  <h5>Username: </h5><p><?php echo $username; ?> </p>
                  <!-- <div class="panel-body"><h5>Password: <?php echo $password; ?></h5></div> -->
                </div>
              </div> 
            </div>
            <div class="panel panel-primary">
			        <div class="col">
                <div class="panel-body">
                  <h5>Valid ID:<a class="btn btn-sm valid-id" href="#" data-toggle="modal" data-target="#edit">
                  <i class="far fa-id-card"></i> Show Valid ID</a></h5>
                </div>
              </div> 
            </div>
          </div>
		    </div>
      </div>
      <!--End Employer Profile Details-->
      <!--Start  column 3 -->
  </div>
  <div class="col">
  <!--Freelancer Profile Details-->	
  <div class="card current-jobworks" style="padding:20px 20px 5px 20px;margin-top:20px">
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
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3>Previous Hired</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <th>Job Id</th>
                          <th>Title</th>
                          <th>Employer</th>
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.f_username='$username' AND selected.valid=0 ORDER BY job_offer.deadline DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $e_username=$row["e_username"];
                               

                                echo '
                                <form action="employeeProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    </form>
                                    <form action="employeeProfile.php" method="post">
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
			</div>
		</div>
  <!--End Freelancer Profile Details-->
</div>
<!--end  column 3 -->
	</div>
<!--End Column 2-->

</div>

</div>
</div>
<!--End main body-->

<div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
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
                                       <img src="asset/img/<?php echo $validID; ?>" alt="Valid ID" style="width: 350px">
                                    </div>
                                 </div>
                                 
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>



      <div id="notification" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form>
                     <div class="card-body">
                        <div class="row">
                        <?php 
                          $sql_get = mysqli_query($conn,"SELECT * FROM selected WHERE f_username='$username' and valid=1");
                          $count1 = mysqli_num_rows($sql_get);

                        ?>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       

                       
                <table style="width:100%">
                      <tr>
                          <th>Message</th>
                          <!-- <th>Action</th>
                          <th>hello</th> -->
                          
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
                                $statss=$row["statss"];
                               ?>
                                
                                  <tr>
                                    <td> <h5>Your are accepted by user: <?php echo $row['e_username']; ?> on Job title: <?php echo $row['title']; ?> </h5></td>
                                    <form action="employeeProfile.php" method="POST">
                                    <!-- <input type="text" name="num2" value="<?php echo $row['job_id']; ?>">
                                    <input type="text" name="num1" value="0"> -->

                                    <!-- <td><a  class="btn-sm btn-primary" name="notifbtn" target="_blank"><i class="fas fa-times"></i></a></td> -->
                                    <!-- <td><button type="submit" name="notifbtn" class="btn btn-info btn-lg"><i class="fas fa-times"></i></button></td> -->

                                  
                                  <?php
                                 echo '
                                 <form action="employeeProfile.php" method="post">
                                <input type="hidden" name="id" value="'.$id.'">
                                <input type="hidden" name="status" value="'.$status.'">
                                <tr>

                                    </form>
                                    <form action="employeeProfile.php" method="post">
                                    
                                    <td> <h5>Your are accepted by user: '.$e_username.' on Job title: '.$title.' ?> </h5></td>
                                    </form>
                                    <form action="employeeProfile.php" method="post">
                                    <input type="hidden" name="id" value="'.$id.'">
                                    <td><input type="submit" name="chckbx" id="rd" value="X"></td>
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
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer" style="border: none; background-color: white">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
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