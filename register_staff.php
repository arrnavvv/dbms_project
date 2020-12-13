
 
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
    <title>Staff edit</title>
</head>
    <body style="background-color:#F56991"> 
        <center> 
             <h1 align="center" style="color:white"> Staff Updation form </h1><br><br> 
            <div class="container">
           <div class="form-container sign-up-container">
            <form action="edit_staff.php" method="post"> 
            <input type="text" name="staff_id" maxlength="15" placeholder = "Employee Id" id="login" aria-describedby="emailHelp"> <br><br>
            <input type="text" name="staff_name" maxlength="15" placeholder = "Employee Name" id="login" aria-describedby="emailHelp"> 
            <br><br>
           
            <input type="text" name="phone_number" maxlength="15" placeholder = "Phone Number" id="login" aria-describedby="emailHelp"><br><br>
            <input type="text" name="department" maxlength="15" placeholder = "Department" id="login" aria-describedby="emailHelp"> <br><br>
            </div><br>

            <button type="submit" name="submit" value="Update" style = "margin:120px 200px 110px 400px;">UPDATE</button>
            <button type="submit" name="submit" value="Delete" style = "margin:-10px 200px 110px 400px;">DELETE</button>
            
            </form> 
            </div>
        </center> 
    </body> 
</html>
