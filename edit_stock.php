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
if(!($_POST['product_id']))
{ 
echo '<center>All the fields marked as * are compulsary.<br></center>'; 
$validationFlag = false; 
} 

else{ 
$product_id = $_POST['product_id']; 
$product_name = $_POST['product_name']; 
$quantity = $_POST['quantity']; 
$price = $_POST['price']; 
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
//Create Insert query 
$query = "INSERT INTO product (product_id, product_name,stock,price) VALUES ('$product_id','$product_name','$quantity','$price')"; 
//Execute query 
$results = mysqli_query($link,$query); 
 
//Check if query executes successfully 
if($results == FALSE) 
echo mysqli_error($link) . '<br>'; 
else 
echo '<center>Data Inserted Successfully!!</center> '; 
} 
} 
 
// Code to be executed when 'Update' is clicked. 
if ($_POST['submit'] == 'Update'){ 
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
if(!$_POST['product_id']) 
echo '<center>Enter the id of the product</center>'; 
else{ 
$validationFlag = true;

$product_id = $_POST['product_id']; 
$product_name = $_POST['product_name']; 
$quantity = $_POST['quantity']; 
$price = $_POST['price']; 

$query="SELECT * from product where product_id='$product_id'";
$result=mysqli_query($link,$query);
if (mysqli_num_rows($result)==0) {
    die('<center>Enter Correct Product Id!!</center>');
    $validationFlag=false;
  }
 
if($validationFlag){
        if($_POST['product_id'] && $_POST['product_name'] &&$_POST['quantity'] &&$_POST['price'] ){ 
        $update = "UPDATE product SET product_name = '$product_name',stock = '$quantity',price = '$price' WHERE product_id = '$product_id'"; 
        $results = mysqli_query($link,$update); 
        } 
        else if($_POST['product_id']&& $_POST['product_name'] &&$_POST['quantity']){ 
        $update = "UPDATE product SET stock = '$quantity',product_name = '$product_name' WHERE product_id = '$product_id'"; 
        $results = mysqli_query($link,$update); 
        } 
        else if($_POST['product_id']&& $_POST['product_name'] &&$_POST['price']){ 
        $update = "UPDATE product SET price = '$price',product_name = '$product_name' WHERE product_id = '$product_id'"; 
        $results = mysqli_query($link,$update); 
        }
        else if($_POST['product_id']&& $_POST['quantity'] &&$_POST['price']){ 
        $update = "UPDATE product SET price = '$price',stock = '$quantity' WHERE product_id = '$product_id'"; 
        $results = mysqli_query($link,$update); 
        }
        else if($_POST['product_id']&& $_POST['price']){ 
        $update = "UPDATE product SET price = '$price' WHERE product_id = '$product_id'"; 
        $results = mysqli_query($link,$update); 
        }
        else if($_POST['product_id']&& $_POST['quantity']){ 
        $update = "UPDATE product SET stock = '$quantity' WHERE product_id = '$product_id'"; 
        $results = mysqli_query($link,$update); 
        }
        else if($_POST['product_id']&& $_POST['product_name']){ 
        $update = "UPDATE product SET product_name = '$product_name' WHERE product_id = '$product_id'"; 
        $results = mysqli_query($link,$update); 
        }
        if($results == FALSE) 
        echo mysqli_error($link) . '<br>'; 
        else 
        echo '<center>Updated Sucessfully!!</center>';
        
}
}  
} 
// Code to be executed when 'Delete' is clicked. 
if ($_POST['submit'] == 'Delete'){ 
if(!$_POST['product_id']) 
echo '<center>Enter the id of the product as it is the primary key.</center>'; 
else{ 
    $validationFlag=true;
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

$product_id = $_POST['product_id']; 

$query="SELECT * from product where product_id='$product_id'";
$result=mysqli_query($link,$query);
if (mysqli_num_rows($result)==0) {
    die('<center>Enter Correct Product Id!!</center>');
    $validationFlag=false;
  }

if($validationFlag){
    $delete = "DELETE FROM product WHERE product_id = '$product_id'"; 
//Connect to mysql server 
//Execute query 
$results = mysqli_query($link,$delete); 
if($results == FALSE) 
echo mysqli_error($link) . '<br>'; 
else 
echo '<center>Data Deleted Successfully!!</center>'; 
}
} 
} 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?>
