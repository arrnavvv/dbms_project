<?php
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
require('menu.php'); 
 
// Code to be executed when 'Update' is clicked. 
if ($_POST['submit'] == 'Update'){ 
if(!$_POST['staff_id']) 
echo 'Enter the Id of the Employee as it is the primary key.'; 
else{ 
$validationFlag = true;

$staff_id = $_POST['staff_id']; 
$staff_name = $_POST['staff_name']; 
$phone_number = $_POST['phone_number']; 
$department = $_POST['department'];  

if($_POST['staff_name']){ 
$update = "UPDATE staff SET cstaff_name = '$staff_name' WHERE staff_id = '$staff_id'"; 
}
if($_POST['phone_number']){ 
$update = "UPDATE staff SET phone_number = '$phone_number' WHERE staff_id = '$staff_id'"; 
} 
if($_POST['department']){ 
$update = "UPDATE staff SET department = '$department' WHERE staff_id = '$staff_id'"; 
} 

//If all validations are correct, connect to MySQL and execute the query 
if($validationFlag){ 
//Connect to mysql server 
$link = mysqli_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
//Select database 
$db = mysqli_select_db($link,'test'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Execute query 
$results = mysqli_query($link,$update); 
if($results == FALSE) 
echo mysqli_error() . '<br>'; 
else 
echo mysqli_info(); 
} 
} 
} 
// Code to be executed when 'Delete' is clicked. 
if ($_POST['submit'] == 'Delete'){ 
if(!$_POST['staff_id']) 
echo 'Enter the Id of the Employee as it is the primary key.'; 
else{ 

$staff_id = $_POST['staff_id']; 
$staff_name = $_POST['staff_name']; 
$phone_number = $_POST['phone_number']; 
$department = $_POST['department'];

$delete = "DELETE FROM staff WHERE staff_id = '$staff_id'"; 
//Connect to mysql server 
$link = mysqli_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
//Select database 
$db = mysqli_select_db($link,'test'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Execute query 
$results = mysqli_query($link,$delete); 
if($results == FALSE) 
echo mysqli_error() . '<br>'; 
else 
echo 'Data deleted successfully'; 
} 
} 
} 
else{ 
header('location:login_modified.php'); 
exit(); 
} 
?>
