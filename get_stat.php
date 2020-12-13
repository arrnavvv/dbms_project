<html>
    <head>
        <style>
            body{
                background-color: rgb(208,240,192);
            }
            .styled-table{
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.30);
            }
            .styled-table th {
                background-color: #009879;
                color: #ffffff;
                text-align: left;
            }
            .styled-table th,
            .styled-table td {
                padding: 12px 15px;
            }
            .styled-table tbody tr {
                border-bottom: 1px solid #dddddd;
            }
            .styled-table tbody tr:nth-of-type(even) {
                background-color: #f3f3f3;
            }
            .styled-table tbody tr:nth-of-type(odd) {
                background-color: rgb(211,211,211);
            }

            .styled-table tbody tr:last-of-type {
                border-bottom: 2px solid #009879;
            }
            .styled-table tbody tr.active-row {
                font-weight: bold;
                color: #009879;
            }

        </style>
    </head>
</html>


<?php 
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 

if ($_POST['submit'] == 'Product Details') 
{ 
if($_POST['product_id']) 
{ 
require('menu.php'); 
$product_id= $_POST['product_id']; 
//check if ID exists
$link = mysqli_connect('localhost', 'root', '');
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
$db = mysqli_select_db($link,'test'); 
if(!$db){ 
die("Unable to select database"); 
} 
$sql_check = "SELECT * FROM product WHERE product_id='$product_id'";
$result_check = mysqli_query($link,$sql_check);
$num=mysqli_num_rows($result_check);
if($num<=0){
die("<center>ID is invalid</center>"); 
}


$link = mysqli_connect('localhost', 'root', ''); 

if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 

$db = mysqli_select_db($link,'test'); 
if(!$db){ 
die("Unable to select database"); 
} 

$product_id= $_POST['product_id']; 
$query = "SELECT product_name,stock,price FROM product
WHERE product_id = '$product_id'";
//Execute query 
$result = mysqli_query($link,$query); 
echo "<center><h1>Product Details</h1>"; 
        echo '<center>';
        echo '<table class="styled-table" >
        <tr>
        </tr></thead><tbody>';

while($row = mysqli_fetch_array($result)) 
 
{ 
 echo '
            <tr><th>Product Name</th><td>'.$row['product_name'].'</td></tr>
            <tr><th>Stock</th><td>'.$row['stock'].'</td></tr>
            <tr><th>Price</th><td>'.$row['price'].'</td> </tr>
           ';
} 
 echo"</tbody>";
        echo '</table>';
        echo '</center>'; 
} 
else 
{ 
include("stock_stat.php"); 
echo "<center>Enter the Product Id</ center>"; 
} 
} 






if ($_POST['submit'] == 'Update Stock by 1') { 
if($_POST['product_id']) 
{ 
require('menu.php'); 
$product_id= $_POST['product_id']; 
//check if ID exists
$link = mysqli_connect('localhost', 'root', '');
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
$db = mysqli_select_db($link,'test'); 
if(!$db){ 
die("Unable to select database"); 
} 
$sql_check = "SELECT * FROM product WHERE product_id='$product_id'";
$result_check = mysqli_query($link,$sql_check);
$num=mysqli_num_rows($result_check);
if($num<=0){
die("<center>ID is invalid</center>"); 
}

$link = mysqli_connect('localhost', 'root', ''); 

if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
//Select database 
$db = mysqli_select_db($link,'test'); 
if(!$db){ 
die("Unable to select database"); 
} 
//Prepare query 
$product_id = $_POST['product_id']; 

$query1= "UPDATE product set stock=stock+1 
WHERE product_id='$product_id'";
$result1 = mysqli_query($link,$query1); 

$query2 = "SELECT product_name,stock,price FROM product
WHERE product_id = '$product_id'";
$result2 = mysqli_query($link,$query2);

echo "<center><h1>Product Details</h1>"; 
echo '<center>';
        echo '<table class="styled-table" >
        <tr>
        </tr></thead><tbody>';

while($row = mysqli_fetch_array($result2)) { 
 echo '
            <tr><th>Product Name</th><td>'.$row['product_name'].'</td></tr>
            <tr><th>Stock</th><td>'.$row['stock'].'</td></tr>
            <tr><th>Price</th><td>'.$row['price'].'</td> </tr>
           '; 
} 
echo"</tbody>";
        echo '</table>';
        echo '</center>';
} 
else { 
include("stock_stat.php"); 
echo "<center>Enter the Product Id</ center>"; 
}
}
if ($_POST['submit'] == 'Delete Stock by 1') { 
    if($_POST['product_id']) 
    { 
    require('menu.php'); 
$product_id= $_POST['product_id']; 
//check if ID exists
$link = mysqli_connect('localhost', 'root', '');
if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
$db = mysqli_select_db($link,'test'); 
if(!$db){ 
die("Unable to select database"); 
} 
$sql_check = "SELECT * FROM product WHERE product_id='$product_id'";
$result_check = mysqli_query($link,$sql_check);
$num=mysqli_num_rows($result_check);
if($num<=0){
die("<center>ID is invalid</center>"); 
}

    $link = mysqli_connect('localhost', 'root', ''); 
    
    if(!$link){ 
    die('Failed to connect to server: ' . mysqli_error()); 
    } 
    //Select database 
    $db = mysqli_select_db($link,'test'); 
    if(!$db){ 
    die("Unable to select database"); 
    } 
    //Prepare query 
    $product_id = $_POST['product_id']; 

    $query1= "UPDATE product set stock=stock-1 
    WHERE product_id='$product_id'";
    $result1 = mysqli_query($link,$query1);
    
    $query2 = "SELECT product_name,stock,price FROM product
    WHERE product_id = '$product_id'";
     $result2 = mysqli_query($link,$query2); 
     
    echo "<center><h1>Product Details</h1>"; 
   echo '<center>';
        echo '<table class="styled-table" >
        <tr>
        </tr></thead><tbody>';

    while($row = mysqli_fetch_array($result2)) { 
     echo '
            <tr><th>Product Name</th><td>'.$row['product_name'].'</td></tr>
            <tr><th>Stock</th><td>'.$row['stock'].'</td></tr>
            <tr><th>Price</th><td>'.$row['price'].'</td> </tr>
           ';  
    } 
   echo"</tbody>";
        echo '</table>';
        echo '</center>';
    } 
    else { 
    include("stock_stat.php"); 
    echo "<center>Enter the Product Id</ center>"; 
    }
    }
} 
else{ 
header('location:login_modified.php'); 
exit(); 
} 
?>
<html>
<head>
 <link rel="stylesheet" href="table.css">
</head>
</html>