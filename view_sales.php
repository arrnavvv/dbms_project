<?php
    session_start();

    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] ==1){
        require('menu.php');

        $link=mysqli_connect('localhost','root','');

        if(!$link){
            die("Unable to connect ".mysqli_error());
        }

        $db=mysqli_select_db($link,'business');

        if(!$db){
            die('Unable to select database');
        }

        $qry='SELECT * FROM sales';
        $result=mysqli_query($link,$qry);

        echo '<h1>The Sales Details are-</h1>';
        echo '<table border="1">
        <th>Transaction Id</th>
        <th>Customer Id</th>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Date</th>';

        while($row=mysqli_fetch_assoc($result)){
            echo '<tr> 
            <td>'.$row['transaction_id'].'</td>
            <td>'.$row['customer_id'].'</td>
            <td>'.$row['product_id'].'</td>
            <td>'.$row['product_name'].'</td> 
            <td>'.$row['quantity'].'</td> 
            <td>'.$row['price'].'</td> 
            <td>'.$row['amount'].'</td> 
            <td>'.$row['date'].'</td> 
            </tr>'; 
        }
        echo '</table>';
    } 
    else{ 
        header('location:login_form.php'); 
        exit(); 
    } 
?>