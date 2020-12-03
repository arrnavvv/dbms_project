<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login And Registration </title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="tablecss.css">
</head>
<body>
<center>
 <div class="container">
     <div class="login-box">
    <div class="row">
        <div class="col-md-6 login-left">
            <h2>Login</h2>
            <form name="myloginForm" method="post" action="login_check.php">
                <div class="form-group">
                    
                    <input type="text" name="user" class="form-control" required placeholder="Username">
                </div>
                <div class="form-group">
                  
                    <input type="password" name="password" class="form-control" required placeholder="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

        </div>
<br><br>
        <div class="col-md-6 login-right">
            <h2>Register </h2>
            <form action="register_user.php" method="post">
                <div class="form-group">
                    
                    <input type="text" name="user" class="form-control" required placeholder="Username">
                </div>
                <div class="form-group">
                    
                    <input type="password" name="password" class="form-control" required placeholder="password">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>

        </div>
    </div>  

    </div>
 </div>    
</center>
</body>
</html>