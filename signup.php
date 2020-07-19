<?php
    include 'connection.php';
    if(isset($_POST['submit']))
    {
       $name=$_POST['uname'];
       $email=$_POST['uemail'];
       $phone=$_POST['uphn'];
       $password=$_POST['upass'];

      if($password==$_POST['urpass']){
      $sql="INSERT INTO `user`(`user_name`, `user_email`, `user_phone`, `user_password`) VALUES ('$name','$email','$phone','$password')";
      if(mysqli_query($con,$sql))
      {
        ?>
        <script>
          alert('Sign-Up Successfully!!');
          window.open('sign_in.php','_self');
        </script>
        <?php
      }
      else{
          echo mysqli_error($con);
      }
    }
    else{
      ?>
      <script>
          alert('Password does not match!!');
          window.open('signup.php','_self');
      </script>
    <?php
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>GigHUB | Sign Up</title>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="shortcut icon" href="assests/icon.png" type="image/x-icon"/>
  </head>
  <body>
  <header>
            <nav>
                    <div class="icon"><a href="index.php">gigHUB</a></div>
            </nav>
    </header>
    <div class="container">
      <div class="content">
        <h2>Make Part of gigHUB</h2>
        <p><b>gigHUB</b> will never post content to your social pages.</p>
      </div>
      <div class="form-content">
        <form class="" action="" method="POST">
          <label for="" class="label">Name</label>
          <input type="text" name="uname" value="" placeholder="Enter Your Name" required>

          <label for="" class="label">Email</label>
          <input type="text" name="uemail" value="" placeholder="Enter Your Email" required>

          <label for="" class="label">Phone Number</label>
          <input type="text" name="uphn" value="" placeholder="Enter Your phone" maxlength="10" required>

          <label for="" class="label">Password</label>
          <input type="password" name="upass" value="" placeholder="******" required>

          <label for="" class="label">Re-Type Password</label>
          <input type="password" name="urpass" value="" placeholder="re-type ******" required>
          <input type="submit" name="submit">
        </form>
      </div>
      </div>
    </div>
  </body>
</html>
