<?php
        
    $link = mysqli_connect("localhost", "root", "", "Scholorship Form");
    if(isset($_POST['apply'])){
        if($link === false){
            die("ERROR: Could not connect. "
                        . mysqli_connect_error());
        }
        else{
            $adhar = $_POST['adhar'];
            $scholorship = $_POST['scholorship'];
            $caste = $_POST['caste'];
            $income = $_POST['income'];
            $fee = $_POST['fee'];
            $student = $_COOKIE["email"];
            $sql1 = "UPDATE scholorship_details SET adhar_card = '$adhar',scholorship ='$scholorship', caste = '$caste',income='$income', fee = '$fee' WHERE email = '$student'";
            if(!mysqli_query($link,$sql1))
            {
            echo  "<script>alert('Failed to enter data');</script>";
            }
            else 
            {
            header("Location: ../main.html");
            error_reporting(0);
            }
        }            
        mysqli_close($link);
    }
?>