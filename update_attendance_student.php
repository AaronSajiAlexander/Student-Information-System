<?php
    session_start();
    $host = "localhost:3306";  
    $db_user = "root";  
    $db_password = "";  
    $db_name = "sis"; 

    $student_id = $_POST['student_id'];
    $attendance = $_POST['attendance'];

     //Database connection
    $con = mysqli_connect($host,$db_user,$db_password,$db_name);
    
    
    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }else
    {

        $s = "update attendance_details set attendance = '$attendance' where student_id = '$student_id'";
        
        $result = mysqli_query($con,$s);


        if($result)
        {
            echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Student Updated!');
        window.location.href='faculty_update_user.html';
        </SCRIPT>");
        }
        else{      
        echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Student not found :/');
        window.location.href='faculty_update_user.html';
        </SCRIPT>");
        }
    }

?>