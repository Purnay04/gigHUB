<?php
include "connection.php";
session_start();
error_reporting(0);

if(isset($_GET['apply'])){

    //$id=$_SESSION['GET_CHN'];
    //echo "<script>alert('$id')</script>";
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/jobstyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="assests/icon.png" type="image/x-icon"/>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <script type="text/javascript">
        function res(id,e){
            var txt;
            loc="job_content.php?id"+id;
            e.preventDefault();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onload  = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //alert(this.responseText);
                    var myObj = JSON.parse(this.responseText);
                    for (x in myObj) {
                        var injob_title=myObj[x].injob_title;
                        var result = ['bgg1.png', 'bgg2.png', 'bgg3.png','bgg4.jpg','bgg5.png'][Math.floor(Math.random() * 5)];
                    
                        document.getElementsByClassName('image-content')[0].style.background="url('css/"+result+"') no-repeat center";
                        document.getElementsByClassName('image-content')[0].style.backgroundSize="cover";
                        //document.getElementById('image-content')[0].style.animation="fadeUp .5s forwards";


                        document.getElementById('injob_title').style.animation="fade .5s forwards";
                        document.getElementById("injob_title").innerHTML =injob_title;
                        
                        document.getElementById('comp_name').style.animation="fade .5s forwards";
                        document.getElementById("comp_name").innerHTML = myObj[x].comp_name;

                        document.getElementById('injob_type').style.animation="fade .5s forwards";
                        document.getElementById("injob_type").innerHTML = myObj[x].injob_type;

                        document.getElementById('injob_desc').style.animation="fade .5s forwards";
                        document.getElementById("injob_desc").innerHTML = myObj[x].injob_desc;

                        document.getElementById('injob_exp').style.animation="fade .5s forwards";
                        document.getElementById("injob_exp").innerHTML = myObj[x].injob_exp;

                        document.getElementById('injob_pay').style.animation="fade .5s forwards";
                        document.getElementById("injob_pay").innerHTML = myObj[x].injob_pay;
                    }
                }
            };
            xmlhttp.open("GET", "onSelect.php?id="+id, true);
            xmlhttp.send();
            return false;
        }
    </script>
    <style>
    </style>
    <body>



        <header>
            <nav>
                <div class="icon"><a href="index.php">gigHUB</a></div>
                <ul>
                    <?php 
                        if($_SESSION['U_TYPE']!='EMPLOYER'){?>
                            <li><a href="signin_emp.php">Employers/Post Job</a></li>
                        <?php
                        }else{
                        ?>
                            <li><a href="post_job.php">Employers/Post Job</a></li>
                        <?php } ?>
                        <?php 
                        if($_SESSION['U_TYPE']!='USER'){?>
                            <li class="fltright"><a href="sign_in.php" class="blueone">Sign in</a></li>
                        <?php
                        }else{
                        ?>
                           <li class="fltright"><a href="user_home.php" class="blueone">Dashboard</a></li>
                        <?php } ?>
                    <li class="fltright"><a href="resume.php">Post your resume</a></li> 
                </ul>
            </nav>
            <form action="">
                <div class="search-boxes">
                        <div class="what">
                            <h4>What</h4>
                            <input type="text" name="WHAT" id="" placeholder="Job title,Keyword,or company">
                            <i class="fa fa-question"></i>
                        </div>
                        <div class="where">
                            <h4>Where</h4>
                            <input type="text" name="WHERE" id="" placeholder="city or state">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="btnsearch">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                </div>
            </form>
            <div class="fliter">
                <ul>
                    <li id="timefact"><p>Job Type <i class="fa fa-chevron-down"></i></p>
                        <ul>
                            <li><input type="checkbox" name="All" checked>All</li>
                            <li><input type="checkbox" name="Full Time">Full Time</li>
                            <li><input type="checkbox" name="Part Time">Part Time</li>
                            <li><input type="checkbox" name="Contractor">Contractor</li>
                        </ul>
                    </li>
                    <li><p>Date Posted <i class="fa fa-chevron-down"></i></p>
                        <ul>
                            <li><input type="radio" name="dur" checked>24 hours</li>
                            <li><input type="radio" name="dur">3 days</li>
                            <li><input type="radio" name="dur">7 days</li>
                            <li><input type="radio" name="dur">30 days</li>
                        </ul>
                    </li>
                    <li class="head"><p>Pay <i class="fa fa-chevron-down"></i></p>
                        <ul>
                            <li><input type="radio" name="est" checked>Any</li>
                            <li><input type="radio" name="est">2 lakh +</li>
                            <li><input type="radio" name="est">6.5 lakh +</li>
                            <li><input type="radio" name="est">15 lakh +</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>



        <div class="parts">
        <section class="job-card">
            <div class="box">
                <?php 
                    $what=$_REQUEST['WHAT'];
                    $where=$_REQUEST['WHERE'];
                    //echo "<script>alert('$where');</script>";
                    $query="SELECT * from inserted_job inner join comp on comp.comp_id = inserted_job.comp_id where injob_title REGEXP '$what' and comp.comp_area REGEXP '$where' order by injob_date DESC ";
                    //echo $query;
                    $result=mysqli_query($con,$query);
                    $rows=mysqli_num_rows($result);
                    $i=0;
                ?>
                <div class="box-content">
                    <h3><?php echo $rows ?> Jobs Found</h3>
                    <a href="">Save Search</a>
                </div>
                <?php
                while( $row=mysqli_fetch_assoc($result))
                {
                    if($i==0){ 
                              session_start();
                              $first_row=$row; 
                              $_SESSION['GET_CHN']=$row['injob_id'];
                              $i=$i+1;
                            }
                ?>
                <div class="cardcontainer">            
                        <div class="card">
                            <a href="" onClick="res(<?php echo $row['injob_id'];?>,event)" >
                                <div class="img"><?php echo $row['injob_title'][0];?></div>
                                <div class="content">
                                    <p>
                                        <?php
                                              $datetime1 = new DateTime();
                                              $datetime2 = new DateTime($row['injob_date']);   /*(Y-M-D) */
                                              $interval = $datetime1->diff($datetime2);
                                              $elapsed = $interval->format('%a');
                                              if($elapsed==0)           echo "Today";
                                              else                      echo $elapsed." Day Ago"; 
                                        ?>
                                    </p>
                                    <h4><?php echo $row['injob_title'];?></h4>
                                    <p><?php echo $row['comp_name'];?></p><p><?php echo $row['injob_type'];?></p>
                                </div>
                            </a>    
                        </div>
                </div>
                <?php } ?>
            </div>
        </section> 
       
        <!--<iframe src="job_content.php?id=3" class="job-content" id="job-content"></iframe>-->
        <section id="job-content" class="job-content">
            <div class="container">
                <div class="image-content">
                    <div class="content">
                        <div class="text">
                            <h4 id="injob_title"><?php echo $first_row['injob_title'];?></h4>
                            <p id="comp_name"><?php echo $first_row['comp_name'];?></p><p id="injob_type"><?php echo $first_row['injob_type'];?></p>
                        </div>
                        <div class="btn">
                                <a href="apply.php?id=<?php echo $_SESSION['GET_CHN'];?>" name="apply">Apply Now</a>
                        </div>
                    </div>
                </div>
                <div class="small-nav">
                    <a href="">Job Details</a>
                    <i class="fa fa-heart-o"></i>
                </div>
                <div class="content">
                    <div class="left">
                        <h3>Description</h3>
                        <p id="injob_desc"><?php echo $first_row['injob_desc'];?></p>
                        <h3>Required Experience</h3>
                        <p id="injob_exp"><?php echo $first_row['injob_exp'];?> Year</p>
                        <h3>Salary</h3>
                        <p id="injob_pay"><?php echo $first_row['injob_pay'];?></p>
                        <div class="applybox">
                            <h4>Apply to this job.</h4>
                            <p>Think you're the perfect candidate?</p>
                            <a href="" name="apply">Apply Now</a>
                        </div>
                    </div>
                
                </div>
            </div>
        </section>
    </div>
    </body>
</html>