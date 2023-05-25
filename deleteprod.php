<?php
    include("conn.php");
    include 'adminheader.php';
    $msg = '';
    $id =$_GET['admin_id']; 
    $shoe_id=$_GET['shoe_id']; 
?>
<?php
    if (isset($_POST['savebtn'])) {
        $status = $_POST["status"];

            mysqli_query($conn, "UPDATE shoes set status='" . $_POST['status'] . "' where shoe_id = '$shoe_id'");    
    
            $msg = "<div style='text-align:center; background-color:green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text-align: center; margin-bottom: 20px;'>Update Successfully!</div>";
            echo '<script>alert("Update Successfully !");</script>';
    
            echo '<script>
                function confirmRedirect() {
                    if (confirm("Do you want to go to admin_shoes.php?")) {
                        window.location.href = "admin_shoes.php?admin_id=' . $id . '";
                    }
                }
                confirmRedirect();
            </script>';
        }
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Shoe Status</title>
    
     
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
        margin-left: 180px;
        margin-right: 250px;
    }
    input
    {
        float: right;
    }

</style>

</head>
<body>
<fieldset>
    <h1>Edit Shoe Status</h1>
    <p>You want to active or inactive the shoes?</p>
    <form method="post">
        <label for="status">Status&nbsp;&nbsp;&nbsp;:</label>
        <select id="status" name="status">
            <option value="active ">Active</option>
            <option value="inactive ">Inactive</option>
        </select>
        <br>
        <input type="submit" name="savebtn" value="Update">
    </form>
    <div style=text-align:center;>
    <?php echo "<div>".$msg."</div>"?>
</div>
</fieldset>
</body>
</html>
