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

    <title>Home_page</title>
    <style>
        .container
        {
        text-align: center;
        display: flex;
        justify-content: space-between;
        width: 97%;
        margin: 0 auto;
        border: 1px solid #ccc;
        padding: 20px;
        }
        .box
        {
        flex-basis: calc(33.33% - 20px);
        height: 170px;
        border: 1px solid #ccc;
        }
        .slideshow
        {
        position: relative;
        width: 100%;
        height: 700px;
        margin-top: 20px;
        }
        .mySlides 
        {
        display: none;
        width: 100%;
        height: 100%;
        object-fit: cover;
        }
        .prev, .next 
        {
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        cursor: pointer;
        }
        .next 
        {
        right: 0;
        border-radius: 3px 0 0 3px;
        }
        .prev:hover, .next:hover 
        {
        background-color: rgba(0, 0, 0, 0.8);
        }
        </style>
</head>
<body>



<div class="slideshow">
	<?php
		$dir = "homepageimg/";
		$files = glob($dir . "*.{jpg}", GLOB_BRACE);
		foreach($files as $index=>$file) {
			echo '<img class="mySlides" src="'.$file.'" alt="Slide '.($index+1).'">';
		}
	?>

	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>


<div class="container">
<div class="box"><p> <i class="fa fa-road" style="font-size:80px"></i></p>
<p> BUY ONLINE 24/7 </p>
<p> Shop from the comfort of your home.  </p></div>

<div class="box"><p> <i class="fa fa-reply" style="font-size:80px"></i></i></p>
<p> 15 DAYS RETURN </p>
<p> Simply return it within 15 days for a refund.  </p></div>

<div class="box"><p> <i class="fa fa-id-card" style="font-size:80px"></i></p>
<p> PAYMENT METHOD</p>
<p> Make a payment with debit / credit card</p></div>
</div>

<script>
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) 
  {
		showSlides(slideIndex += n);
	}

	function showSlides(n) 
  {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		if (n > slides.length) {
			slideIndex = 1;
		} else if (n < 1) {
			slideIndex = slides.length;
		}
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		slides[slideIndex-1].style.display = "block";
		setTimeout(function() 
    {
			plusSlides(1);
		}, 5000); 
	}
</script>

</body>
</html>



<?php
    include 'footer.php';
   
?>


