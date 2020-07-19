<?php 
    include('connection.php');
    session_start();
    if($_SESSION['U_TYPE']!='EMPLOYER'){
        header("location:index.php");
    }
    else{
        if(isset($_POST['submit'])){
            $cname=$_POST['cname'];
            $carea=$_POST['carea'];
            $jname=$_POST['jname'];
            $jtype=$_POST['jtype'];
            $jsal=$_POST['jsal'];
            $jyear=$_POST['jyear'];
            $jdesc=$_POST['desc'];
            $id=$_SESSION['U_ID'];
            $jdate=date("Y-m-d");

            $query="insert into inserted_job(`comp_id`,`injob_title`,`injob_type`,`injob_pay`,`injob_exp`,`injob_desc`,`injob_date`) values ('$id','$jname','$jtype','$jsal','$jyear','$jdesc','$jdate')";
            mysqli_query($con,$query);
            //echo $query;
            ?>
            <script>
                alert('Job Inserted Successfully!');
            </script>
            <?php
        }
?>
<html>
    <head>
        <title>gigHUB | Post Job</title>
        <link rel="stylesheet" href="css/post_job.css">
        <link rel="shortcut icon" href="assests/icon.png" type="image/x-icon"/>
    </head>
    <body>
        <header>
            <nav>
                    <div class="icon"><a href="index.php">gigHUB</a></div>
                    <ul>
                        <li class="fltright"><a href="employer_home.php" class="wtone">Dashboard</a></li>
                    </ul>
            </nav>
            <div class="container">
                <h2>Add Job</h2>
                <form action="" type="" method="post">
                                <?php
                                        $id=$_SESSION['U_ID'];
                                        $query="select * from comp where comp_id='$id'";
                                        $result=mysqli_query($con,$query);
                                        $row=mysqli_fetch_assoc($result);
                                ?>
                            <label for="" class="label">Company Name</label>
                            <input type="text" placeholder="Enter Your Company Name" value="<?php echo $row['comp_name']; ?>" name="cname"> 

                            <label for="" class="label">Area of Company</label>
                            <input type="text" placeholder="Enter Area of Company"  value="<?php echo $row['comp_area']; ?>" name="carea">

                            <label for="" class="label">Job Title</label>
                            <input type="text" placeholder="Enter Job Title" name="jname">

                            <label for="" class="label">Job Type</label>
                            <select class="select-css" name="jtype">
                                    <option>Full Time</option>
                                    <option>Part Time</option>
                                    <option>Contractor</option>
                            </select>

                            <label for="" class="label">Estimate Salary</label>
                            <select class="select-css" name="jsal">
                                    <option value="200000">2 Lakh +</option>
                                    <option value="650000">6.5 Lakh +</option>
                                    <option value="1200000">12 Lakh +</option>
                            </select>

                            <label for="" class="label">Year of Experience</label>
                            <input type="number" placeholder="Enter Year of Experience" name="jyear">

                            <label for="" class="label">Description</label>
                            <textarea  id="description" cols="40" rows="10"  name="desc">
                            </textarea>

                            <input type="submit" value="Post Job" name="submit">
                </form>
            </div>
        </header>
    </body>
</html>
<?php }
?>