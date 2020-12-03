<?php
//Start the session to see if the user is authenticated user. 
session_start(); 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
require('menu.php'); 
// Code to be executed when 'Insert' is clicked. 
if ($_POST['submit'] == 'Insert'){
//validation flag to check that all validations are done 
$validationFlag = true; 
//Check all the required fields are filled 
if(!($_POST['customer_id']))
{ 
echo 'All the fields marked as * are compulsary.<br>'; 
$validationFlag = false; 
} 

else{ 
$customer_id = $_POST['customer_id']; 
$customer_name = $_POST['customer_name']; 
$phone_number = $_POST['phone_number']; 
}

if($validationFlag){ 
//Connect to mysql server 
$link = mysqli_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
//Select database 
$db = mysqli_select_db($link,'business'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Create Insert query 
$query = "INSERT INTO customer VALUES ('$customer_id', '$customer_name', '$phone_number')"; 
//Execute query 
$results = mysqli_query($link,$query); 
 
//Check if query executes successfully 
if($results == FALSE) 
echo mysqli_error($link) . '<br>'; 
else 
echo 'Data inserted successfully! '; 
} 
} 
 
// Code to be executed when 'Update' is clicked. 
if ($_POST['submit'] == 'Update'){ 
if(!$_POST['staff_id']) 
echo 'Enter the Id of the Customer as it is the primary key.'; 
else{ 
$validationFlag = true;

$customer_id = $_POST['customer_id']; 
$customer_name = $_POST['customer_name']; 
$phone_number = $_POST['phone_number'];

if($_POST['customer_name']){ 
$update = "UPDATE customer SET customer_name = '$customer_name' WHERE customer_id = '$customer_id'"; 
}
if($_POST['phone_number']){ 
$update = "UPDATE customer SET phone_number = '$phone_number' WHERE customer_id = '$customer_id'"; 
} 
if($_POST['department']){ 
$update = "UPDATE customer SET department = '$department' WHERE customer_id = '$customer_id'"; 
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
$db = mysqli_select_db($link,'business'); 
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
echo 'Enter the Id of the Customer as it is the primary key.'; 
else{ 

$customer_id = $_POST['customer_id']; 
$customer_name = $_POST['customer_name']; 
$phone_number = $_POST['phone_number']; 

$delete = "DELETE FROM customer WHERE customer_id = '$customer_id'"; 
//Connect to mysql server 
$link = mysqli_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
//Select database 
$db = mysqli_select_db($link,'business'); 
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
header('location:login_form.php'); 
exit(); 
} 
?>
