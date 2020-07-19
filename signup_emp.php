<?php
    include 'connection.php';
    if(isset($_POST['submit']))
    {
       $name=$_POST['cname'];
       $email=$_POST['cemail'];
       $area=$_POST['carea'];
       $password=$_POST['cpass'];

      if($password==$_POST['copass'])
      {
        $sql="INSERT INTO `comp`(`comp_name`, `comp_email`, `comp_area`, `comp_password`) VALUES ('$name','$email','$area','$password')";
        if(mysqli_query($con,$sql))
        {
        ?>
          <script>
            alert('Sign-Up Successfully!!');
            window.open('signin_emp.php','_self');
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
            window.open('signup_emp.php','_self');
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
    <style>
      textarea{
        margin: 15px 0;
        font-size: .9rem;
        display: block;
        width:calc(100% - 10%);
        border-bottom:2px solid #9bd4f5;
        border: 1px solid #9bd4f5;
        font-size:1.2rem;
        resize:none;
      }
      .container{
        margin-top: 30px;
        margin-bottom: 15px;
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
      <div class="content">
        <h2>Hire the <b>Perfect</b> for <b>Perfect</b></h2>
        <p><b>gigHUB</b></p>
      </div>
      <div class="form-content">
        <form class="" action="" method="POST">
          <label for="" class="label">Company Name</label>
          <input type="text" name="cname" value="" placeholder="Enter Your Name" required>

          <label for="" class="label">Company Email</label>
          <input type="text" name="cemail" value="" placeholder="Enter Your Email" required>

          <label for="" class="label">Company Area</label>
          <textarea  id="description" cols="40" rows="8"  name="carea">
          </textarea>

          <label for="" class="label">Password</label>
          <input type="password" name="cpass" value="" placeholder="******" required>

          <label for="" class="label">Re-Type Password</label>
          <input type="password" name="copass" value="" placeholder="re-type ******" required>
          <input type="submit" name="submit">
        </form>
      </div>
      </div>
    </div>
  </body>
</html>
