<html>
<head>
<link rel="stylesheet" type="text/css" href="login_css.css">
</head>


<?php

 
$con = mysqli_connect('localhost','root','','test');


$name = $_POST['name'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$name'";

$result = mysqli_query($con, $sql);

$num = mysqli_num_rows($result);

if($num == 1){
include('login_modified.php'); 
    echo "Username Already Taken";
}
else{
    $reg = "INSERT INTO users VALUES ('$name', '$pass')";
    mysqli_query($con, $reg);
    include('login_modified.php'); 
    echo "Registration was Successful";
}
?>

</html>