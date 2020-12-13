
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
    <title>Sales</title>
</head>

<body>
<center> <button onclick="window.print()">PRINT SALES DETAILS</button></center>
    <?php require "menu.php" ?>
    <br><br>
    <center>
        <h2>Sales Details</h2>
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
                 $qry='SELECT * FROM sales';
                 $result=mysqli_query($db,$qry);
                $num=mysqli_num_rows($result);
                if($num>0){
                    echo"<thead>
                        <tr>
        <th>Transaction Id</th>
        <th>Customer Id</th>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>";
                        while($row=mysqli_fetch_assoc($result)){
                            echo"
                            <tr>
                                <td>".$row['transaction_id']."</td>
                                <td>".$row['customer_id']."</td>
                                <td>".$row['product_id']."</td>
                                <td>".$row['product_name']."</td>
                                <td>".$row['quantity']."</td>
                                <td>".$row['price']."</td>
                                <td>".$row['amount']."</td>
                                <td>".$row['date']."</td>
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