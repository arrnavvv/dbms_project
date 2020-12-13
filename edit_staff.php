<?php
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
require('menu.php'); 
 
// Code to be executed when 'Update' is clicked. 
if ($_POST['submit'] == 'Update'){ 
if(!$_POST['staff_id']) 
echo '<center>Enter the Id of the Employee</center> '; 
else{ 
$validationFlag = true;

$staff_id = $_POST['staff_id']; 
$staff_name = $_POST['staff_name']; 
$phone_number = $_POST['phone_number']; 
$department = $_POST['department'];  

if($_POST['staff_name'] && $_POST['phone_number']&& $_POST['department']){ 
$update = "UPDATE staff SET staff_name = '$staff_name', phone_number = '$phone_number',department = '$department' WHERE staff_id = '$staff_id'"; 
}
else if($_POST['phone_number']){ 
$update = "UPDATE staff SET phone_number = '$phone_number' WHERE staff_id = '$staff_id'"; 
} 
else if($_POST['department']){ 
$update = "UPDATE staff SET department = '$department' WHERE staff_id = '$staff_id'"; 
} 
else if($_POST['staff_name']){ 
$update = "UPDATE staff SET staff_name = '$staff_name' WHERE staff_id = '$staff_id'"; 
} 
else if($_POST['staff_name'] && $_POST['phone_number']){ 
$update = "UPDATE staff SET staff_name = '$staff_name',phone_number='$phone_number' WHERE staff_id = '$staff_id'"; 
} 
else if($_POST['staff_name'] && $_POST['department']){ 
$update = "UPDATE staff SET staff_name = '$staff_name',department='$department' WHERE staff_id = '$staff_id'"; 
} 
else if($_POST['phone_number'] && $_POST['department']){ 
$update = "UPDATE staff SET phone_number = '$phone_number',department='$department' WHERE staff_id = '$staff_id'"; 
} 

//check if ID exists
$link = mysqli_connect('localhost', 'root', '');
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
$db = mysqli_select_db($link,'test'); 
if(!$db){ 
die("Unable to select database"); 
} 
$sql_check = "SELECT * FROM staff WHERE staff_id='$staff_id'";
$result_check = mysqli_query($link,$sql_check);
$num=mysqli_num_rows($result_check);
if($num<=0){
die("<center>ID is invalid</center>"); 
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
echo mysqli_error($link) . '<br>'; 
else 
echo '<center>Entry updated</center>'; 
} 
} 
} 
// Code to be executed when 'Delete' is clicked. 
if ($_POST['submit'] == 'Delete'){ 
if(!$_POST['staff_id']) 
echo '<center>Enter the Id of the Employee<c/center>'; 
else{ 

$staff_id = $_POST['staff_id']; 
$staff_name = $_POST['staff_name']; 
$phone_number = $_POST['phone_number']; 
$department = $_POST['department'];

$link = mysqli_connect('localhost', 'root', '');
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
$db = mysqli_select_db($link,'test'); 
if(!$db){ 
die("Unable to select database"); 
} 
$sql_check = "SELECT * FROM staff WHERE staff_id='$staff_id'";
$result_check = mysqli_query($link,$sql_check);
$num=mysqli_num_rows($result_check);
if($num<=0){
die("<center>ID is invalid</center>"); 
}
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
echo '<center>Data deleted successfully</center>'; 
} 
} 
} 
else{ 
header('location:login_modified.php'); 
exit(); 
} 
?>
