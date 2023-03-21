<?php
    include 'header.php';
    include 'conn.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile change password</title>

    <style>
    sup 
    {
     color: red;
    }
    body
    {
     background: #DDDDDD;
    }
    .box
    {
     background-color: #f2f2f2;
     padding: 5px 20px 15px 20px;
     border: 1px solid lightgrey;
     border-radius: 15px;
     width:50%;
     padding: 5px;
     margin: 20px 460px;
    }
    </style>

</head>
<body>
    
<div class="middle">
    <br>
<h1><b style="font-size: 50px;"><i class="fa fa-pencil" style="font-size:50px"></i> Edit Profile</b></h1>
    <div class="box">

		<?php
		 
			// $id = $_REQUEST["email"]; 

			$result = mysqli_query($conn, "select * from user "); 
                                                                 // where Email = '$id'
			$row = mysqli_fetch_assoc($result);
		?>
		


		<form name="addfrm" method="post" action="">

			<p><label>Current Password<sup>*</sup> :</label><input type="text" name="name" size="50" value="<?php echo $row['full_name']; ?>">

            <p><label>New Password<sup>*</sup> :</label><input type="text" name="email" size="50" value="<?php echo $row['email_address']; ?>">
		 
			<p><label>Confirm New Password<sup>*</sup> :</label><input type="text" name="pn" size="50" value="<?php echo $row['contact_no']; ?>">
            
			<p><input type="submit" name="savebtn" value="UPDATE">



		</form>

    </div>
</div>
    
</body>
</html>

<?php
    include 'footer.php';
   
?>