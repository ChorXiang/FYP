<?php
    include 'adminheader.php'; 
    include 'conn.php'; 
    $id =$_GET['admin_id']; 
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
    padding-right: 70px;
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
        <h1><i class="fa fa-address-book-o" style="font-size:45px"><b style="font-size: 50px;"> Manage Shoes Brand</b></i></h1>
      <table border="0px">
      <thead>
        <tr>
        <th>Brand Name</th>
        <th>Number of Shoes</th>
        <th>Edit</th>
        </tr>
    </thead>
        <?php

        $nikenum = 0; 
        $pumanum = 0;
        $adidasnum = 0;
        $conversenum = 0;

        while($row = mysqli_fetch_array($result)) {
            // access the shoe_brand column value using $row['shoe_brand']
            $shoe_brand = $row['shoe_brand'];

            // check if the shoe_brand column value is equal to 'Nike'
            if (($shoe_brand) == 'Nike'){
            // increment the 'num' variable by 1 for each Nike shoe
                $nikenum++;
            }
            else if (($shoe_brand) == 'Puma'){
                $pumanum++;
            }
            else if (($shoe_brand) == 'Adidas'){
                $adidasnum++;
            }
            else if (($shoe_brand) == 'Converse'){
                $conversenum++;
            }
        }
            
            ?>
      <tbody>
      <tr>
        <th>Nike</th>
        <th><?php echo $nikenum ?></th>
        <th><a href="editmanagecategory.php?shoe_brand=Nike&&admin_id=<?php echo $id ?>" alt="edit"><i class="fa fa-cog" style="font-size:36px"></i></a></th>
      </tr>
      <tr>
        <th>Puma</th>
        <th><?php echo $pumanum ?></th>
        <th><a href="editmanagecategory.php?shoe_brand=Puma&&admin_id=<?php echo $id ?>" alt="edit"><i class="fa fa-cog" style="font-size:36px"></i></a></th>
      </tr>
      <tr>
        <th>Adidas</th>
        <th><?php echo $adidasnum ?></th>
        <th><a href="editmanagecategory.php?shoe_brand=Adidas&&admin_id=<?php echo $id ?>" alt="edit"><i class="fa fa-cog" style="font-size:36px"></i></a></th>
      </tr>
      <tr>
        <th>Converse</th>
        <th><?php echo $conversenum ?></th>
        <th><a href="editmanagecategory.php?shoe_brand=Converse&&admin_id=<?php echo $id ?>" alt="edit"><i class="fa fa-cog" style="font-size:36px"></i></a></th>
      </tr>
    </tbody>
			
      </table>
</fieldset>

</div>
</div>

</body>
</html>
