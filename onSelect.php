<?php
        session_start();
        include 'connection.php';
        $_SESSION['GET_CHN']=$_GET['id'];
        $id=$_GET['id'];
        $query="Select comp.comp_name,injob_title,injob_type,injob_pay,injob_exp,injob_desc from inserted_job inner join comp on comp.comp_id= inserted_job.comp_id where injob_id='$id'";
        $result=mysqli_query($con,$query);
        $results = array();
        $row=mysqli_fetch_array($result);
        $results[] = array(
                'comp_name'=>$row['comp_name'], 
                'injob_title'=> $row['injob_title'], 
                'injob_type'=> $row['injob_type'],
                'injob_pay'=> $row['injob_pay'],
                'injob_exp'=> $row['injob_exp'],
                'injob_desc'=> $row['injob_desc']
                );
        echo json_encode($results);
        //echo $_GET['id'];
?>
