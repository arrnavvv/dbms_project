 
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
            <h1>Stock Registration/Updation Form</h1> 
            <form action="edit_stock.php" method="post"> 
            <table cellpadding = "10"> 
            <tr>
            <td>Product Code*</td> 
            <td><input type="text" name="product_id" maxlength="15"></td> 
            </tr>
            <tr>
            <td>Product Name</td> 
            <td><input type="text" name="product_name" maxlength="15"></td> 
            </tr> 
            <tr>
            <td>Stock/Quantity</td> 
            <td><input type="text" name="quantity" maxlength="15"></td> 
            </tr>
            <tr>
            <td>Price</td> 
            <td><input type="text" name="price" maxlength="15"></td> 
            </tr>
            <td><input type="submit" name="submit" value="Insert"></td> 
            <td><input type="submit" name="submit" value="Update"></td> 
            <td><input type="submit" name="submit" value="Delete"></td> 
            </tr> 
            </table> 
            </form> 
        </center> 
    </body> 
</html>
