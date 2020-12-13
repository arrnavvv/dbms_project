
 
<?php 
    session_start(); 
    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
    
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
    <title>stock edit</title>
</head>
    <body style="background-color:#9ccc65"> 
   
        <center> 
             <h1 align="center" style="color:white"> Stock Updation form </h1><br><br> 
           <div class="container">
           <div class="form-container sign-up-container">
            <form action="edit_stock.php" method="post"> 
            <input type="text" name="product_id" maxlength="15" placeholder = "Product Code*" id="product_id" aria-describedby="emailHelp"> <br><br>
            <input type="text" name="product_name" maxlength="15" placeholder = "Product Name" id="product_name" aria-describedby="emailHelp"> 
            <br><br>
           
            <input type="text" name="quantity" maxlength="15" placeholder = "Quantity" id="quantity" aria-describedby="emailHelp"><br><br>
            <input type="text" name="price" maxlength="15" placeholder = "Price" id="price" aria-describedby="emailHelp"> <br><br>
            </div><br>
            <button type="submit" name="submit" value="Insert" style = "margin:110px 200px 110px 400px;">INSERT</button>
            <button type="submit" name="submit" value="Update" style = "margin:-10px 200px 110px 400px;">UPDATE</button>
            
            </form> 
            </div> 
        </center> 
        <center style="margin-top:50px"> 
           <div  class="container" style="min-height:120px">
           <div  class="form-container sign-up-container">
            <form  action="edit_stock.php" method="post"> 
            <input style="margin-top:40px"type="text" name="product_id" maxlength="15" placeholder = "Product Code*" id="product_id" aria-describedby="emailHelp"> <br><br>
            </div><br>
            <button type="submit" name="submit" value="Delete" style = "margin:10px 200px 9px 400px;">DELETE</button>
            
            </form> 
            </div> 
        </center>
    </body> 
</html>
