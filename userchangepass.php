<?php
    include 'header.php';
    include 'conn.php'; 
    $msg='';

?>


<?php


if (isset($_POST["savebtn"])) 	
{
	$pass = $_POST["pass"];  	
    $newpass = $_POST["newpass"];  
	$comnewpass = $_POST["comnewpass"];  	
    $cpass =  $_POST["userpassword"];  	  
                                                             

    if (!$pass)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Enter the Correct Current Password !</div>";
        // echo "";
    }
    else if(!$newpass)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Enter the New Password !</div>";
        // echo "Please Key in Email !";
    }
    else if(!$comnewpass)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Enter the New Comfirm Password !</div>";
        // echo "Please Key in Phone Number !";
    }
    else if($comnewpass == $newpass)
    {
        if($cpass==$pass)
        {
            mysqli_query($conn,"UPDATE user set userpassword='" . $_POST['newpass'] . "', confirm_password='" . $_POST['comnewpass'] . "' where user_id = '$id' ");
                                                                                                                                                      
            $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Updated successfully !</div>";
    
        }
        else
        {
            $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Current Password not Correct !</div>";
        
        }
    } 
    else
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>New Password and Comfirm Passwprd not Match !</div>";
        
    }

}

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
    .box3 
    {
     width: 20%;
     height: 120px;
     margin:6px;
     text-align:left;
    }
    .box5
    {
     width: 20%;
     height: 100px;
     text-align:left;
    }
    .box4
    {
     width: 20%;
     height: 100px;
     text-align:left;
    }
    .label
    {
     display: flex;
     flex-wrap: wrap;
     }
    </style>

</head>
<body>
    
<div class="middle">
    <br>
<h1><b style="font-size: 50px;"><i class="fa fa-pencil" style="font-size:50px"></i> Change Password</b></h1>
    <div class="box">

		<?php
		 
			// $id = $_REQUEST["email"]; 
            $id = $_GET['user_id']; 

			$result = mysqli_query($conn, "select * from user where user_id = '$id' "); 
                                                                 // where Email = '$id'
			$row = mysqli_fetch_assoc($result);
		?>
		


		<form name="addfrm" method="post" action="">
            <div class="label">
                    <div class="box5">
                    </div>

                    <div class="box4">
                        <label>Current Password<sup>*</sup> : </label><br><br>

                        <label>New Password<sup>*</sup> : </label><br><br>

                        <label>Confirm New Password<sup>*</sup> : </label>
                        <label for="admin_password"></label>
                    </div>

                    <div class="box3">
                        <input type="password" name="pass" size="50" ><br><br>

                        <input type="password" name="newpass" size="50" ><br><br>
                        
                        <input type="password" name="comnewpass" size="50" >
                    </div>
                    <input type="hidden" name="userpassword" value="<?php echo $row["userpassword"]?>"> 

             </div>
                   <p><input type="submit" name="savebtn" value="SAVE">   
		</form>

    </div>

             <?php echo "<div>".$msg."</div>"?>
</div>
    
</body>
</html>

<?php
    include 'footer.php';
   
?>