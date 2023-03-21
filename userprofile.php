<?php
    include 'header.php';
    include 'conn.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>userprofile</title>
    <style>
        body
        {
            background: #DDDDDD;
        }
        
        .middle
        {
            max-width: 800px;
            margin: 150px; 
            margin-top: 25px;
            /* height: auto; */
            background: #fff;
            padding-bottom: 20px;
            padding-top: 0;
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
        }
        .edit
        {
            float: right;
        }
        .label
        {
            padding-right: 20px;
        }
        label
        {
            /* display: inline-block; */
            width: 150px;
            margin-bottom: 20px;
            
            text-align: right;
        }
        img
        {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 20%;
        }
        .bottom
        {
            padding-top: 15px;
        }
        h1
        {
            text-align: center;
            background: linear-gradient(#ff7b00,#ffb700);
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
            border-bottom: 4px solid gray;
        }
        form
        {
            padding: 20px;
        }
        form img
        {
            width: 90px;
            border-radius: 50%;
        }
        .sum
        {
            border: none;
            width: 100px;
            height: 50px;
        }
    </style>
</head>
<body>
<div class="middle">
        <h1>User Profile</h1>
            <?php
            $id = $_GET['email']; 
            // $login_no=$_REQUEST["no"]; --------------------- no use ------------   // put from the user check login  ( where no=$login_no ) // 
            $sql = "select * from user  "; //where Email = '$id'
            $result = mysqli_query($conn,$sql);
           
            ?> 
            <form action="" method="POST">
                <?php
                $row = mysqli_fetch_array($result);
                    ?>

                <a class="edit" href="user_edit.php?email=<?php echo $id ?>" alt="update">Edit Profile<i class="fa fa-pencil"></i></a>
 
                
                    <p><img class='img' src="<?php echo "images/".$row['Image'];?>" ></p>
                <div class="label">
                    <label for="fname" ><i class="fa fa-user"></i> Full Name : <?php echo $row["Name"]; ?></label>
                    <br>
                    <br>
                    <label for="email"><i class="fa fa-envelope"></i> Email : <?php echo $row["Email"];?></label>
                    <br>
                    <br>
                    <label for="fname"><i class="fa fa-phone"></i> Phone number : <?php echo $row["PhoneNumber"];?></label>
                    <br>
                    <br>
                    <label for="fname"><i class="fa fa-birthday-cake"></i> Birthday  : <?php echo $row["Date"];?></label>
                    
                </div>
                <div>
                    <P>About me : </P>
                    <input class="sum" type="text" value="<?php echo $row["Summary"];?>">
                </div>
                <?php echo "<br><br>";?>
                <i class="fa fa-sign-out"></i>
                <span><a href="Homepage.php?email=<?php echo $id ?>" >Return Home Page</a></span>               
            </form>

    </div>
</body>
</html>

<?php
    include 'footer.php';
   
?>