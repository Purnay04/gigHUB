<?php
  session_start();
  error_reporting(0);
  include 'connection.php';
  if($_SESSION['U_TYPE']!=''){
    $_SESSION['U_TYPE']='';
    session_destroy();
  }
  if(isset($_POST['submit'])){
    session_start();
    $uname=$_POST['uname'];
    $password=$_POST['password'];
    
    $query="SELECT * FROM `user` WHERE `user_name`='$uname' AND `user_password`='$password'";
    $result=mysqli_query($con,$query);
    if(mysqli_num_rows($result) == 1){
     while($row=mysqli_fetch_assoc($result)){
        $_SESSION['U_TYPE']="USER";
        $_SESSION['U_ID']=$row['user_id'];
        $_SESSION['U_NAME']=$row['user_name'];
      }
      echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    }
    else{
      echo "<script>alert('Your Credential Details are invalid.Please Try Again!');</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/signin_style.css">
    <link rel="shortcut icon" href="assests/icon.png" type="image/x-icon"/>
    <title>gigHUB | Sign In</title>
    <style>
      .content h2::after{
          content: '(User)';
          font-size:1.2rem;
          position: absolute;
          font-weight: 500;
        /*width: 100%;*/
          bottom:5%;
          margin-left: 5px;
      }
    </style>
  </head>
  <body>
  <header>
            <nav>
                    <div class="icon"><a href="index.php">gigHUB</a></div>
            </nav>
    </header>
    <div class="container">
         <!----<div class="lg">
            <img id="logo" src="assests/icon.png" alt="">
          </div>-->
          <div class="content">
            <h2>Login</h2>
            <p><b>gigHUB</b> will never post content to your social pages.</p>
              <form class="form" action="sign_in.php" method="post">
                <input type="text" name="uname" value="" placeholder="User Name" required>
                <input type="password" name="password" value="" placeholder="Password" required>
                <input type="checkbox" name="" value=""><h4>Remember Me</h4>
                <menu>
                <input type="submit" name="submit" value="Sign In" class="btn">
                </menu>
              </form>
            <p id="no_acc">Don't have an account? <a href="signup.php">Create One </a></p>
           </div>
      </div>
    </div>
      <script src="js/script.js" charset="utf-8" type="text/javascript"></script>
  </body>

</html>
