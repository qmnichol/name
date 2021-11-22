<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
    $username="";
	//header("location: index.php");
}


if(isset($_POST["postJob"])){
    $title=test_input($_POST["title"]);
    $type=test_input($_POST["type"]);
    $description=test_input($_POST["description"]);
    $budget=test_input($_POST["budget"]);
    $skills=test_input($_POST["skills"]);
    $special_skill=test_input($_POST["special_skill"]);
    $deadline=test_input($_POST["deadline"]);
    $f_name=test_input($_POST["f_name"]);
    $m_name=test_input($_POST["m_name"]); 
    $l_name=test_input($_POST["l_name"]);
    $picture=test_input($_POST["picture"]);
    $fuser=test_input($_POST["fuser"]);
    $Cert=$_POST["Cert"];

    $sql = "INSERT INTO job_offer (title, type, description, budget, skills, special_skill, e_username, valid, deadline, f_name, m_name, l_name, picture, fuser, Cert) VALUES ('$title', '$type', '$description','$budget','$skills','$special_skill','$username',1, '$deadline', '$f_name', '$m_name', '$l_name', '$picture', '$username','$Cert' )";
                                                                                                                        // Hey!! ^^^ ^^^^^^ ^^^^^^   ^^^^^             
    $result = $conn->query($sql);
    if($result==true){
        $_SESSION["job_id"] = $conn->insert_id;
        header("location: jobDetails.php");
    }
}
//=========================Full name==================================
$sql = "SELECT * FROM employer WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $fname=$row["fname"];
        $lname=$row["lname"];
        $mname=$row["mname"];
        $profilepic=$row["profilepic"];
        }
} else {
    echo "0 results";
}
//===========================================================


                        


//================== First letter ========================================
$fletter = $mname [0];
//===========================================================

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Post a job</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">

<style>
	body{padding-top: 3%;margin: 0;
    color: #2d3436;}
	.card{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background:#fff}
    .container{border-width: 2px;}
    .card{width: 100rem;}
</style>

</head>
<body class="body bg-dark">

<!--Navbar menu-->
<!-- <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="employerProfile.php">Service Finder</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="allEmployee.php">Browse all Employees</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="allEmployer.php">Browse Employer</a></li>
                    
                    
                    <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
            </div>
        </div>
    </nav> -->
<!--End Navbar menu-->
<div class="post-job" style="width: 30%;margin-left: 20%;margin-top: 50px;margin-bottom: 20px;">
<div class="card" style="width: 50rem">
<div class="container" style="margin: 10px 5% 4px 30%">
        <div class="row">
            <div class="col-md-9" >
                <div class="page-header">
                <div class="X" >
                    <li class="nav" style="float: right; padding-right:50px"><a href="employerProfile.php"><span class="fa fa-times" style="color: black;"></span></a></li>
                </div>
                    <h2>Post A Job Offer</h2>
                </div>

                <form id="registrationForm" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Job Title</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="title" value="" required />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Job Type</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="type" value="" required  />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Job Description</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="description" value="" required />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Minimum Wage</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="budget" value="" required />
                    </div>
                </div>

                
                <!-- //================== First letter ======================================== -->
               
                <!-- //=========================================================== -->


                <div class="form-group" style="display: none">
                    <label class="col-sm-4 control-label">Required Skills</label>
                    
                    <div class="radio">
                                    <label>
                                        <input type="radio" name="skills" value="skills"  checked/> skill
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="special_skill" value="Special_skill"  checked/> Special_skill
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="deadline" value="1999-01-01"  checked/> 1999-01-01
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="fuser" value="<?php echo $username; ?>" required="require" checked/><?php echo $username; ?>
                                    </label>
                                </div>
                </div>
<!-- ==================================== Add this  ============================-->
<div class="form-group " style="display: none">  <!-- display: none -->
                                        <label class="col-sm-4 control-label"></label>
                                        <div class="col-sm-5">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="f_name" value="<?php echo $fname ?>"  checked /><?php echo $fname ?>
                                                    <!-- Hey! Hey! Hey! Hey! ^^^^^^^   Hey! Hey! Hey! Hey! -->
                                                </label>
                                            </div>
                                            <div class="radio">

                                                <label>
                                                    <input type="radio" name="m_name" value="<?php echo $fletter ?>" checked /> <?php echo $fletter ?>
                                                    <!-- Hey! Hey! Hey! Hey! ^^^^^^^   Hey! Hey! Hey! Hey! -->
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="l_name" value="<?php echo $lname ?>" checked /> <?php echo $lname ?>
                                                    <!-- Hey! Hey! Hey! Hey! ^^^^^^^   Hey! Hey! Hey! Hey! -->
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="picture" value="<?php echo $profilepic ?>" checked /> <?php echo $profilepic ?>
                                                     <!-- Hey! Hey! Hey! Hey! ^^^^^^^   Hey! Hey! Hey! Hey! -->
                                                </label>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
<!-- ====================================end Add this ============================-->
            
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                        <button type="submit" name="postJob" class="btn ml-auto rounded-pill btn-font-size px-4" style="background: rgb(116, 156, 143);color:#fff;">Post</button>
                    </div>
                </div>

                 
                <div class="form-group">
                    <div class="col sm-9 col-sm-offset-3">
                
                        <select id="list" name="Cert" onchange="getSelectValue();">
                        
                                <option value="None" >Select Certificate</option>
                                <?php 
                                        $sql = "SELECT * FROM addcertificate WHERE c_username='$username'";
                                        $result = mysqli_query($conn, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                        $title=$row["title"];
                                        $Certificate=$row["Certificate"];?>
                                            
                                <option value="<?php echo $row["title"]; ?>"><?php echo $row["title"]; ?> <?php echo $row["Certificate"]; ?></option>
                                
                                
                                <?php } ?>
                            </select>
                            
                        <script>
                            
                            function getSelectValue()
                            {
                                var selectedValue = document.getElementById("list").value;
                                console.log(selectedValue);
                            }
                            getSelectValue();

                        </script>
                      
                    </div>
                </div>
                
   

            </form>
            </div>
        </div>
    </div>
</div>
</div>


    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>

<script>
$(document).ready(function() {
    $('#registrationForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            title: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            type: {
                validators: {
                    notEmpty: {
                        message: 'The type is required and cannot be empty'
                    }
                }
            },
            description: {
                validators: {
                    notEmpty: {
                        message: 'The description is required and cannot be empty'
                    }
                }
            },
            deadline: {
                validators: {
                    notEmpty: {
                        message: 'The deadline is required'
                    },
                    date: {
                        format: 'YYYY-MM-DD',
                        message: 'The deadline is not valid'
                    }
                }
            },
            budget: {
                validators: {
                    notEmpty: {
                        message: 'The budget is required and cannot be empty'
                    },
                    stringLength: {
                        max: 11,
                        message: 'The number is too big'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The number is not valid'
                    }
                }
            }
        }
    });
});
</script>

</body>
</html>