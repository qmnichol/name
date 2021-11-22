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

if(isset($_POST["jid"])){
	$_SESSION["job_id"]=$_POST["jid"];
	header("location: jobDetails.php");
}

$sql = "SELECT * FROM job_offer WHERE valid=1 and e_username='$username'"; //ORDER BY timestamp DESC
$result = $conn->query($sql);
if(isset($_POST["s_title"])){
	$t=$_POST["s_title"];
	$sql = "SELECT * FROM job_offer WHERE title='$t' OR type='$t' OR e_username='$t' and valid=1";
	$result = $conn->query($sql);
}else{
  echo "";

}


if(isset($_POST["recentJob"])){
	$sql = "SELECT * FROM job_offer WHERE valid=1 ORDER BY timestamp DESC"; //ORDER BY timestamp DESC
	$result = $conn->query($sql);
}

if(isset($_POST["oldJob"])){
	$sql = "SELECT * FROM job_offer WHERE valid=1";
	$result = $conn->query($sql);
}

if($action='removeday')
{
  $sql = "UPDATE * FROM job_offer WHERE stat=0"; //ORDER BY timestamp DESC
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


.main {
  display: grid;
    grid-template-columns: repeat(4, 1fr);
}

    .card-blue{
        margin-top: 100px;
    width: 90%;
    display: inline-block;
    box-shadow: 2px 2px 20px black;
    border-radius: 5px; 
    margin: 2%;
   }

.image img{
  width: 50%;
  display: flex;
  margin-left: auto;
  margin-right: auto;
}

.title{

 text-align: center;
 padding: 10px;
 
}

h1{
 font-size: 20px;
}

.dex{
 padding: 3px;
 text-align: center;

 padding-top: 10px;
       border-bottom-right-radius: 5px;
 border-bottom-left-radius: 5px;
}


/* input.form-control {
  position: relative;
} */
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
/* notification */
#count{
  border-radius: 50%;
  position: relative;
  top: -10px;
  left: -10px;

}


#count{
  border-radius: 50%;
  position: relative;
  top: -10px;
  left: -10px;

}
</style>

  </head>
<body>
<!--Navbar menu-->
<!-- <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-light portfolio-navbar gradient py-0" id="nav">
        <div class="container"><a class="navbar-brand logo" href="<?php echo $linkPro; ?>"><img src="image/logo.png" height="75" alt="Logo"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                  <form class="search" action="allJob.php" method="post">
				            <div class="form-group search">
				              <input type="text" name="s_title" placeholder="Search">
				              <button type="submit" class="search-icon"><i class="fa fa-search"></i></button>
				            </div>
	                </form>
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="allJob.php">Offer Services</a></li>
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
                    <li><a class="dropdown-item" href="<?php echo $linkPro; ?>">Profile</a></li>
                    <li><a class="dropdown-item" href="<?php echo $linkEditPro; ?>">Edit Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                  </li>
                </ul>
            </div>
        </div>
    </nav>     -->
<!--End Navbar menu-->
<div class="main" >
  <?php 
    if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
              $job_id=$row["job_id"];
              $title=$row["title"];
              $type=$row["type"];
              $picture=$row["picture"];
              $budget=$row["budget"];
              $f_name=$row["f_name"];
              $m_name=$row["m_name"];
              $l_name=$row["l_name"];
              $e_username=$row["e_username"];
              
              $JOBID=$job_id;
                      
              
              $sql_get = mysqli_query($conn,"SELECT * FROM apply WHERE fuser='$username' and job_id='$JOBID'");
              $count = mysqli_num_rows($sql_get);
              
              echo '
  
              <form action="allJob.php" method="POST">
                <div class="card card-blue" style="margin-top: 100px;">
                  <div class="image">
                    <img src="asset/img/'.$picture.'">
                  </div>
                  <div class="title">
                      <input type="hidden" name="jid" value="'.$job_id.'">
                          <h1>'.$f_name.' '.$m_name.'. '.$l_name.'</h1>
                          <h5>'.$e_username.'</h5>
                          <div class="stars">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star-half-o"></i>
                              <i class="fa fa-star-o"></i>
                          </div>
                      </div>
                      <div class="dex">
                          <p>'.$title.'</p>
                          <p>'.$type.'</p> 
                         
                          <button type="submit" class="btn btn-link btn-lg" onclick="removeday()" value="'.$title.'">View</button><span class="badge bg-primary" id="count">'.$count.'</span>
                          
                      </div>
              </div>
            </form>
            
              ';

              }
      } else {
          echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
      }

      ?>
                        
</div>
<!--End Column 1-->
                            
<!--Column 2-->
<h1> <p><?php echo $errorMsg; ?></p></h1>

  </div>
</div>
<!--End main body-->



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