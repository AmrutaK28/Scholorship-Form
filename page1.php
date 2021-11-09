<?php
        
    $link = mysqli_connect("localhost", "root", "", "Scholorship Form");
    if(isset($_POST['next'])){
        if($link === false){
            die("ERROR: Could not connect. "
                        . mysqli_connect_error());
        }
        else{
            $name = $_POST['name'];
            $email = $_POST['email'];
            $date = $_POST['date'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            setcookie('email', $email); 
            $sql1 = "INSERT INTO scholorship_details (name,email,dob,contact_no,address) VALUES('$name','$email','$date','$contact','$address')";
            if(!mysqli_query($link,$sql1))
            {
            echo  "<script>alert('Failed to enter data');</script>";
            }
            else 
            {
            header("Location: ../page2.html");
            error_reporting(0);
            }
        }            
        mysqli_close($link);
    }
?>