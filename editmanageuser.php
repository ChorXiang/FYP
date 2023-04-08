<?php
    include 'adminheader.php';
    include 'conn.php'; 
    $msg = '';
    $id = $_REQUEST["email"];
?>


<?php

if (isset($_POST["savebtn"])) 	
{
	$mname = $_POST["name"];  	
    $memail = $_POST["email"];  
    $mmemail = filter_var($memail, FILTER_SANITIZE_EMAIL);
    $mph = $_POST["contact"];  
    $mmph = filter_var($mph);
    $musername = $_POST["username"];  
    $mstatus = $_POST['status'];
    $mimage = $_POST['image'];


        

	if (!$mname)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Name !</div>";
    }
    else if(!$memail)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Email !</div>";
 
    }
    else if(!filter_var($mmemail, FILTER_VALIDATE_EMAIL) === true)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Correct Email Format !</div>";
    }
    else if(!$mph)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Phone Number !</div>";

    }
    else if(strlen($mmph)<10)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Correct Phone Number Format !</div>";
    }
    else if(strlen($mmph)>12)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Correct Phone Number Format !</div>";
    }
    else if(!$musername)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in User Name !</div>";
 
    }
    else if(!$mstatus)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Status !</div>";
 
    }
    else if(!$mimage)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Put the Image !</div>";
 
    }
    else
    {
        mysqli_query($conn,"UPDATE user set full_name='" . $_POST['name'] . "', email_address='" . $_POST['email'] . "', status='" . $_POST['status'] . "' , image='" . $_POST['image'] . "', username='" . $_POST['username'] . "', contact_no='" . $_POST['contact'] . "' where email_address = '$id'");            
        // $sql = "update user set Image='" . $_POST['image'] . "' where Email='$id'";
        $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Update Successfully !</div>";
 
    }
    
    //         
    //         if (mysqli_query($conn, $sql)) {
    //             echo "Updated successfully !";
    //           } 
    //     else
    //     {
    //         echo "Please Key the Correct Role and Status follow the two selection !";
    //     }
    
    // else
    // {
    //     echo "Please Key the Correct Role and Status follow the two selection !";
    // }



	
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
<style>
    .middle
    {
        max-width: 800px;
        margin: auto; 
        padding:50px;
    }
    *
    {
        font-size: 30px;
    }
    fieldset
    {
        background-color: #f2f2f2;
    }
    a:hover
    {
      color: red;
    }
    sup
    {
      color: red;
    }
</style>

</head>
<body>
    

<div class="middle">

<fieldset>
    <?php
        // $name=$_GET['name'];



        $result = mysqli_query($conn, "select * from user where email_address = '$id'"); 
        $row = mysqli_fetch_assoc($result);

    //     $id = $_GET['name'];
    // $host = "SELECT * FROM `admin` where username = '$id'";
    // $query = mysqli_query($conn,$host);
    // $host_image = mysqli_fetch_assoc($query);             // ?name=<?php echo $host_image['username']

    ?>
    
    <h1><b style="font-size: 50px;"><i class="fa fa-pencil" style="font-size:50px"></i>Edit Customer / User</b></h1>

    <form name="addfrm" method="post" action="">

        <label>Name<sup>*</sup> :</label><input type="text" name="name" size="0" value="<?php echo $row['full_name']; ?>">

        <br><label>Email<sup>*</sup> :</label><input type="email" name="email" value="<?php echo $row['email_address']; ?>">
     
        <br><label>Phone Number<sup>*</sup> :</label><input type="text" name="contact" size="10" value="<?php echo $row['contact_no']; ?>">

        <br><label>Username<sup>*</sup> :</label><input type="text" name="username" size="15" value="<?php echo $row['username']; ?>">

        <br><label for="status"  >Status<sup>*</sup> : </label>
                <select id="status" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>

        <p>User Image<sup>*</sup> : (insert the file picture)<br><br><input type="file" id="file"  name="image" class="form-control" multiple></P>
        
        <br><input type="submit" name="savebtn" value="UPDATE">

    </form>
    <div style=text-align:center;>
    <?php echo "<div>".$msg."</div>"?></dev>
</fieldset>
</div>

</body>
</html>


