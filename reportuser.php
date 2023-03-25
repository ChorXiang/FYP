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
    <title>Report USer / Customer Page</title>

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
    
<?php include 'includes.php';?>
    <?php
       $get_userinfo = "SELECT user_id, full_name, contact_no, email_address, username FROM user";
       $run_userinfo = mysqli_query($conn,$get_userinfo);
    ?>
      
      <div >
        
        <h1 style='margin-left: 70px; '><img class="logo" src="./assets/comet.logo.jpg" alt="comet logo">Customer Informations</h1>
      </div>
      <div class="User_form">
        <table cellpadding="0px" cellspacing="0px"  rules="none" frame="border" style="box-shadow: 3px 3px 5px grey">
            <tr>
                <th colspan="9" >
                    Customer Informations
                </th>
            </tr>


            <tr >
           
          
                <td><b>User ID<b></td>
                <td><b>Full Name</b></td>
                <td><b>Contact Number</b></td>
                <td><b>Email</b></td>
                <td><b>Username</b></td>
                
             
                
            </tr>
         <?php
         while($row_userinfo = mysqli_fetch_assoc($run_userinfo))
        {
          $user_id = $row_userinfo['user_id'];
          $full_name = $row_userinfo['full_name'];
          $Contact_Number = $row_userinfo['contact_no'];
          $email= $row_userinfo['email_address'];
          $username= $row_userinfo['username'];
       
          
         
         ?>
            <tr>
                <td><?php echo $user_id ?></td>
                <td><?php echo $full_name ?></td>
                <td><?php echo $Contact_Number ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $username ?></td>
            
                
                
  
            </tr>
            <?php
        }
        ?>
          
        </table>
        <br><br>
        <button id="print" onclick="window.print();" style='margin-left: 40px'>Print Report</button>
        <a href="print_report.php"><button id="backbtn" name="backbtn" style='margin-left: 1180px'>Back to View List</button></a>
    
        <?php
    if(isset($_POST["backbtn"]))
    {
        header("location: View report.php");
        exit();
    }

    ?>
</div>


   



</body>
</html>