<?php
    include 'conn.php'; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Report Staff</title>

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

</head>
<body>
    

<?php
        $sql = "select * from admin";
        $result = mysqli_query($conn,$sql);
    ?>
      
      <div >
        
        <h1 style='margin-left: 70px; '><img class="logo" src="image/foot.png" alt="logo"> Staff Informations</h1>
      </div>
      <div class="User_form">
        <table cellpadding="0px" cellspacing="0px"  rules="none" frame="border" style="box-shadow: 3px 3px 5px grey">
            <tr>
                <th colspan="10"  >
                    Customer Informations
                </th>
            </tr>


            <tr>
           
          
            <td>Admin ID</td>
          <td>Admin Name</td>
          <td>status</td>
          <td>Authority</td>
                
             
                
            </tr>
         <?php
         while($row = mysqli_fetch_array($result))
        {
     
         ?>
            <tr>
          <td><?php echo $row["admin_id"]; ?></td>         
          <td></td>   
          <td></td>   
          <td></td>   
  
            </tr>
            <?php
        }
        ?>
          
        </table>
        <br><br>
        <button id="print" onclick="window.print();" style='margin-left: 40px'>Print Report</button>
        <a href="managestaff.php"><button id="backbtn" name="backbtn" style='margin-left: 1180px'>Back to Manage Staff </button></a>
    
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