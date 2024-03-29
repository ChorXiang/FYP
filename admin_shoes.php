<?php
    include 'adminheader.php'; 
    include 'conn.php'; 
    $msg=''; 
    // $id =$_GET['admin_id']; 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

  .floatright{
    float:right;   
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
    padding: 15px;
    text-align: center;
  }

  .imgcenter {
      display: block;
      margin-left: auto;
      margin-right: auto;
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

<div class="container">

<div>
<?php

$shoesPerPage = 2; // Number of shoes to display per page


$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number, default is 1


$offset = ($currentPage - 1) * $shoesPerPage;// Offset for retrieving the correct range of shoes from the database

if (isset($_GET['search'])) {
  $search = mysqli_real_escape_string($conn, $_GET['search']);// Get the search query and escape it to prevent SQL injection
  $sql = "SELECT * FROM shoes WHERE shoe_name LIKE '%$search%' LIMIT $offset, $shoesPerPage";// SQL query to retrieve shoes matching the search query with pagination
  $countSql = "SELECT COUNT(*) AS total FROM shoes WHERE shoe_name LIKE '%$search%'";// SQL query to count the total number of shoes matching the search query
} else {
  $sql = "SELECT * FROM shoes LIMIT $offset, $shoesPerPage";// SQL query to retrieve all shoes with pagination
  $countSql = "SELECT COUNT(*) AS total FROM shoes";// SQL query to count the total number of shoes
}

$result = mysqli_query($conn, $sql);
$shoes = mysqli_fetch_all($result, MYSQLI_ASSOC);// Fetch all the shoes from the result set into an associative array


$countResult = mysqli_query($conn, $countSql);
$totalShoes = mysqli_fetch_assoc($countResult)['total'];// Get the total number of shoes from the count query result


$totalPages = ceil($totalShoes / $shoesPerPage);// Calculate the total number of pages based on the total number of shoes and shoes per page
?>

<fieldset>
  <form method="get">
    <input type="text" name="search" placeholder="Shoes name..." required pattern="[A-Za-z0-9]+">
    <input type="hidden" name="admin_id" value="<?php echo $id; ?>">
    <button type="submit">Search</button>
  </form>

  <h1><i class="fa fa-address-book-o" style="font-size: 45px;"><b style="font-size: 50px;"> Manage Shoes </b></i></h1>

  <div class="right">
    <span class="left">
      <a href="addmanageshoes.php?admin_id=<?php echo $id ?>" alt="insert">
        <i class="fa fa-plus" style="font-size: 24px;"></i>
        <input type="button" value="Add New Shoes" style="margin-left: 10px;">
      </a>
    </span><br><br>
  </div>

  <table border="0px">
    <thead>
      <tr>
        <th>Shoes ID</th>
        <th>Shoes Name</th>
        <th>Category</th>
        <th>Shoes Image</th>
        <th>Shoes Price(RM)</th>
        <th>Status</th>
        <th>Edit Shoes</th>
        <th>Edit Stock</th>  
        <th>Edit Status</th>
      </tr>
    </thead>
    <tbody>
  
        <?php foreach ($shoes as $row): ?>
    <?php if ($row['yn'] == 'y'): ?>
      <tr>
          <td><?php echo $row['shoe_id']; ?></td>
          <td><?php echo $row['shoe_name']; ?></td>
          <td><?php echo $row['category']; ?></td>
          <td>
            <img src="image/shoesimg/<?php echo $row['shoe_image']; ?>" alt="<?php echo $row['shoe_name']; ?>" class="imgcenter" height="190px" width="220px">
          </td>
          <td><?php echo $row['shoe_price']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><a href="admin_productnew.php?shoe_id=<?php echo $row['shoe_id']; ?>&&admin_id=<?php echo $id; ?>" alt="edit"><i class="fa fa-cog" style="font-size: 36px;"></i></a></td>
          <td><a href="admin_stock.php?shoe_id=<?php echo $row['shoe_id']; ?>&&admin_id=<?php echo $id; ?>" alt="edit"><i class="fa fa-cog" style="font-size: 36px;"></i></a></td>
          <td><a href="deleteprod.php?shoe_id=<?php echo $row['shoe_id']; ?>&&admin_id=<?php echo $id; ?>" alt="edit" style="color: red;"><i class="fa fa-close" style="font-size: 36px;"></i></a></td>
        

          </tr>
    <?php endif; ?>
<?php endforeach; ?>
       

    </tbody>
  </table>

  <span class="floatright">
    <a href="reportshoes.php?admin_id=<?php echo $id ?>" alt="insert">
      <i class="fa fa-print" style="font-size: 24px;"></i>
      <input type="button" value="View and Print Report" style="margin-left: 10px;">
    </a>
  </span>


  <?php if ($totalPages > 1): ?>
    <div class="pagination">
      <?php if ($currentPage > 1): ?>
        <a href="?search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>&page=<?php echo $currentPage - 1; ?>&amp;admin_id=<?php echo $id; ?>">Previous</a>
      <?php endif; ?>
      
      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>&amp;admin_id=<?php echo $id; ?>&page=<?php echo $i; ?>" <?php if ($i == $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
      <?php endfor; ?>

      <?php if ($currentPage < $totalPages): ?>
        <a href="?search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>&page=<?php echo $currentPage + 1; ?>&amp;admin_id=<?php echo $id; ?>">Next</a>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</fieldset>

  </div>
  </div>

  </body>
  </html>
