<?php 
    include 'connection.php';
    session_start();
    $id=$_REQUEST['id'];
    $user_id=$_SESSION['U_ID'];
    if($_SESSION['U_TYPE']=='USER')
    {
        //echo "<script>alert('$id');</script>";
        $query="select resume from user where user_id=$user_id";
        $result=mysqli_query($con,$query);
        //$row=mysqli_num_rows($result);
        $n=mysqli_num_rows($result);

        echo "<script>alert('$n');</script>";
        $row=mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) == 1 && $row['resume']!=null ){
           $today=date("Y/m/d");
            $query="insert into under_scrutiny (injob_id,user_id,us_applieddate,us_status) values ($id,$user_id,'$today','Pending')";
            mysqli_query($con,$query);
            ?>
                <script>
                    alert('Job Successfully Registered');
                    window.open('jobs.php','_self');
                </script>
            <?php
        }
        else{
            header("location:resume.php?job_id=$id");
        }
    }
    else{
        header("location:sign_in.php");
    }  
?>
