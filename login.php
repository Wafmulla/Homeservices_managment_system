<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="stylelog.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity= 
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous"> 
</head>
<body>
  <?php
 session_start();
 $email="";

  $correctpass=true;
  $emailerror=false;
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    include 'dbconnect.php'; 

    $email=$_POST["email"];
    $password=$_POST["password"];

    $sql="Select * from users where email='$email'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);

    if($num==0){
      $emailerror=true;
    }
    else{
       
      $sql="Select password from users where email='$email'";
      $result1=mysqli_query($conn,$sql);
     $row=mysqli_fetch_assoc($result1);
      if($password!=$row['password']){
          $correctpass=false;
      }
      else{
        $_SESSION['email']=$email;
        echo "<script>
        window.location.assign('profile.php');
         </script>";
      }
    }

  }
  if($emailerror){
    echo ' <div class="alert alert-danger 
          alert-dismissible fade show " role="alert"> 
  
      <strong class="error-msg">Error!</strong> <span  class="error-msg">"Email does not exist.Please sign up"</span>
      <button type="button" class="close"
          data-dismiss="alert" aria-label="Close"> 
          <span aria-hidden="true">×</span> 
      </button> 
  </div> ';
  }
  if($correctpass==false){
    echo ' <div class="alert alert-danger 
          alert-dismissible fade show " role="alert"> 
  
      <strong class="error-msg">Error!</strong> <span class="error-msg">"Incorrect password"</span>
      <button type="button" class="close"
          data-dismiss="alert" aria-label="Close"> 
          <span aria-hidden="true">×</span> 
      </button> 
  </div> ';
  }

  ?>
    <nav >
            <ul class="navg">
                <li><a href="./home.html">Home</a></li>
                 <li><a href="./signup.php">Homeowner Sign Up</a></li>
                  <li><a href="./login.php">Homeowner log In</a></li>
                  <li><a href="./helpersignup.php">Helper Sign Up</a></li>
                  <li><a href="./helperlogin.php">Helper Log In</a></li>
            </ul>
        </nav>
  <div class="container">
    <form class="login-form " action="" method="post">
      <h1>Login</h1>
      <input type="text" placeholder="Email" name="email" value="<?=$email?>" required>
      <input type="password" placeholder="Password" name="password" required>
      <button type="submit">Log In</button>
    </form>
  </div>
</body>
</html>


 






