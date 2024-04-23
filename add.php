<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="stylelog.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity= 
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous"> 
    <title>Document</title>
</head>
<body>
    <h1>List of Workers</h1>
   <div class="container">
   <?php
        session_start();
        include 'dbconnect.php';
        $email=$_SESSION['email'];
        $category=$_SESSION['category'];
        if($email==true && $category==true){

        }else
        {
          echo "<script>
              window.location.assign('profile.php');
              </script>";
        }
        $sql="Select * from helper where category='$category'";
        $result=mysqli_query($conn,$sql);
        echo "<table>";
        echo "<tr>";
        echo "<td><strong>Helper Id:  </strong></td>";
        echo "<td><strong>Name:  </strong></td>";
        echo "<td><strong>Phone:  </strong></td>";
        echo "<td><strong>Area of work:  </strong></td>";
        echo "<td><strong>Field of Work:  </strong></td>";
        
        echo "</tr>";
    
      
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . ($row['helperid']) ."</td>";
            echo "<td>" . ($row['fullname']) . "</td>";
            echo "<td>" . ($row['contact']) . "</td>";
            echo "<td>" . ($row['area']) . "</td>";
            echo "<td>" . ($row['category']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
        echo "<br>";
        
    ?>
    <br><br><br>
<form action="" method="post">
    <button class="btn btn-primary px-5 py-3 ">Add</button>
</form>
   </div>
   
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $_SESSION['email']=$email;
    header('location:requestform.php');
}
?>