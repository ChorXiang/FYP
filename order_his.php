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
            background-color: lightblue;
            color: black;           
        }
        
    </style>
</head>
<body>
<fieldset> 
    <h1>VIEW ORDER HISTORY</h1>
    <table class="table" border="1px">
		<thead>
			<th> ID</th>
			<th> Shoes Name</th>
			<th> Size </th>
			<th> Quantity</th>
			<th> Price</th>
            <th> Email</th>
		</thead>
        <tbody>                       
            <?php
            // Select data from the history table
            $sql = "SELECT * FROM history"; 
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
                    ?>
                    <tr>
                        <th><?php echo $her_id; ?></th>
                        <th><?php echo $her_shoesname; ?></th>
                        <th><?php echo $her_size; ?></th>
                        <th><?php echo $her_quantity; ?></th>
                        <th><?php echo $her_price; ?></th>
                        <td><?php echo $her_email; ?></td>
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