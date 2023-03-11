<?php
    include 'header.php';
    include 'config.php'; 
?>

<!DOCTYPE html>
<html>

<head>
<title>CONTACT</title>

<style type="text/css">

body
{
  background-color: grey;
}

span 
{
  color:red 
}

fieldset
{
  background-color: #f2f2f2;
}

.middle
{
  max-width: 800px;
  margin: auto; 
}

.flip-card{
  background-color:transparent;
  width: 200px;
  height: 200px;
  /* border: 1px solid #43FCFF; */
  perspective: 1000px;
  margin-left:100px;
  margin-top:50px;
  float:left;
 
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  
  -webkit-backface-visibility: hidden; 
  backface-visibility: hidden;
}

.flip-card-back {
  background-color: #41413F;
  color: #43FCFF;
  transform: rotateY(180deg);
}

</style>


</head>

<body>


<div class="middle">
<fieldset>
<h1>We are the creator of 1 Coin. Hope you will like our website!</h1>
<p><h3>Flip the card for our informations!</h3></p>
<p></p> 
<div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="images/dehui.jpg" alt="Dehui" style="border-radius: 50%;width:200px;height:200px;">
      </div>
      <div class="flip-card-back">
        <h2>Teng De Hui</h2>
        <p>Group Leader</p>
        <p>Phone Number:0182027784</p>
        <p>ID:1211201761 </p>
      </div>
    </div>
  </div> 
  <p></p> 
<div class="flip-card">																	
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="images/hern.jpg" alt="Khee Hern" style="border-radius: 50%;width:200px;height:200px;">
      </div>
      <div class="flip-card-back">
        <h2>Lee Khee Hern</h2>
        <p>Group Member 1</p>
        <p>Phone Number:0178208893</p>
        <p>ID:1211202010 </p>
      </div>
    </div>
  </div>
  <p></p>
  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="images/cx.jpg" alt="Chorxiang" style="border-radius: 50%;width:200px;height:200px;">
      </div>
      <div class="flip-card-back">
        <h2>Tan Chor Xiang</h2>
        <p>Group Member 2</p>
        <p>Phone Number:0167782792</p>
        <p>ID:1211201763 </p>
      </div>
    </div> 
  </div>

</fieldset>
</div>
<a href="Homepage.php?email=<?php echo $email;?>">Return Home page</a>
</body>

</html>


<?php
    include 'footer.php'; 
?>