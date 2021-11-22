<?php include "../server.php";


if(isset($_POST["approve"])){
	
    $username=$_POST["username"];
    $password=$_POST["password"];
     $profilepic=$_POST["profilepic"];
     $fname=$_POST["fname"];
     $mname=$_POST["mname"];
     $lname=$_POST["lname"];
     $Email=$_POST["Email"];
     $Gender=$_POST["Gender"];
     $Age=$_POST["Age"];
     $Bdate=$_POST["Bdate"];
     $mnumber=$_POST["mnumber"];
     $address=$_POST["address"];
     $zipcode=$_POST["zipcode"];
     $city=$_POST["city"];
     $province=$_POST["province"];
     $validID=$_POST["validID"];
     $NC=$_POST["NC"];
     $skill=$_POST["skill"];



   $sql = "INSERT INTO employer (username, password, profilepic, fname, mname, lname, Email, Gender, Age, Bdate, mnumber, address, zipcode, city, province, validID, NC, skill) VALUES ('$username', '$password', '$profilepic', '$fname', '$mname', '$lname', '$Email', '$Gender', '$Age', '$Bdate', '$mnumber', '$address', '$zipcode', '$city', '$province', '$validID', '$NC', '$skill')";
   $result = $conn->query($sql);
   if($result==true){
       
       $accountid = $_GET['id'];
       $sql = "DELETE FROM employerr WHERE id='$accountid'";
       $result = $conn->query($sql);
       echo '<script> alert("User Approved")</script>';
       header("location: user.php");
       include "ServiceProvider.php";
       }
       else
   {
       echo '<script> alert("Certificate is not added")</script>';
   }

}
if (isset($_POST["Delete"])) {
    $accountid = $_GET["id"];
    $connection = mysqli_connect("localhost", "root", "", "service_finder");

    $sql = "DELETE FROM employerr WHERE id = $accountid";

    if (mysqli_query($connection, $sql)) {
        $success_delete = true;
        echo '<script> alert("User Approved")</script>';
        include "sendsms1.php";
        header("location: ServiceProvider.php");
        
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
	<title>Approved</title>
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
                <h1><strong><center>Employee Registration Form</center></strong></h1>
                <?php
               
            //    if (isset($_POST["create_submit"])) {
            //        $username = $_POST["username"];
            //        $password = $_POST["password"];

            //        $connection = mysqli_connect("localhost", "root", "", "foodmain_db");
            //        $sql = "INSERT INTO employee (username, password) VALUES('$username', '$password')";
            //        if (mysqli_query($connection, $sql)) {
                       
            //         $sql = "DELETE FROM employe WHERE id='$id'";
            //         $result = $conn->query($sql);
            //         echo '<script> alert("User Approved")</script>';
            //         header("location: user.php");
            //        }
            //        else
            //        {
            //            echo '<script> alert("Certificate is not added")</script>';
            //        }
            //    }
              
                ?>
                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" class="form-horizontal">
    
                    <div class="col-md-12">
                    <?php
                            // retrieve
                            $accountid = $_GET["id"];
                            $connection = mysqli_connect("localhost", "root", "", "service_finder");
                            $sql = "SELECT * FROM employerr WHERE id = $accountid";
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
                                            <input type="text" class="form-control" name="Gender"  required="require" value="<?php echo $row['Gender']; ?>">
                                        </div>
                                    </div>

                                   

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

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Skill</label>
                                            <input type="text" class="form-control" name="skill" required="require" value="<?php echo $row['skill']; ?>">
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
                                            <span class="fa fa-key"> Valid ID <small>(National ID, Brgy ID, Student ID)</span>
                                        </div>
                                        <div class="form-group">
                                        <input type="text" class="form-control" name="validID" required="require" value="<?php echo $row['validID']; ?>">
                                        <img src="../asset/img/<?php echo $row['validID']; ?>"  value="<?php echo $row['validID']; ?>" alt="" height="200" width="200"style="">
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="card-header">
                                            <span class="fa fa-key"> Certificate <small>(National ID, Brgy ID, Student ID)</span>
                                        </div>
                                        <div class="form-group">
                                       
                                        <input type="text" class="form-control" name="NC" required="require" value="<?php echo $row['NC']; ?>">
                                        <img src="../asset/img/<?php echo $row['NC']; ?>"  value="<?php echo $row['NC']; ?>" alt="" height="200" width="200"style="">
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
                                           
                                            <button type="submit" name="approve" class="btn btn-info btn-lg">Register</button>
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