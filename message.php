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

$sql = "SELECT * FROM message WHERE receiver='$username' ORDER BY timestamp DESC";
$result = $conn->query($sql);
$f=0;

if(isset($_POST["sr"])){
	$t=$_POST["sr"];
	$sql = "SELECT * FROM employe WHERE username='$t'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$_SESSION["f_user"]=$t;
		header("location: viewFreelancer.php");
	} else {
	    $sql = "SELECT * FROM employer WHERE username='$t'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$_SESSION["e_user"]=$t;
			header("location: viewEmployer.php");
		}
	}
}

if(isset($_POST["s_inbox"])){
	$t=$_POST["s_inbox"];
	$sql = "SELECT * FROM message WHERE receiver='$username' and sender='$t' ORDER BY timestamp DESC";
	$result = $conn->query($sql);
	$f=0;
}

if(isset($_POST["s_sm"])){
	$t=$_POST["s_sm"];
	$sql = "SELECT * FROM message WHERE sender='$username' and receiver='$t' ORDER BY timestamp DESC";
	$result = $conn->query($sql);
	$f=1;
}

if(isset($_POST["inbox"])){
	$sql = "SELECT * FROM message WHERE receiver='$username' ORDER BY timestamp DESC";
	$result = $conn->query($sql);
	$f=0;
}

if(isset($_POST["sm"])){
	$sql = "SELECT * FROM message WHERE sender='$username' ORDER BY timestamp DESC";
	$result = $conn->query($sql);
	$f=1;
}

if(isset($_POST["rep"])){
	$_SESSION["msgRcv"]=$_POST["rep"];
	header("location: sendMessage.php");
}


// =================================================
if (isset($_POST["chckbx"])) {
    $status=test_input($_POST["status"]);

    $sql = "UPDATE message SET status = 1 WHERE id = $id ";

    $result = $conn->query($sql);
	if($result==true){
		header("location: message.php");
	}
}


if(isset($_POST["chck"])){
	$_SESSION["status"]=$_POST["chck"];
	header("location: $linkPro ");
}
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
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
	body{padding-top: 3%;margin: 0;font-family: 'Kanit', sans-serif;}
	.card{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background:#fff}
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
/* notification */
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
    <a class="navbar-brand logo" href="<?php echo $linkPro ?>"> <img src="image/logo.png" height="75" alt="Logo"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav ml-auto">
      
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
      <ul class="dropdown-menu dropdown" aria-labelledby="navbarDropdown"><span class="badge bg-primary" id="count1">1</span>
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
<div style="padding:2% 3% 1% 3%;">
<div class="row">

<!--Column 1-->
	<div class="col-lg-9">

<!--Freelancer Profile Details-->	
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h3>All Messages</h3></div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>Message</td>
                          <td>Username</td>
                      </tr>
                      <?php
                      	if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						        $sender=$row["sender"];
						        $receiver=$row["receiver"];
						        $msg=$row["msg"];
						        $timestamp=$row["timestamp"];
								$id=$row["id"];
								$status=$row["status"];

						        if ($f==0) {
						        	$sr=$sender;
						        }else{
						        	$sr=$receiver;
						        }

							


                                echo '
                                <form action="message.php" method="post">
                                <input type="hidden" name="sr" value="'.$sr.'">
								<input type="hidden" name="id" value="'.$id.'">
								<input type="hidden" name="status" value="'.$status.'">
                                    <tr>
										<td>'.$msg.'</td>
										<td><input type="submit" class="btn btn-link btn-lg" value="'.$sr.'"></td>
										</form>
										<form action="message.php" method="post">
										<input type="hidden" name="rep" value="'.$sr.'">
										<td><input type="submit" class="btn btn-link btn-lg" value="Reply"></td>
										<td>'.$timestamp.'</td>
										</form>
										<form action="status.php" method="post">
										<input type="hidden" name="id" value="'.$id.'">
										<td><input type="submit" name="chckbx" id="rd" value="Read"></td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
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


<!--Column 2-->
	<div class="col-lg-3">

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<form action="message.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_inbox">
				  <center><button type="submit" class="btn btn-info">Search Inbox</button></center>
				</div>
	        </form>

	        <form action="message.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_sm">
				  <center><button type="submit" class="btn btn-info">Search Sent Messages</button></center>
				</div>
	        </form>

	        <form action="message.php" method="post">
				<div class="form-group">
				  <center><button type="submit" name="inbox" class="btn btn-warning">Inbox Messages</button></center>
				</div>
	        </form>

	        <form action="message.php" method="post">
				<div class="form-group">
				  <center><button type="submit" name="sm" class="btn btn-warning">Sent Messages</button></center>
				</div>
	        </form>

	        <p></p>
	    </div>
<!--End Main profile card-->

	</div>
<!--End Column 2-->

</div>
</div>
<!--End main body-->


<!--Footer-->
<!--End Footer-->


<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="sassets/js/jquery.min.js"></script>

<?php 
 if($username==$id && $status==1){
 	echo "<script>
 		        $('#rd').hide();
 		</script>";
 } 
?>
</body>
</html>