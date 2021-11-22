<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'service_finder');

if(isset($_POST['deleteuser']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM employee WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
       echo '<script> alert("User Deleted");</script>';
       header('Location:ServiceProvider.php');
    } else {
       echo '<script> alert("User not deleted")</script>';
    }
}

?>