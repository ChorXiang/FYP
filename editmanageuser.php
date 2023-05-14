<?php
    include 'adminheader.php';
    include 'conn.php'; 
    $msg = '';
    $id = $_REQUEST["email"];
?>


<?php

if (isset($_POST["savebtn"])) 	
{
 
    $mstatus = $_POST['status'];

    if(!$mstatus)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Key in Status !</div>";
 
    }
    else
    {
        mysqli_query($conn,"UPDATE user set status='" . $_POST['status'] . "' where email_address = '$id'");            
        // $sql = "update user set Image='" . $_POST['image'] . "' where Email='$id'";
        $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Update Successfully !</div>";
        echo '<script>alert("Update Successfully !");</script>';
     
        echo '<script>
            function confirmRedirect() {
                if (confirm("Do you want to go to manageuser.php?")) {
                    window.location.href = "manageuser.php";
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
    <title>Edit Status</title>

    
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
        margin-left: 160px;
    }
    a:hover
    {
      color: red;
    }
    sup
    {
      color: red;
    }
    .right
    {
        float: right;
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
        <?php echo "<div>".$msg."</div>"?></dev>

    <h1><b style="font-size: 50px;"><i class="fa fa-pencil" style="font-size:50px"></i>Edit Customer / User</b></h1>

    <form name="addfrm" method="post" action="">

        <label>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label> <?php echo $row['full_name']; ?> 

        <br><label>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label> <?php echo $row["email_address"]; ?> 
     
        <br><label>Contact&nbsp;&nbsp;&nbsp;&nbsp; :</label> <?php echo $row["contact_no"]; ?>

        <br><label>Nickname :</label> <?php echo $row["username"]; ?> 

        <br><label for="status"  >Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
                <select id="status" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>

       
        <br><br><input type="submit" name="savebtn" value="UPDATE">
        <div class="right">
        <a href="manageuser.php">Back</a>
        </div>
    </form>
    <div style=text-align:center;>
</fieldset>
</div>

</body>
</html>


