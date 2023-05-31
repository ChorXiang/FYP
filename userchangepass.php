<?php
    include 'header.php';
    include 'conn.php'; 
    $msg='';

?>


<?php
    $cp="";
    $np="";
    $cnp="";
    $ccp="";
    $nnp="";
    $ccnp="";
    $cccnp="";
    $ccccnp="";

if (isset($_POST["savebtn"])) 	
{
	$pass = $_POST["pass"];  	
    $newpass = $_POST["newpass"];  
	$comnewpass = $_POST["comnewpass"];  	
    $cpass =  $_POST["userpassword"];  	  
                    
    if (empty($pass)) 
    {
        $cp = "password is required";
        $ccp="*";
    }
    else 
    {
        $cp ="";
    }

    if (empty($newpass)) 
    {
        $np = "new password is required";
        $nnp="*";
    }
    else if (strlen($newpass) < 6) 
    {
        $np = "new password is required and at least 6 characters, 1 uppercase letter, 1 number, and 1 symbol";
        $nnp="*"; 
        $cccnp=".";
    } 
    else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{6,}$/",$newpass)) 
    {
        $np = "new password is required and at least 6 characters, 1 uppercase letter, 1 number, and 1 symbol";
        $nnp="*"; 
        $cccnp=".";
    }
    else 
    {
        $np ="";
    }

    if (empty($comnewpass)) 
    {
        $ccnp="*";
        $cnp = "comfirm password is required";
    }
    else if (strlen($comnewpass) < 6) 
    {
        $cnp = "comfirm password is required and at least 6 characters, 1 uppercase letter, 1 number, and 1 symbol";
        $ccnp="*";
        $ccccnp="."; 
    } 
    else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{6,}$/",$comnewpass)) 
    {
        $cnp = "comfirm password is required and at least 6 characters, 1 uppercase letter, 1 number, and 1 symbol";
        $ccnp="*";
        $ccccnp="."; 
    }
    else if ($comnewpass !== $newpass) 
    {
        $cnp = "Confirm password must match the new password";
        $ccnp = "*";
    }
    else 
    {
        $cnp ="";
    }

    if($cnp =="" && $np =="" && $cp =="")
    {

            if($cpass==$pass)
            {
                mysqli_query($conn,"UPDATE user set userpassword='" . $_POST['newpass'] . "', confirm_password='" . $_POST['comnewpass'] . "' where user_id = '$id' ");
                                                                                                                                                          
                $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Updated successfully !</div>";
        
            }
            else 
            {
                $cp = "current password not correct";
                $ccp="*";
            }
    

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
     width: 50%;
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
     .error 
        {
        color: #FF0000;
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
                        <div class="error"><?php echo $ccp;?></div>
                        <label>Current Password<sup></sup> : </label><br><br>

                        <div class="error"><?php echo $cccnp;?></div>
                        <div class="error"><?php echo $nnp;?></div>
                        <label>New Password<sup></sup> : </label><br><br>

                        <div class="error"><?php echo $cccnp;?></div>
                        <div class="error"><?php echo $ccnp;?></div>
                        <label>Confirm New Password<sup></sup> : </label>
                        <label for="admin_password"></label>
                    </div>

                    <div class="box3">
                        <div class="error" ><?php echo $cp;?></div>
                        <input type="password" name="pass" size="50" ><br><br>

                        <div  class="error"><?php echo $np;?></div>
                        <input type="password" name="newpass" size="50" ><br><br>
                        
                        <div  class="error"><?php echo $cnp;?></div>
                        <input type="password" name="comnewpass" size="50" >
                    </div>
                    <input type="hidden" name="userpassword" value="<?php echo $row["userpassword"]?>"> 

             </div>
                  <br><br><br><br><p><input type="submit" name="savebtn" value="SAVE">   
		</form>

    </div>

             <?php echo "<div>".$msg."</div>"?>
</div>
    
</body>
</html>

<?php
    include 'footer.php';
   
?>