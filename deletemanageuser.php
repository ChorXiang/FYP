<?php
    include("conn.php");
    
	$id=$_GET['user_id'];
	// $email = $_GET['email'];
	mysqli_query($conn,"delete from user where user_id='$id'");
	header("Location: manageuser.php");
							// ?email=".$email
?>