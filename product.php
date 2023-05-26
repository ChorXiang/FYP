<?php
 
    include 'header.php';
    include 'conn.php'; 
 include 'sidebarheader.php';
 if (isset($_SESSION['user_id']))
 {
  $id =$_GET['user_id'];  
 }

 
?>



<!DOCTYPE html>
<html>
  <head>
<html>
<head>
  <title>Shoes Product List</title>
  
</head>

<style>
    body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

.container {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

  
  
.product-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  align-items: flex-start;

  
}


  
.product-list::after {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  align-items: flex-start;

    }

    .product-card::after {
  width: calc(33.33% - 90px);
  margin: 20px;
  display: inline-block;
  vertical-align: top;
  padding: 20px;
  border: 1px solid #ddd;
  box-shadow: 0 0 5px #ddd;
  text-align: center;
  transition: transform 0.3s ease-in-out;
}


.product-card {
    width: 335px; /* Adjust product width*/
    margin: 20px;
    display: inline-block;
    vertical-align: top;
    padding: 20px;
    border: 1px solid #ddd;
    box-shadow: 0 0 5px #ddd;
    text-align: center;
    transition: transform 0.3s ease-in-out;
  }

  



.product-card:hover {
  transform: translateY(-10px);
}



.product-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  object-position: center;
  margin-bottom: 10px;
}


.product-card h2 {
  font-size: 18px;
  margin-top: 0;
  margin-bottom: 10px;
  text-transform: uppercase;
}


.product-card a {
  color: #333;
  text-decoration: none;
  font-weight: bold;
  transition: color 0.3s ease-in-out;
}


.product-card a:hover {
  color: #c00;
}


.product-card p {
  font-size: 14px;
  margin: 10px 0;
}




.product-card .price {
  font-size: 16px;
  font-weight: bold;
  color: #c00;
  margin-top: 10px;
}





.topnav {
  margin-bottom: 20px;
}

.topnav input[type="text"] {
  width: 300px;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid #ccc;
  margin-left: 20px;
}

.topnav button[type="submit"] {
  padding: 12px 20px;
  background-color: black;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-left: 10px;
}

.topnav button[type="submit"]:hover {
  background-color: black;
}

.pagination {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.pagination a {
  margin: 0 5px;
  text-decoration: none;
  color: #333;
}

.pagination a.active {
  font-weight: bold;
}



  

</style>
<body>




    
 

<div class="product-list">
  <div class="topnav">
  
  <form method="post">
  <input type="text" name="search" placeholder="Search products..." required pattern="[A-Za-z0-9]+">
  <input type="hidden" name="user_id" value="<?php echo $id; ?>">
  <button type="submit">Search</button>
</form>

</form>

 

<?php

// Number of shoes to display per page
$shoesPerPage = 3;

// Determine the current page
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the OFFSET for the SQL query
$offset = ($currentPage - 1) * $shoesPerPage;


if (isset($_POST['search'])) {
  $search = $_POST['search'];
  $query = "SELECT * FROM shoes WHERE status='active' AND (shoe_name LIKE '%$search%' OR category LIKE '%$search%')";
  

} else {
  $query = "SELECT * FROM shoes WHERE status='active'";

}

$result = mysqli_query($conn, $query);

$totalCount = mysqli_num_rows($result);

$totalPages = ceil($totalCount / $shoesPerPage);


$query .= " LIMIT $offset, $shoesPerPage";


$result = mysqli_query($conn, $query);

if (isset($_SESSION['user_id'])) {
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $sid = $row['shoe_id'];
      echo '<div class="product-card">';
      ?>
      <img src="image/shoesimg/<?php echo $row["shoe_image"]; ?>" alt="<?php echo $row["shoe_name"]; ?>" class="imgcenter">
      <?php
      echo '<h2>' . $row['category'] . '</h2>';
      ?>
      <p><a href="productpage.php?user_id=<?php echo $id ?>&shoe_id=<?php echo $sid ?>"><?php echo $row["shoe_name"]; ?></a></p>
      <?php
      echo '<p class="price">RM' . $row['shoe_price'] . '</p>';
      echo '</div>';
    }
  } else {
    echo 'No shoes found.';
  }

  if ($totalPages > 1):
?>
    <div class="pagination">
      
    <?php if ($currentPage > 1): ?>
    <a href="?search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>&page=<?php echo $currentPage - 1; ?>&user_id=<?php echo $id; ?>">Previous</a>
<?php endif; ?>

      
      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>&page=<?php echo $i; ?>&user_id=<?php echo $id; ?>" <?php if ($i == $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
      <?php endfor; ?>

      <?php if ($currentPage < $totalPages): ?>
        <a href="?search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>&page=<?php echo $currentPage + 1; ?>&user_id=<?php echo $id; ?>">Next</a>
      <?php endif; ?>
      
    </div>
<?php
  endif;
} else {
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $sid = $row['shoe_id'];
      echo '<div class="product-card">';
      ?>
      <img src="image/shoesimg/<?php echo $row["shoe_image"]; ?>" alt="<?php echo $row["shoe_name"]; ?>" class="imgcenter">
      <?php
      echo '<h2>' . $row['category'] . '</h2>';
      ?>
      <p><a href="productpage.php?shoe_id=<?php echo $sid ?>"><?php echo $row["shoe_name"]; ?></a></p>
      <?php
      echo '<p class="price">RM' . $row['shoe_price'] . '</p>';
      echo '</div>';
    }
  } else {
    echo 'No shoes found.';
  }

  if ($totalPages > 1):
?>
    <div class="pagination">
      
    <?php if ($currentPage > 1): ?>
    <a href="?search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>&page=<?php echo $currentPage - 1; ?>">Previous</a>
<?php endif; ?>

      
      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>&page=<?php echo $i; ?>" <?php if ($i == $currentPage) echo 'class="active"'; ?>><?php echo $i; ?></a>
      <?php endfor; ?>

      <?php if ($currentPage < $totalPages): ?>
        <a href="?search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>&page=<?php echo $currentPage + 1; ?>">Next</a>
      <?php endif; ?>
      
    </div>
<?php
  endif;
}
?>
</div>



</div>

</body>
</html>



<?php
    include 'footer.php';
   
?>