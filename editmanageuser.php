<?php
    include 'adminheader.php';
    include 'conn.php'; 

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

        // $id = $_REQUEST["email"];

        $result = mysqli_query($conn, "select * from user where email_address = '$id'"); 
        $row = mysqli_fetch_assoc($result);

    //     $id = $_GET['name'];
    // $host = "SELECT * FROM `admin` where username = '$id'";
    // $query = mysqli_query($conn,$host);
    // $host_image = mysqli_fetch_assoc($query);             // ?name=<?php echo $host_image['username']

    ?>
    
    <h1><b style="font-size: 50px;"><i class="fa fa-pencil" style="font-size:50px"></i>Edit Customer / User</b></h1>

    <form name="addfrm" method="post" action="">

        <p><label>Name<sup>*</sup> :</label><input type="text" name="name" size="50" value="<?php echo $row['fullname']; ?>">

        <p><label>Email<sup>*</sup> :</label><input type="email" name="email" value="<?php echo $row['email_address']; ?>">
     
        <p><label>Role<sup>*</sup> :</label><input type="text" name="contact" size="10" value="<?php echo $row['contact_no']; ?>">

        <p><label>Username<sup>*</sup> :</label><input type="text" name="username" size="15" value="<?php echo $row['username']; ?>">

        <p><label>Password<sup>*</sup> :</label><input type="text" name="password" size="15" value="<?php echo $row['userpassword']; ?>">

        <p><label>Status<sup>*</sup> (Active / Inactive) :</label><input type="text" name="status" size="15" value="<?php echo $row['status']; ?>">

        <p>User Image<sup>*</sup> : (insert the file picture)<br><br><input type="file" id="file"  name="image" class="form-control" multiple></P>
        
        <p><input type="submit" name="savebtn" value="UPDATE">

        <div style="padding-bottom:5px;">
        <i class="fa fa-mail-forward"></i>



        </div>


    </form>
</fieldset>
</div>

</body>
</html>


<?php

if (isset($_POST["savebtn"])) 	
{
	$mname = $_POST["name"];  	
    $memail = $_POST["email"];  
	$mrole = $_POST["role"];  	
	$mstatus = $_POST["status"];  		
    $mimage = $_POST['image'];


        

	if (!$mname)
    {
        echo "Please Key in Name !";
    }
    else if(!$memail)
    {
        echo "Please Key in Email !";
    }
    else if(!$mrole)
    {
        echo "Please Key in Role !";
    }
    else if(!$mstatus)
    {
        echo "Please Key in Status !";
    }
    else if(!$mimage)
    {
        echo "Please put the image ! ";
    }
    else if($mrole=="VIP")
    {

        if($mstatus == "Active")
        {
            mysqli_query($conn,"UPDATE user set Name='" . $_POST['name'] . "', Email='" . $_POST['email'] . "', Role='" . $_POST['role'] . "' ,Status='" . $_POST['status'] . "' where Email = '$id'");
            $sql = "update user set Image='" . $_POST['image'] . "' where Email='$id'";
            mysqli_query($conn,$sql);
            if (mysqli_query($conn, $sql)) {
                echo "Updated successfully !";
              } 
        }
        else if($mstatus == "Inactive")
        {
            mysqli_query($conn,"UPDATE user set Name='" . $_POST['name'] . "', Email='" . $_POST['email'] . "', Role='" . $_POST['role'] . "' ,Status='" . $_POST['status'] . "' where Email = '$id'");
            $sql = "update user set Image='" . $_POST['image'] . "' where Email='$id'";
            mysqli_query($conn,$sql);
            if (mysqli_query($conn, $sql)) {
                echo "Updated successfully !";
              } 
        }
        else
        {
            echo "Please Key the Correct Role and Status follow the two selection !";
        }
    }
    else if($mrole=="Customer")
    {

        if($mstatus == "Active")
        {
            mysqli_query($conn,"UPDATE user set Name='" . $_POST['name'] . "', Email='" . $_POST['email'] . "', Role='" . $_POST['role'] . "' ,Status='" . $_POST['status'] . "' where Email = '$id'");
            $sql = "update user set Image='" . $_POST['image'] . "' where Email='$id'";
            mysqli_query($conn,$sql);
            if (mysqli_query($conn, $sql)) {
                echo "Updated successfully !";
              } 
            
        }
        else if($mstatus == "Inactive")
        {
            mysqli_query($conn,"UPDATE user set Name='" . $_POST['name'] . "', Email='" . $_POST['email'] . "', Role='" . $_POST['role'] . "' ,Status='" . $_POST['status'] . "' where Email = '$id'");            
            $sql = "update user set Image='" . $_POST['image'] . "' where Email='$id'";
            mysqli_query($conn,$sql);
            if (mysqli_query($conn, $sql)) {
                echo "Updated successfully !";
              } 
        }
        else
        {
            echo "Please Key the Correct Role and Status follow the two selection !";
        }
    }
    else
    {
        echo "Please Key the Correct Role and Status follow the two selection !";
    }



	
	
}

?>
