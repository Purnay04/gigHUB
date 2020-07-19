<?php 
    include('connection.php');
    session_start();
    if($_SESSION['U_TYPE']!='EMPLOYER'){
        header("location:index.php");
    }
    else{
?>
<html>
    <head>
        <link rel="stylesheet" href="css/employer_home.css">
        <link rel="stylesheet" type="text/css" href="../css/boostrap/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/boostrap/animate/animate.css">   
        <link rel="stylesheet" type="text/css" href="../css/boostrap/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="../css/boostrap/perfect-scrollbar/perfect-scrollbar.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/mm.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="assests/icon.png" type="image/x-icon"/>
        <title>gigHUB | Employer Dashboard</title>
        <style>
            .fa-check-circle:before {
               font-size:1.5rem;
               color:green;
            }
            .fa-times-circle:before {
               font-size:1.5rem;
               color:red;
            }
        </style>
    </head>
    <body>
            <header>
                    <nav>
                        <div class="icon"><a href="index.php">gigHUB</a></div>
                        <ul>
                            <li ><a class="blueone bold" href="#">Hello <?php echo $_SESSION['U_NAME'];?>!</a></li>
                            <li class="fltright"><a class="blueone" href="logout.php">Logout</a></li>
                            <li class="fltright"><a href="edit_employer.php">Edit Detalis</a></li>
                        </ul>
                    </nav>
            </header>
            <section class="postjb">
                <div class="box">
                    <h4>Hey</h4>
                    <p>We provides a dynamic way to post your jobs</p>
                    <a href="post_job.php">Post a Job</a>
                </div>
            </section>
            <section class="handle_request">
                    <h3>Manage Job Request :</h3>
                    <div></div>
                    <div class="wrap-table100">
                        
                        <div class="table100 ver2 m-b-110">
                            <div class="table100-head">
                                <table>
                                    <thead>
                                        <tr class="row100 head">
                                            <th class="cell100 column3">Job Title</th>
                                            <th class="cell100 column2">Job Type</th>
                                            <th class="cell100 column3">User Name</th>
                                            <th class="cell100 column4">User Email</th>
                                            <th class="cell100 column4">User phone</th>
                                            <th class="cell100 column5">Resume</th>
                                            <th class="cell100 column5">status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
        
                            <?php  
                                $id=$_SESSION['U_ID']; 
                                $query="SELECT us_id,inserted_job.injob_title,inserted_job.injob_type,user.user_name,user.user_email,user.user_phone,us_applieddate,us_status,user.resume from under_scrutiny 
                                inner join inserted_job on inserted_job.injob_id=under_scrutiny.injob_id and inserted_job.comp_id=$id
                                inner join user on user.user_id=under_scrutiny.user_id and under_scrutiny.us_status='Pending'";
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
                                            <td class="cell100 column3"><?php echo $row['user_name'] ?></td>
                                            <td class="cell100 column4"><?php echo $row['user_email'] ?></td>
                                            <td class="cell100 column4"><?php echo $row['user_phone'] ?></td>
                                            <td class="cell100 column5"><a href="<?php echo $row['resume'] ?>"><?php echo $row['resume'] ?></a></td>
                                            <td class="cell100 column5"> <a href="successful.php?id=<?php echo $row['us_id'];?>"><i class="fa fa-check-circle col"></i></a> <a href="failed.php?id=<?php echo $row['us_id'];?>"> <i class="fa fa-times-circle"></i> </a> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php 
                                 }
                            ?>

                            <p class="right">  Approved Application: <b> N </b> Pending Application: <b> P </b> </p>
                        </div>
                             
                    </div> 
            </section>
            <section class="handle_request">
                    <h3>Approved Job Request :</h3>
                    <div></div>
                    <div class="wrap-table100">
                        
                        <div class="table100 ver2 m-b-110">
                            <div class="table100-head">
                                <table>
                                    <thead>
                                        <tr class="row100 head">
                                            <th class="cell100 column3">Job Title</th>
                                            <th class="cell100 column2">Job Type</th>
                                            <th class="cell100 column3">User Name</th>
                                            <th class="cell100 column4">User Email</th>
                                            <th class="cell100 column4">User phone</th>
                                            <th class="cell100 column5">Resume</th>
                                            <th class="cell100 column5">status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
        
                            <?php  
                                $id=$_SESSION['U_ID']; 
                                $query="SELECT inserted_job.injob_title,inserted_job.injob_type,user.user_name,user.user_email,user.user_phone,us_applieddate,us_status,user.resume from under_scrutiny 
                                inner join inserted_job on inserted_job.injob_id=under_scrutiny.injob_id and inserted_job.comp_id=$id
                                inner join user on user.user_id=under_scrutiny.user_id and under_scrutiny.us_status='Successful'";
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
                                            <td class="cell100 column3"><?php echo $row['user_name'] ?></td>
                                            <td class="cell100 column4"><?php echo $row['user_email'] ?></td>
                                            <td class="cell100 column4"><?php echo $row['user_phone'] ?></td>
                                            <td class="cell100 column5"><a href="<?php echo $row['resume'] ?>"><?php echo $row['resume'] ?></a></td>
                                            <td class="cell100 column5"><?php echo $row['us_status'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php 
                                 }
                            ?>

                            <p class="right">  Approved Application: <b> N </b> Pending Application: <b> P </b> </p>
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