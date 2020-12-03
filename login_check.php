<?php
 if($_POST['submit']=='Login'){
    $username=$_POST['login'];
    $password=$_POST['password'];

    if($username && $password){
        $link=mysqli_connect('localhost','root','');

        if(!$link){
            die('Failed to connect to the server '.mysqli_error());
        }
        $db=mysqli_select_db($link,'business');

        if(!$db){
            die('Unable to select database');
        }

        if(($username=='Harshal' && $password='harshal') || ($username=='Arnav' && $password=='arnav')){
            $count=1;
        }
        else{
            include('login_form.php'); 
            echo '<center>Incorrect Username or Password !!!<center>'; 
            exit(); 
        }

        if($count==1){
            session_start();
            $_SESSION['IS_AUTHENTICATED']=1;
            $_SESSION['USER_ID']=$username;
            header('location:business.html');
        }

        else{  
            include('login_form.php'); 
            echo '<center>Incorrect Username or Password !!!<center>'; 
            exit(); 
        }
    }
    else{ 
        include('login_form.php'); 
        echo '<center>Username or Password missing!!</center>'; 
        exit(); 
    }
 } 
else{ 
    header("location: login_form.php"); 
    exit(); 
 }  
?>