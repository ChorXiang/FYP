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

  .buttonright{
    float: right;
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

  .fonts{
    font-size: 20px;
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
        <div class="buttonright">
          <a href="addmanagecategory.php?admin_id=<?php echo $id ?>" alt="insert">
          <i class="fa fa-plus" style="font-size: 24px;"></i>
          <input type="button" value="Add New Brand" style="margin-left: 10px;">
        </div>
      </a>
      <h4>
        Select the shoes brand that you want to edit the status.
      </h4>
      <div class="fonts">
      <?php
      $count = 1;
      $result = mysqli_query($conn, "SELECT DISTINCT shoe_brand FROM shoes");

      while ($row = mysqli_fetch_assoc($result)) {
        echo $count;
        echo '&nbsp;&nbsp;';
        echo '<a href="editmanagecategory.php?admin_id=' . $id . ' &&shoe_brand=' . $row['shoe_brand'] . '">' . $row['shoe_brand'] . '</a>';
        echo '<br><br>';
        $count++;
      }

            ?>
      </div>
      
</fieldset>

</div>
</div>

</body>
</html>
