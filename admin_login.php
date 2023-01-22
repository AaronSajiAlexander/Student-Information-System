<?php
    session_start();
    $host = "localhost:3306";  
    $db_user = "root";  
    $db_password = "";  
    $db_name = "sis"; 

    $password = $_POST['password'];

     //Database connection
    $con = mysqli_connect($host,$db_user,$db_password,$db_name);
    
    
    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }else
    {

        $s = "select * from login where username = 'admin' && password = '$password'";
        
        $result = mysqli_query($con,$s);

        $num = mysqli_num_rows($result);

        if($num == 1)
        {
            echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Admin Login Successful !');
        window.location.href='admin_home.html';
        </SCRIPT>");
        }
        else{      
        echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Admin not Found :/')
         window.location.href='admin_login.html';
        </SCRIPT>");
        }
    }

?>