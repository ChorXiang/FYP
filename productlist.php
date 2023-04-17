
<?php
    include 'header.php';
    include 'conn.php'; 

?>

<!DOCTYPE html>
<html>
  <head>
<html>
<head>
  <title>Shoes Product List</title>
  <link rel="stylesheet" type="text/css" href="style.css">
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

.sidebar {
  width: 200px;
  background-color: #333;
  color: white;
  padding: 10px;
  position: fixed;
  height: 100%;
}

.sidebar ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.sidebar li {
  display: block;
  margin-right: 10px;
}

.sidebar li:last-child {
  margin-right: 0;
}

.sidebar a {
  display: block;
  color: white;
  text-decoration: none;
  padding: 10px;
  transition: background-color 0.3s ease-in-out;
}

.sidebar a:hover {
  background-color: #444;
}

.product-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  align-items: flex-start;
  margin-left: 200px;
  padding: 20px;
}

.product-card {
  width: calc((100% / 3) - 20px);
  margin: 20px;
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

@media (max-width: 992px) {
  .product-card {
    width: calc((100% / 2) - 20px);
  }
}

@media (max-width: 576px) {
  .sidebar {
    width: 100%;
    position: static;
    height: auto;
  }

  .product-list {
    margin-left: 0;
  }

  .product-card {
    width: 100%;
  }
  
}

</style>
<body>
<?php
 // 启动会话

// 检查用户是否已经登录，如果已经登录，将 $id 设置为 $_GET['user_id']，否则将 $id 设置为 NULL。
$id = isset($_SESSION['user_id']) ? $_GET['user_id'] : null;
?>

<?php if (isset($_SESSION['user_id'])) { ?>
    <!-- 如果用户已登录，则显示用户信息 -->
    <li><a href="user.php<?php if ($id) echo "?id=$id"; ?>">My Account</a></li>
    <li><a href="logout.php">Logout</a></li>
<?php } else { ?>
    <!-- 如果用户未登录，则显示登录和注册链接 -->
    <li class="dropdown" style="float: right;"><a href="#" class="dropbtn">Login</a>
        <div class="dropdown-content">
            <a href="register.php">Create An Account</a>
            <a href="login.php">Login</a>
        </div>
    </li>
<?php } ?>
<div class="container">
    <div class="sidebar">
      <nav>
        <ul>
        

       
  <?php
// Retrieve the unique shoe categories
$result = mysqli_query($conn, "SELECT DISTINCT shoe_type FROM shoes");



// Loop through the unique categories and generate HTML code for each category
while ($row = mysqli_fetch_assoc($result)) 
{
  echo '<a href="productlist.php?shoe_type=' . $row['shoe_type'] . '"><h2>' . $row['shoe_type'] . '</h2></a>';


  
 
}






 
?>
        </ul>
      </nav>
    </div>
<div class="product-list">
			<?php




			// Check if a shoe type has been selected
			if (isset($_GET['shoe_type'])) {
				// Retrieve the selected shoe type
				$shoe_type = $_GET['shoe_type'];

				// Retrieve the shoes that match the selected type
				$result = mysqli_query($conn, "SELECT * FROM shoes WHERE shoe_type='$shoe_type'");

			} else if(isset($_GET['shoe_brand'])) {
				// Retrieve the selected shoe type

        $shoe_brand =  $_GET['shoe_brand'];
				// Retrieve the shoes that match the selected type

        $resultbrand = mysqli_query($conn, "SELECT * FROM shoes WHERE shoe_brand='$shoe_brand'");
      }else
      {
				// Retrieve all the shoes
				$result = mysqli_query($conn, "SELECT * FROM shoes");
			}



			// Check if there are any shoes to display
			if (mysqli_num_rows($result) > 0) {
				// Loop through the shoes and generate HTML code for each shoe
				while ($row = mysqli_fetch_assoc($result)) {
                    $sid = $row['shoe_id'];
                    echo '<div class="product-card">';     ?>
                    <img src="image/shoesimg/<?php echo $row["shoe_image"]; ?>" alt="<?php echo $row["shoe_name"]; ?>" class="imgcenter">
                    <?php
                    echo '<h2>' . $row['category'] . '</h2>';
                    ?>
                    <p><a href="productpage.php?user_id=<?php echo $id ?>&&shoe_id=<?php echo $sid ?>"><?php echo $row["shoe_name"]; ?></a></p>
                    <?php
                    echo '<p class="price">RM' . $row['shoe_price'] . '</p>';
                    echo '</div>';
				}
			} else if (mysqli_num_rows($resultbrand) > 0) {

				while ($row = mysqli_fetch_assoc($resultbrand)) {
                    $sid = $row['shoe_id'];
                    echo '<div class="product-card">';     ?>
                    <img src="image/shoesimg/<?php echo $row["shoe_image"]; ?>" alt="<?php echo $row["shoe_name"]; ?>" class="imgcenter">
                    <?php
                    echo '<h2>' . $row['category'] . '</h2>';
                    ?>
                    <p><a href="productpage.php?user_id=<?php echo $id ?>&&shoe_id=<?php echo $sid ?>"><?php echo $row["shoe_name"]; ?></a></p>
                    <?php
                    echo '<p class="price">RM' . $row['shoe_price'] . '</p>';
                    echo '</div>';
				}
			} 
      else {
				echo '<p>No shoes found.</p>';
			}




			// Close the database connection
			mysqli_close($conn);
			?>
		</div>
	</div>
</body>
</html>

<?php
    include 'footer.php';
   
?>