<?php 
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 

if ($_POST['submit'] == 'Product Details') 
{ 
if($_POST['product_id']) 
{ 
require('menu.php'); 

$link = mysqli_connect('localhost', 'root', ''); 

if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 

$db = mysqli_select_db($link,'business'); 
if(!$db){ 
die("Unable to select database"); 
} 

$product_id= $_POST['product_id']; 
$query = "SELECT product_name,stock,price FROM product
WHERE product_id = '$product_id'";
//Execute query 
$result = mysqli_query($link,$query); 
echo "<center><h1>Product Details</h1>"; 
echo "<table border='1' cellpadding = '10'> 
<tr><th>Product Name</th> 
<th>Stock</th> 
<th>Price</th> 
</tr>"; 

while($row = mysqli_fetch_array($result)) 
 
{ 
echo "<tr><td>" . $row['product_name'] . "</td> 
<td>" . $row['stock']."</td> 
<td>" . $row['price'] . "</td> 
</tr>"; 
echo "<br/>"; 
} 
echo "</table></center>"; 
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

$link = mysqli_connect('localhost', 'root', ''); 

if(!$link){ 
die('Failed to connect to server: ' . mysqli_error()); 
} 
//Select database 
$db = mysqli_select_db($link,'business'); 
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
echo "<table border='1' cellpadding = '10'> 
<tr><th>Product Name</th> 
<th>Stock</th> 
<th>Price</th> 
</tr>"; 

while($row = mysqli_fetch_array($result2)) { 
echo "<tr><td>" . $row['product_name'] . "</td> 
<td>" . $row['stock']."</td> 
<td>" . $row['price'] . "</td> 
</tr>"; 
echo "<br/>"; 
} 
echo "</table></center>"; 
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
    
    $link = mysqli_connect('localhost', 'root', ''); 
    
    if(!$link){ 
    die('Failed to connect to server: ' . mysqli_error()); 
    } 
    //Select database 
    $db = mysqli_select_db($link,'business'); 
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
    echo "<table border='1' cellpadding = '10'> 
    <tr><th>Product Name</th> 
    <th>Stock</th> 
    <th>Price</th> 
    </tr>"; 

    while($row = mysqli_fetch_array($result2)) { 
    echo "<tr><td>" . $row['product_name'] . "</td> 
    <td>" . $row['stock']."</td> 
    <td>" . $row['price'] . "</td> 
    </tr>"; 
    echo "<br/>"; 
    } 
    echo "</table></center>"; 
    } 
    else { 
    include("stock_stat.php"); 
    echo "<center>Enter the Product Id</ center>"; 
    }
    }
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>
