<?php include('../server.php');




?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Admin User Accounts</title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
   
   <style>
       body {
        padding-top: 3%;
        margin: 0;
        font-family: 'Kanit', sans-serif;
    }
    tbody td {
      font-size: 15px;
    }
      table tr td {
         padding: 0.3rem !important;
      }
      table tr td p{
         margin-top: -0.8rem !important;
         margin-bottom: -0.8rem !important;
         font-size: 0.9rem;
      }
      td a.btn{
         font-size: 0.7rem;
      }
   </style>
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

        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col">
                  <h1 class="m-0"><i class="fa fa-users"></i> Service Provider</h1>
                </div>
                  <!-- /.col -->  
              </div>             
              <section class="content">
                <div class="container-fluid">
                  <div class="card card-info">
                    <br>
                    <div class="col">
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
                            <th>Valid ID</th>
                            <th>Certificate</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <?php
                          $sql = "SELECT * FROM employerr";
                          $connection = mysqli_connect("localhost", "root", "", "service_finder");
                          $result = mysqli_query($connection, $sql);
                        ?>
                        <?php 
                          if ($result->num_rows > 0) {
                            // output data of each row
                          while ($row = $result->fetch_assoc()) {
                            $id=$row["id"];
                            $fname=$row["fname"];
                            $mname=$row["mname"];
                            $lname=$row["lname"];
                            $Email=$row["Email"];
                            $password=$row["password"];
                            $profilepic=$row["profilepic"];
                            $username=$row["username"];
                            $Bdate=$row["Bdate"];
                            $validID=$row["validID"];
                            $NC=$row["NC"];
                            $date = date("M d, Y",strtotime($Bdate));
                            ?>         
                        <tbody>
                          <tr>
                            <td><img src="../asset/img/<?php echo $row['profilepic'] ?>" alt="" height="100" width="100"></td>
                            <td><?php echo $row['fname'] ?> <?php echo $row['mname'] ?> <?php echo $row['lname'] ?></td>
                            <td><?php echo $row['mnumber'] ?></td>
                            <td><?php echo $row['Email'] ?></td>
                            <td><?php echo $row['Bdate'] ?></td>
                            <td><?php echo $row['username'] ?></td>
                            <td><?php echo $row['password'] ?></td>
                            <td><img src="../asset/img/<?php echo $row['validID'] ?>" alt="" height="100" width="100"></td>
                            <td><img src="../asset/img/<?php echo $row['NC'] ?>" alt="" height="100" width="100"><?php echo $row['NC'] ?></td>
                            <td>
                            <a href="<?php echo "approved1.php?id=" . $row["id"];  ?>" class="btn-sm btn-primary" target="_blank">Update</a>
                            </td>
                          </tr>
                        </tbody>
                        <?php }
                          } else {
                          echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
                          }
                        ?>
                      </table>
                    </div>
                  </div>
                </div>
              </section>
            </div>
            <!-- /.content-wrapper -->
          </div>
          <!-- ./wrapper -->
        </div>
<!-- Delete Modal -->
<div class="modal fade" id="deletmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <form action="delete.php <?php echo $_SERVER['REQUEST_URI']; ?>"  method="POST">
         
            <div class="modal-body">
            <?php
                            // retrieve
                            $accountid = $_GET["id"];
                            $connection = mysqli_connect("localhost", "root", "", "service_finder");
                            $sql = "SELECT * FROM employee WHERE id = $accountid";
                            $result = mysqli_query($connection, $sql);
                            $row = mysqli_fetch_array($result);
                            ?>
               <input type="hidden" name="delete_id" id="delete_id">
               <h4>Do you want to Delete this user?</h4>
               <?php echo $row["username"] ?>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
               <button type="button" name="deleteuser" class="btn btn-primary">Yes </button>
            </div>
         </form>

      </div>
   </div>
</div>
     
<!--end  Delete Modal -->




      <div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <div class="modal-body text-center">
                  <form>
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="card-header">
                                 <h5><i class="fa fa-user-lock"></i> Admin Information</h5>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="float-left">Full Name</label>
                                       <input type="text" class="form-control" placeholder="Service Name">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="float-left">Email</label>
                                       <input type="text" class="form-control" placeholder="Email">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="float-left">Contact</label>
                                       <input type="text" class="form-control" placeholder="Contact">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="float-left">Access level</label>
                                       <select class="form-control">
                                          <option>full access</option>
                                          <option>support</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="float-left">Username</label>
                                       <input type="text" class="form-control" placeholder="Username">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label class="float-left">Password</label>
                                       <input type="password" class="form-control" placeholder="*********">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                        <a href="#" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                        <button type="submit" name="update_submit" class="btn btn-info">Save Changes</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>


      <!-- jQuery -->
      <script src="../asset/jquery/jquery.min.js"></script>
      <script src="../asset/js/bootstrap.bundle.min.js"></script>
      <script src="../asset/js/adminlte.js"></script>
      <!-- DataTables  & Plugins -->
      <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
      <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
      <script src="../asset/tables/datatables-buttons/js/buttons.bootstrap4.min.js"></script>


<script>
   $(document).ready(function(){
      $('.deletebtn').on('click', function(){
         $('#deletmodal').modal('show');

         $tr = $(this).closest('tr');
         var data = $tr.children("td").map(function(){
            return $(this).text();
         }).get();
         console.log(data);
         $('#delete_id').val(data[0]);
      })
   })
</script>



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