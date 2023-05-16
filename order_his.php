<?php
    include 'conn.php'; 
    include 'header.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>VIEW ORDER HISTORY</title>
    <style>
        body
        {
            font-size: 25px;
        }

        fieldset
        {
            color: black;      
            text-align: center;    
        }

        .table
        {
            margin-left: auto;
            margin-right: auto;
            background-color: #f2f2f2;
            width: 100%;
        }

    </style>
</head>
<body>
<fieldset> 
    
    <div class=".table_center">
    <br><h1>VIEW ORDER HISTORY</h1><br>
    <div class=".table_center">
    <table class="table" border="1px">
        <?php
                    $id =$_GET['user_id'];
                    $sql = "SELECT * FROM history where user_id = '$id'"; 
                    $result = mysqli_query($conn, $sql);

    if (mysqli_fetch_assoc($result) == 0) {

echo '<img src="image/empty.png" alt="No product selected">';     ?>
<br><br>
<?php
echo 'Your Order History Is Empty';
}   else 
{ ?>
		<thead>
            <th> Shoes Image</th>
            <th> Order number</th>
			<th> Order ID</th>
			<th> Shoes Name</th>
			<th> Shoes Size </th>
			<th> Quantity</th>
			<th> Shoes Price</th>
            <th> Total Price</th>
            <th> Receipient Email</th>
            <th> Payment Date</th>
            <th> Order Status</th>
		</thead>
        <tbody>                       
            <?php
            // Select data from the history table
            $id =$_GET['user_id'];
            $sql = "SELECT * FROM history where user_id = '$id'"; 
            $result = mysqli_query($conn, $sql);


            // Display the data in a table
           
                while($row = mysqli_fetch_assoc($result)) 
                {                    
                    $her_id = $row["her_id"];
                    $order_num = $row["order_num"];
                    $her_shoesname = $row["her_shoesname"];
                    $her_size = $row["her_size"];
                    $her_quantity = $row["her_quantity"];
                    $her_price = $row["her_price"];
                    $her_email = $row["her_email"];    
                    $total =0;
                    $subtotal=$her_price*$her_quantity;
                    $total =  $total + $subtotal;
                    $status = $row["order_status"];    
                    $her_date = $row["her_date"];             
                    ?>
                    <tr>
                        <th><img src="image/shoesimg/<?php echo $row["shoe_image"]; ?>" ></th>
                        <th><?php echo $order_num; ?></th>
                        <th><?php echo $her_id; ?></th>
                        <th><?php echo $her_shoesname; ?></th>
                        <th>UK <?php echo $her_size; ?></th>
                        <th><?php echo $her_quantity; ?></th>
                        <th>RM <?php echo $her_price; ?></th>
                        <th>RM <?php echo $total; ?></th>
                        <th><?php echo $her_email; ?></th>
                        <th><?php echo $her_date; ?></th>  
                        <th><?php echo $status; ?></th>

                    </tr>
                



                <?php
                }
                ?>
                        </tbody>
    
                        <?php
    

}


?>
</table>
</fieldset> 
</body>
</html>
<?php
    include 'footer.php';
?>