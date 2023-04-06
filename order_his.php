<?php
    include 'conn.php'; 
    include 'header.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>VIEW ORDER HISTORY</title>
    <style>
        body{
  
        }

        fieldset{
            color: black;      
            text-align: center;    
        }

        .table{
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
    <h1>VIEW ORDER HISTORY</h1>
    <div class=".table_center">
    <table class="table" border="1px">
		<thead>
			<th> Order ID</th>
			<th> Shoes Name</th>
			<th> Shoes Size </th>
			<th> Quantity</th>
			<th> Shoes Price</th>
            <th> Total Price</th>
            <th> Email</th>
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
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) 
                {                    
                    $her_id = $row["her_id"];
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
                        <th><?php echo $her_id; ?></th>
                        <th><?php echo $her_shoesname; ?></th>
                        <th><?php echo $her_size; ?></th>
                        <th><?php echo $her_quantity; ?></th>
                        <th>RM <?php echo $her_price; ?></th>
                        <th>RM <?php echo $total; ?></th>
                        <th><?php echo $her_email; ?></th>
                        <th><?php echo $her_date; ?></th>  
                        <th><?php echo $status; ?></th>

                    </tr>
                

                </tbody>

                <?php
                }
            } else {
                echo "0 results";
            }
    // Close the database connection
    mysqli_close($conn);
?>
</table>
</fieldset> 
</body>
</html>
<?php
    include 'footer.php';
?>