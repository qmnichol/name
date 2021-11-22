<?php include('server.php');
if(isset($_POST["addC"])){
    $title=test_input($_POST["title"]);
    $Certificate=test_input($_POST["Certificate"]);
    

    $sql = "INSERT INTO add (title, Certificate) VALUES ('$title', '$Certificate')";
                                                                                                                       
    $result = $conn->query($sql);
    if($result==true){
        $_SESSION["id"] = $conn->insert_id;
        header("location: employerProfile.php");
    }
}
?>
