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

        $qry='SELECT * FROM customer';
        $result=mysqli_query($link,$qry);

        echo '<h1>The Staff Details are-</h1>';
        echo '<table border="1">
        <th>Customer Id</th>
        <th>Customer Name</th>
        <th>Phone Number</th>';

        while($row=mysqli_fetch_assoc($result)){
            echo '<tr> 
            <td>'.$row['customer_id'].'</td>
            <td>'.$row['customer_name'].'</td> 
            <td>'.$row['phone_number'].'</td> 
            </tr>'; 
        }
        echo '</table>';
    } 
    else{ 
        header('location:login_form.php'); 
        exit(); 
    } 
?>