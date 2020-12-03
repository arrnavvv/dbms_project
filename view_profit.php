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

        $qry='SELECT transaction_id,amount,quantity*price*0.15 as profit,date FROM sales order by date desc';
        $result=mysqli_query($link,$qry);

        echo '<h1>Profit Made by the Company</h1>';
        echo '<table border="1">
        <th>Transaction Id</th>
        <th>Amount</th>
        <th>Profit</th>
        <th>Date</th>';

        while($row=mysqli_fetch_assoc($result)){
            echo '<tr> 
            <td>'.$row['transaction_id'].'</td>
            <td>'.$row['amount'].'</td>
            <td>'.$row['profit'].'</td>
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