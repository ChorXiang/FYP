<?php
    include("conn.php");
    
	$id=$_GET['order_ID'];
	$idd =$_GET['user_id']; 
	// $email = $_GET['email'];
	mysqli_query($conn,"delete from orders where order_ID='$id'");
	header("Location: order.php?user_id=".$idd);
							// ?email=".$email
?>