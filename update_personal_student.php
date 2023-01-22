<?php
    session_start();
    $host = "localhost:3306";  
    $db_user = "root";  
    $db_password = "";  
    $db_name = "sis"; 

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $parent_pno = $_POST['parent_pno'];
    $bloodgroup = $_POST['bloodgroup'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $student_id = $_POST['student_id'];

     //Database connection
    $con = mysqli_connect($host,$db_user,$db_password,$db_name);
    
    
    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }else
    {

        $s = "update personal_details set name = '$name',age = '$age', gender = '$gender',parent_pno = '$parent_pno',bloodgroup = '$bloodgroup',father_name = '$father_name',mother_name = '$mother_name' where student_id = '$student_id'";
        
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