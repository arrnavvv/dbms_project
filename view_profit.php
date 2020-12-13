
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

<body style="background-color:#d8f3f8">
<center> <button onclick="window.print()">PRINT PROFIT DETAILS</button></center>
    <?php require "menu.php" ?>
    <br><br>
    <center>
        <h2 style="font-size:50px">Profit Details</h2>
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
                 $qry='SELECT transaction_id,amount,quantity*price*0.15 as profit,date FROM sales order by date desc';
                 $result=mysqli_query($db,$qry);
                
                    echo"<thead>
                        <tr>
        <th>Transaction Id</th>
        <th>Amount</th>
        <th>Profit</th>
        <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>";
                        while($row=mysqli_fetch_assoc($result)){
                            echo"
                            <tr>
                                <td>".$row['transaction_id']."</td>
                                <td>".$row['amount']."</td>
                                <td>".$row['profit']."</td>
                                <td>".$row['date']."</td>
                            </tr>";
                        }
                    echo"</tbody>";
                    
                ?>
        </table>
    </div>
</center>
</body>

</html>