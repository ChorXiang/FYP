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
        .mySlides 
        {
            display:none
             height:500px;
            width:100%;
            z-index: -1; 
        }
        .w3-left, .w3-right, .w3-badge 
        {
            cursor:pointer
        }
        .w3-badge 
        {
            height:13px;
            width:13px;
            padding:0
        }
        .container
        {
          text-align: center;
          display: flex;
          justify-content: space-between;
          width: 100%;
          margin: 0 auto;
          border: 1px solid #ccc;
          padding: 20px;
        }
        .box
        {
        flex-basis: calc(33.33% - 20px);
        height: 170px;
        background-color: #f2f2f2;
        border: 1px solid #ccc;
        }

        .slideshow-container {
			position: relative;
			width: 100%;
			height: 500px;
			margin: auto;
		}

		.mySlides {
			display: none;
			width: 100%;
			height: 100%;
			object-fit: cover;
		}

		.prev, .next {
			position: absolute;
			top: 50%;
			margin-top: -22px;
			width: auto;
			padding: 16px;
			color: white;
			font-weight: bold;
			font-size: 18px;
			transition: 0.6s ease;
			border-radius: 0 3px 3px 0;
			cursor: pointer;
		}

		.next {
			right: 0;
			border-radius: 3px 0 0 3px;
		}

		.prev:hover, .next:hover {
			background-color: rgba(0, 0, 0, 0.8);
		}
        </style>
</head>
<body>



<div class="slideshow-container">
	<?php
		// specify the directory where the images are stored
		$dir = "homepageimg/";

		// get all image files in the directory
		$files = glob($dir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

		// loop through each image file and display it as a slide
		foreach($files as $index=>$file) {
			echo '<img class="mySlides" src="'.$file.'" alt="Slide '.($index+1).'">';
		}
	?>

	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>


<div class="container">
<div class="box"><p> <i class='fas fa-shoe-prints' style='font-size:80px;'></i></p>
<p> BUY ONLINE 24/7 </p>
<p> Shop from the comfort of your home.  </p></div>

<div class="box"><p> <i class='fas fa-reply-all' style='font-size:80px'></i></i></p>
<p> 15 DAYS RETURN </p>
<p> Simply return it within 15 days for a refund.  </p></div>

<div class="box"><p> <i class="fa fa-id-card" style="font-size:80px"></i></p>
<p> PAYMENT Method</p>
<p> Make a payment with debit / credit card</p></div>
</div>

<script>
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
		showSlides(slideIndex += n);
	}

	function showSlides(n) {
		var i;
		var slides = document.getElementsByClassName("mySlides");

		// reset slide index if it goes out of bounds
		if (n > slides.length) {
			slideIndex = 1;
		} else if (n < 1) {
			slideIndex = slides.length;
		}

		// hide all slides
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}

		// show the current slide
		slides[slideIndex-1].style.display = "block";

		// set timeout for automatic slideshow
		setTimeout(function() {
			plusSlides(1);
		}, 5000); // change slide every 5 seconds
	}
</script>

</body>
</html>



<?php
    include 'footer.php';
   
?>


