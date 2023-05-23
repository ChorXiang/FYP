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
    <title>Admin | Report Shoes</title>

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

        </style>

</head>
<body>
    

<?php
        $sql = "select * from shoes";
        $result = mysqli_query($conn,$sql);
    ?>
      
      <div >
        
        <h1 style='margin-left: 70px; '><img class="logo" src="image/foot.png" alt="logo"></h1>
      </div>
      <div class="User_form">
        <table cellpadding="0px" cellspacing="0px"  rules="none" frame="border" style="box-shadow: 3px 3px 5px grey">
            <tr>
            <th colspan="9" style="text-align: center;">
                    Shoes Informations
                </th>
            </tr>

            <tr >
           
            <td>Shoe ID </td>
            <td>Shoe Name </td>
            <td>Shoe Type</td>
            <td>Shoe Brand</td>
            <td>Category</td>
            <td>Shoe Price</td>
            <td>Status</td>     
                
            </tr>
         <?php
         while($row = mysqli_fetch_array($result))
        {
     
         ?>
            <tr>
            <td><?php echo $row["shoe_id"]; ?></td>         
            <td><?php echo $row["shoe_name"];	?></td>
            <td><?php echo $row["shoe_type"];	?></td>
            <td><?php echo $row["shoe_brand"];?></td>
            <td><?php echo $row["category"];?></td>
            <td><?php echo $row["shoe_price"];?></td>
            <td><?php echo $row["status"];?></td>
  
            </tr>
            <?php
        }
        ?>
          
        </table>
        <br><br>
        <button id="print" onclick="window.print();" style='margin-left: 40px'>Print Report</button>
        <a href="admin_shoes.php?admin_id=<?php echo $id ?>"><button id="backbtn" name="backbtn" style='margin-left: 1180px'>Previous Page </button></a>
    
        <?php
    if(isset($_POST["backbtn"]))
    {
        header("location: admin_shoes.php?admin_id=<?php echo $id ?>");
        exit();
    }

    ?>
</div>


   

</body>
</html>