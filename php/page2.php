<?php

$conn = mysqli_connect("localhost","root","","Scholorship Form");
if(isset($_POST['register']))
{
    if(mysqli_connect_errno($conn)){
        echo  "<script>alert('Database Connection Failed');</script>";    
    }
    else{
        $clg_name = $_POST['cname'];
        $field = $_POST['field'];
        $yr = $_POST['year'];
        $cgpa = $_POST['cgpa'];
        $backlog = $_POST['backlog'];
        $student = $_COOKIE['email'];

        $sql1 = "UPDATE scholorship_details SET college_name='$clg_name', branch='$branch', year='$yr', cgpa='$cgpa', backlog='$backlog' WHERE email='$student'";
        if(!mysqli_query($conn,$sql1)){
        echo  "<script>alert('Failed to enter data');</script>";
        }
        else {
        header("Location: ../page3.html");
        error_reporting(0);
        }
    }
}		
?>