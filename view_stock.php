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

        $qry='SELECT * FROM product';
        $result=mysqli_query($link,$qry);

        echo '<h1>The Stock Details are-</h1>';
        echo '<table border="1">
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Stock</th>
        <th>Price</th>';

        while($row=mysqli_fetch_assoc($result)){
            echo '<tr> 
            <td>'.$row['product_id'].'</td>
            <td>'.$row['product_name'].'</td> 
            <td>'.$row['stock'].'</td> 
            <td>'.$row['price'].'</td> 
            </tr>'; 
        }
        echo '</table>';
    } 
    else{ 
        header('location:login_form.php'); 
        exit(); 
    } 
?>