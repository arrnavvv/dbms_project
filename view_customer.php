

<?php
session_start();

if(!isset($_SESSION['IS_AUTHENTICATED']) || $_SESSION['IS_AUTHENTICATED']!=true){
    header("location: login_modified.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="tablecss.css">
    <title>CUSTOMERS</title>
</head>

<body>
    <?php require "menu.php" ?>
    <br><br>
    <center>
        <h2>Customer Details</h2>
    </center>
    <br><br>
<center>
    <div>
        <table class="styled-table">
            <?php
                 $db=mysqli_connect('localhost','root','','test');

                  if(!$db){
            die('Unable to select database');
        }
                 $qry='SELECT * FROM customer';
                 $result=mysqli_query($db,$qry);
                $num=mysqli_num_rows($result);
                if($num>0){
                    echo"<thead>
                        <tr>
        <th>Customer Id</th>
        <th>Customer Name</th>
        <th>Phone Number</th>
                        </tr>
                        </thead>
                        <tbody>";
                        while($row=mysqli_fetch_assoc($result)){
                            echo"
                            <tr>
                                <td>".$row['customer_id']."</td>
                                <td>".$row['customer_name']."</td>
                                <td>".$row['phone_number']."</td>
                            </tr>";
                        }
                    echo"</tbody>";
                    }
                ?>
        </table>
    </div>
</center>
</body>

</html>