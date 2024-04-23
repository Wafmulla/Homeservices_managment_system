<!DOCTYPE html>
<html>
<head>
  <title>Homeowner Profile</title>
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
        $email=$_SESSION['email'];
        if($email==true){

        }else
        {
          echo "<script>
              window.location.assign('login.php');
              </script>";
        }
        $sql="Select * from users where email='$email'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        
        echo "<p><strong>Name:  </strong>".$row['fullname'];
        echo "<p><strong>Email:  </strong>".$row['email'];
        echo "<p><strong>Phone:  </strong>".$row['contact'];
        echo "<p><strong>Location:  </strong>".$row['address'];
        $userid=$row['userid'];
        
    ?>
          
        </div>
        <div class="right-column">
          <h2>See the list worker</h2>
          <form class="add-worker-form" method="post">
           
            <select name="category" required>
              <option value="" disabled selected>Select Category</option>
              <option value="Plumber">Plumber</option>
              <option value="Electrician">Electrician</option>
              <option value="Carpenter">Carpenter</option>
              <option value="Gardener">Gardener</option>
            </select>
            <button type="submit" name="add">Add Worker</button>
          </form>
        </div>
      </div>
       <br><br>
      <div class="workers">
        <h1>Your Helping hands</h1>
        <br>
        <?php
          $sql="Select * from work where userid='$userid'";
          $result=mysqli_query($conn,$sql);
          echo "<table>";
          
          echo "<tr>";
          echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
          echo "<td><strong>Helper Id:  </strong></td>";
          echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
          echo "<td><strong>Name:  </strong></td>";
          echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
          echo "<td><strong>Phone:  </strong></td>";
          echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
          echo "<td><strong>Area of work:  </strong></td>";
          echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
          echo "<td><strong>Field of Work:  </strong></td>";
          
          echo "</tr>";
         
          while ($row = mysqli_fetch_assoc($result)) {
              $helperid=$row['helperid'];
              $sql1="select * from helper where helperid='$helperid'";
              $result1=mysqli_query($conn,$sql1);
              $row1 = mysqli_fetch_assoc($result1);
              echo "<tr>";
              echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
              echo "<td>" . ($row1['helperid']) ."</td>";
              echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
              echo "<td>" . ($row1['fullname']) . "</td>";
              echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
              echo "<td>" . ($row1['contact']) . "</td>";
              echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
              echo "<td>" . ($row1['area']) . "</td>";
              echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";echo "<td></td>";
              echo "<td>" . ($row1['category']) . "</td>";
              echo "</tr>";
          }
          echo "</table>";
        ?>
        <br><br><br>
        <form action="./feedback.html">
            <button type="submit" style="padding:1em">Give Feedback</button>
           </form>
    </div>
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

  if(isset($_POST['add'])){

    $category=$_POST["category"];

    $_SESSION['email']=$email;
    $_SESSION['category']=$category;
    echo "<script>
    window.location.assign('add.php');
     </script>";
  }
  ?>
