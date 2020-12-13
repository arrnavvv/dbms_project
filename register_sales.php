
<?php 
    session_start(); 
    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
    require('menu.php'); 
    } 
    else{ 
    header('location:login_modified.php'); 
    exit(); 
    } 
?> 
<html> 
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<link rel="stylesheet" href="table.css">-->
<link rel="stylesheet" type="text/css" href="login_css.css">
    <title>Sales edit</title>
</head>
    <body style="background-color:#F56991"> 
        <center> 
             <h1 align="center" style="color:white"> Sales Updation form </h1><br><br> 

            <div class="container">
           <div class="form-container sign-up-container">
            <form action="edit_sales.php" method="post"> 
           <!--<div class="form-group col-md-6">-->
           
		
            <input type="text" name="transaction_id" maxlength="15" placeholder = "Transaction ID" id="login" aria-describedby="emailHelp"> <br><br>
            <input type="text" name="customer_id" maxlength="15" placeholder = "Customer ID" id="login" aria-describedby="emailHelp"> 
            <br><br>
           
            <input type="text" name="product_id" maxlength="15" placeholder = "Product ID" id="login" aria-describedby="emailHelp"><br><br>
            <input type="text" name="quantity" maxlength="15" placeholder = "Quantity" id="login" aria-describedby="emailHelp"> <br><br>
            <input type="text" name="date" maxlength="15" placeholder = "Date" id="login" aria-describedby="emailHelp"> <br><br>
            </div><br>
            <button type="submit" name="submit" value="Insert" style = "margin:180px -180px 100px 100px;">INSERT</button>
          
            
            </form> 
            </div>
            </div>
        </center> 
    </body> 
</html>
