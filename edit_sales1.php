<?php

if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
require('menu.php'); 
// Code to be executed when 'Insert' is clicked. 
if ($_POST['submit'] == 'Insert'){
//validation flag to check that all validations are done 
$validationFlag = true; 
//Check all the required fields are filled 
if(!($_POST['transaction_id'])){ 
echo 'All the fields marked as * are compulsary.<br>'; 
$validationFlag = false; 
} 

else{ 
$transaction_id = $_POST['transaction_id']; 
$product_code = $_POST['product_code']; 
$quantity = $_POST['quantity']; 
$date=$_POST['date'];
}


if($validationFlag){ 
//Connect to mysql server 
$link = mysqli_connect('localhost', 'root', ''); 
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error($link)); 
} 
//Select database 
$db = mysqli_select_db($link,'business'); 
if(!$db){ 
die("Unable to select database"); 
} 
$query= "SELECT product_name,price FROM stock where product_code='$product_code'";
$result=mysqli_query($link,$query);

while($row = mysqli_fetch_assoc($result)){
    $product_name=$row['product_name'];
    $price=$row['price'];
}

$amount=$quantity*$price;

$query = "INSERT INTO sales VALUES ('$transaction_id','$product_code','$product_name','$quantity','$price','$amount','$date')"; 
//Execute query 
$results = mysqli_query($link,$query); 
 
//Check if query executes successfully 
if($results == FALSE) 
echo mysqli_error($link) . '<br>'; 
else 
echo 'Data inserted successfully! '; 
} 
} 
} 
else{ 
    echo "hi";
header('location:login_form.php'); 
exit(); 
} 
?>