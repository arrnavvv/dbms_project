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

        echo '<h1>INVOICE</h1>';
        echo '<table border="1">
        <th>Transaction Id</th>
        <th>Customer Name</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Amount</th>
        <th>Date</th>';

        while($row=mysqli_fetch_assoc($result)){
            echo '<tr> 
            <td>'.$row['transaction_id'].'</td>
            <td>'.$row['customer_name'].'</td>
            <td>'.$row['product_name'].'</td> 
            <td>'.$row['quantity'].'</td> 
            <td>'.$row['amount'].'</td> 
            <td>'.$row['date'].'</td> 
            </tr>'; 
        }
        echo '</table>';
    } 
}

else{ 
    header('location:login_modified.php'); 
    exit(); 
} 
?>