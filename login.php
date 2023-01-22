<?php
    session_start();
    $host = "localhost:3306";  
    $db_user = "root";  
    $db_password = "";  
    $db_name = "sis"; 

    $username = $_POST['username'];
    $password = $_POST['password'];

     //Database connection
    $con = mysqli_connect($host,$db_user,$db_password,$db_name);
    
    if($con->connect_error)
    {
        echo "$con->connect-error";
        die("Connection Failed :".$con->connect_error);
    }else
    {

        if($username == 'admin'){
            echo("<SCRIPT LANGUAGE='JavaScript'>
            window.alert('Please use Admin Login for Admin User');
            window.location.href='login.html';
            </SCRIPT>");
        }
        else{
            $s = "select * from login where username = '$username' && password = '$password'";
        
            $result = mysqli_query($con,$s);

            $num = mysqli_num_rows($result);

            if($num == 1)
            {
                echo("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Login Successful !');
                window.location.href='home.html';
                </SCRIPT>");
            }
            else{      
                echo("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('User not Found :/')
                </SCRIPT>");
            } 
        }
        
    }
?>