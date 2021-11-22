<?php include('../server.php');


// if (!isset($_SESSION["username"])) {
//     header("Location: loginsite.php");
// }

// update
if (isset($_POST["update_submit"])) {
    $accountid = $_GET["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $connection = mysqli_connect("localhost", "root", "", "service_finder");

    $sql = "UPDATE employee SET username = '$username', password = '$password' WHERE id = $accountid ";

    if (mysqli_query($connection, $sql)) {
        $success_update = true;
    }
}

// delete
if (isset($_POST["delete_submit"])) {
    $accountid = $_GET["id"];
    $connection = mysqli_connect("localhost", "root", "", "service_finder");

    $sql = "DELETE FROM employee WHERE id = $accountid";

    if (mysqli_query($connection, $sql)) {
        $success_delete = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>FoodMain</title>
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
</head>

<body>
    


    <div class="login-box" style="margin-top: 100px;">
        <section class="content">
            <div class="container-fluid">
                <!-- card -->
                <div class="card">
                    <div class="X" >
                        <li class="nav" style="float: right; padding-right:10px"><a href="ServiceProvider.php"><span class="fa fa-times" style="color: black;"></span></a></li>
                    </div>
                    <h1><strong><center>User Registration Form</center></strong></h1>
                    
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST" class="form-horizontal">
                    <?php
                            // retrieve
                            $accountid = $_GET["id"];
                            $connection = mysqli_connect("localhost", "root", "", "service_finder");
                            $sql = "SELECT * FROM employee WHERE id = $accountid";
                            $result = mysqli_query($connection, $sql);
                            $row = mysqli_fetch_array($result);
                            ?>
                        <div class="col-md-12">
                            <div class="row">
                                <!-- Profile Picture -->
                                <div class="col-md-3">
                                            
                                </div>
                                <!-- End Profile Picture -->
                                <!-- Registraion Form -->
                                <div class="col-md-9">
                                    <div class="row">

                                    <div class="col-md-12">
                                <div class="row">
                                    <!-- Profile Picture -->
                                    <div class="col-md-3">
                                        
                                    </div>
                                    <!-- End Profile Picture -->
                                    <div class="col-md-12">
                                    <div class="form-group">
                                                <label class="float-left">Profile picture </label>
                                                <br>
                                                <img src="../asset/img/<?php echo $row['profilepic']; ?>" alt="" height="200" width="200"style="">
                                            </div>
                                        </div>
                            
                                        <div class="col-md-12">
                                            <div class="">
                                                <label class="float-left">Full Name :</p></label>
                                                <p class="float-left"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="float-left">Email: </label>
                                                <p class="float-left"><?php echo $row['Email']; ?></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="float-left">Age: </label>
                                                <p class="float-left"><?php echo $row['Age']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="float-left">Gender: </label>
                                                <p class="float-left"><?php echo $row['Gender']; ?></p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="float-left">Zipcode: </label>
                                                <p class="float-left"><?php echo $row['zipcode']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="float-left">Birthdate: </label>
                                                <p class="float-left"><?php echo $row['Bdate']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="float-left">Mobile number : </label>
                                                <p class="float-left"><?php echo $row['mnumber']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="float-left">Address : </label>
                                                <p class="float-left"><?php echo $row['address']; ?>, <?php echo $row['city']; ?>, <?php echo $row['province']; ?></p>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="float-left">Username : </label>
                                                <p class="float-left"><?php echo $row['username']; ?>, <?php echo $row['city']; ?>, <?php echo $row['province']; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="float-left">Password : </label>
                                                <p class="float-left"><?php echo $row['password']; ?></p>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="float-left">Valid ID</label>
                                                <br>
                                                <img src="../asset/img/<?php echo $row['validID']; ?>" alt="" height="200" width="200"style="">
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="form-group">
                                    <button type="submit" name="update_submit" class="btn btn-primary">Update Account</button>
                                    <button type="submit" name="delete_submit" class="btn btn-danger">Delete Account</button>
                                    <a href="ServiceProvider.php" class="btn btn-primary">Back</a>

                                </div>
                            </div>
                                        
                                        
                                        <!--End Hide radio button-->
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









    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>