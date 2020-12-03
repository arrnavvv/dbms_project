 
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
            <h1>Sales Registration/Updation Form</h1> 
            <form action="edit_sales.php" method="post"> 
            <table cellpadding = "10"> 
            <tr> 
            <td>Transaction Id*</td> 
            <td><input type="text" name="transaction_id" maxlength="15"></td> 
            </tr> 
            <tr>  
            <td>Customer Id</td> 
            <td><input type="text" name="customer_id" maxlength="15"></td> 
            </tr>
            <tr>  
            <td>Product Id</td> 
            <td><input type="text" name="product_id" maxlength="15"></td> 
            </tr>
            <tr>
            <td>Quantity</td> 
            <td><input type="text" name="quantity" maxlength="15"></td> 
            </tr>
            <tr>
            <td>Date</td> 
            <td><input type="date" name="date" maxlength="15"></td> 
            </tr>
            <td></td>
            <td><input type="submit" name="submit" value="Insert"></td> 
            </tr> 
            </table> 
            </form> 
        </center> 
    </body> 
</html>
