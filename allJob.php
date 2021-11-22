 <?php include('server.php');
include('submit_rating.php');

if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
	if ($_SESSION["Usertype"]==1) {
		$linkPro="employeeProfile.php";
		$linkEditPro="editEmployee1.php";
		$linkBtn="applyJob.php";
		$textBtn="Apply for this job";
	}
	else{
		$linkPro="employerProfile.php";
		$linkEditPro="editEmployer1.php";
		$linkBtn="editJob.php";
		$textBtn="Edit the job offer";
	}
}
else{
    $username="";
	//header("location: index.php");
}

if(isset($_POST["jid"])){
	$_SESSION["job_id"]=$_POST["jid"];
	header("location: jobDetails.php");
}

$sql = "SELECT * FROM job_offer WHERE valid=1"; //ORDER BY timestamp DESC
$result = $conn->query($sql);
if(isset($_POST["s_title"])){
	$t=$_POST["s_title"];
	$sql = "SELECT * FROM job_offer WHERE title='$t' OR type='$t' OR e_username='$t' and valid=1";
	$result = $conn->query($sql);
}else{
  $_SESSION["errorMsg"]="Nothing to Show";

}


if(isset($_POST["recentJob"])){
	$sql = "SELECT * FROM job_offer WHERE valid=1 ORDER BY timestamp DESC"; //ORDER BY timestamp DESC
	$result = $conn->query($sql);
}

if(isset($_POST["oldJob"])){
	$sql = "SELECT * FROM job_offer WHERE valid=1";
	$result = $conn->query($sql);
}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>All Job Offers</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
		body {
        padding-top: 3%;
        margin: 0;
        font-family: 'Kanit', sans-serif;
    }
	.card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
        background:#fff;
    }
	.gradient {
        background: linear-gradient( 
        120deg,#343a40,#6299a4);
        color: #fff;
      }
	.portfolio-navbar .navbar-nav .nav-link {
        font-weight: 600;
        font-size: 20px;
        padding: 2rem .1rem;
    }


.main {
  display: grid;
    grid-template-columns: repeat(4, 1fr);
}

    .card-blue{
        margin-top: 100px;
    width: 90%;
    display: inline-block;
    box-shadow: 2px 2px 20px black;
    border-radius: 5px; 
    margin: 2%;
   }

.image img{
  width: 50%;
  display: flex;
  margin-left: auto;
  margin-right: auto;
}

.title{

 text-align: center;
 padding: 10px;
 
}

h1{
 font-size: 20px;
}

.dex{
 padding: 3px;
 text-align: center;

 padding-top: 10px;
       border-bottom-right-radius: 5px;
 border-bottom-left-radius: 5px;
}


/* input.form-control {
  position: relative;
} */
form.search {
  padding-top: 25px;
}
form.search input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid #2d3436;
  float: left;
  width: 80%;
  background: #ffffff;
  color: #ADADAD;
}  
form.search button {
  float: left;
    width: 15%;
    padding: 10px;
    background: #2d3436;
    color: white;
    font-size: 17px;
    border: 1px solid #2d3436;
    border-left: none;
}
/* notification */
#count{
  border-radius: 50%;
  position: relative;
  top: -10px;
  left: -10px;

}
</style>

</head>
<body>

<!--Navbar menu-->
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-light portfolio-navbar gradient py-0" id="nav">
        <div class="container"><a class="navbar-brand logo" href="<?php echo $linkPro; ?>"><img src="image/logo.png" height="75" alt="Logo"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                  <form class="search" action="allJob.php" method="post">
				            <div class="form-group search">
				              <input type="text" name="s_title" placeholder="Search">
				              <button type="submit" class="search-icon"><i class="fa fa-search"></i></button>
				            </div>
	                </form>
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="allJob.php">Offer Services</a></li>
                  <?php 
$sql_get = mysqli_query($conn,"SELECT * FROM message WHERE receiver='$username' and status=0");
$count = mysqli_num_rows($sql_get);

?>
      <li class="nav-item" role="presentation"><a class="nav-link" href="message.php"><i class="fas fa-comments fa-lg"> </i> <span class="badge bg-primary" id="count"><?php echo $count; ?></span></a> </li>
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-user-circle fa-lg"></i>
                  </a>
                  <ul class="dropdown-menu dropdown" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo $linkPro; ?>">Profile</a></li>
                    <li><a class="dropdown-item" href="<?php echo $linkEditPro; ?>">Edit Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  </ul>
                  </li>
                </ul>
            </div>
        </div>
    </nav>    
<!--End Navbar menu-->
<div class="main" >
  
  <?php 
    if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
              $job_id=$row["job_id"];
              $title=$row["title"];
              $type=$row["type"];
              $picture=$row["picture"];
              $budget=$row["budget"];
              $f_name=$row["f_name"];
              $m_name=$row["m_name"];
              $l_name=$row["l_name"];
              $e_username=$row["e_username"];


              echo '
  
              <form action="allJob.php" method="POST">
                <div class="card card-blue" style="margin-top: 100px;">
                  <div class="image">
                    <img src="asset/img/'.$picture.'">
                  </div>
                  <div class="title">
                      <input type="hidden" name="jid" value="'.$job_id.'">
                          <h1>'.$f_name.' '.$m_name.'. '.$l_name.'</h1>
                          <h5>'.$e_username.'</h5>
                          <h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
                          <div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
                      </div>
                      <div class="dex">
                          <p>'.$title.'</p>
                          <p>'.$type.'</p>
                          <button type="submit" class="btn btn-link btn-lg" value="'.$title.' id="HiRe"">Hire...</button>
                          
                      </div>
              </div>
            </form>
            
              ';

              }
      } else {
          echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
      }

      ?>
                        
