<?php include('server.php');

if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
	$username="";
	//header("location: index.php");
}
$conn = mysqli_connect("localhost", "root", "", "service_finder");


if(isset($_POST["UpdateProfile"])){
    
    $profilepic=test_input($_POST["profilepic"]);
	
     


	$sql = "UPDATE employe,job_offer SET profilepic='$profilepic' WHERE username='$username'";
    //fname='$_fname', mname='$_mname', lname='$_lname', Email='$_Email', Gender='$_Gender', Bdate='$_Bdate', mnumber='$_mnumber', address='$_address', zipcode='$_zipcode', city='$_city', province='$_province'
	
	// $result = $conn->query($sql);
	// if($result==true){
	// 	header("location: employeeProfile.php");
	// }
    $query_run = mysqli_query($conn, $sql);
    if($query_run)
    {
        echo '<script> alert("Certificate added")</script>';
        header('Location: employeeProfile.php');
    }
    else
    {
        echo '<script> alert("Certificate is not added")</script>';
    }
}

?>


