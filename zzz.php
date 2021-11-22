<?php
session_start();


// Create connection
$conn = new mysqli("localhost", "root", "", "service_finder");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM employerr WHERE username='$f_user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$profilepic=$row["profilepic"];
		$fname=$row["fname"];
        $lname=$row["lname"];
		$Email=$row["Email"];
		$mnumber=$row["mnumber"];
		$Gender=$row["Gender"];
		$Age=$row["Age"];
		$Bdate=$row["Bdate"];
		$address=$row["address"];
		$zipcode=$row["zipcode"];
		$city=$row["city"];
		$province=$row["province"];
		$validID=$row["validID"];
		 
	    }
} else {
    echo "0 results";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="padding:5% 3% 1% 3%;">
<div class="row">

<!--Column 1-->
	<div class="col-lg-3">

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<img src="asset/img/<?php echo $profilepic; ?>">
			<h2><?php echo $fname; ?>, <?php echo $lname; ?></h2>
			<p><span class="glyphicon glyphicon-user"></span> <?php echo $e_user; ?></p>
	        <center><a href="sendMessage.php" class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span>  Send Message</a></center>
	        <p></p>
	    </div>
<!--End Main profile card-->




	</div>
<!--End Column 1-->

<!--Column 2-->
	<div class="col-lg-7">

<!--Freelancer Profile Details-->	
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3>Employee Profile Details</h3></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading"><h4>User Information</h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h5> Name: <?php echo $fname; ?>, <?php echo $lname; ?></h5></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h5> Email: <?php echo $Email; ?></h5></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h5> Gender: <?php echo $Gender; ?></h5></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h5> Age: <?php echo $Age; ?></h5></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h5> Mobile Number: <?php echo $mnumber; ?></h5></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-body"><h5> Address: <?php echo $address; ?>, <?php echo $city; ?>,<?php echo $province; ?></h5></div>
			</div>
			
		</div>
<!--End Freelancer Profile Details-->

	</div>
<!--End Column 2-->



</div>
</div>
<!--End main body-->
</body>
</html>






$sql = "SELECT * FROM job_offer WHERE job_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	


        $jobid=$row["job_id"];

        
        }
} else {
    echo "0 results";
}





if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	// $accountid = $_GET['job_id'];
	$query = "SELECT * FROM review_table WHERE rjob_id";

	$result = $connect->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			'user_name'		=>	$row["user_name"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"])
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}