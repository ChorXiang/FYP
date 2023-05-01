<?php
    include 'adminheader.php';
    include 'conn.php'; 
    $msg = '';
    $id = $_REQUEST["admin_id"];
?>

<?php

if (isset($_POST["savebtn"])) 	
{

    $mname= $_POST["name"];  	
    $mid = $_POST["id"]; 
    $mpass = $_POST["pass"];  	
    // $mstatus = $_POST["status"]; 
    $mimage = $_POST['image'];

        

	if (!$mname)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Name !</div>";
    }
    else if(!$mid)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in ID !</div>";
 
    }
    else if(!$mpass)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Password !</div>";
 
    }
    else if(!$mimage)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Select the Image !</div>";
    }
    else
    {
        mysqli_query($conn,"UPDATE admin set admin_id='" . $_POST['id'] . "', admin_name='" . $_POST['name'] . "', status='" . $_POST['status'] . "', image='" . $_POST['image'] . "' , admin_password='" . $_POST['pass'] . "' where admin_id = '$id'");            
        // $sql = "update user set Image='" . $_POST['image'] . "' where Email='$id'";
        $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Update Successfully !</div>";
        echo '<script>alert("Update Successfully !");</script>';
     
        echo '<script>
            function confirmRedirect() {
                if (confirm("Do you want to go to managestaff.php?")) {
                    window.location.href = "managestaff.php";
                }
            }
            confirmRedirect();
         </script>';
        
    }

	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Edit Manage Staff</title>

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
    .butttonright{
      float:right;
    }
</style>

</head>
<body>
    

<div class="middle">

<fieldset>
    <?php
        // $name=$_GET['name'];



        $result = mysqli_query($conn, "select * from admin where admin_id = '$id'"); 
        $row = mysqli_fetch_assoc($result);

    //     $id = $_GET['name'];
    // $host = "SELECT * FROM `admin` where username = '$id'";
    // $query = mysqli_query($conn,$host);
    // $host_image = mysqli_fetch_assoc($query);             // ?name=<?php echo $host_image['username']

    ?>
    
    <h1><b style="font-size: 50px;"><i class="fa fa-pencil" style="font-size:50px"></i>Edit Admin / Staff </b></h1>

    <form name="addfrm" method="post" action="">

        <input type="hidden" name="id" size="0" value="<?php echo $row['admin_id']; ?> "> 

        <br><label>Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label> <input type="text" name="name" size="0" value="<?php echo $row["admin_name"]; ?>  "> 
     
        <br><label>Password :</label> <input type="text" name="pass" size="0" value="<?php echo $row["admin_password"]; ?>"> 
&nbsp;
        <br><label for="status"  >Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                <select id="status" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
<br><br>
        <label for="file"  class="Choose"><i class="fa fa-camera"></i> Choose a Photo</label>
        <input type="file" id="file" name="image" class="form-control" multiple>
        <br>
       
        <br><br><input type="submit" name="savebtn" value="UPDATE">
        <div class="butttonright">
        <a href="managestaff.php">Back to Previous Page </a>
        </div>
    </form>
    <div style=text-align:center;>
    <?php echo "<div>".$msg."</div>"?></dev>
</fieldset>
</div>

</body>
</html>