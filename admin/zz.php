<?php 
include "../server.php";
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



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
                <a class="nav-link" data-widget="pushmenu" href="index.php" role="button"><i class="">Home</i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                </li>
            </ul>
        </nav>
    </div>
    <aside class="main-sidebar sidebar-light-primary">
            <!-- Brand Logo -->
            <a href="index.html" class="brand-link">
         <img src="../asset/img/logo.png" alt="DSMS Logo" width="200" style="margin-top: -20px;margin-bottom: -50px;">
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
                                <thead style="background-color: rgb(48, 247, 187);">
                                    <tr>
                                        <th>Profile</th>
                                       <th>Full Name</th>
                                       <th>Contact</th>
                                       <th>Email</th>
                                       <th>Access Level</th>
                                       <th>Account</th>
                                       <th>Password</th>
                                       <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                
                $query = "SELECT * FROM employe";
                $result = mysqli_query($conn,$query);
            ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="60">Photo</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Salary</th>
                            <th>View</th>
                        </tr>
                        </thead> 
                        <?php while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td><img src="../asset/img/<?php echo $row['profilepic']; ?>" height="50" width="50"/></td>
                                <td><?php echo $row['fname']; ?></td>
                                <td><?php echo $row['lname']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['Age']; ?></td>
                                <td><?php echo $row['zipcode']; ?></td>
                                <td><button data-id='<?php echo $row['id']; ?>' class="userinfo btn btn-success">Info</button></td>
                            </tr>
                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
             </section> 

         </div>




<div class="container">
   <br />
   <h3 align="center">Load content Dynamically in Bootstrap Modal with Jquery AJAX PHP and Mysql</h3>
   <br>
   <div class="row">
    <div class="col-md-12">
        <div class="panel-body">
            <?php 
                
                $query = "SELECT * FROM employe";
                $result = mysqli_query($conn,$query);
            ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="60">Photo</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Salary</th>
                            <th>View</th>
                        </tr>
                        </thead> 
                        <?php while($row = mysqli_fetch_array($result)){ ?>
                            <tr>
                                <td><img src="../asset/img/<?php echo $row['profilepic']; ?>" height="50" width="50"/></td>
                                <td><?php echo $row['fname']; ?></td>
                                <td><?php echo $row['lname']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['Age']; ?></td>
                                <td><?php echo $row['zipcode']; ?></td>
                                <td><button data-id='<?php echo $row['id']; ?>' class="userinfo btn btn-success">Info</button></td>
                            </tr>
                        <?php } ?>
                </table>
            </div>
        </div>    
    </div>    
    </div>
</div>    





            <script type='text/javascript'>
            $(document).ready(function(){
                $('.userinfo').click(function(){
                    var userid = $(this).data('id');
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            $('.modal-body').html(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
            </script>
        </div>
        <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">User Info</h4>
                          <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
        </div>










        <!-- <script src="../asset/jquery/jquery.min.js"></script> -->
      <!-- <script src="../asset/js/bootstrap.bundle.min.js"></script> -->
      <!-- <script src="../asset/js/adminlte.js"></script> -->
      <!-- DataTables  & Plugins -->
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