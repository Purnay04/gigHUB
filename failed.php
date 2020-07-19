<?php
    include('connection.php');
    $id=$_GET['id'];
    $query="update under_scrutiny set us_status='Falied' where us_id=$id";
    mysqli_query($con,$query);
    header('location:employer_home.php');
?>
