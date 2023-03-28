<?php
    include 'conn.php'; 
    include 'header.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>VIEW COMMENTS</title>
    <style>
        fieldset{
            background-color: lightblue;
            color: black;           
        }
        </style>
</head>
<body>
<fieldset>
<h1>VIEW COMMENTS</h1>
    <table class="table" border="1px">
		<thead>
			<th> ID</th>
			<th> Email</th>
			<th> User Interface Rating </th>
			<th> Shipping Rating</th>
			<th> Customer Service Rating</th>
			<th> Product Quality Rating</th>
			<th> Message</th>
			<th> Created At</th>
		</thead>
        <tbody>                       
            <?php
            // Select data from the comment table
            $sql = "SELECT * FROM comment"; 
            $result = mysqli_query($conn, $sql);

                    // Display the data in a table
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) 
          {                    
              $comment_id = $row["comment_id"];
              $email = $row["email"];
              $user_interface_rating = $row["user_interface_rating"];
              $shipping_rating = $row["shipping_rating"];
              $customer_service_rating = $row["customer_service_rating"];
              $product_quality_rating = $row["product_quality_rating"];
              $message = $row["message"];
              $created_at = $row["created_at"];                   
              ?>
              <tr>
                  <th><?php echo $comment_id; ?></th>
                  <td><?php echo $email; ?></td>
                  <td><?php echo $user_interface_rating; ?></td>
                  <td><?php echo $shipping_rating; ?></td>
                  <td><?php echo $customer_service_rating; ?></td>
                  <td><?php echo $product_quality_rating; ?></td>
                  <td><?php echo $message; ?></td>
                  <td><?php echo $created_at; ?></td>
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