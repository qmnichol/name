<?php include "../server.php";

?>
<!DOCTYPE html>
<html>
<head>
<title>User</title>

<link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



</head>
<body class="hold-transition sidebar-mini layout-fixed">
            <!-- wrapper -->
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
      <!--end wrapper -->
      <!--Aside -->
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
      <!--End Aside -->


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
                
                $query = "SELECT * FROM employee";
                
                $result = mysqli_query($conn,$query);

                
                

            ?>
            <thead style="background-color: rgb(48, 247, 187);">
                        <tr>
                           <th>ID</th>
                            <th width="60">Photo</th>
                            <th>Full name</th>
                            <th>Email</th>
                            <th>Birthdate</th>
                            <th>Valid ID</th>
                            <th>Username</th>
                            <th>Action</th>
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
                                <td style="font-size: 30px"><?php echo $row['fname']; ?> <?php echo $fletter; ?> <?php echo $row['lname']; ?></td>
                                <td style="font-size: 30px"><?php echo $row['address']; ?>, <?php echo $row['city']; ?>, <?php echo $row['province']; ?></td>
                                <td style="font-size: 30px"><?php echo $row['Email']; ?></td>
                                <td style="font-size: 20px"><?php echo $date; ?></td>
                                <td style="font-size: 30px"><img src="../asset/img/<?php echo $row['validID']; ?>" height="100" width="100"/></td>
                                <td style="font-size: 30px"><?php echo $row['username']; ?></td>
                                <td style="font-size: 30px"><a href="<?php echo "approved.php?id=" . $row["id"];  ?>" class="btn-lg btn-primary" target="_blank">Update</a>
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