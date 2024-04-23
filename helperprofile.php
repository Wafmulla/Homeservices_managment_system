<!DOCTYPE html>
<html>
<head>
  <title>Helper Profile</title>
  <link rel="stylesheet" type="text/css" href="styleprof.css">
</head>
<body>

  <div class="container">
    <div class="profile">
    <h1>Welcome</h1>
    <br>
    <br>
      <div class="profile-details">
        <div class="left-column">
          <h2>Your Details</h2>
          <?php
        session_start();
        include 'dbconnect.php';
        $contact=$_SESSION['contact'];
        if($contact==true){

        }else
        {
          echo "<script>
              window.location.assign('helperlogin.php');
              </script>";
        }
        $sql="Select * from helper where contact='$contact'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        
        echo "<p><strong>Name:  </strong>".$row['fullname'];
        echo "<p><strong>Phone:  </strong>".$row['contact'];
        echo "<p><strong>Area of work:  </strong>".$row['area'];
        echo "<p><strong>Field of Work:  </strong>".$row['category'];
        echo "<br><br>";
        echo "<h1>Requests</h1>";
        $sql="select helperid from helper where contact='$contact'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $helpid=$row['helperid'];

        $sql="Select * from request where helperid='$helpid'";
        $result=mysqli_query($conn,$sql);
        echo "<table>";
        echo "<tr>";
        echo "<td><strong>Userid:  </strong></td>";
        echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
        echo "<td><strong>Time slot requested:  </strong></td>";
        echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
        echo "<td><strong>Category:  </strong></td>";
        
        echo "</tr>";
    
      
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . ($row['userid']) ."</td>";
            echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
            echo "<td>" . ($row['time']) . "</td>";
            echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
            echo "<td>" . ($row['category']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        
        
    ?>
          
        </div>
      </div>
       <br><br>
      
    <form action="" method="post" >
      <button type="submit" name="accept" >Accept</button>
    </form>
    <br><br>
    <form action="" method="post">
      <button type="submit" name="submit" >logout</button>
    </form>
    </div>
   

  </div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
  session_destroy();
  echo "<script>
        window.location.assign('login.php');
        </script>";
  }

  if(isset($_POST['accept'])){
    
    echo "<script>
          window.location.assign('accept.php');
          </script>";
    }
  ?>
