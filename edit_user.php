<?php 
    include('connection.php');
    session_start();
    if($_SESSION['U_TYPE']!='USER'){
        header("location:index.php");
    }
    else{
            if(isset($_POST['details'])){
                $uname=$_POST['uname'];
                $uemail=$_POST['uemail'];
                $uphone=$_POST['uphone'];
                $id=$_SESSION['U_ID'];
                $_SESSION['U_NAME']=$uname;

                $query="Update user set user_name='$uname',user_email='$uemail',user_phone='$uphone' where user_id='$id'";
                mysqli_query($con,$query);
                ?>
                <script>
                    alert('Details Successfully Updated');
                </script>
                <?php
            }
            if(isset($_POST['password'])){
                $currpass=$_POST['currpass'];
                $newpass=$_POST['newpass'];
                $id=$_SESSION['U_ID'];

                $query="select * from user where user_id='$id' and user_password='$currpass'";
                $result=mysqli_query($con,$query);
                $row=mysqli_num_rows($result);
                if($row < 0){
                    ?>
                    <script>
                        alert('Enter Correct Password!');
                    </script>
                    <?php
                }
                else{
                    $query="Update user set user_password='$newpass' where user_id='$id'";
                    mysqli_query($con,$query);
                    ?>
                    <script>
                        alert('Password Updated Successfully!');
                    </script>
                    <?php
                }
                //echo $query;
            }
?>
<html>
    <head>
        <link rel="stylesheet" href="css/edit_detalis.css">
        <title>gigHUB | Edit Employer</title>
        <link rel="shortcut icon" href="assests/icon.png" type="image/x-icon"/>
    </head>
    <body>
            <header>
                    <nav>
                        <div class="icon"><a href="index.php">gigHUB</a></div>
                        <ul>
                            <li class="fltright"><a class="blueone" href="logout.php">Logout</a></li>
                            <li ><a  href="user_home.php">Back</a></li>
                        </ul>
                    </nav>
            </header>
            <h2>Edit Profile</h2>
            <hr>
            <div class="outer-container">
                    <div class="container">
                        <h4>Update User Details:</h4>
                        <div class="content"> 
                            <div class="labels">
                                <label for="">User Name</label>
                                <label for="">User Email</label>
                                <label for="">User Phone</label>
                            </div>
                            <div class="fields">
                                <form action="" method="POST">
                                    <?php
                                        $id=$_SESSION['U_ID'];
                                        $query="select * from user where user_id='$id'";
                                        $result=mysqli_query($con,$query);
                                        $row=mysqli_fetch_assoc($result);
                                    ?>
                                    <input type="text" name="uname" value=<?php echo $row['user_name']; ?>>
                                    <input type="text" name="uemail"value=<?php echo $row['user_email']; ?>>
                                    <input type="text" name="uphone" value=<?php echo $row['user_phone']; ?>>
                                    <input type="submit" value="submit" name="details">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                       <h4>Account Details</h4>
                       <div class="content"> 
                            <div class="labels">
                                <label for="">Current Password</label>
                                <label for="">New Password</label>
                            </div>
                            <div class="fields">
                                <form action="" method="POST">
                                    <input type="password" name="currpass">
                                    <input type="password" name="newpass">
                                    <input type="submit" value="submit" name="password">
                                </form>
                            </div>
                        </div>
                </div>
        </div>
    </body>
</html>
<?php }
?>