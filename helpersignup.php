<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesign.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href= 
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity= 
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous"> 
    <title>sign up</title>
</head>
<body>

  <!-- php -->

  <?php 
    
  $showAlert = false; 
  $showError = false; 
  $exists=false; 
  $convalid=true;
  $advalid=true;
      
  if($_SERVER["REQUEST_METHOD"] == "POST") { 
  
      include 'dbconnect.php'; 
      
      $fullname = $_POST["fullname"]; 
      $password = $_POST["password"]; 
      $cpassword = $_POST["cpassword"]; 
      $contact=$_POST["contact"];
      $area=$_POST["area"];
      $category=$_POST["category"];
  

      $constr=strval($contact);       
      $contleng=strlen($constr);
      if($contleng!=10){
          $convalid=false;
      }


      $sql = "Select * from helper where contact='$contact'"; 
      
      $result = mysqli_query($conn, $sql); 
      
      $num = mysqli_num_rows($result); 
      
       
      if($num == 0 && $convalid) { 
          if(($password == $cpassword) && $exists==false) { 
       
                   
              $sql = "INSERT INTO `helper` ( `fullname`, 
                  `password`, `date`,`area`,`contact`,`category`) VALUES ('$fullname', 
                  '$password', current_timestamp(),'$area','$contact','$category')"; 
      
              $result = mysqli_query($conn, $sql); 
      
              if ($result) { 
                  $showAlert = true; 
              } 
          } 
          else { 
              $showError = "Passwords do not match"; 
          }    
      }
      
  if($num>0) 
  { 
      $exists="Contact number is already registered"; 
  } 
  if(!$convalid){
      echo ' <div class="alert alert-danger 
          alert-dismissible fade show " role="alert"> 
  
      <strong  class="error-msg">Error!</strong> <span class="error-msg">"contact length should be 10"</span>
      <button type="button" class="close"
          data-dismiss="alert" aria-label="Close"> 
          <span aria-hidden="true">×</span> 
      </button> 
  </div> '; 
  }

  }

  if($showAlert) { 
  
      echo ' <div class="alert alert-success 
          alert-dismissible fade show fs-1" role="alert"> 
  
          <strong  class="error-msg">Success!</strong><span class="error-msg"> Your account is 
          now created and you can login. </span>
          <button type="button" class="close"
              data-dismiss="alert" aria-label="Close"> 
              <span aria-hidden="true">×</span> 
          </button> 
      </div> '; 
  } 
  
  if($showError) { 
  
      echo ' <div class="alert alert-danger 
          alert-dismissible fade show" role="alert"> 
      <strong  class="error-msg">Error!</strong> <span class="error-msg">'. $showError.'</span>
  
  <button type="button" class="close"
          data-dismiss="alert aria-label="Close"> 
          <span aria-hidden="true">×</span> 
  </button> 
  </div> '; 
} 
      
  if($exists) { 
      echo ' <div class="alert alert-danger 
          alert-dismissible fade show" role="alert"> 
  
      <strong  class="error-msg">Error!</strong> <span class="error-msg">'. $exists.'</span>
      <button type="button" class="close"
          data-dismiss="alert" aria-label="Close"> 
          <span aria-hidden="true">×</span> 
      </button> 
  </div> '; 
  }
      
  ?> 
  <!-- php end -->
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
            <form  action="" method="post" class="signup-form">
              <h1>Sign Up</h1>
              <input type="text" placeholder="Full Name" name="fullname" id="fullname" >
              <select class="category" name="category" required>
              <option value="" disabled selected>Select Category</option>
              <option value="Plumber">Plumber</option>
              <option value="Electrician">Electrician</option>
              <option value="Carpenter">Carpenter</option>
              <option value="Gardener">Gardener</option>
            </select>
              <input type="contact" placeholder="Contact Number" id="contact" name="contact" required>
              <input type="password" placeholder="Password" id="password" name="password" required>
              <input type="password" placeholder="Confirm Password" id="cpassword" name="cpassword" required>
              <input type="text" placeholder="Area of Work" id="area" name="area" required>
              <button type="submit">Sign Up</button>
            </form>
          </div>
</body>
</html>


