
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
<h1>Invoice</h1> 
<form action = "get_invoice.php" method = "post"> 
<table cellpadding = "10"> 
<tr> 
<td>Transaction Id</td> 
<td><input type="text" name="transaction_id" maxlength="25"></td> 
</tr> 
</table> 
<table cellpadding = "20"> 
<tr> 
<td><input type="submit" name="submit" value="Get Invoice"></td> 

</tr> 
</table> 
</form> 
</center> 
</body> 
</html>