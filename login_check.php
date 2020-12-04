<?php
 if($_POST['submit']=='Login'){
    $username=$_POST['login'];
    $password=$_POST['password'];

    if($username && $password){
       
        $db=mysqli_connect('localhost','root','','test');

        if(!$db){
            die('Unable to select database');
        }

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($db, $sql);

       $num = mysqli_num_rows($result);


        if($num==1){
            session_start();
            $_SESSION['IS_AUTHENTICATED']=1;
            $_SESSION['USER_ID']=$username;
            header('location:business.html');
        }

        else{  
            include('login_modified.php'); 
            echo '<center>Incorrect Username or Password !!!<center>'; 
            exit(); 
        }
    }
    else{ 
        include('login_modified.php'); 
        echo '<center>Username or Password missing!!</center>'; 
        exit(); 
    }
 } 
else{ 
    header("location: login_modified.php"); 
    exit(); 
 }  
?>

<!--HARSHAL PAGAL>