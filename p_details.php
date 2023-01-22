<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Personal Details</title>
</head>

<body>
    <div>
        <div>
            <div class="forms">
                <div class="form-login">
                    <span class="title">
                        <center><h1>Personal Details</h1></center>
                    </span>
                    <?php

                    session_start();
                    $host = "localhost:3306";  
                    $db_user = "root";  
                    $db_password = "";  
                    $db_name = "sis"; 

                    $studentid = $_POST['student_id'];

                    // Database connection
                    $con = mysqli_connect($host,$db_user,$db_password,$db_name);

                    if($con->connect_error)
                    {
                    echo "$con->connect-error";
                    die("Connection Failed :".$con->connect_error);
                    }
                    else{

                    $stmt2 = "select * from personal_details where student_id = '$studentid'"; 

                    $res = mysqli_query($con,$stmt2);

                    $row = mysqli_fetch_array($res); 
                    $count = 1;  
                    if($row)
                    {
                        while($row)
                        {

                        echo'<div>'.
                        '<h5>Student ID : '.$row["student_id"].'</h5>'.        
                        '<h5>Name : '.$row["name"].'</h5>'.
                        '<h5>Age : '.$row["age"].'</h5>'.
                        '<h5>Gender : '.$row["gender"].'</h5>'.
                        '<h5>Parent Phone number : '.$row["parent_pno"].'</h5>'.
                        '<h5>Blood Group : '.$row["bloodgroup"].'</h5>'.
                        '<h5>Father\'s name : '.$row["father_name"].'</h5>'.
                        '<h5>Mother\'s name : '.$row["mother_name"].'</h5>'.
                        '</div>'.
                
                        $row = mysqli_fetch_array($res);
                        $count = $count + 1;  
                        }
                        mysqli_free_result($res);
                        mysqli_close($con);
                    } 
                    else{
                        echo("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Student not found');
                        window.location.href='home.html';
                        </SCRIPT>");
                    }
                    }
                ?>
                    <button onclick="window.location='home.html'">Home Page</button>
                    <button onclick="window.location='login.html'">Exit</button>
                    <button onclick="window.location='request_change.php'">Request change</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>