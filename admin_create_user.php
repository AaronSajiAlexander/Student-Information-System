<?php
    session_start();
    $host = "localhost:3306";  
    $db_user = "root";  
    $db_password = "";  
    $db_name = "sis"; 

    $username = $_POST['user_id'];
    $password = $_POST['user_password'];

     //Database connection
    $con = mysqli_connect($host,$db_user,$db_password,$db_name);
    
    
    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }else
    {

        $s = "insert into login(username,password) values ('$username','$password')";
        
        $result = mysqli_query($con,$s);


        if($result)
        {
            echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('User Created!');
        window.location.href='admin_home.html';
        </SCRIPT>");
        }
        else{      
        echo("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Couldn't create user :/')
        </SCRIPT>");
        }
    }

?>