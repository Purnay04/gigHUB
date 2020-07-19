<?php
    include 'connection.php';
    session_start();
    error_reporting(0);
    if($_SESSION['U_TYPE']!="USER"){
        header("location:sign_in.php");
    }
    else{
        $job_id=$_REQUEST['job_id'];

        $currentDir = getcwd();
        $uploadDirectory = "resume/";
        $errors = []; 
        $fileExtensions = ['pdf']; 
    
        if (isset($_POST['submit'])) {
            $fileName = $_FILES['file']['name'];
            $fileSize = $_FILES['file']['size'];
            $fileTmpName  = $_FILES['file']['tmp_name'];
            $fileType = $_FILES['file']['type'];
            $fileExtension = strtolower(end(explode('.',$fileName)));
            $id=$_SESSION['U_ID'];
            $uploadPath = $uploadDirectory . basename($id.".".$fileExtension);
            unlink($uploadPath);
            if (! in_array($fileExtension,$fileExtensions)) {
                $errors[] = "This file extension is not allowed. Please upload a PDF";
            }
    
            /*if ($fileSize > 2000000) {
                $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
            }*/
    
            if (empty($errors)) {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
    
                if ($didUpload) {
                    $msg="The resume has been uploaded";
                    $query="update user set resume='$uploadPath' where user_id=$id";
                    mysqli_query($con,$query);

                    if($job_id!=null){
                        $today=date("Y/m/d");
                        $query="insert into under_scrutiny (injob_id,user_id,us_applieddate,us_status) values ($job_id,$id,'$today','Pending')";
                        mysqli_query($con,$query);
                        //echo mysqli_error($con);
                        ?>
                            <script>
                                alert('Job Successfully Registered');
                                window.open('jobs.php','_self');
                            </script>
                        <?php
                    }
                    else         echo "<script>alert('$msg')</script>";

                } else {
                    $msg="An error occurred somewhere. Try again or contact the admin";
                    echo "<script>alert('$msg')</script>";
                }
            } else {
                foreach ($errors as $error) {
                    $msg=$error . "These are the errors" . "\n";
                    echo "<script>alert('$msg')</script>";
                }
            }
        }
    
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>gigHUB Resume</title>
    <link rel="stylesheet" href="css/resume.css">
    <link rel="shortcut icon" href="assests/icon.png" type="image/x-icon"/>
</head>
<body>
    <header>
                    <nav>
                        <div class="icon"><a href="index.php">gigHUB</a></div>
                        <ul>
                            <li ><a class="blueone bold" href="#">Hi <?php echo $_SESSION['U_NAME']; ?>!</a></li>
                            <li class="fltright"><a class="blueone" href="logout.php">Logout</a></li>
                            <li class="fltright"><a href="jobs.php">Find Jobs</a></li>
                            <li class="fltright"><a href="edit_user.php">Edit Detalis</a></li>
                        </ul>
                    </nav>
    </header>
    <div class="container">
        <div class="content">
            <h2>Upload Your Resume</h2>    
            <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="file"/>
    </div>
    <div class="note">
            <h4 class="red">Note:</h4>
            <p>Upload the file of type: <b>PDF</b> </p>
            <input type="submit" name="submit" value="Submit">
            </form>
    </div>
    </div>
</body>
<script src="js/resume.js"></script>
</html>
<?php
    }
?>