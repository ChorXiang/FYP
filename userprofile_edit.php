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

			<p><label>Full Name<sup>*</sup> :</label><input type="text" name="name" size="50" value="<?php echo $row['full_name']; ?>">

            <p><label>Email<sup>*</sup> :</label><input type="text" name="email" size="50" value="<?php echo $row['email_address']; ?>">
		 
			<p><label>PhoneNumber<sup>*</sup> :</label><input type="text" name="pn" size="50" value="<?php echo $row['contact_no']; ?>">
            
            <p>User Image<sup>*</sup> : (insert image files)<br>

            <p><input type="file" id="file"  name="image" class="form-control" multiple ></P>
			
			<p><input type="submit" name="savebtn" value="UPDATE">



		</form>

    </div>
</div>
    

</body>
</html>

<?php


if (isset($_POST["savebtn"])) 	
{
	$mname = $_POST["name"];  	
    $memail = $_POST["email"];  
	$mpn = $_POST["pn"];  
    $mimage = $_POST['image'];		
	
    
    mysqli_query($conn,"update user set Image='" . $_POST['image'] . "' ");
                                                                     // where Email='$id'

    if (!$mname)
    {
        echo "Please Key in Name !";
    }
    else if(!$memail)
    {
        echo "Please Key in Email !";
    }
    else if(!$mpn)
    {
        echo "Please Key in Phone Number !";
    }
    else if(!$mimage)
    {
        echo "Please put the image ! ";
    }
    else
    {
    //     mysqli_query($conn,"updateuser set name='$mname', emaile='$memail', summary='$msummary', pn='$mpn', date='$mdate' where no=$id");
        mysqli_query($conn,"UPDATE user set full_name='" . $_POST['name'] . "', email_address='" . $_POST['email'] . "', contact_no='" . $_POST['pn'] . "'");
                                                                                                                                                        //  where Email='$id'
        echo "Updated successfully !";
    }

}

?>

<?php
    include 'footer.php';
   
?>