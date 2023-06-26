<?php
    include 'conn.php'; 
    include 'adminheader.php'; 
    $msg = '';
    $admin = $_GET["admin_id"]; 
    $id =$_GET['user_id'];
    $order_num=$_GET['order_num'];
    // $sql = "SELECT * FROM history where user_id = '$id' && order_num= $order_num"; 
    // $result = mysqli_query($conn, $sql);
?>
<?php
                if (isset($_POST["savebtn"])) 	
                {
                    $mstatus = $_POST['status'];

                        mysqli_query($conn,"UPDATE history set order_status='" . $_POST['status'] . "' where order_num = '$order_num'");            
                    
                        $msg = "<div style='text-align:center; background-color:green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Update Successfully!</div>";
                        echo '<script>alert("Update Successfully !");</script>';
     
                        echo '<script>
                            function confirmRedirect() {
                                if (confirm("Do you want to go to manageorder.php?")) {
                                    window.location.href = "manageorder.php?admin_id=' . $admin . '";
                                }
                            }
                            confirmRedirect();
                        </script>';
                    }
                
                ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>VIEW ORDER HISTORY</title>
    <style>
        
        h3
        {
            text-align: center;
        }

        .table
        {

            background-color: #f2f2f2;
            width: 100%;
            max-width: 1100px;
            margin: auto; 
            padding:50px;
        }
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
        margin-left: 25%;
        border: 1px solid lightgrey;
        border-radius: 15px;
        width:50%;
        text-align: left;
        font-weight: bold;
        font-size: 16px;
        font-family: "Lato", sans-serif;
        }
        .label
        {
        display: flex;
        flex-wrap: wrap;
        }
        .label {
        display: inline-block;
        width: 150px;
        font-weight: bold;
        margin-bottom: 5px;
        }
        .butttonright{
          float:right;
        }


    </style>
</head>
<body>

<div class="middle">
    <div>   
    <div class="box">
    <?php echo "<div>".$msg."</div>"?>

    <div >
        <h3>Order Details</h3>
    
        <?php
                    $result = mysqli_query($conn, "select * from history where user_id = '$id' && order_num= $order_num"); 
                    $row = mysqli_fetch_assoc($result);

        ?>

<br><label>Customer Name&nbsp;&nbsp;&nbsp;&nbsp; :</label> <?php echo $row["his_name"];?>

<br><label>Customer Contact :</label> <?php echo $row["his_pn"];?>

<br><label>Customer Address:</label> <?php echo $row["his_address"];?> <?php echo $row["his_state"];?>

<br><label>Customer Email&nbsp;&nbsp;&nbsp;&nbsp; :</label> <?php echo $row["her_email"];?>

<br><label>Purchase Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</label> <?php echo $row["her_date"];?>



        <tbody>                       
            <?php
            // Select data from the history table
            $id =$_GET['user_id'];
            $order_num =$_GET['order_num'];
            $sql = "SELECT * FROM history where user_id = '$id' && order_num= $order_num"; 
            $result = mysqli_query($conn, $sql);


            // Display the data in a table
           
                while($row = mysqli_fetch_assoc($result)) 
                {                    
                    $order_num = $row["order_num"];
                    $her_shoesname = $row["her_shoesname"];
                    $her_size = $row["her_size"];
                    $her_quantity = $row["her_quantity"];
                    $her_price = $row["her_price"];
                    $her_email = $row["her_email"];    
                    $total = $row["total"];
                    $status = $row["order_status"];    
                    $her_date = $row["her_date"];             
                    ?>
                    <br><br>
                     <img src="<?php echo "image/shoesimg/".$row['shoe_image'];?> " style="width:90px" >

                    <br><label>Shoes Name&emsp;&emsp; :</label> <?php echo $row["her_shoesname"];	?>

                    <br><label>Shoes Size&emsp;&emsp;&emsp;: UK</label> <?php echo $row["her_size"];	?>

                    <br><label>Shoes Quantity&emsp;:</label> <?php echo $row["her_quantity"];?>

                    <br><label>Price&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;: RM </label> <?php echo $row["her_price"];?>

                    

                    
                        <?php
    

}
?>
<br>
<br><label>Total Price&emsp;&emsp;&emsp;&nbsp;: RM </label> <?php echo $total;?>
<br>
<br><b>Current Order Status: <?php echo $status; ?><b><br>

<form action="" method="post">
                        <br>
                        <input type="radio" name="status" value="Pending" <?php if ($status == "Pending") echo "checked"; ?>>Pending
                        <input type="radio" name="status" value="Delivering" <?php if ($status == "Delivering") echo "checked"; ?>>Delivering
                        <input type="radio" name="status" value="Delivered" <?php if ($status == "Delivered") echo "checked"; ?>>Delivered

                        <br><br>
                        <input type="submit" name="savebtn" value="Update Status">
                        <div class="butttonright">
                            <a href="manageorder.php?admin_id=<?php echo $admin ?>">Back to Previous Page </a>
                        </div>
                    </form>
                    
                </div>
</div></div>



</body>
</html>
