<html>
<head>
<link rel="stylesheet" type="text/css" href="login_css.css">
</head>


<?php

 
$con = mysqli_connect('localhost','root','','test');


$name = $_POST['name'];
$pass = $_POST['password'];
$real_name = $_POST['real_name'];
$phone_number = $_POST['phone_number'];
$department = $_POST['department'];

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

    $sql = "SELECT * FROM staff";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    $employee_id=1001+$num;

    $reg1 = "INSERT INTO staff VALUES ('$employee_id', '$real_name','$phone_number','$department')";
    mysqli_query($con, $reg1);
    include('login_modified.php'); 
    echo "Registration was Successful";
}
?>

</html>