</div>
<!--End Column 1-->
                            
<!--Column 2-->
<h1> <p><?php echo $errorMsg; ?></p></h1>
	<div class="col-lg-3">

<!--Main profile card-->
		<!-- <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<p></p>
			<form action="NewAllJob.php" method="post">
				<div class="form-group">
				  <input type="text" class="form-control" name="s_title">
				  <center><button type="submit" class="btn btn-info">Search by Job Title</button></center>
				</div>
	        </form>

	        

	        <form action="NewAllJob.php" method="post">
				<div class="form-group">
				  <center><button type="submit" name="oldJob" class="btn btn-warning">See all older posted jobs first</button></center>
				</div>
	        </form>

	        <p></p>
	    </div> -->
<!--End Main profile card-->

	</div>
<!--End Column 2-->

</div>
</div>
<!--End main body-->


<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="sassets/js/jquery.min.js"></script>

<?php 

// if($e_username!=$username && $_SESSION["Usertype"]!=1){
// 	echo "<script>
// 		        $('#applybtn').hide();
// 		</script>";
// } 
// if($e_username=$username){
// 	echo "<script>
// 		        $('#HiRe').hide();
// 		</script>";
// }
?>

<script>

var rating_data = 0;

$('#add_review').click(function(){

    $('#review_modal').modal('show');

});

$(document).on('mouseenter', '.submit_star', function(){

    var rating = $(this).data('rating');

    reset_background();

    for(var count = 1; count <= rating; count++)
    {

        $('#submit_star_'+count).addClass('text-warning');

    }

});

function reset_background()
{
    for(var count = 1; count <= 5; count++)
    {

        $('#submit_star_'+count).addClass('star-light');

        $('#submit_star_'+count).removeClass('text-warning');

    }
}

$(document).on('mouseleave', '.submit_star', function(){

    reset_background();

    for(var count = 1; count <= rating_data; count++)
    {

        $('#submit_star_'+count).removeClass('star-light');

        $('#submit_star_'+count).addClass('text-warning');
    }

});

$(document).on('click', '.submit_star', function(){

    rating_data = $(this).data('rating');

});




$('#save_review').click(function(){

    var user_name = $('#user_name').val();

    var user_review = $('#user_review').val();

    var rjob_id = $('#rjob_id').val();
    if(user_name == '' || user_review == '')
    {
        alert("Please Fill Both Field");
        return false;
    }
    else
    {
        $.ajax({
            url:"<?php echo "submit_rating.php?job_id=" . $job_id; ?>",
            method:"POST",
            data:{rating_data:rating_data, user_name:user_name, user_review:user_review, rjob_id:rjob_id},
            success:function(data)
            {
                $('#review_modal').modal('hide');

                load_rating_data();

                alert(data);
            }
        })
    }

});

load_rating_data();

function load_rating_data()
{
    $.ajax({
        url:"<?php echo "submit_rating.php?job_id=" . $job_id; ?>",
        method:"POST",
        data:{action:'load_data'},
        dataType:"JSON",
        success:function(data)
        {
            $('#average_rating').text(data.average_rating);
            $('#total_review').text(data.total_review);

            var count_star = 0;

            $('.main_star').each(function(){
                count_star++;
                if(Math.ceil(data.average_rating) >= count_star)
                {
                    $(this).addClass('text-warning');
                    $(this).addClass('star-light');
                }
            });

            $('#total_five_star_review').text(data.five_star_review);

            $('#total_four_star_review').text(data.four_star_review);

            $('#total_three_star_review').text(data.three_star_review);

            $('#total_two_star_review').text(data.two_star_review);

            $('#total_one_star_review').text(data.one_star_review);

            $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

            $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

            $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

            $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

            $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

            if(data.review_data.length > 0)
            {
                var html = '';

                for(var count = 0; count < data.review_data.length; count++)
                {
                    html += '<div class="row mb-3">';

                    html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                    html += '<div class="col-sm-11">';

                    html += '<div class="card">';

                    html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                    html += '<div class="card-body">';

                    for(var star = 1; star <= 5; star++)
                    {
                        var class_name = '';

                        if(data.review_data[count].rating >= star)
                        {
                            class_name = 'text-warning';
                        }
                        else
                        {
                            class_name = 'star-light';
                        }

                        html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                    }

                    html += '<br />';

                    html += data.review_data[count].user_review;

                    html += '</div>';

                    html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                    html += '</div>';

                    html += '</div>';

                    html += '</div>';
                }

                $('#review_content').html(html);
            }
        }
    })
}


</script>

</body>
</html>
