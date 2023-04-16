<?php
    include 'conn.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Order</title>
    
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
        
        <h1 style='margin-left: 70px; '><img class="logo" src="image/foot.png" alt="logo"> Order Informations</h1>
      </div>
      <div class="User_form">
        <table cellpadding="0px" cellspacing="0px"  rules="none" frame="border" style="box-shadow: 3px 3px 5px grey">
            <tr>
                <th colspan="15"  >
                Order Informations
                </th>
            </tr>


            <tr >
           
          
          <td>Order ID</td>
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
            $subtotal=0;
            $total=0;
            $p=$row["her_price"];
            $q=$row["her_quantity"];
            $subtotal=$p*$q;
            $total =  $total + $subtotal;
     
         ?>
            <tr>
          <td><?php echo $row["her_id"]; ?></td>         
          <td><?php echo $row["her_shoesname"];	?></td>
          <td><?php echo $row["her_size"];	?></td>
          <td><?php echo $row["her_quantity"];?></td>
          <td><?php echo $row["her_price"];?></td>
          <td><?php echo  $total;?></td>
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
        <a href="manageorder.php"><button id="backbtn" name="backbtn" style='margin-left: 1180px'>Back to Manage Order </button></a>
    
        <?php
    if(isset($_POST["backbtn"]))
    {
        header("location: manageuser.php");
        exit();
    }

    ?>
</div>


   

</body>
</html>