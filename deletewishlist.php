<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Wishlist</title>
</head>
<body>
<?php
    include("conn.php");
    
	$id=$_GET['wish_id'];
	// $email = $_GET['email'];
	mysqli_query($conn,"delete from wishlist where wish_id='$id'");
	header("Location: wishlist.php");
							// ?email=".$email
?>
</body>
</html>