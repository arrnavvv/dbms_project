
<?php 
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 
require('menu.php'); 
} 
else{ 
header('location:login_form.php'); 
exit(); 
} 
?> 
<html> 
<body> 
<center> 
<h1>Stock Information</h1> 
<form action = "get_stat.php" method = "post"> 
<table cellpadding = "10"> 
<tr> 
<td>Product Id</td> 
<td><input type="text" name="product_id" maxlength="25"></td> 
</tr> 
</table> 
<table cellpadding = "20"> 
<tr> 
<td><input type="submit" name="submit" value="Product Details"></td> 
<td><input type="submit" name="submit" value="Update Stock by 1"></td> 
<td><input type="submit" name="submit" value="Delete Stock by 1"></td> 

</tr> 
</table> 
</form> 
</center> 
</body> 
</html>