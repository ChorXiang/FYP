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
            text-align: center;    
            margin-left: auto;
            margin-right: auto;
        }

        .table{
            margin-left: auto;
            margin-right: auto;
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
			<th>History ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Contact No.</th>
			<th>Address</th>
            <th>Card No.</th>
            <th>Card Name</th>
            <th>Card Date</th>
            <th>Payment Type</th>
		</thead>
        <tbody>                       
            <?php
            // Select data from the history table
            $id =$_GET['user_id'];
            $sql = "SELECT * FROM payment where user_id = '$id'"; 
            $result = mysqli_query($conn, $sql);

            // Display the data in a table
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) 
                {                    
                    $his_id = $row["his_id"];
                    $his_name = $row["his_name"];
                    $his_email = $row["his_email"];
                    $his_pn = $row["his_pn"];
                    $his_address = $row["his_address"];
                    $his_state = $row["his_state"];    
                    $his_code = $row["his_code"]; 
                    $his_cardnum = $row["his_cardnum"]; 
                    $his_cardname = $row["his_cardname"]; 
                    $his_cardmonth = $row["his_cardmonth"]; 
                    $his_cardyear = $row["his_cardyear"]; 
                    $his_ewallet = $row["his_ewallet"];                
                    ?>
                    <tr>
                        <th><?php echo $his_id; ?></th>
                        <th><?php echo $his_name; ?></th>
                        <th><?php echo $his_email; ?></th>
                        <th><?php echo $his_pn; ?></th>
                        <th><?php echo $his_address; ?>,<?php echo $his_code; ?>,<?php echo $his_state; ?></th>
                        <th><?php echo $his_cardnum; ?></th>
                        <th><?php echo $his_cardname; ?></th>
                        <th><?php echo $his_cardmonth; ?>/<?php echo $his_cardyear;?></th>
                        <th><?php echo $his_ewallet; ?></th>
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
        </div>
        </fieldset> 
</body>
</html>
<?php
    include 'footer.php';
?>