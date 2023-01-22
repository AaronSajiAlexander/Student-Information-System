<?php
    session_start();
    $host = "localhost:3306";  
    $db_user = "root";  
    $db_password = "";  
    $db_name = "sis"; 

    $username = $_POST['user_id'];

     //Database connection
    $con = mysqli_connect($host,$db_user,$db_password,$db_name);
    
    
    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }else
    {

        $s = "delete from login where username='$username'";
        
        $result = mysqli_query($con,$s);


        if($result)
        {
            echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('User Deleted!');
        window.location.href='admin_home.html';
        </SCRIPT>");
        }
        else{      
        echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Error in deletion :/')
        </SCRIPT>");
        }
    }

?>