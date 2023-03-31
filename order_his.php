<?php
    include 'conn.php'; 
    include 'header.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>VIEW ORDER HISTORY</title>
    <style>
        fieldset{
            color: black;      
            text-align: center;    
            margin-left: auto;
            margin-right: auto;
            
        }

        .table{
            margin-left: auto;
            margin-right: auto;
            background-color: #f2f2f2;
        }

        th{
            padding: 10px 70px 10px 70px;
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
			<th> Size </th>
			<th> Quantity</th>
			<th> Price</th>
            <th> Total</th>
            <th> Email</th>
            <th> status</th>
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
                    ?>
                    <tr>
                        <th><?php echo $her_id; ?></th>
                        <th><?php echo $her_shoesname; ?></th>
                        <th><?php echo $her_size; ?></th>
                        <th><?php echo $her_quantity; ?></th>
                        <th>RM <?php echo $her_price; ?></th>
                        <th>RM <?php echo $total; ?></th>
                        <th><?php echo $her_email; ?></th>
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