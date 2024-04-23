<?php
$error=false;
$showalert=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'dbconnect.php';
    session_start();
    $userid=$_POST['userid'];
    $contact=$_SESSION['contact'];



    $sql="select helperid from helper where contact='$contact'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $helperid=$row['helperid'];

    $sql = "INSERT INTO `work` ( `userid`, 
                  `helperid`, `date`) VALUES ('$userid', 
                  '$helperid', current_timestamp())";

        $result = mysqli_query($conn, $sql); 
            
        if ($result) { 
            $showalert = true; 
        } 
       

}
if($showalert) { 
  
    echo ' <div class="alert alert-success 
        alert-dismissible fade show fs-1" role="alert"> 

        <strong  class="error-msg">Success!</strong><span class="error-msg"> Request Accepted. </span>
        <button type="button" class="close"
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button> 
    </div> '; 
} 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesign.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity= 
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous"> 
    <title>Document</title>
</head>
<body>
    <div class="container">
    
    <form action="" method="post">
    <h1>Accept</h1>
      <input type="number" placeholder="Enter the User id" name="userid"  required>
        
      <button type="submit">Confirm</button>
    </form>
    </div>
    
</body>
</html>