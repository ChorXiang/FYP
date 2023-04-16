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
  .container
  {
  display: flex;
  justify-content: space-between;
  width: 100%;
  margin: 0 auto;
  border: 1px solid #ccc;
  padding: 20px;
  }

  .imgcenter {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
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

<div class='right'>
<fieldset>

<table>
  <thead>
    <tr>
      <th>Shoe ID</th>
      <th>Shoe Name</th>
      <th>Shoe Image</th>
      <th>Shoe Price</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rows as $row): ?>
      <tr>
        <td><?php echo $row['shoe_id']; ?></td>
        <td><?php echo $row['shoe_name']; ?></td>
        <td><img src="<?php echo $row['shoe_image']; ?>" alt="<?php echo $row['shoe_name']; ?>"></td>
        <td><?php echo $row['shoe_price']; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</fieldset>
</div>
</div>

<?php echo "<div>".$msg."</div>"?>
</body>
</html>

<?php
    include 'footer.php';
?>