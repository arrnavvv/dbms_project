
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
</head>
<body style="background-color:#fb6d4c"> 
<center> 
<h1 align="center" style="color:white">Stock Information</h1> 

 <div class="container">
           <div class="form-container sign-up-container">

<form action = "get_stat.php" method = "post"> 
<input type="text" name="product_id" maxlength="25" placeholder = "Product ID" id="login" aria-describedby="emailHelp"> 
 </div><br>
<button type="submit" name="submit"  value="Product Details" style = "margin:30px 200px 90px 400px;">Product Details</button>
<button type="submit" name="submit" value="Update Stock by 1" style = "margin:-10px 200px 90px 400px;">Update Stock By 1</button>
<button type="submit" name="submit" value="Delete Stock by 1" style = "margin:-20px 200px 50px 400px;">Delete Stock by 1</button>

</form> 
</div></div>
</center> 
</body> 
</html>