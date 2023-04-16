<?php
    include 'adminheader.php'; 
    include 'conn.php'; 
    $msg=''; 
?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
  .error {
  color: #FF0000;
  }

  .left{
    float:left;
    padding-left:80px ;
  }

  .right{
    float:right;
    padding-right:80px ;
  }
  /* .container
  {
  display: flex;
  justify-content: space-between;
  width: 100%;
  margin: 0 auto;
  border: 1px solid #ccc;
  padding: 20px;
  } */

  .imgcenter {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 20%;
      padding-left: 20px;
      text-align:"center";  
    }

  .wordcenter {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  }
</style>
</head>
<body>  

<?php
    $sql = "SELECT * FROM shoes ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<div class="container">

<div>

<fieldset>
    <?php
        $sql = "select * from shoes";
        $result = mysqli_query($conn,$sql);
        ?>
      <table border="0px">
      <thead>
        <tr>
        <th>Shoe ID</th>
        <th>Shoe Name</th>
        <th>Shoe Image</th>
        <th>Shoe Price</th>
        </tr>
    </thead>
        <?php

        while($row = mysqli_fetch_array($result))
        {
            ?>
      <tbody>
      <tr>
        <td><?php echo $row['shoe_id']; ?></td>
        <td><?php echo $row['shoe_name']; ?></td>
        <td><img src="image/shoesimg/<?php echo $row["shoe_image"]; ?>" alt="<?php echo $row["shoe_name"]; ?>" class="imgcenter" ></td>
        <td><?php echo $row['shoe_price']; ?></td>
      </tr>
    </tbody>
            <?php

        }

		?>
			
      </table>
</fieldset>

</div>
</div>

</body>
</html>
