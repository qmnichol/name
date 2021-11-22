<?php include('server.php');


$conn = mysqli_connect("localhost", "root", "", "service_finder");


if(isset($_POST["chckbx"])){
    
    $status=test_input($_POST["status"]);
	$id=test_input($_POST["id"]);
     
	$sql = "UPDATE selected SET statss=0 WHERE id='$id'";
    //fname='$_fname', mname='$_mname', lname='$_lname', Email='$_Email', Gender='$_Gender', Bdate='$_Bdate', mnumber='$_mnumber', address='$_address', zipcode='$_zipcode', city='$_city', province='$_province'
	
	// $result = $conn->query($sql);
	// if($result==true){
	// 	header("location: employeeProfile.php");
	// }
    $query_run = mysqli_query($conn, $sql);
    if($query_run)
    {
        echo '<script> alert("Message Read")</script>';
        header('Location: employeeProfile.php');
    }
    else
    {
        echo '<script> alert("cant rErasd")</script>';
    }
}


?>