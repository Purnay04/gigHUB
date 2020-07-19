<?php 
    include('connection.php');
    session_start();
    if($_SESSION['U_TYPE']!='EMPLOYER'){
        header("location:index.php");
    }
    else{
            if(isset($_POST['details'])){
                $compname=$_POST['compname'];
                $compemail=$_POST['compemail'];
                $comparea=$_POST['address'];
                $id=$_SESSION['U_ID'];
                $_SESSION['U_NAME']=$compname;
                
                $query="Update comp set comp_name='$compname',comp_email='$compemail',comp_area='$comparea' where comp_id='$id'";
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

                $query="select * from comp where comp_id='$id' and comp_password='$currpass'";
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
                    $query="Update comp set comp_password='$newpass' where comp_id='$id'";
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
                            <li ><a  href="employer_home.php">Back</a></li>
                        </ul>
                    </nav>
            </header>
            <h2>Edit Profile</h2>
            <hr>
            <div class="outer-container">
                    <div class="container">
                        <h4>Update Employer Details:</h4>
                        <div class="content"> 
                            <div class="labels">
                                <label for="">Company Name</label>
                                <label for="">Company Email</label>
                                <label for="">Company Area</label>
                            </div>
                            <div class="fields">
                                <form action="" method="Post">
                                <?php
                                        $id=$_SESSION['U_ID'];
                                        $query="select * from comp where comp_id='$id'";
                                        $result=mysqli_query($con,$query);
                                        $row=mysqli_fetch_assoc($result);
                                ?>
                                    <input type="text" name="compname" value="<?php echo $row['comp_name']; ?>" required>
                                    <input type="text" name="compemail" value="<?php echo $row['comp_email']; ?>" required>
                                    <textarea name="address" id="" cols="43" rows="5" required><?php echo $row['comp_area']; ?></textarea>
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
                                <form action="" method="post">
                                    <input type="password" name="currpass" required>
                                    <input type="password" name="newpass" required>
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