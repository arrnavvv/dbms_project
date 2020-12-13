 
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
    <title>customer edit</title>
</head>
    <body style="background-color:#F56991"> 
        <center> 
       
             <h1 align="center" style="color:white"> Customer Updation form </h1><br>
             <h4 align="center" style="color:white"> Only Customer Id required for Deletion</h4><br><br> 
             
           <div class="container">
           <div class="form-container sign-up-container">
            <form action="edit_customer.php" method="post"> 
            <input type="text" name="customer_id" maxlength="15" placeholder = "Customer ID" id="login" aria-describedby="emailHelp"> <br><br>
            
           
            <input type="text" name="customer_name" maxlength="15" placeholder = "Customer Name" id="login" aria-describedby="emailHelp"> 
            <br><br>
           
            <input type="text" name="phone_number" maxlength="15" placeholder = "Phone Number" id="login" aria-describedby="emailHelp"><br>
            </div><br>
            <button type="submit" name="submit" value="Insert" style = "margin:60px 200px 110px 400px;">INSERT</button>
            <button type="submit" name="submit" value="Update" style = "margin:-10px 200px 110px 400px;">UPDATE</button>
            <button type="submit" name="submit" value="Delete" style = "margin:-30px 200px 90px 400px;">DELETE</button>
            
            </form> 
            </div>
        </center> 
    </body> 
</html>
