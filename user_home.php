<?php 
    include('connection.php');
    session_start();
    if($_SESSION['U_TYPE']!='USER'){
        header("location:index.php");
    }
    else{
?>
<html>
    <head>
        <link rel="stylesheet" href="css/user_home.css">
        <link rel="stylesheet" type="text/css" href="../css/boostrap/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/boostrap/animate/animate.css">   
        <link rel="stylesheet" type="text/css" href="../css/boostrap/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="../css/boostrap/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/mm.css">
        <link rel="shortcut icon" href="assests/icon.png" type="image/x-icon"/>
        <title>gigHUB | User Dashboard</title>
    </head>
    <body>
            <header>
                    <nav>
                        <div class="icon"><a href="index.php">gigHUB</a></div>
                        <ul>
                            <li ><a class="blueone bold" href="#">Hi <?php echo $_SESSION['U_NAME']; ?>!</a></li>
                            <li class="fltright"><a class="blueone" href="logout.php">Logout</a></li>
                            <li class="fltright"><a href="jobs.html">Find Jobs</a></li>
                            <li class="fltright"><a href="edit_user.php">Edit Detalis</a></li>
                        </ul>
                    </nav>
            </header>
            <section class="postjb">
                <div class="box">
                    <h4>Hey <?php echo $_SESSION['U_NAME']; ?></h4>
                    <p>upload your resume to enables quick apply.</p>
                    <a href="resume.php">Upload Resume</a>
                </div>
            </section><!-- select * FROM under_scrutiny join comp WHERE under_scrutiny.injob_id in (select inserted_job.injob_id from inserted_job) and under_scrutiny.us_status = "Pending" -->

            <section class="handle_request">
                    <h3>Requested Job Status :</h3>
                    <div></div>
                    <div class="wrap-table100">
                        
                        <div class="table100 ver2 m-b-110">
                            <div class="table100-head">
                                <table>
                                    <thead>
                                        <tr class="row100 head">
                                            <th class="cell100 column3">Job Title</th>
                                            <th class="cell100 column2">Job Type</th>
                                            <th class="cell100 column3">Company Name</th>
                                            <th class="cell100 column4">Company Email</th>
                                            <th class="cell100 column4">Company Address</th>
                                            <th class="cell100 column5">Applied Date</th>
                                            <th class="cell100 column5">status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
        
                            <?php
                                $id=$_SESSION['U_ID'];
                                $query="SELECT inserted_job.injob_title,inserted_job.injob_type,comp.comp_name,comp.comp_email,comp.comp_area,us_applieddate,us_status from under_scrutiny 
                                inner join inserted_job on inserted_job.injob_id=under_scrutiny.injob_id 
                                inner join comp on inserted_job.comp_id=comp.comp_id 
                                and under_scrutiny.us_status='Pending'
                                and under_scrutiny.user_id=$id";
                                $result=mysqli_query($con,$query);
                                $rows=mysqli_num_rows($result);
                                while( $row=mysqli_fetch_assoc($result))
                                {
                            ?>                                
                                <div class="table100-body js-pscroll">
                                    <table>
                                        <tbody>
                                            <tr class="row100 body">
                                                <td class="cell100 column3"><?php echo $row['injob_title'] ?></td>
                                                <td class="cell100 column2"><?php echo $row['injob_type'] ?></td>
                                                <td class="cell100 column3"><?php echo $row['comp_name'] ?></td>
                                                <td class="cell100 column4"><?php echo $row['comp_email'] ?></td>
                                                <td class="cell100 column4"><?php echo $row['comp_area'] ?></td>
                                                <td class="cell100 column5"><?php echo $row['us_applieddate'] ?></td>
                                                <td class="cell100 column5"><?php echo $row['us_status'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                                 }
                            ?>

                            <p class="right">  Approved Application: <b> N </b> Pending Application: <b><?php echo $rows ?></b> </p>
                        </div>
                             
                    </div> 
            </section>
            <section class="handle_request">
                    <h3>Accepted Job Status :</h3>
                    <div></div>
                    <div class="wrap-table100">
                        
                        <div class="table100 ver2 m-b-110">
                            <div class="table100-head">
                                <table>
                                    <thead>
                                        <tr class="row100 head">
                                            <th class="cell100 column3">Job Title</th>
                                            <th class="cell100 column2">Job Type</th>
                                            <th class="cell100 column3">Company Name</th>
                                            <th class="cell100 column4">Company Email</th>
                                            <th class="cell100 column4">Company Address</th>
                                            <th class="cell100 column5">Applied Date</th>
                                            <th class="cell100 column5">status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
        
                            <?php
                                $id=$_SESSION['U_ID'];
                                $query="SELECT inserted_job.injob_title,inserted_job.injob_type,comp.comp_name,comp.comp_email,comp.comp_area,us_applieddate,us_status from under_scrutiny 
                                inner join inserted_job on inserted_job.injob_id=under_scrutiny.injob_id 
                                inner join comp on inserted_job.comp_id=comp.comp_id 
                                and under_scrutiny.us_status='Successful'
                                and under_scrutiny.user_id=$id";
                                $result=mysqli_query($con,$query);
                                $rows=mysqli_num_rows($result);
                                while( $row=mysqli_fetch_assoc($result))
                                {
                            ?>                                
                                <div class="table100-body js-pscroll">
                                    <table>
                                        <tbody>
                                            <tr class="row100 body">
                                                <td class="cell100 column3"><?php echo $row['injob_title'] ?></td>
                                                <td class="cell100 column2"><?php echo $row['injob_type'] ?></td>
                                                <td class="cell100 column3"><?php echo $row['comp_name'] ?></td>
                                                <td class="cell100 column4"><?php echo $row['comp_email'] ?></td>
                                                <td class="cell100 column4"><?php echo $row['comp_area'] ?></td>
                                                <td class="cell100 column5"><?php echo $row['us_applieddate'] ?></td>
                                                <td class="cell100 column5"><?php echo $row['us_status'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                                 }
                            ?>
                        </div>
                             
                    </div> 
            </section>
            <section class="handle_request">
                    <h3>Falied Job Status :</h3>
                    <div></div>
                    <div class="wrap-table100">
                        
                        <div class="table100 ver2 m-b-110">
                            <div class="table100-head">
                                <table>
                                    <thead>
                                        <tr class="row100 head">
                                            <th class="cell100 column3">Job Title</th>
                                            <th class="cell100 column2">Job Type</th>
                                            <th class="cell100 column3">Company Name</th>
                                            <th class="cell100 column4">Company Email</th>
                                            <th class="cell100 column4">Company Address</th>
                                            <th class="cell100 column5">Applied Date</th>
                                            <th class="cell100 column5">status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
        
                            <?php
                                $id=$_SESSION['U_ID'];
                                $query="SELECT inserted_job.injob_title,inserted_job.injob_type,comp.comp_name,comp.comp_email,comp.comp_area,us_applieddate,us_status from under_scrutiny 
                                inner join inserted_job on inserted_job.injob_id=under_scrutiny.injob_id 
                                inner join comp on inserted_job.comp_id=comp.comp_id 
                                and under_scrutiny.us_status='Falied'
                                and under_scrutiny.user_id=$id";
                                $result=mysqli_query($con,$query);
                                $rows=mysqli_num_rows($result);
                                while( $row=mysqli_fetch_assoc($result))
                                {
                            ?>                                
                                <div class="table100-body js-pscroll">
                                    <table>
                                        <tbody>
                                            <tr class="row100 body">
                                                <td class="cell100 column3"><?php echo $row['injob_title'] ?></td>
                                                <td class="cell100 column2"><?php echo $row['injob_type'] ?></td>
                                                <td class="cell100 column3"><?php echo $row['comp_name'] ?></td>
                                                <td class="cell100 column4"><?php echo $row['comp_email'] ?></td>
                                                <td class="cell100 column4"><?php echo $row['comp_area'] ?></td>
                                                <td class="cell100 column5"><?php echo $row['us_applieddate'] ?></td>
                                                <td class="cell100 column5"><?php echo $row['us_status'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                                 }
                            ?>
                        </div>
                             
                    </div> 
            </section>
            <script src="../css/vendor/jquery/jquery-3.2.1.min.js"></script>
            <script src="../css/vendor/bootstrap/js/popper.js"></script>
            <script src="../css/vendor/bootstrap/js/bootstrap.min.js"></script>
            <script src="../css/vendor/select2/select2.min.js"></script>
            <script src="../css/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    </body>
</html>
    <?php }
?>