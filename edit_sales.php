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
if(!($_POST['transaction_id']))
{ 
echo '<center>Please enter valid data.</center>'; 
$validationFlag = false; 
} 

else{ 
    $transaction_id = $_POST['transaction_id']; 
    $customer_id = $_POST['customer_id']; 
    $product_id = $_POST['product_id']; 
    $quantity = $_POST['quantity']; 
    $date=$_POST['date'];
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
$flag=true;

$query="SELECT * from customer where customer_id='$customer_id'";
$result=mysqli_query($link,$query);
if (mysqli_num_rows($result)==0) {
    die('<center>Enter Correct Customer Id!!</center>');
    $flag=false;
  }

$query="SELECT * from product where product_id='$product_id'";
$result=mysqli_query($link,$query);
if (mysqli_num_rows($result)==0) {
    die( '<center>Enter Correct Product Id!!</center>');
    $flag=false;
}

if($flag){
    $query= "SELECT product_name,price,stock FROM product where product_id='$product_id'";
    $result=mysqli_query($link,$query);

    while($row = mysqli_fetch_assoc($result)){
        $product_name=$row['product_name'];
        $price=$row['price'];
        $stock=$row['stock'];
    }

    if($quantity<=$stock && $stock!=0){

        $amount=$quantity*$price;
        $query = "INSERT INTO sales VALUES ('$transaction_id','$customer_id','$product_id','$product_name','$quantity','$price','$amount','$date')"; 
        //Execute query 
        $results = mysqli_query($link,$query); 

        $query= "UPDATE product set stock=stock-$quantity where product_id='$product_id'";
        $results = mysqli_query($link,$query);

        if($results == FALSE) 
        echo mysqli_error($link) . '<br>'; 
        else 
        echo '<center>Data inserted successfully! </center>';
    }
    else{
        echo "<center>Stock Available is less than the Quantity ordered.<br> Stock Available for the ".$product_name." in the company is ".$stock."</center>";
    } 
}
} 
} 

} 
else{ 
header('location:login_modified.php'); 
exit(); 
} 
?>
