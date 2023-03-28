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
        .imgg
        {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 25%;
        }
        .bottom
        {
            padding-top: 15px;
        }
        h1
        {
            text-align: center;
            margin:20px;
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
        .box
        {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 15px;
            margin: 20px 460px;
        }
        a.profile
        {
            color:black;
            background-color: #fff;
            border-radius: 4px;
            border: 1px solid #ddd;

            padding: 10px 15px;
            margin:10px 20px;
        }
        .boxleft
        {
            padding: 5px 0px 15px 330px;
            float: left;
            text-align:left;
 
        }
        .box2
        {
            padding: 5px 200px 15px 0px;
            float: right;
            text-align:left;
        }
    </style>
</head>
<body>
<div class="middle">
        <h1>My Account</h1>
        <div class="box">
        <br>
        <br>
            <h2> Account Information </h2>
            <?php
            // $id = $_GET['email']; 
            // $login_no=$_REQUEST["no"]; --------------------- no use ------------   // put from the user check login  ( where no=$login_no ) // 
            $sql = "select * from user  "; //where Email = '$id'
            $result = mysqli_query($conn,$sql);
           
            ?> 
            <form action="" method="POST">
                <?php
                $row = mysqli_fetch_array($result);
                    ?>

                
 
                
                    <p><img class='imgg' src="<?php echo "image/".$row['image'];?>" ></p>
                    <br>

                <div class="label">

                        <div class="boxleft">
                            <label for="fname"><i class="fa fa-user"></i> Full Name<br><br></label>

                            <label for="email"><i class="fa fa-envelope"></i> Email<br><br></label>

                            <label for="fname"><i class="fa fa-phone"></i> Phone number</label>

                        </div>

                        <div class="box2">

                        <span>: <?php echo $row["full_name"]; ?><br><br></span>

                        <span>: <?php echo $row["email_address"]; ?><br><br></span>

                        <span>: <?php echo $row["contact_no"]; ?></span>

                        </div>

                </div>
                

                    <a class="profile" href="userprofile_edit.php" alt="update">Edit Profile<i class="fa fa-pencil"></i></a>
                                                                <!-- ?email=<?php echo $id ?> -->

                    <a class="profile" href="userchangepass.php" alt="change">Change Password<i class="fa fa-pencil"></i></a>
                                                                <!-- ?email=<?php echo $id ?> -->

                    <a class="profile" href="homepage.php" alt="logout">Logout<i class="fa fa-sign-out"></i></a>
                                                         <!-- ?email=<?php echo $id ?> -->


                    
            </form>
        </div>

    </div>
</body>
</html>

<?php
    include 'footer.php';
   
?>