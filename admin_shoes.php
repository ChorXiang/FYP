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

  fieldset
  {
    background-color: #f2f2f2;
    margin-left: 160px;
    text-align: left;
  }

  th,td
  {
    padding: 20px;
    text-align: center;
  }

  .imgcenter {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 200px;
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
      <h1><i class="fa fa-address-book-o" style="font-size:45px"><b style="font-size: 50px;"> Manage Shoes </b></i></h1>

      <table border="0px">
      <thead>
        <tr>
        <th>Shoe ID</th>
        <th>Shoe Name</th>
        <th>Category</th>
        <th>Shoe Image</th>
        <th>Shoe Price</th>
        <th>Edit</th>
        </tr>
    </thead>
        <?php

        while($row = mysqli_fetch_array($result))
        {
            ?>
      <tbody>
      <tr>
        <th><?php echo $row['shoe_id']; ?></th>
        <th><?php echo $row['shoe_name']; ?></th>
        <th><?php echo $row['category']; ?></th>
        <th><img src="image/shoesimg/<?php echo $row["shoe_image"]; ?>" alt="<?php echo $row["shoe_name"]; ?>" class="imgcenter" ></th>
        <th><?php echo $row['shoe_price']; ?></th>
        <th><a href="admin_product.php?shoe_id=<?php echo $row['shoe_id'];?>" alt="edit"><i class="fa fa-cog" style="font-size:36px"></i></a></th>
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
