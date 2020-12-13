<html>
    <head>
        <style>
            body{
                background-color: rgb(208,240,192);
            }
            .styled-table{
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.30);
            }
            .styled-table th {
                background-color: #009879;
                color: #ffffff;
                text-align: left;
            }
            .styled-table th,
            .styled-table td {
                padding: 12px 15px;
            }
            .styled-table tbody tr {
                border-bottom: 1px solid #dddddd;
            }
            .styled-table tbody tr:nth-of-type(even) {
                background-color: #f3f3f3;
            }
            .styled-table tbody tr:nth-of-type(odd) {
                background-color: rgb(211,211,211);
            }

            .styled-table tbody tr:last-of-type {
                border-bottom: 2px solid #009879;
            }
            .styled-table tbody tr.active-row {
                font-weight: bold;
                color: #009879;
            }

        </style>
    </head>
    <body>
   <center> <button onclick="window.print()">PRINT INVOICE</button></center>
    </body>
</html>
<?php
    session_start();

    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] ==1){
        if($_POST['transaction_id']) {
        require('menu.php');

        $link=mysqli_connect('localhost','root','');

        if(!$link){
            die("Unable to connect ".mysqli_error());
        }

        $db=mysqli_select_db($link,'test');

        if(!$db){
            die('Unable to select database');
        }

        $transaction_id= $_POST['transaction_id']; 

        $qry="SELECT transaction_id,customer_name,product_name,quantity,amount,date FROM sales,customer where transaction_id=$transaction_id and sales.customer_id=customer.customer_id";
        $result=mysqli_query($link,$qry);

        echo '<center><h2>INVOICE</h2></center>';
        echo '<center>';
        echo '<table class="styled-table" >
        <tr>
        </tr></thead><tbody>';

        while($row=mysqli_fetch_assoc($result)){
            echo '
            <tr><th>Transaction Id</th><td>'.$row['transaction_id'].'</td></tr>
            <tr><th>Customer Name</th><td>'.$row['customer_name'].'</td></tr>
            <tr><th>Product Name</th><td>'.$row['product_name'].'</td> </tr>
            <tr><th>Quantity</th><td>'.$row['quantity'].'</td> </tr>
            <tr><th>Amount</th><td>'.$row['amount'].'</td> </tr>
            <tr><th>Date</th><td>'.$row['date'].'</td> </tr>';
        }
        echo"</tbody>";
        echo '</table>';
        echo '</center>';
    } 
}

else{ 
    header('location:login_modified.php'); 
    exit(); 
} 
?>