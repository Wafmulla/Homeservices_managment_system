<?php
$error=false;
$showalert=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'dbconnect.php';
    session_start();
    $time=$_POST['time'];
    $helperid=$_POST['helperid'];
    $email=$_SESSION['email'];
    $category=$_POST['category'];

    $sql="select helperid from helper where helperid='$helperid'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==0){
        $error=true;
    }


    $sql="select userid from users where email='$email'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $userid=$row['userid'];

    $sql = "INSERT INTO `request` ( `userid`, 
                  `helperid`, `date`,`time`,`category`) VALUES ('$userid', 
                  '$helperid', current_timestamp(),'$time','$category')";

        $result = mysqli_query($conn, $sql); 
            
        if ($result) { 
            $showalert = true; 
        } 
       

}
if($showalert) { 
  
    echo ' <div class="alert alert-success 
        alert-dismissible fade show fs-1" role="alert"> 

        <strong  class="error-msg">Success!</strong><span class="error-msg"> Request has been sent. </span>
        <button type="button" class="close"
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button> 
    </div> '; 
} 
if($error){
    echo ' <div class="alert alert-danger 
          alert-dismissible fade show " role="alert"> 
  
      <strong class="error-msg">Error!</strong> <span  class="error-msg">"Helper id does not exist."</span>
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
    <h1>Request form</h1>
      <input type="number" placeholder="Enter the Helper id" name="helperid" value="<?=$helperid?>" required>
      <select class="time" name="time" required>
              <option value="" disabled selected>Select Time slot</option>
              <option value="9am - 10am">9am - 10am</option>
              <option value="10am - 11am">10am - 11am</option>
              <option value="11am - 12noon">11am - 12noon</option>
              <option value="12noon - 1pm">12noon - 1pm</option>
              <option value="2pm - 3pm">2pm - 3pm</option>
              <option value="3pm - 4pm">3pm - 4pm</option>
              <option value="4pm - 5pm">4pm - 5pm</option>
              
            </select>
        <input type="text" placeholder="Enter the category of help" name="category" required>
      <button type="submit">Request</button>
    </form>
    </div>
    
</body>
</html>