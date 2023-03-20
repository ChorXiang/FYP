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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
        </style>
</head>
<body>
<div class="w3-content w3-display-container" style="max-width:10000px">
<a href="#"><img class="mySlides" src="https://atmos-kl.com/pub/media/mageplaza/bannerslider/banner/image/t/r/treziodpt-banner.jpg" style="width:100%"></a>
<a href="#"><img class="mySlides" src="https://atmos-kl.com/pub/media/mageplaza/bannerslider/banner/image/f/o/forum84low-banner.jpg" style="width:100%"></a>
<a href="#"><img class="mySlides" src="https://atmos-kl.com/pub/media/mageplaza/bannerslider/banner/image/h/u/humara-banner.jpg" style="width:100%"></a>
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>

  </div>

</div> 

<p><img src="image/list.png" style="width:100%"></p>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>

</body>
</html>



<?php
    include 'footer.php';
   
?>


