<?php
    include 'header.php';
    include 'conn.php'; 
    $msg='';
    $id = $_GET['user_id']; 
?>

<?php


if (isset($_POST["savebtn"])) 	
{
	$mname = $_POST["name"];  	
    $memail = $_POST["email"];  
	$mpn = $_POST["pn"];  
    $mimage = $_POST['image'];		
	
    
    mysqli_query($conn,"update user set Image='" . $_POST['image'] . "' where user_id = '$id'  ");
                                                                   

    if (!$mname)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Name !</div>";
        // echo "";
    }
    else if(!$memail)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Email !</div>";
        // echo "Please Key in Email !";
    }
    else if(!$mpn)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Phone Number !</div>";
        // echo "Please Key in Phone Number !";
    }
    else if(!$mimage)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please put the image ! </div>";
        // echo "Please put the image ! ";
    }
    else
    {
    //     mysqli_query($conn,"updateuser set name='$mname', emaile='$memail', summary='$msummary', pn='$mpn', date='$mdate' where no=$id");
        mysqli_query($conn,"UPDATE user set full_name='" . $_POST['name'] . "', email_address='" . $_POST['email'] . "', contact_no='" . $_POST['pn'] . "' , username='" . $_POST['user'] . "' where user_id = '$id' ");
                                                                                                                                                      

        $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Updated successfully !</div>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user profile</title>
    
<!-- <script>
    function validationForm()
    {
        var fname=document.addfrm.name.value;
        var femail=document.addfrm.email.value;
        var frole=document.addfrm.role.value;
        var fstatus=document.addfrm.status.value;

        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var femail="Null";
        var username_flag=false,email_flag=false,pw_flag=false;

        if(fname.trim()=="")
            {
                document.getElementById("error_name").innerHTML ="Name cannot be blank";
            }
            else
            {
                document.getElementById("error_name").innerHTML="&nbsp";
                username_flag=true;
            }

            if (femail.trim()=="")
            {
                document.getElementById("error_email").innerHTML="email cannot be blank & must follow the example of email style";
                
            }
            else if(femail.match(mailformat))
            {
                document.getElementById("error_email").innerHTML="&nbsp";
                email_flag=true;
            }
            else
            {
                document.getElementById("error_email").innerHTML="email cannot be blank & must follow the example of email style";
            }

            if(frole.trim()=="")
            {
                document.getElementById("error_role").innerHTML ="role cannot be blank & must follow the example of role style";
            }
            else if(frole.trim()!=Customer || frole.trim()!=VIP)
            {
                document.getElementById("error_role").innerHTML ="role cannot be blank & must follow the example of role style";
            }
            else
            {
                document.getElementById("error_role").innerHTML="&nbsp";
                role_flag=true;
            }

            if(fstatus.trim()=="")
            {
                document.getElementById("error_status").innerHTML ="status cannot be blank & must follow the example of status style";
            }
            else if(fstatus.trim()!=Active || fstatus.trim()!=Inactive)
            {
                document.getElementById("error_role").innerHTML ="status cannot be blank & must follow the example of status style";
            }
            else
            {
                document.getElementById("error_status").innerHTML="&nbsp";
                status_flag=true;
            }
    }

    </script> -->
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
     margin: 20px 460px;
    }
    .box3 
    {
     width: 35%;
     height: 100px;
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
     width: 15%;
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
<h1><b style="font-size: 50px;"><i class="fa fa-pencil" style="font-size:50px"></i> Edit Profile</b></h1>
    <div class="box">

		<?php
		 
			// $id = $_REQUEST["email"];
  

			$result = mysqli_query($conn, "select * from user where user_id = '$id' "); 
                                                            
			$row = mysqli_fetch_assoc($result);
		?>

		<form name="addfrm" method="post" action="">
            <div class="label">
                <div class="box5">
                </div>

                <div class="box4">
                    <label>Full Name <sup>*</sup>  <br><br></label>

                    <label>Email <sup>*</sup> <br><br></label>

                    <label>PhoneNumber <sup>*</sup> <br><br></label>

                    <label>User Name <sup>*</sup> <br><br> </label>
                </div>

                <div class="box3">
                    <input type="text" name="name" size="50" value="<?php echo $row['full_name']; ?>"><br><br>

                    <input type="text" name="email" size="50" value="<?php echo $row['email_address']; ?>"><br><br>

                    <input type="text" name="pn" size="50" value="<?php echo $row['contact_no']; ?>"><br><br>

                    <input type="text" name="user" size="50" value="<?php echo $row['username']; ?>">
                </div>

             </div>

             <br><br> <p>User Image<sup>*</sup> : (insert image files)<br></P>

            <p><input type="file" id="file"  name="image" class="form-control" multiple ></P>

            <p><input type="submit" name="savebtn" value="UPDATE"></P>

		</form>


    </div>
    <?php echo "<div>".$msg."</div>"?>
</div>

    

</body>
</html>



<?php
    include 'footer.php';
   
?>