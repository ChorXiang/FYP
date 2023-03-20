<?php
    include("conn.php");
    
	$id=$_GET['order_ID'];
	// $email = $_GET['email'];
	mysqli_query($conn,"delete from orders where order_ID='$id'");
	header("Location: order.php?email=".$email);
?>