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
echo '<center>Please fill valid details</center>'; 
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
$db = mysqli_select_db($link,'test'); 
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
echo '<center>Data inserted successfully! </center>'; 
} 
} 
 
// Code to be executed when 'Update' is clicked. 
if ($_POST['submit'] == 'Update'){ 
if(!$_POST['customer_id']) 
echo '<center>Enter the Id of the Customer</center>'; 
else{ 
$validationFlag = true;

$customer_id = $_POST['customer_id']; 
$customer_name = $_POST['customer_name']; 
$phone_number = $_POST['phone_number'];

if($_POST['customer_name'] && $_POST['phone_number'] ){ 
$update = "UPDATE customer SET customer_name = '$customer_name',phone_number = '$phone_number' WHERE customer_id = '$customer_id'"; 
}
else if($_POST['customer_name']){ 
$update = "UPDATE customer SET customer_name = '$customer_name' WHERE customer_id = '$customer_id'"; 
}
else if($_POST['phone_number']){ 
$update = "UPDATE customer SET phone_number = '$phone_number' WHERE customer_id = '$customer_id'"; 
} 
//check if that id exist
$link = mysqli_connect('localhost', 'root', '');
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
$db = mysqli_select_db($link,'test'); 
if(!$db){ 
die("Unable to select database"); 
} 
$sql_check = "SELECT * FROM customer WHERE customer_id='$customer_id'";
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
if(!$_POST['customer_id']) 
echo '<center>Enter the Id of the Customer</center>'; 
else{ 

$customer_id = $_POST['customer_id']; 
 $link = mysqli_connect('localhost', 'root', '');
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
$db = mysqli_select_db($link,'test'); 
if(!$db){ 
die("Unable to select database"); 
} 
$sql_check = "SELECT * FROM customer WHERE customer_id='$customer_id'";
$result_check = mysqli_query($link,$sql_check);
$num=mysqli_num_rows($result_check);
if($num<=0){
die("<center>ID is invalid</center>"); 
}

$delete = "DELETE FROM customer WHERE customer_id = '$customer_id'"; 
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
