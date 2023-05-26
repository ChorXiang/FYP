<?php
    include 'conn.php'; 
    
    $id =$_GET['admin_id']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Report Order</title>
    
    <style>
        table 
        {
            border-collapse: collapse;
            width: 100%;
            
        }
        th, td 
        {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;

            
        }
        th 
        {
            background-color: #ddd;
        }



        
      @media print 
        {
            #print 
            {
                display: none;
            }
            #backbtn
            {
                display: none;
            }
        }
    
        #print
        {
            margin-left: 150px;
            background-color: #039be5;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #backbtn
        {
            background-color: #039be5;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .logo
        {
          width:150px;
          margin: 0;
          height:60px;
          padding: 0;
        
        }


        table 
        {
            border-collapse: collapse;
            width: 100%;
            
        }
        th, td 
        {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;

            
        }
        th 
        {
            background-color: #ddd;
        }



        
      @media print 
        {
            #print 
            {
                display: none;
            }
            #backbtn
            {
                display: none;
            }
        }
    
        #print
        {
            margin-left: 150px;
            background-color: #039be5;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #backbtn
        {
            background-color: #039be5;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .logo
        {
          width:150px;
          margin: 0;
          height:60px;
          padding: 0;
        
        }

        </style>
</head>
<body>
    


<?php
        $sql = "select * from history";
        $result = mysqli_query($conn,$sql);
    ?>
      
      <div >
        
        <h1 style='margin-left: 70px; '><img class="logo" src="image/foot.png" alt="logo"></h1>
      </div>
      <div class="User_form">
        <table cellpadding="0px" cellspacing="0px"  rules="none" frame="border" style="box-shadow: 3px 3px 5px grey">
            <tr>
            <th colspan="12" style="text-align: center;">
                Order Informations
                </th>
            </tr>


            <tr >
           
          
          <td>Order Number</td>
          <td>Shoes Name </td>
          <td>Shoes Size</td>
          <td>Quantity</td>
          <td>Price</td>
          <td>Total Price</td>
          <td>Email</td>
          <td>Date</td>
          <td>Customer Name</td>
          <td>Customer Phone Number</td>
          <td>Customer Address</td>
          <td>Order Status</td>
                
             
                
            </tr>
         <?php
         while($row = mysqli_fetch_array($result))
        {
     
         ?>
            <tr>
          <td><?php echo $row["order_num"]; ?></td>         
          <td><?php echo $row["her_shoesname"];	?></td>
          <td><?php echo $row["her_size"];	?></td>
          <td><?php echo $row["her_quantity"];?></td>
          <td><?php echo $row["her_price"];?></td>
          <td><?php echo $row["total"];?></td>
          <td><?php echo $row["her_email"];?></td>
          <td><?php echo $row["her_date"];?></td>
          <td><?php echo $row["his_name"];?></td>
          <td><?php echo $row["his_pn"];?></td>
          <td><?php echo $row["his_address"];?><?php echo $row["his_state"];?></td>
          <td><?php echo $row["order_status"];?></td>
            </tr>
            <?php
        }
        ?>
          
        </table>
        <br><br>
        <button id="print" onclick="window.print();" style='margin-left: 40px'>Print Report</button>
        <a href="manageorder.php?admin_id=<?php echo $id ?>"><button id="backbtn" name="backbtn" style='margin-left: 1180px'>Previous Page </button></a>
    
        <?php
    if(isset($_POST["backbtn"]))
    {
        header("location: manageuser.php?admin_id=' . $id . '");
        exit();
    }

    ?>
</div>


   

</body>
</html>