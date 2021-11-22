<?php include "../server.php";

if(isset($_POST["SaveChanges"])){
    $username=test_input($_POST["username"]);
    $password=test_input($_POST["password"]);
    $profilepic=test_input($_POST["profilepic"]);
	$fname=test_input($_POST["fname"]);
    $mname=test_input($_POST["mname"]);
    $lname=test_input($_POST["lname"]);
	$Email=test_input($_POST["Email"]);
    $Gender=test_input($_POST["Gender"]);
    $Bdate=test_input($_POST["Bdate"]);
	$mnumber=test_input($_POST["mnumber"]);
	$address=test_input($_POST["address"]);
    $zipcode=test_input($_POST["zipcode"]);
    $city=test_input($_POST["city"]);
    $province=test_input($_POST["province"]);
	$validID=test_input($_POST["validID"]);
    
	
     


	$sql = "UPDATE employe SET username='$username', password='$password', profilepic='$profilepic', fname='$fname', mname='$mname', lname='$lname', Email='$Email', Gender='$Gender', Bdate='$Bdate', mnumber='$mnumber', address='$address', zipcode='$zipcode', city='$city', province='$province', validID='$validID' WHERE username='$username'";
    //fname='$_fname', mname='$_mname', lname='$_lname', Email='$_Email', Gender='$_Gender', Bdate='$_Bdate', mnumber='$_mnumber', address='$_address', zipcode='$_zipcode', city='$_city', province='$_province'
	
	$result = $conn->query($sql);
	if($result==true){
		header("location: employer.php");
	}
}


if (isset($_POST["Delete"])) {
    $accountid = $_GET["id"];
    $connection = mysqli_connect("localhost", "root", "", "service_finder");

    $sql = "DELETE FROM employe WHERE id = $accountid";

    if (mysqli_query($connection, $sql)) {
        $success_delete = true;
        echo '<script> alert("User Approved")</script>';
        
        header("location: employer.php");
    }
    else
    {
        echo '<script> alert("Error Delete!")</script>';
    }
}


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee Update</title>
	<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/mystyle.css">
</head>
<body>
	

<div class="login-box" style="margin-top: 100px;">
    <section class="content">
        <div class="container">
            <!-- card -->
            <div class="card">
                <div class="X" >
                    <li class="nav" style="float: right; padding-right:10px"><a href="user.php"><span class="fa fa-times" style="color: black;"></span></a></li>
                </div>
                <h1><strong><center>Employee Update information</center></strong></h1>
               
                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" class="form-horizontal">
    
                    <div class="col-md-12">
                    <?php
                            // retrieve
                            $accountid = $_GET["id"];
                            $connection = mysqli_connect("localhost", "root", "", "service_finder");
                            $sql = "SELECT * FROM employe WHERE id = $accountid";
                            $result = mysqli_query($connection, $sql);
                            $row = mysqli_fetch_assoc($result);

                            // $Bdate=$row["Bdate"];
                            // $date = date("M d, Y",strtotime($Bdate));
                            ?>
                        <div class="row">

                            <!-- Profile Picture -->
                            <div class="col-md-3">
                                <div class="form-group">
                                        <label class="float-left">Profile picture </label>
                                        <br>
                                        <img src="../asset/img/<?php echo $row['profilepic']; ?>" name="" value="<?php echo $row['profilepic']; ?>" alt="" height="200" width="200"style="">
                                        <input style="display:none" type="text" name="profilepic" value="<?php echo $row['profilepic']; ?>" id="">
                                </div>
                            </div>
                            <!-- End Profile Picture -->


                            <!-- Registraion Form -->
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" class="form-control" name="fname" placeholder="first name" required="require" value="<?php echo $row['fname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Middle Name</label>
                                            <input type="text" class="form-control" name="mname" placeholder="middle name" required="require" value="<?php echo $row['mname']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" class="form-control" name="lname" placeholder="last name" required="require" value="<?php echo $row['lname']; ?>">
                                        </div>
                                    </div>

                                   
                                    
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            <input type="text" class="form-control" name="Gender" placeholder="Age" required="require" value="<?php echo $row['Gender']; ?>">
                                        </div>
                                    </div>

                                   <!-- <div class="col-sm-3">
                                      <div class="form-group">
                                         <label for="">Age</label>
                                         <input type="text" class="form-control" name="Age" placeholder="Age" required="require" value="<?php echo $row['Age']; ?>">
                                      </div>
                                   </div> -->

                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label for="">Birthday</label>
                                         <input type="date" class="form-control" name="Bdate" required="require" value="<?php echo $row['Bdate']; ?>">
                                      </div>
                                   </div>

                                   <div class="col-md-3">
                                      <div class="form-group">
                                         <label for="">Contact</label>
                                         <input type="text" class="form-control" name="mnumber" placeholder="contact" required="require" value="<?php echo $row['mnumber']; ?>">
                                      </div>
                                   </div>

                                   <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="Email" placeholder="Email" required="require" value="<?php echo $row['Email']; ?>">
                                        </div>
                                    </div>
                                   
                                    

                                    <div class="col-md-12">
                                        <div class="card-header">
                                            <label for="">Address</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="address" placeholder="Barangay" required="require" value="<?php echo $row['address']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="city" placeholder="Municipality" required="require" value="<?php echo $row['city']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="zipcode" placeholder="Zip Code" required="require" value="<?php echo $row['zipcode']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="province" placeholder="Province" required="require" value="<?php echo $row['province']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 

                                    <div class="col-md-6">
                                            <div class="card-header">
                                                <span class="fa fa-key"> Valid ID Valid ID <small>(National ID, Brgy ID, Student ID)</span>
                                            </div>
                                            <div class="form-group">
                                            <img src="../asset/img/<?php echo $row['validID']; ?>" name="validID" value="<?php echo $row['validID']; ?>" alt="" height="200" width="200"style="">
                                        </div>
                                    </div>
                                   

                                    <div class="col-md-12">
                                        <div class="card-header">
                                            <span>Account</span>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Username</label>
                                                <input type="text" class="form-control" name="username" placeholder="username" value="<?php echo $row['username']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="password" value="<?php echo $row['password']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-3">
                                           
                                            <button type="submit" name="SaveChanges" class="btn btn-info btn-lg">Update</button>
                                            <button type="submit" name="Delete" class="btn btn-info btn-lg">Remove</button>
                                        </div>
                                    </div>              
                                </div>
                            </div>
                            <!-- End Registraion Form -->
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card -->
        </div>
    </section>
</div>









	
				




<script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/bootstrap.bundle.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>
      <!-- DataTables  & Plugins -->
      <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
</body>
</html>