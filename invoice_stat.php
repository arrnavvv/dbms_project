
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
</head>
 <body style="background-color:#4fc3f7">
<center> 
<h1 align="center" style="color:white">Invoice</h1> <br>

            <div class="container">
           <div class="form-container sign-up-container">
<form action = "get_invoice.php" method = "post"> 


<input type="text" name="transaction_id" maxlength="25" placeholder = "Transaction ID" id="login" aria-describedby="emailHelp"><br><br>

 </div><br>

<button type="submit" name="submit" value="Get Invoice" style = "margin:180px -180px 100px 100px;">GET INVOICE</button>

</form> 
</div></div>
</center> 
</body> 
</html>