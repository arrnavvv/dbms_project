 
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
            <h1>Customer Registration/Updation Form</h1> 
            <form action="edit_customer.php" method="post"> 
            <table cellpadding = "10"> 
            <tr>
            <td>Customer Id*</td> 
            <td><input type="text" name="customer_id" maxlength="15"></td> 
            </tr>
            <tr>
            <td>Customer Name</td> 
            <td><input type="text" name="customer_name" maxlength="15"></td> 
            </tr> 
            <tr>
            <td>Phone Number</td> 
            <td><input type="text" name="phone_number" maxlength="15"></td> 
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
