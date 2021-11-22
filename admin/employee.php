<?php include "../server.php";

 if(isset($_POST["approve"])){
	
    $username=test_input($_POST["username"]);
 	$password=test_input($_POST["password"]);
 	$profilepic=test_input($_POST["profilepic"]);
 	$fname=test_input($_POST["fname"]);
 	$mname=test_input($_POST["mname"]);
 	$lname=test_input($_POST["lname"]);
 	$Email=test_input($_POST["Email"]);
 	$Gender=test_input($_POST["Gender"]);
 	$Age=test_input($_POST["Age"]);
 	$Bdate=test_input($_POST["Bdate"]);
 	$mnumber=test_input($_POST["mnumber"]);
 	$address=test_input($_POST["address"]);
 	$zipcode=test_input($_POST["zipcode"]);
 	$city=test_input($_POST["city"]);
 	$province=test_input($_POST["province"]);
 	$validID=test_input($_POST["validID"]);
// 	// $NC=test_input($_POST["NC"]);

 	$sql = "INSERT INTO employe (username, password, profilepic, fname, mname, lname, Email, Gender, Age, Bdate, mnumber, address, city, province, zipcode, validID) VALUES ('$username', '$password', '$profilepic','$fname',, '$mname', '$lname', '$Email', '$Gender', '$Age', '$Bdate', '$mnumber', '$address', '$zipcode', '$city', '$province', '$validID')";
    
     $result = $conn->query($sql);
     if($result==true){
     	$sql = "DELETE FROM employee WHERE id='$username'";
 		$result = $conn->query($sql);
 		}
         else
         {
             echo '<script> alert("Certificate is not added")</script>';
         }
     }

?>
<!DOCTYPE html>
<html>
<head>
<title>Load content Dynamically in Bootstrap Modal with Jquery AJAX PHP and Mysql</title>

<link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<style>
    body {
        padding-top: 3%;
        margin: 0;
        font-family: 'Kanit', sans-serif;
    }
    tbody td {
      font-size: 18px;
    }
</style>


</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-light" style="background-color: rgb(63,206,164)">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="user.php" role="button"><i class="">Home</i></a>
                </li>
            </ul> 

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                </li>
            </ul>
        </nav>
    </div>
    <aside class="main-sidebar sidebar-light-primary">
            <!-- Brand Logo -->
            <a href="index.html" class="brand-link">
            <img src="../image/logo.png" alt="Logo" width="200" >
         </a>
         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  
                  
                  <li class="nav-item">
                     <a href="user.php" class="nav-link">
                        <i class="fa fa-users"></i>
                        <p>
                           Customer
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="ServiceProvider.php" class="nav-link">
                        <i class="fa fa-hand-holding-heart"></i>
                        <p>
                           Service Provider
                        </p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="ServicePosted.php" class="nav-link">
                        <i class="fa fa-handshake"></i>
                        <p>
                           Service Posted
                        </p>
                     </a>
                  </li>

                  <li class="nav-item">
                     <a href="employee.php" class="nav-link">
                        <i class="fa fa-handshake"></i>
                        <p>
                           Employee
                        </p>
                     </a>
                  </li>

                  <li class="nav-item">
                     <a href="employer.php" class="nav-link">
                        <i class="fa fa-handshake"></i>
                        <p>
                           Employer
                        </p>
                     </a>
                  </li>
                  
                  <li class="nav-item">
                     <a href="#" class="nav-link">
                        <i class="fa fa-chart-bar"></i>
                        <p>
                           Reports
                        </p>
                        <i class="right fas fa-angle-left"></i>
                     </a>
                     <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                           <a href="jobs-report.html" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Jobs</p>
                           </a>
                        </li>
                        <li class="nav-item">
                           <a href="job-completed-report.html" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>Jobs Completed</p>
                           </a>
                        </li>
                     </ul>
                  </li>

               </ul>
            </nav>
         </div>
         </aside>

         <div class="content-wrapper">
             <div class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><i class="fa fa-users"></i> Customer Accounts</h1>
                        </div>
                     </div>
                 </div>
             </div>

             <section class="content">
                <div class="container-fluid">
                    <div class="card card-info">
                        <br>
                        <div class="col-md-12">
                            <table id="example2" class="table table-bordered">
                   
                        <?php 
                
                $query = "SELECT * FROM employer";
                
                $result = mysqli_query($conn,$query);

                
                

            ?>
            <thead style="background-color: rgb(48, 247, 187);">
                        <tr>
                           <th>ID</th>
                            <th width="60">Photo</th>
                            <th>Full name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Birthdate</th>
                            <th>Zipcode</th>
                            <th>Username</th>
                        </tr>
                        </thead> 
                        <?php while($row = mysqli_fetch_array($result)){ 
                           $mname=$row["mname"];
                           $address=$row["address"];
                           $Bdate=$row["Bdate"];
                           $fletter = $mname [0];
                           $date = date("M d, Y",strtotime($Bdate));
                           ?>
                            <tr>
                               
                                <td><img src="../asset/img/<?php echo $row['profilepic']; ?>" height="100" width="100"/></td>
                                <td><?php echo $row['fname']; ?> <?php echo $fletter; ?> <?php echo $row['lname']; ?></td>
                                <td><?php echo $row['address']; ?>, <?php echo $row['city']; ?>, <?php echo $row['province']; ?></td>
                                <td><?php echo $row['Email']; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $row['zipcode']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><a href="<?php echo "employeUpdate.php?id=" . $row["id"];  ?>" class="btn-sm btn-primary" target="_blank">Update</a>
                                </td>                
                                <!-- data-toggle="modal" data-target="#profile" -->
                            </tr>
                        
                                </tbody>
                                <?php } ?>
                    </div>
                </div>
             </section> 

         </div>

            
        </div>

        

        <!-- <script src="../asset/jquery/jquery.min.js"></script> -->
      <!-- <script src="../asset/js/bootstrap.bundle.min.js"></script> -->
      <!-- <script src="../asset/js/adminlte.js"></script> -->
      <!-- DataTables  & Plugins -->


      <script src="../assets/popper.min.js"></script>
      <!--<script src="../assets/jquery.min.js"></script> 
       <script src="../assets/bootstrap.min.js"></script>-->

      <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script>
         $(function () {
           $("#example1").DataTable();
         });
         $(function () {
           $("#example2").DataTable();
         });
         
      </script>
    </body>
</html>